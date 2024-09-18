<?php
require_once '../classes/usuario.inc.php';
require_once '../classes/mensagem.inc.php';
require_once '../dao/mensagemDao.inc.php';
require_once 'includes/cabecalho.inc.php';
require_once 'includes/carregamento-sucesso.inc.php';


$mensagens = $_SESSION['mensagens'] ?? [];
$mensagemSelecionada = null;

if (isset($_SESSION['mensagemEnviada']) && $_SESSION['mensagemEnviada'] === true) {
    // Remove a flag imediatamente antes de continuar, para garantir que não reapareça
    unset($_SESSION['mensagemEnviada']);

    echo "<script>
        document.addEventListener('DOMContentLoaded', function() {
            var loadingModal = new bootstrap.Modal(document.getElementById('loadingModal'));
            loadingModal.show();
            showLoading();
            
            // Aguarda o tempo do carregamento e mostra o sucesso
            setTimeout(function() {
                showSuccess();
            }, 1500);
        });
    </script>";
}

// Verifica se um ID de mensagem foi passado na URL
if (isset($_GET['mensagemId'])) {
    foreach ($mensagens as $mensagem) {
        if ($mensagem->id == $_GET['mensagemId']) {
            $mensagemSelecionada = $mensagem;
            break;
        }
    }
}
?>

<link rel="stylesheet" type="text/css" href="css/visualizarMensagens2.css" />
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<div class="container">
    <div class="row message-wrapper rounded shadow mb-20">
        <div class="col-md-4 message-sideleft">
            <div class="panel">
                <div class="panel-heading">
                    <h3 class="panel-title">Mensagens</h3>
                </div>
                <div class="panel-body no-padding">
                    <div class="list-group no-margin list-message">
                        <?php
                        foreach ($mensagens as $mensagem) {
                        ?>
                            <a href="visualizarMensagens2.php?mensagemId=<?= $mensagem->id ?>" class="list-group-item d-flex align-items-center">
                                <!-- Imagem do avatar à esquerda -->
                                <img src="./images/mensagens/<?= $mensagem->id ?>.jpg" alt="Avatar" class="img-circle avatar" style="width: 50px; height: 50px; object-fit: cover; margin-right: 15px; border-radius: 50%;">

                                <!-- Conteúdo da mensagem -->
                                <div>
                                    <h4 class="list-group-item-heading"><?= $mensagem->remetente_email ?></h4>
                                    <p class="list-group-item-text"><strong><?= $mensagem->assunto ?></strong></p>
                                </div>
                            </a>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8 message-sideright">
            <div class="panel">
                <div class="panel-heading">
                    <?php if (isset($mensagemSelecionada)) { ?>
                        <div class="media">
                            <a class="pull-left" href="#">
                                <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="Avatar" class="img-circle avatar">
                            </a>
                            <div class="media-body">
                                <h4 class="media-heading"><?= htmlspecialchars($mensagemSelecionada->remetente_nome) ?></h4>
                                <small><?= htmlspecialchars($mensagemSelecionada->data) ?></small>
                            </div>
                        </div>
                    <?php } else { ?>
                        <p>Nenhuma mensagem selecionada.</p>
                    <?php } ?>
                </div>
                <div class="panel-body">
                    <?php if (isset($mensagemSelecionada)) { ?>
                        <h4><?= htmlspecialchars($mensagemSelecionada->titulo) ?></h4>
                        <p><?= htmlspecialchars($mensagemSelecionada->conteudo) ?></p>
                        <img src="images/mensagens/<?= $mensagemSelecionada->id ?>.jpg" alt="img" class="img-ajustada">
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>


<?php
require_once 'includes/rodape.inc.php';
?>