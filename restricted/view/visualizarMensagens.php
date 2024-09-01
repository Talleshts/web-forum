<!DOCTYPE html>
<html>
<head>
    <title>Visualizar Mensagens</title>
    <style>
        section{
            display: flex;
            justify-content: center;
        }
        .mensagem-list {
            float: left;
            width: 30%;
            padding: 10px;
        }

        .mensagem-conteudo {
            float: left;
            width: 70%;
            padding: 10px;
        }

        .mensagem {
            cursor: pointer;
            margin-bottom: 10px;
            padding: 10px;
            background-color: #f2f2f2;
        }

        .mensagem img {
            width: 50px;
            height: 50px;
            margin-right: 10px;
        }
    </style>
</head>
<body>
    <section>
        <div class="mensagem-list">
            <ul>
                <li>
                    <div class="mensagem" onclick="showMessage(1)">
                        <img src="https://via.placeholder.com/50" alt="Imagem do Usuário">    
                        <p>Nome do Usuário</p>
                        <p>Título da Mensagem</p>
                        <p>previa da mensa...</p>
                    </div>
                </li>
                                <li>
                    <div class="mensagem" onclick="showMessage(1)">
                        <img src="https://via.placeholder.com/50" alt="Imagem do Usuário">    
                        <p>Nome do Usuário</p>
                        <p>Título da Mensagem</p>
                        <p>previa da mensa...</p>
                    </div>
                </li>
                                <li>
                    <div class="mensagem" onclick="showMessage(1)">
                        <img src="https://via.placeholder.com/50" alt="Imagem do Usuário">    
                        <p>Nome do Usuário</p>
                        <p>Título da Mensagem</p>
                        <p>previa da mensa...</p>
                    </div>
                </li>
                                <li>
                    <div class="mensagem" onclick="showMessage(1)">
                        <img src="https://via.placeholder.com/50" alt="Imagem do Usuário">    
                        <p>Nome do Usuário</p>
                        <p>Título da Mensagem</p>
                        <p>previa da mensa...</p>
                    </div>
                </li>
                <!-- Add more messages here -->
            </ul>
        </div>
        <div class="mensagem-conteudo">
            <h1>Título da Mensagem</h1>
            <p>Nome do Usuário</p>
            <p>Conteudo da Mensagem</p>
        </div>
    </section>
</body>
</html>
