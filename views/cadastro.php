<!DOCTYPE html>
<html>

<head>
    <title>Cadastro</title>
    <link rel="stylesheet" type="text/css" href="css/login.css">

    <script>
        function validarSenhas() {
            var senha = document.querySelector('input[name="pSenha"]').value;
            var confirmarSenha = document.querySelector('input[name="pConfirmar_senha"]').value;

            if (senha !== confirmarSenha) {
                alert("As senhas não coincidem. Por favor, tente novamente.");
                return false;
            }

            return true;
        }
    </script>

</head>

<body>
    <section class="container">
        <form action="../controllers/controllerUsuario.php" method="post" onsubmit="return validarSenhas()">
            <h1>Cadastro</h1>
            <!-- <input type="text" name="apelido" placeholder="Apelido" required> -->
            <input type="text" name="pNome" placeholder="Nome" required>
            <input type="email" name="pEmail" placeholder="Email" required>
            <input type="password" name="pSenha" placeholder="Senha" required>
            <input type="password" name="pConfirmar_senha" placeholder="Confirmar Senha" required>
            <?php
            session_start();
            if (isset($_SESSION['cadastroErro'])) {
                echo '<p>Erro ao cadastrar. Tente novamente.</p>';
                unset($_SESSION['cadastroErro']);
            }
            ?>
            <input type="submit" value="Cadastrar">
            <input type="hidden" value="2" name="pOpcao">
        </form>
        <div class="button-container">
            <button onclick="window.location.href='login.php'">Login</button>
            <button onclick="window.location.href='index.php'">Voltar para o site</button>
        </div>
    </section>
</body>

</html>