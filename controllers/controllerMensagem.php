<?php
require_once '../dao/usuarioDAO.inc.php';

$opcao = $_REQUEST['pOpcao'];

switch ($opcao) {
    case 1:
        // obter todas as mensagens

        $usuarioDao = new UsuarioDao();
        $usuarios = $usuarioDao->obterTodosUsuarios();
        session_start();
        $_SESSION['usuarios'] = $usuarios;
        header('Location: ../views/visualizarMensagens.php');
}
