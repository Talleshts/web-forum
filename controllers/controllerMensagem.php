<?php
require_once '../dao/usuarioDAO.inc.php';
require_once '../dao/mensagemDao.inc.php';
require_once '../classes/mensagem.inc.php';

$opcao = $_REQUEST['pOpcao'];

switch ($opcao) {
    case 1:
        // obter todas as mensagens

        $usuarioDao = new UsuarioDao();
        $usuarios = $usuarioDao->obterTodosUsuarios();
        session_start();
        $_SESSION['usuarios'] = $usuarios;

        $mensagemDao = new MensagemDao();
        $mensagens = $mensagemDao->obterTodasMensagensRecebidas($_SESSION['usuarioLogado']->id);
        $_SESSION['mensagens'] = $mensagens;

        header('Location: ../views/visualizarMensagens2.php');
        break;

    case 2:
        // enviar mensagem com nova conversa
        $remetente_id = $_REQUEST['pRemetente'];
        $destinatario_id = $_REQUEST['pDestinatario'];
        $conteudo = $_REQUEST['pCorpo'];
        $assunto = $_REQUEST['pAssunto'];
        $titulo = $_REQUEST['pTitulo'];

        $mensagemDao = new MensagemDao();

        $id_conversa = null;

        if (isset($_REQUEST['pConversa'])) {
            $id_conversa = $_REQUEST['pConversa'];
        } else {
            $id_conversa = $mensagemDao->criarConversa();
        }

        echo '<alert>id_conversa: ' . $id_conversa . '</alert>';

        $mensagem = new Mensagem();
        $mensagem->criarMensagem($id_conversa, $remetente_id, $destinatario_id, $conteudo, $assunto, $titulo);

        $id_mensagem = $mensagemDao->enviarMensagem($mensagem);

        if ($_FILES['pImagem']['size'] > 0) {
            uploadImagemMensagem($id_mensagem);
        }

        session_start();
        $_SESSION['mensagemEnviada'] = true;

        header('Location: controllerMensagem.php?pOpcao=1');

        break;

    case 3:
        // excluir mensagem
        $id = $_REQUEST['pId'];

        $mensagemDao = new MensagemDao();
        $mensagemDao->excluirMensagem($id);

        header('Location: controllerMensagem.php?pOpcao=1');

        break;

    default:
        break;
}

function uploadImagemMensagem($id)
{
    $imagem = $_FILES['pImagem'];
    $nome = $id . '.jpg';
    $caminho = '../views/images/mensagens/' . $nome;

    if ($imagem != null) {
        $nome_temporario = $_FILES['pImagem']['tmp_name'];
        copy($nome_temporario, $caminho);
    }
}

function obterFotoMensagem($id)
{
    $arquivo = '../images/mensagens/' . $id . '.jpg';

    if (file_exists($arquivo)) {
        return $arquivo;
    }
}
