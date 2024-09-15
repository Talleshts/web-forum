<?php
require_once '../classes/usuario.inc.php';
require_once '../classes/mensagem.inc.php';
require_once 'includes/cabecalho.inc.php';

if (isset($_SESSION['mensagemEnviada'])) {
    echo "<script>alert('Mensagem enviada com sucesso!')</script>";
    unset($_SESSION['mensagemEnviada']);
}
?>

<head>
    <title>Visualizar Mensagens</title>
    <link rel="stylesheet" type="text/css" href="css/visualizarMensagens.css" />
</head>

<body>
    <section>
        <div class="mensagem-list">
            <ul>
                <?php
                $mensagens = $_SESSION['mensagens'];

                foreach ($mensagens as $mensagem) {
                ?>
                    <li>
                        <div class="mensagem" onclick="showMessage(1)">
                            <img src="https://via.placeholder.com/50" alt="Imagem do Usuário">
                            <p><?= $mensagem->remetente ?></p>
                            <p><?= $mensagem->assunto ?></p>
                            <!-- <a href="../controllers/controllerMensagem.php?pOpcao=3&pId=<?= $mensagem->id ?>">Excluir</a> -->
                            <?php
                            include_once "./includes/modalExcluirMensagem.inc.php";
                            ?>
                        </div>
                    </li>
                <?php
                }
                ?>
            </ul>
        </div>
        <div class="mensagem-conteudo">
            <h1>Título da Mensagem</h1>
            <p>Nome do Usuário</p>
            <p>Conteudo da Mensagem</p>
        </div>
    </section>
</body>

<?php
require_once 'includes/rodape.inc.php';
?>