<?php
include_once("conexao/conexao.php");
$pesquisa = $_GET['pesquisa'];
$produtos = $conn->query("SELECT * FROM produto WHERE nome LIKE '%$pesquisa%'");
// $produtos_slq = $produtos->fetch_assoc();
// echo $produtos_slq['quantidade'];
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <link rel="shortcut icon" href="img/LOGO.png" type="image/x-icon">
    <link rel="stylesheet" href="css/pesquisa.css">
    <!-- <link rel="stylesheet" href="css/cart.css"> -->

    <title>CONCICLE | Conscientize, Recicle & Receba</title>
</head>

<body>
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

                                <li class="perfil-bloco"> <a href='perfil.php'> <img src="img/perfil.svg" alt="" srcset="">
                                        Meu perfil </a>
                                    <a href='favoritos.php'> <img src="img/favorite.svg" alt="" srcset=""> Favoritos </a>
                                    <a href='#'> <img src="img/history.svg" alt="" srcset=""> Histórico/Compras
                                    </a>
                                </li>
                                <li class="vender-bloco"><a href='vender.php'> <img src="img/sell.svg" alt="" srcset="">
                                        Vender</a></li>
                                <li class="ajuda-bloco"><a href='#'> <img src="img/question.svg" alt="" srcset="">
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

    <main class="produtos">
        <section class="line">
            <h2>
                Novos Produtos
            </h2>
            <section class="card-line">
                <form action="" method="get">
                    <ul>
                        <?php
                        if ($produtos) {
                            while ($x = mysqli_fetch_assoc($produtos)) {
                                $id = $x["ID_prod"];
                                $nome = $x["nome"];
                                $valor = $x["preco"];
                                $img = $conn->query("SELECT * from imagens_prod WHERE ID_prod = $id")->fetch_assoc();
                                ?>
                                <li>
                                    <a href="produto-venda.php?id=<?= $id ?>">
                                        <div class="card">
                                            <div class="card-img-main">
                                                <img src="<?= $img['caminho_imagem'] ?>" alt="">
                                            </div>
                                            <!-- <div class="card-favorite-icon">
                                                        <form action="" method="post">
                                                            <button style='position: absolute' type="submit" name="<?= $x["nome"] . $x["ID_prod"] ?>">
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
</body>

</html>