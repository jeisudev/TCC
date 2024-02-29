<?php
include_once("conexao/conexao.php");
if (isset($_POST['categ_button_mad'])) {
    $_SESSION['categ_prod'] = $_POST['categ_button_mad'];
    $nome_prod = $_SESSION['nome_prod'];
    $desc_prod = $_SESSION['comentario_prod'];
    $qtd_prod = $_SESSION['qtd_prod'];
    $valor_prod = $_SESSION['valor_prod'];
    $categ_prod = $_SESSION['categ_prod'];
    $id_usuario_prod = $_SESSION['id'];
    $sql = "INSERT INTO produto (ID_categ, ID_usuario, quantidade, preco, nome, descricao) VALUES 
        ('{$categ_prod}','{$id_usuario_prod}', '{$qtd_prod}', '{$valor_prod}', '{$nome_prod}','{$desc_prod}')";
    $res = $conn->query($sql) or die("Falha: " . $conn->error);
    $id_prod = $conn->insert_id;
    header("location: vender-step-4.php?id=$id_prod");

} elseif (isset($_POST['categ_button_plas'])) {
    $_SESSION['categ_prod'] = $_POST['categ_button_plas'];
    $nome_prod = $_SESSION['nome_prod'];
    $desc_prod = $_SESSION['comentario_prod'];
    $qtd_prod = $_SESSION['qtd_prod'];
    $valor_prod = $_SESSION['valor_prod'];
    $categ_prod = $_SESSION['categ_prod'];
    $id_usuario_prod = $_SESSION['id'];
    $sql = "INSERT INTO produto (ID_categ, ID_usuario, quantidade, preco, nome, descricao) VALUES 
        ('{$categ_prod}','{$id_usuario_prod}', '{$qtd_prod}', '{$valor_prod}', '{$nome_prod}','{$desc_prod}')";
    $res = $conn->query($sql) or die("Falha: " . $conn->error);
    $id_prod = $conn->insert_id;
    header("location: vender-step-4.php?id=$id_prod");

} elseif (isset($_POST['categ_button_vidro'])) {
    $_SESSION['categ_prod'] = $_POST['categ_button_vidro'];
    $nome_prod = $_SESSION['nome_prod'];
    $desc_prod = $_SESSION['comentario_prod'];
    $qtd_prod = $_SESSION['qtd_prod'];
    $valor_prod = $_SESSION['valor_prod'];
    $categ_prod = $_SESSION['categ_prod'];
    $id_usuario_prod = $_SESSION['id'];
    $sql = "INSERT INTO produto (ID_categ, ID_usuario, quantidade, preco, nome, descricao) VALUES 
        ('{$categ_prod}','{$id_usuario_prod}', '{$qtd_prod}', '{$valor_prod}', '{$nome_prod}','{$desc_prod}')";
    $res = $conn->query($sql) or die("Falha: " . $conn->error);
    $id_prod = $conn->insert_id;
    header("location: vender-step-4.php?id=$id_prod");

} elseif (isset($_POST['categ_button_met'])) {
    $_SESSION['categ_prod'] = $_POST['categ_button_met'];
    $nome_prod = $_SESSION['nome_prod'];
    $desc_prod = $_SESSION['comentario_prod'];
    $qtd_prod = $_SESSION['qtd_prod'];
    $valor_prod = $_SESSION['valor_prod'];
    $categ_prod = $_SESSION['categ_prod'];
    $id_usuario_prod = $_SESSION['id'];
    $sql = "INSERT INTO produto (ID_categ, ID_usuario, quantidade, preco, nome, descricao) VALUES 
        ('{$categ_prod}','{$id_usuario_prod}', '{$qtd_prod}', '{$valor_prod}', '{$nome_prod}','{$desc_prod}')";
    $res = $conn->query($sql) or die("Falha: " . $conn->error);
    $id_prod = $conn->insert_id;
    header("location: vender-step-4.php?id=$id_prod");

} elseif (isset($_POST['categ_button_pvc'])) {
    $_SESSION['categ_prod'] = $_POST['categ_button_pvc'];
    $nome_prod = $_SESSION['nome_prod'];
    $desc_prod = $_SESSION['comentario_prod'];
    $qtd_prod = $_SESSION['qtd_prod'];
    $valor_prod = $_SESSION['valor_prod'];
    $categ_prod = $_SESSION['categ_prod'];
    $id_usuario_prod = $_SESSION['id'];
    $sql = "INSERT INTO produto (ID_categ, ID_usuario, quantidade, preco, nome, descricao) VALUES 
        ('{$categ_prod}','{$id_usuario_prod}', '{$qtd_prod}', '{$valor_prod}', '{$nome_prod}','{$desc_prod}')";
    $res = $conn->query($sql) or die("Falha: " . $conn->error);
    $id_prod = $conn->insert_id;
    header("location: vender-step-4.php?id=$id_prod");

}
if (isset($_SESSION['nome']) && $_SESSION['nome'] != '') {
    ?>
    <!DOCTYPE html>
    <html lang="pt-br">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
        <link rel="shortcut icon" href="img/LOGO.png" type="image/x-icon">
        <link rel="stylesheet" href="css/vender-setp-3.css">
        <link rel="stylesheet" href="css/footer.css">
        <link rel="stylesheet" href="css/menu.css">

        <title>CONCICLE | Conscientize, Recicle & Receba</title>
    </head>

    <body>
        <div id="container">
            <nav>
                <ul class="a">
                    <li class="logotipo">
                        <a href="index.php"><img src="img/LOGO_PRINCIPAL_2.png" alt="logo" srcset=""></a>
                    </li>
                    <li class="usuario">
                        <ul>
                            <li class="li-pai">
                                <?php
                                if (isset($_SESSION['nome']) && $_SESSION['nome'] != '') {
                                    echo "<p class='cursor dropdown-arrow'>" . $_SESSION['nome'] . "</p>";
                                    ?>
                                    <ul class='sub-menus'>
                                        <li class="perfil">
                                            <a href="perfil.php">
                                                <?php
                                                $id_usuario = $_SESSION['id'];
                                                $sql = $conn->query("SELECT ID_img, nome_imagem, tamanho_imagem, tipo_imagem, caminho_imagem FROM imagens WHERE ID_user = '$id_usuario'")->fetch_assoc();
                                                echo "<img src='{$sql['caminho_imagem']}' alt=''>";
                                                ?>
                                                <div class="sub-text">
                                                    <p class="p-ola"> Olá </p>
                                                    <p class="p-name">
                                                        <?= $_SESSION['nome'] ?>
                                                    </p>
                                                </div>
                                            </a>
                                        </li>

                                        <li class="perfil-bloco"> <a href='perfil.php'> <img src="img/perfil.svg" alt=""
                                                    srcset="">
                                                Meu perfil </a>
                                            <a href='http://'> <img src="img/favorite.svg" alt="" srcset=""> Favoritos </a>
                                            <a href='http://'> <img src="img/history.svg" alt="" srcset=""> Histórico/Compras
                                            </a>
                                        </li>
                                        <li class="vender-bloco"><a href='http://'> <img src="img/sell.svg" alt="" srcset="">
                                                Vender</a></li>
                                        <li class="ajuda-bloco"><a href='http://'> <img src="img/question.svg" alt="" srcset="">
                                                Perguntas</a></li>
                                        <li class="sair-button"><a href='logout.php'> <img src="img/logout.svg" alt=""
                                                    srcset="">
                                                sair </a></li>
                                    </ul>

                                    <?php
                                } else {
                                    echo "<a href='login.php' class='cursor'> Login </a>";
                                }
                                ?>
                            </li>
                            <li class="sobre"><a href="Sobre.php">Sobre</a></li>
                        </ul>
                    </li>
                </ul>
            </nav>
            <div class="bg">
                <main class="main">
                    <form class="step-3" action="" method="POST" style="gap: 25px;">
                        <h1> Qual categoria seu produto é </h1>
                        <ul>
                            <button type="submit" name="categ_button_mad" value="1">
                                <li>
                                    <img src="img/wood-pile.svg" alt="">
                                    <p>MADEIRA</p>
                                </li>
                            </button>
                            <button type="submit" name="categ_button_plas" value="2">
                                <li>
                                    <img src="img/plastic.svg" alt="">
                                    <p>PLASTICO</p>
                                </li>
                            </button>
                            <button type="submit" name="categ_button_vidro" value="3">
                                <li>
                                    <img src="img/glass-filled.svg" alt="">
                                    <p>VIDRO</p>
                                </li>
                            </button>
                            <button type="submit" name="categ_button_met" value="4">
                                <li>
                                    <img src="img/empty-metal-bucket.svg" alt="">
                                    <p>METAL</p>
                                </li>
                            </button>
                            <button type="submit" name="categ_button_pvc" value="5">
                                <li>
                                    <img src="img/pipe.svg" alt="">
                                    <p>PVC</p>
                                </li>
                            </button>
                        </ul>
                    </form>
                </main>
            </div>


            <aside class="menu-lateral">
                <div class="title">
                    <img style="cursor: pointer;" src="img/hamburger.png" alt="" onclick="clickMenu()">
                    <p>Minha Conta</p>
                </div>
                <ul>
                    <a href="perfil.php">
                        <li class="disseletec-topic"><img src="img/user-gray.svg" alt="perfil-icon">
                            <p>Meu Perfil</p>
                        </li>
                    </a>
                    <a href="favoritos.php">
                        <li class="disseletec-topic"><img src="img/heart-gray.svg" alt="favoritos-icon">
                            <p>Favoritos</p>
                        </li>
                    </a>
                    <a href="">
                        <li class="disseletec-topic"><img src="img/bag-gray.svg" alt="historico-icon">
                            <p>Historico/Compras</p>
                        </li>
                    </a>
                    <a href="vender.php">
                        <li class="seletec-topic"><img src="img/tag-gray.svg" alt="vender-icon">
                            <p>Vender</p>
                        </li>
                    </a>
                </ul>
            </aside>
            <footer>
                <div class="rodape-superior">
                    <div class="ajuda">
                        <p class="title">AJUDA</p>
                        <ul>
                            <li><a href="">Compras</a></li>
                            <li><a href="">Venda</a></li>
                            <li><a href="">Ajuda com sua conta</a></li>
                        </ul>
                    </div>

                    <div class="institucional">
                        <p class="title">Suporte</p>
                        <ul>
                            <li><a href="">Saiba Mais</a></li>
                            <li><a href="">Conscientização</a></li>
                        </ul>
                    </div>

                    <div class="institucional">
                        <p class="title">Fale Conosco</p>
                        <ul>
                            <li><a href="">(14) 2054-6428</a></li>
                            <li><a href="">Concicle@nossocontato.com</a></li>
                        </ul>
                    </div>

                    <div class="metodos-pagamento">
                        <p class="title">Metodos de pagamento</p>
                        <ul>
                            <li><img src="img/pix.svg" alt="pix-icon"></li>
                            <li><img src="img/mercadopago-white.svg" alt="mercadopago-icon"></li>
                            <li><img src="img/mastercard.svg" alt="mastercard-icon"></li>
                            <li><img src="img/elo.svg" alt="elo-icon"></li>
                            <li><img src="img/visa-fill-white.svg" alt="visa-icon"></li>
                        </ul>
                    </div>

                    <div class="seguranca">
                        <p class="title">REDES SOCIAIS</p>
                        <ul>
                            <img src="img/instagram.png" alt="INSTA-icon">
                            <img src="img/youtube.png" alt="youtube-icon">
                            <img src="img/facebook.png" alt="facebook-icon">
                        </ul>
                    </div>


                </div>
                <hr>
                <div class="rodape-inferior">

                    <div class="local">
                        <ul>
                            <li><a href='#'>Brasil</a></li>
                            <li><a href='#'>Termos de Uso</a></li>
                            <li><a href='#'>Políticas de Privacidade</a></li>
                        </ul>
                    </div>

                </div>
            </footer>
        </div>
        <script src="js/js.js"></script>
    </body>

    </html>
    <?php
} else {
    header("location: login.php");
}
?>