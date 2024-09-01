<!DOCTYPE html>
<html>
<head>
    <title>Tela Modal</title>
    <style>
        /* Estilos para a tela modal */
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.4);
        }

        .modal-content {
            background-color: #fefefe;
            margin: 15% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }
    </style>
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