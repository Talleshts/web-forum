<?php
require_once 'conexao.inc.php';
require_once '../classes/mensagem.inc.php';

class MensagemDao
{
    private $con;
    function __construct()
    {
        $c = new Conexao();
        $this->con = $c->getConexao();
    }

    public function obterTodasMensagensRecebidas($id)
    {
        $sql = $this->con->prepare("SELECT *, (SELECT email FROM usuario WHERE usuario.idUsuario = mensagem.remetente) as email_remetente FROM mensagem WHERE destinatario =:id ORDER BY data DESC");
        $sql->bindValue(':id', $id);
        $sql->execute();


        $mensagens = [];

        if ($sql->rowCount() > 0) {
            $mensagensResponse = $sql->fetchAll(PDO::FETCH_ASSOC);

            foreach ($mensagensResponse as $msg) {
                $mensagem = new Mensagem();
                $mensagem->setMensagem($msg['id'], $msg['email_remetente'], $msg['destinatario'], $msg['data'], $msg['conteudo'], $msg['titulo'], $msg['assunto']);
                $mensagens[] = $mensagem;
            }
        }

        return $mensagens;
    }

    public function obterTodasMensagensEnviadas($id)
    {
        $sql = $this->con->prepare("SELECT *, (SELECT email FROM usuario WHERE usuario.idUsuario = mensagem.destinatario) as email_destinatario FROM mensagem WHERE remetente =:id ORDER BY data DESC");
        $sql->bindValue(':id', $id);

        $mensagensResponse = $sql->fetchAll(PDO::FETCH_ASSOC);

        $mensagens = [];

        if ($sql->rowCount() > 0) {

            foreach ($mensagensResponse as $msg) {
                $mensagem = new Mensagem();
                $mensagem->setMensagem($msg['id'], $msg['email_destinatario'], $msg['destinatario'], $msg['data'], $msg['conteudo'], $msg['titulo'], $msg['assunto']);
                $mensagens[] = $mensagem;
            }
        }

        return $mensagens;
    }

    public function obterMensagemPorId($id)
    {
        $sql = $this->con->prepare("SELECT *, (SELECT email FROM usuario WHERE usuario.idUsuario = mensagem.remetente) as email_remetente FROM mensagem WHERE id = :id");
        $sql->bindValue(':id', $id);
        $sql->execute();

        $msg = $sql->fetch(PDO::FETCH_ASSOC);

        if ($msg) {
            $mensagem = new Mensagem();
            $mensagem->setMensagem($msg['id'], $msg['email_remetente'], $msg['destinatario'], $msg['data'], $msg['conteudo'], $msg['titulo'], $msg['assunto']);
            return $mensagem;
        }

        return null;
    }

    public function enviarMensagem($mensagem)
    {
        $sql = $this->con->prepare("INSERT INTO mensagem (remetente, destinatario, conteudo, titulo, assunto, data) VALUES (:id, :destinatario_id, :conteudo, :titulo, :assunto, :data)");
        $sql->bindValue(':id', $mensagem->remetente);
        $sql->bindValue(':destinatario_id', $mensagem->destinatario);
        $sql->bindValue(':conteudo', $mensagem->conteudo);
        $sql->bindValue(':titulo', $mensagem->titulo);
        $sql->bindValue(':assunto', $mensagem->assunto);
        $sql->bindValue(':data', $mensagem->data);
        $sql->execute();
    }

    public function excluirMensagem($id)
    {
        $sql = $this->con->prepare("DELETE FROM mensagem WHERE id = :id");
        $sql->bindValue(':id', $id);
        $sql->execute();
    }
}
