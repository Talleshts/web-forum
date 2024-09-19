<?php
require_once '../classes/usuario.inc.php';
require_once '../dao/usuarioDao.inc.php';
require_once 'includes/cabecalho.inc.php';

$usuario = $_SESSION['usuarioLogado'];

?>

<link rel="stylesheet" type="text/css" href="css/cadastroAtualizar.css">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">

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

<div class="container-form">
    <h1>Atualizar Dados</h1>
    <div class="avatar-container">
        <?php
        $arquivo = './images/perfil/' . $usuario->id . '.jpg';
        $imagem = file_exists($arquivo) ? $arquivo : './images/perfil/avatar.png';
        ?>
        <img src="<?= $imagem ?>" alt="Avatar" class="avatar">
        <?php
        if (file_exists($arquivo)) {
        ?>
            <div class="overlay" onclick="window.location.href='../controllers/controllerUsuario.php?pOpcao=6&id=<?= urlencode($usuario->id) ?>';">
                <i class="fa fa-trash icon"></i>
            </div>
        <?php
        }
        ?>
    </div>

    <form action="../controllers/controllerUsuario.php" method="post" onsubmit="return validarSenhas()" enctype="multipart/form-data">

        <label for="pNome" class="form-label">Nome:</label>
        <input type="text" name="pNome" placeholder="Nome" required value="<?= htmlspecialchars($usuario->nome) ?>">

        <label for="pSenha" class="form-label">Senha:</label>
        <input type="text" name="pSenha" placeholder="Senha" required value="<?= htmlspecialchars($usuario->senha) ?>">

        <label for="pConfirmar_senha" class="form-label">Confirmar Senha:</label>
        <input type="password" name="pConfirmar_senha" placeholder="Confirmar Senha" required value="<?= htmlspecialchars($usuario->senha) ?>">

        <label for="pImagem" class="form-label">Foto de Perfil:</label>
        <input type="file" class="file-input" name="pImagem">

        <?php
        if (isset($_SESSION['cadastroErro'])) {
            echo '<p>Erro ao atualizar cadastro. Tente novamente.</p>';
            unset($_SESSION['cadastroErro']);
        }
        ?>
        <input type="submit" value="Atualizar">
        <input type="hidden" value="5" name="pOpcao">
    </form>
</div>


<?php
require_once 'includes/rodape.inc.php';
?>