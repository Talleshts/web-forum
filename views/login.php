<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <title>Login - Web Forum</title>
    <link rel="stylesheet" type="text/css" href="css/login.css" />
</head>

<body>
    <section class="container">
        <form action="../controllers/controllerUsuario.php" method="post">
            <a href="index.php">
                <div class="voltar">
                    <img src="assets/seta-voltar.png" alt="seta virada para a esquerda" class="seta">
                    <p class="back-button">
                        &#8592; &nbsp Voltar para o site
                    </p>
                </div>
            </a>
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
        </div>
    </section>
</body>

</html>