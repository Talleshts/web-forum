<!-- Modal -->
<div class="modal fade" id="loadingModal" tabindex="-1" role="dialog" aria-labelledby="loadingModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-body text-center">
                <!-- Loading Spinner -->
                <div id="loading" style="display: none;">
                    <div class="spinner-border" role="status">
                        <span class="sr-only"></span>
                    </div>
                    <p>Enviando mensagem, aguarde...</p>
                </div>

                <!-- Success Check -->
                <div id="success-check" style="display: none;">
                    <i class="fa fa-check-circle" style="color: green; font-size: 48px;"></i>
                    <p>Mensagem enviada com sucesso!</p>
                    <button type="button" class="btn btn-success" id="closeModalBtn" data-bs-dismiss="modal">OK</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Função para exibir o loading
    function showLoading() {
        document.getElementById('loading').style.display = 'block';
        document.getElementById('success-check').style.display = 'none';
    }

    // Função para exibir o sucesso
    function showSuccess() {
        document.getElementById('loading').style.display = 'none';
        document.getElementById('success-check').style.display = 'block';
    }

    // Função para fechar o modal e voltar para a página anterior
    document.getElementById('closeModalBtn').addEventListener('click', function() {
        var loadingModal = new bootstrap.Modal(document.getElementById('loadingModal'));
        loadingModal.hide();
        window.location.href = 'visualizarMensagens2.php'; // Redirecionar para a página desejada
    });
</script>

<style>
    .spinner-border {
        width: 48px;
        height: 48px;
        border-width: 5px;
        color: #007bff;
    }
</style>