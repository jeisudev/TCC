<?php
include_once("conexao/conexao.php");
$id = $_GET["id"];
$query = "SELECT * FROM produto WHERE ID_prod = $id";
$result = $conn->query($query)->fetch_assoc();
// $x = $result->fetch_assoc();
$img = $conn->query("SELECT * from imagens_prod WHERE ID_prod = $id");
$img2 = $conn->query("SELECT * from imagens_prod WHERE ID_prod = $id")->fetch_assoc();
// $img_prod = $img['caminho_imagem'];
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <link rel="shortcut icon" href="img/LOGO.png" type="image/x-icon">
    <link rel="stylesheet" href="css/produto-venda.css">
    <link rel="stylesheet" href="css/footer.css">
    <!-- <link rel="stylesheet" href="css/ecommerce.css"> -->

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
                <input type="text" name="pesquisa" id="pesquisa" placeholder="Pesquisar">
            </li>
            <li class="li-pai">
                <a href="#" onclick="showCart()">
                    <img src="img/shopping-cart.svg" alt="carrinho">
                </a>
            </li>
        </ul>
    </nav>

    <main>
        <section id="container">
            <main class="conteudo_principal">
                <section style="height: 350px" id="minhaImagem">

                </section>
                <ul class="imgs_opcoes">
                    <?php
                    $i = 1;
                    while ($x = $img->fetch_assoc() and $i <= 4) {
                        ?>
                        <li class='itens-<?= $i ?>' onclick='myFunction<?= $i ?>()'>
                            <img src="<?= $x['caminho_imagem'] ?>" alt="<?= $x['caminho_imagem'] ?>">
                            <input type="hidden" value='<?= $x['caminho_imagem'] ?>' id="img-<?= $i ?>">
                        </li>
                        <?php
                        $i++;
                    }
                    ?>
                </ul>
                <section class="comprar">
                    <button type="submit" name='add_carrinho'>
                        Adicionar ao Carrinho
                    </button>
                </section>
            </main>
            <aside class="descrição-comentarios">
                <header>
                    <h1>
                        <?= $result['nome'] ?>
                    </h1>
                    <p>
                       R$ <?= $result['preco'] ?>
                    </p>
                </header>
                <section>
                    <h2>descrição</h2>
                    <p><?= $result['descricao'] ?></p>
                </section>
                <section clas="comentarios">
                    
                </section>
                <section class="textarea">
                    <h2>comente sobre o produto</h2>
                    <textarea required name="comentario_prod"cols="30" rows="5" class="cometario"></textarea>
                    <button type="submit" name='add_comentario'>Adicionar ao Carrinho</button>
                </section>
            </aside>
        </section>
    </main>
    <script src="js/img.js"></script>
</body>

</html>