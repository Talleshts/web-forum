<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" type="text/css" href="css/login.css" />
</head>

<body>
    <section class="container">
        <form action="../controllers/controllerUsuario.php" method="post">
            <h1>Login</h1>
            <input type="text" name="pLogin" placeholder="Login" required>
            <input type="password" name="pSenha" placeholder="Senha" required>
            <?php
            session_start();
            if (isset($_SESSION['loginErro'])) {
                echo '<p>Erro ao fazer login. Verifique suas credenciais e tente novamente.</p>';
                unset($_SESSION['loginErro']);
            }
            ?>
            <input type="submit" value="Entrar">
            <input type="hidden" value="1" name="pOpcao">
        </form>
        <div class="button-container">
            <button onclick="window.location.href='cadastro.php'">Cadastre-se</button>
            <button onclick="window.location.href='recuperarSenha.php'">Esqueceu sua senha?</button>
            <button onclick="window.location.href='index.php'">Voltar para o site</button>
        </div>
    </section>
</body>

</html>