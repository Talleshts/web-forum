<?php

require_once '../dao/usuarioDAO.inc.php';

$opcao = $_REQUEST['pOpcao'];

switch ($opcao) {
    case 1:
        // fazer login
        $email = $_REQUEST['pLogin'];
        $senha = $_REQUEST['pSenha'];

        $usuarioDao = new UsuarioDao();
        $usuario = $usuarioDao->autenticarUsuario($email, $senha);

        session_start();
        if ($usuario == null) {
            $_SESSION['loginErro'] = true;
            header('Location: ../views/login.php');
        } else {
            $_SESSION['usuarioLogado'] = $usuario;
            header('Location: controllerMensagem.php?pOpcao=1');
        }
        break;
    case 2:
        // cadastrar
        $email = $_REQUEST['pEmail'];
        $nome = $_REQUEST['pNome'];
        $senha = $_REQUEST['pSenha'];

        $usuarioDao = new UsuarioDao();
        $resposta = $usuarioDao->cadastrarUsuario($email, $nome, $senha);

        if ($resposta == true) {
            header('Location: ../views/login.php');
        } else {
            session_start();
            $_SESSION['cadastroErro'] = true;
            header('Location: ../views/cadastro.php');
        }

        header('Location: ../views/login.php');
        break;

    case 3:
        // sair
        session_start();
        session_destroy();
        header('Location: ../views/index.php');
        break;
}
