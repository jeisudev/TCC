<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <link rel="shortcut icon" href="img/LOGO.png" type="image/x-icon">
    <link rel="stylesheet" href="css/ecommerce.css">
    <link rel="stylesheet" href="css/cart.css">

    <title>CONCICLE | Conscientize, Recicle & Receba</title>
</head>
<?php
include('conexao/conexao.php');
$query = "SELECT * FROM produto";
$result = $conn->query($query);

$query_categ_1 = "SELECT * FROM produto WHERE ID_categ = '1'";
$result_categ_1 = $conn->query($query_categ_1);

$query_categ_2 = "SELECT * FROM produto WHERE ID_categ = '2'";
$result_categ_2 = $conn->query($query_categ_2);

$query_categ_3 = "SELECT * FROM produto WHERE ID_categ = '3'";
$result_categ_3 = $conn->query($query_categ_3);

$query_categ_4 = "SELECT * FROM produto WHERE ID_categ = '4'";
$result_categ_4 = $conn->query($query_categ_4);

$query_categ_5 = "SELECT * FROM produto WHERE ID_categ = '5'";
$result_categ_5 = $conn->query($query_categ_5);

if (isset($_GET['pesquisa'])) {
    $pesquisa = $_GET['pesquisa'];
    header("location: filtro.php?pesquisa=$pesquisa");
}
?>

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
                                                $sql = $conn->query("SELECT * FROM imagens WHERE ID_user = '$id_usuario'")->fetch_assoc();
                                                echo"<img src='{$sql['caminho_imagem']}' alt=''>";  
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
                                                srcset=""> Meu perfil </a>
                                        <a href='favoritos.php'> <img src="img/favorite.svg" alt="" srcset=""> Favoritos </a>
                                        <a href='#'> <img src="img/history.svg" alt="" srcset=""> Histórico/Compras
                                        </a>
                                    </li>
                                    <li class="vender-bloco"><a href='vender.php'> <img src="img/sell.svg" alt="" srcset="">
                                            Vender</a></li>
                                    <li class="ajuda-bloco"><a href='faq.php'> <img src="img/question.svg" alt="" srcset="">
                                            Perguntas</a></li>
                                    <li class="sair-button"><a href='logout.php'> <img src="img/logout-gray.svg" alt=""
                                                srcset=""> sair </a></li>
                                </ul>

                                <?php
                            } else {
                                echo "<a href='login.php' class='cursor'>Entrar/Cadastrar</a>";
                            }
                            ?>
                        </li>
                        <li class="sobre"><a href="Sobre.php">Sobre</a></li>
                    </ul>
                </li>
            </ul>
            <ul class="usos">
                <li class="li-pai">
                    <span class="" style="cursor:pointer;"> Categorias </span>
                    <ul class='sub-menus'>
                        <li class="produtos"> <a href='http://'> Madeira </a>
                            <a href='http://'> Plástico/PET </a>
                            <a href='http://'> Metal </a>
                            <a href='http://'> Vidro </a>
                            <a href='http://'> PVC </a>
                        </li>
                        <!-- Verificar se vamos puxar as categorias do banco ou não; -->
                    </ul>
                </li>
                <li class="li-pai">
                    <a href="#">Ofertas</a>
                </li>
                <li class="search-bar li-pai">
                    <form action="" method="get">
                        <input type="search" name="pesquisa" name='pesquisa' id="pesquisa" placeholder="Pesquisar">
                    </form>
                </li>
                <li class="li-pai">
                    <a href="#" onclick="showCart()">
                        <img src="img/shopping-cart.svg" alt="carrinho">
                    </a>
                </li>
            </ul>
        </nav>
        
        <div class="carrossel">
            <div class="slides">
                <!--Radio Buttons-->
                <input type="radio" name="radio-btn" id="radio1">
                <input type="radio" name="radio-btn" id="radio2">
                <input type="radio" name="radio-btn" id="radio3">
                <input type="radio" name="radio-btn" id="radio4">

                <!--Imagens do carrossel-->
                <div class="slide first">
                    <img src="img/im3.jpeg" alt="">
                </div>
                <div class="slide">
                    <img src="img/im1.jpeg" alt="">
                </div>
                <div class="slide">
                    <img src="img/im2.jpeg" alt="">
                </div>
                <div class="slide">
                    <img src="img/im4.jpeg" alt="">
                </div>

                <!--navegação-->
                <div class="navigation-auto">
                    <div class="auto-btn1"></div>
                    <div class="auto-btn2"></div>
                    <div class="auto-btn3"></div>
                    <div class="auto-btn4"></div>
                </div>
            </div>

            <div class="navegacao-manual">
                <label class="manual-btn" for="radio1"></label>

                <label class="manual-btn" for="radio2"></label>

                <label class="manual-btn" for="radio3"></label>

                <label class="manual-btn" for="radio4"></label>
            </div>
        </div>
        <main id="conteudo">
            <main class="produtos">
                <section class="line">
                    <h2>
                        Novos Produtos
                    </h2>
                    <section class="card-line">
                        <form action="" method="get">
                            <ul>
                                <?php
                                if ($result) {
                                    while ($x = mysqli_fetch_assoc($result)) {
                                        $id = $x["ID_prod"];
                                        $nome = $x["nome"];
                                        $valor = $x["preco"];
                                        $img=$conn->query("SELECT * from imagens_prod WHERE ID_prod = $id")->fetch_assoc();
                                        ?>
                                        <li>
                                            <a href="produto-venda.php?id=<?=$id?>">
                                                <input type="hidden" name="" id='img-1' value="<?=$img['caminho_imagem']?>">
                                                <div class="card">
                                                    <div class="card-img-main">
                                                        <img src="<?=$img['caminho_imagem']?>" alt="">
                                                    </div>
                                                    <!-- <div class="card-favorite-icon">
                                                        <form action="" method="post">
                                                            <button style='position: absolute' type="submit" name="<?= $x["nome"].$x["ID_prod"]?>">
                                                                carrinho
                                                            </button>
                                                        </form>
                                                        
                                                    </div> -->
                                                    <h2 class="card-title">
                                                        <?= $nome; ?>
                                                    </h2>
                                                    <div class="price">
                                                        <p class="card-price"><b>R$
                                                                <?= $valor ?>
                                                        </p></b>
                                                        <p class="card-price-parcelas">10x de
                                                            <?= number_format($valor / 10, 2, ",") ?>
                                                        </p>
                                                        <p class="card-price-parcelas"><b>Frete Gratis!</b></p>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                        <?php
                                    }
                                }
                                ?>
                            </ul>
                        </form>
                    </section>
                </section>
                <section class="line">
                    <h2>
                        Madeira
                    </h2>
                    <section class="card-line">
                        <form action="" method="get">
                            <ul>
                                <?php
                                if ($result) {
                                    while ($x = mysqli_fetch_assoc($result_categ_1)) {
                                        $id = $x["ID_prod"];
                                        $nome = $x["nome"];
                                        $valor = $x["preco"];
                                        $img=$conn->query("SELECT * from imagens_prod WHERE ID_prod = $id")->fetch_assoc();
                                        
                                        ?>
                                        <li>
                                            <a href="produto-venda.php?id=<?=$id?>">
                                                <div class="card">
                                                    <div class="card-img-main">
                                                        <img src="<?=$img['caminho_imagem']?>" alt="">
                                                    </div>
                                                    <!-- <div class="card-favorite-icon">
                                                        <form action="" method="post">
                                                            <button style='position: absolute' type="submit" name="<?= $x["nome"].$x["ID_prod"]?>">
                                                                carrinho
                                                            </button>
                                                        </form>
                                                        
                                                    </div> -->
                                                    <h2 class="card-title">
                                                        <?= $nome; ?>
                                                    </h2>
                                                    <div class="price">
                                                        <p class="card-price"><b>R$
                                                                <?= $valor ?>
                                                        </p></b>
                                                        <p class="card-price-parcelas">10x de
                                                            <?= number_format($valor / 10, 2, ",") ?>
                                                        </p>
                                                        <p class="card-price-parcelas"><b>Frete Gratis!</b></p>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                        <?php
                                    }
                                }
                                ?>
                            </ul>
                        </form>
                    </section>
                </section>
                <section class="line">
                    <h2>
                        Metal
                    </h2>
                    <section class="card-line">
                        <form action="" method="get">
                            <ul>
                                <?php
                                if ($result) {
                                    while ($x = mysqli_fetch_assoc($result_categ_4)) {
                                        $id = $x["ID_prod"];
                                        $nome = $x["nome"];
                                        $valor = $x["preco"];
                                        $img=$conn->query("SELECT * from imagens_prod WHERE ID_prod = $id")->fetch_assoc();
                                        
                                        ?>
                                        <li>
                                            <a href="produto-venda.php?id=<?=$id?>">
                                                <div class="card">
                                                    <div class="card-img-main">
                                                        <img src="<?=$img['caminho_imagem']?>" alt="">
                                                    </div>
                                                    <!-- <div class="card-favorite-icon">
                                                        <form action="" method="post">
                                                            <button style='position: absolute' type="submit" name="<?= $x["nome"].$x["ID_prod"]?>">
                                                                carrinho
                                                            </button>
                                                        </form>
                                                        
                                                    </div> -->
                                                    <h2 class="card-title">
                                                        <?= $nome; ?>
                                                    </h2>
                                                    <div class="price">
                                                        <p class="card-price"><b>R$
                                                                <?= $valor ?>
                                                        </p></b>
                                                        <p class="card-price-parcelas">10x de
                                                            <?= number_format($valor / 10, 2, ",") ?>
                                                        </p>
                                                        <p class="card-price-parcelas"><b>Frete Gratis!</b></p>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                        <?php
                                    }
                                }
                                ?>
                            </ul>
                        </form>
                    </section>
                </section>
            </main>
        </main>
        <main>
            <!-- <div class="cart-container">
                <article class="cart hide">
                    <div class="cart-hide-btn">
                        <svg xmlns="http://www.w3.org/2000/svg" class="cart-svg-icon" viewBox="0 0 512 512"
                            width="20px">
                            <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="48" d="M184 112l144 144-144 144" />
                        </svg>
                    </div>

                    <div class="cart-content">
                        <h1>ITENS NO MEU CARRINHO (1)</h1>

                        <div class="cart-box flex-col" id="cart-data-placeholder"></div>

                        <div class="cart-box cart-resume">
                            <div class="cart-resume-title">Resumo do pedido</div>
                            <div class="cart-resume-subtotal">
                                Subtotal <span id="total-price">R$56,00</span>
                            </div>
                            <div class="cart-resume-subtotal cart-resume-discount">
                                <span class="older-price" id="total-price-striked">R$56,00</span>
                                <span id="discount-price">R$50,40</span>
                            </div>

                            <div class="cart-resume-pix">
                                <p class="cart-tips">
                                    Valor com <span>10% de desconto</span> no boleto ou PIX.
                                </p>
                            </div>
                        </div>

                        <div class="flex-container">
                            <img src="/img/cart/icon-carrinho.png" alt="Cart Icon" />
                            <p class="cart-tips">NOSSOS ENVIOS ESTÃO OCORRENDO NORMALMENTE</p>
                        </div>
                        <button class="btn-buy">IR PARA O CARRINHO</button>
                        <button class="btn-view-more">Escolher mais produtos</button>
                    </div>
                </article>
            </div> -->
        </main>
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
    <script src="js/cart.js"></script>
    <script src="js/carrossel.js"></script>
</body>

</html>