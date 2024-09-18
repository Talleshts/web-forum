<header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
    <a href="../controllers/controllerMensagem.php?pOpcao=1" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
        <img src="./assets/logo-semfundo.png" style="height: 8rem; width: auto;">&nbsp;&nbsp;
        <h4> Web Forum</h4>
    </a>

    <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">

        <li><a href="../controllers/controllerMensagem.php?pOpcao=1" class="nav-link px-2 link-secondary">Home</a></li>

        <li>
            <?php
            include "./modalEscreverMensagem.php";
            ?>
        </li>

        <!-- <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle link-dark" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Clientes
            </a>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">Cadastrar</a></li>
                <li><a class="dropdown-item" href="#">Seus dados</a></li>
            </ul>
        </li>

        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle link-dark" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Vendas
            </a>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">Vendas realizadas</a></li>
            </ul>
        </li>
        <li><a href="#" class="nav-link px-2 link-dark">Contato</a></li>

        <li>
            <a class="nav-link px-2 link-dark" href="../controllers/controllerCarrinho.php?opcao=4">
                <img src="imagens/cart3.png" alt="">
            </a>
        </li> -->

    </ul>

    <div class="col-md-3 text-end">

        <?php
        $usuario = $_SESSION['usuarioLogado'];
        echo $usuario->email;
        include_once "modal.inc.php";
        ?>

    </div>
</header>