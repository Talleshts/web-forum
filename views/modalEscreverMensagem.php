<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/modalEscreverMensagem.css" />
    <title>Tela Modal</title>
</head>

<body>

    <!-- Botão para abrir a tela modal -->
    <button onclick="openModal()">Abrir Modal</button>

    <!-- Tela modal -->
    <div id="myModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal()">&times;</span>
            <h2>Enviar Mensagem</h2>
            <form action="enviar_mensagem.php" method="post">
                <label for="usuarios">Usuários:</label>
                <select name="usuarios" id="usuarios">
                    <option value="usuario1">Usuário 1</option>
                    <option value="usuario2">Usuário 2</option>
                    <option value="usuario3">Usuário 3</option>
                </select>
                <br><br>
                <label for="titulo">Título:</label>
                <input type="text" name="titulo" id="titulo">
                <br><br>
                <label for="corpo">Corpo:</label>
                <textarea name="corpo" id="corpo" rows="5"></textarea>
                <br><br>
                <input type="submit" value="Enviar">
            </form>
        </div>
    </div>

    <script>
        // Função para abrir a tela modal
        function openModal() {
            document.getElementById("myModal").style.display = "block";
        }

        // Função para fechar a tela modal
        function closeModal() {
            document.getElementById("myModal").style.display = "none";
        }
    </script>

</body>

</html>