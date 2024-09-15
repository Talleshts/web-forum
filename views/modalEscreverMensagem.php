<?php
$usuarios = $_SESSION['usuarios'];
var_dump($usuarios);
?>


<a href="#" class="nav-link px-2 link-secondary" data-bs-toggle="modal" data-bs-target="#mensagemModal">Escrever Mensagem</a>

<!-- Tela modal -->
<div class="modal fade" id="mensagemModal" tabindex="-1" aria-labelledby="mensagemModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mensagemModalLabel">Enviar Mensagem</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
            </div>
            <div class="modal-body">
                <form action="enviar_mensagem.php" method="post">
                    <div class="mb-3">
                        <label for="usuarios" class="form-label">Usuários:</label>
                        <select name="usuarios" id="usuarios" class="form-select">
                            <?php
                            foreach ($usuarios as $usuario) {
                                echo "<option value='" . htmlspecialchars($usuario->id) . "'>" . htmlspecialchars($usuario->email) . "</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="titulo" class="form-label">Título:</label>
                        <input type="text" name="titulo" id="titulo" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="corpo" class="form-label">Corpo:</label>
                        <textarea name="corpo" id="corpo" class="form-control" rows="5"></textarea>
                    </div>
                    <div class="modal-footer">
                        <input type="submit" class="btn btn-primary" value="Enviar">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

</html>