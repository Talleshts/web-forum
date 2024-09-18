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
        $sql = $this->con->prepare(
            "SELECT *, 
            (SELECT email FROM usuario WHERE usuario.idUsuario = mensagem.destinatario) as destinatario_email,
            (SELECT nome FROM usuario WHERE usuario.idUsuario = mensagem.destinatario) as destinatario_nome,
            (SELECT email FROM usuario WHERE usuario.idUsuario = mensagem.remetente) as remetente_email,
            (SELECT nome FROM usuario WHERE usuario.idUsuario = mensagem.remetente) as remetente_nome 
            FROM mensagem WHERE destinatario LIKE :id ORDER BY data DESC"
        );
        $sql->bindValue(':id', $id);
        $sql->execute();

        $mensagens = [];

        if ($sql->rowCount() > 0) {
            $mensagensResponse = $sql->fetchAll(PDO::FETCH_ASSOC);

            foreach ($mensagensResponse as $msg) {
                $mensagem = new Mensagem();
                $mensagem->setMensagem(
                    $msg['id'],
                    $msg['id_conversa'],
                    $msg['remetente'],
                    $msg['remetente_email'],
                    $msg['remetente_nome'],
                    $msg['destinatario'],
                    $msg['destinatario_email'],
                    $msg['destinatario_nome'],
                    $msg['data'],
                    $msg['conteudo'],
                    $msg['titulo'],
                    $msg['assunto']
                );
                $mensagens[] = $mensagem;
            }
        }
        return $mensagens;
    }

    public function obterTodasMensagensEnviadas($id)
    {
        $sql = $this->con->prepare(
            "SELECT *, 
            (SELECT email FROM usuario WHERE usuario.idUsuario = mensagem.destinatario) as destinatario_email,
            (SELECT nome FROM usuario WHERE usuario.idUsuario = mensagem.destinatario) as destinatario_nome,
            (SELECT email FROM usuario WHERE usuario.idUsuario = mensagem.remetente) as remetente_email,
            (SELECT nome FROM usuario WHERE usuario.idUsuario = mensagem.remetente) as remetente_nome 
            FROM mensagem WHERE remetente =:id ORDER BY data DESC"
        );
        $sql->bindValue(':id', $id);

        $mensagensResponse = $sql->fetchAll(PDO::FETCH_ASSOC);

        $mensagens = [];

        if ($sql->rowCount() > 0) {

            foreach ($mensagensResponse as $msg) {
                $mensagem = new Mensagem();
                $mensagem->setMensagem(
                    $msg['id'],
                    $msg['id_conversa'],
                    $msg['remetente'],
                    $msg['remetente_email'],
                    $msg['remetente_nome'],
                    $msg['destinatario'],
                    $msg['destinatario_email'],
                    $msg['destinatario_nome'],
                    $msg['data'],
                    $msg['conteudo'],
                    $msg['titulo'],
                    $msg['assunto']
                );
                $mensagens[] = $mensagem;
            }
        }

        return $mensagens;
    }

    public function criarConversa()
    {
        $id = $this->gerarGUID();

        $sql = $this->con->prepare("INSERT INTO conversa (id) VALUES (:id)");
        $sql->bindValue(':id', $id);
        $sql->execute();

        return $id;
    }

    public function enviarMensagem($mensagem)
    {
        $id_mensagem = $this->gerarGUID();

        $sql = $this->con->prepare("INSERT INTO mensagem (id, id_conversa, remetente, destinatario, conteudo, titulo, assunto, data) VALUES (:id_mensagem, :id_conversa, :id, :destinatario_id, :conteudo, :titulo, :assunto, :data)");
        $sql->bindValue(':id_mensagem', $id_mensagem);
        $sql->bindValue(':id_conversa', $mensagem->id_conversa);
        $sql->bindValue(':id', $mensagem->remetente_id);
        $sql->bindValue(':destinatario_id', $mensagem->destinatario_id);
        $sql->bindValue(':conteudo', $mensagem->conteudo);
        $sql->bindValue(':titulo', $mensagem->titulo);
        $sql->bindValue(':assunto', $mensagem->assunto);
        $sql->bindValue(':data', $mensagem->data);
        $sql->execute();

        return $id_mensagem;
    }

    public function excluirMensagem($id)
    {
        $sql = $this->con->prepare("DELETE FROM mensagem WHERE id = :id");
        $sql->bindValue(':id', $id);
        $sql->execute();
    }
    private function gerarGUID()
    {
        return sprintf(
            '%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
            mt_rand(0, 0xffff),
            mt_rand(0, 0xffff),
            mt_rand(0, 0xffff),
            mt_rand(0, 0x0fff) | 0x4000,
            mt_rand(0, 0x3fff) | 0x8000,
            mt_rand(0, 0xffff),
            mt_rand(0, 0xffff),
            mt_rand(0, 0xffff)
        );
    }
}
