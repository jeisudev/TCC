<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <link rel="shortcut icon" href="img/LOGO.png" type="image/x-icon">
    <link rel="stylesheet" href="css/favoritos.css">
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
                            include_once("conexao/conexao.php");
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

                                    <li class="perfil-bloco"> <a href='perfil.php'> <img src="img/perfil.svg" alt=""
                                                srcset=""> Meu perfil </a>
                                        <a href='favoritos.php'> <img src="img/favorite.svg" alt="" srcset=""> Favoritos
                                        </a>
                                        <a href=''> <img src="img/history.svg" alt="" srcset=""> Histórico/Compras
                                        </a>
                                    </li>
                                    <li class="vender-bloco"><a href='vender.php'> <img src="img/sell.svg" alt=""
                                                srcset="">
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
        </nav>
        <div class="conteudo">
            <main>
                <ul>
                    <li>
                        <div class="card">
                            <img src="img/user-gray.svg" alt="">
                            <div>
                                <p style="font-size: 13pt; font-weight: bold; color: #202020;">Produto Exemplos</p>
                                <p style="color: #00ff88;">R$60,00</p>
                                <p style="color: #202020;" ;>Descrição: <span></span> </p>
                            </div>
                            <img class="fav" src="img/heart-outline.svg" alt="">
                        </div>
                    </li>
                    <li>
                        <div class="card">
                            <img src="img/user-gray.svg" alt="">
                            <div>
                                <p style="font-size: 13pt; font-weight: bold; color: #202020;">Produto Exemplos</p>
                                <p style="color: #00ff88;">R$60,00</p>
                                <p style="color: #202020;" ;>Descrição: <span></span> </p>
                            </div>
                            <img class="fav" src="img/heart-outline.svg" alt="">
                        </div>
                    </li>
                    <li>
                        <div class="card">
                            <img src="img/user-gray.svg" alt="">
                            <div>
                                <p style="font-size: 13pt; font-weight: bold; color: #202020;">Produto Exemplos</p>
                                <p style="color: #00ff88;">R$60,00</p>
                                <p style="color: #202020;" ;>Descrição: <span></span> </p>
                            </div>
                            <img class="fav" src="img/heart-outline.svg" alt="">
                        </div>
                    </li>
                    <li>
                        <div class="card">
                            <img src="img/user-gray.svg" alt="">
                            <div>
                                <p style="font-size: 13pt; font-weight: bold; color: #202020;">Produto Exemplos</p>
                                <p style="color: #00ff88;">R$60,00</p>
                                <p style="color: #202020;" ;>Descrição: <span></span> </p>
                            </div>
                            <img class="fav" src="img/heart-outline.svg" alt="">
                        </div>
                    </li>
                    <li>
                        <div class="card">
                            <img src="img/user-gray.svg" alt="">
                            <div>
                                <p style="font-size: 13pt; font-weight: bold; color: #202020;">Produto Exemplos</p>
                                <p style="color: #00ff88;">R$60,00</p>
                                <p style="color: #202020;" ;>Descrição: <span></span> </p>
                            </div>
                            <img class="fav" src="img/heart-outline.svg" alt="">
                        </div>
                    </li>
                    <li>
                        <div class="card">
                            <img src="img/user-gray.svg" alt="">
                            <div>
                                <p style="font-size: 13pt; font-weight: bold; color: #202020;">Produto Exemplos</p>
                                <p style="color: #00ff88;">R$60,00</p>
                                <p style="color: #202020;" ;>Descrição: <span></span> </p>
                            </div>
                            <img class="fav" src="img/heart-outline.svg" alt="">
                        </div>
                    </li>
                    <li>
                        <div class="card">
                            <img src="img/user-gray.svg" alt="">
                            <div>
                                <p style="font-size: 13pt; font-weight: bold; color: #202020;">Produto Exemplos</p>
                                <p style="color: #00ff88;">R$60,00</p>
                                <p style="color: #202020;" ;>Descrição: <span></span> </p>
                            </div>
                            <img class="fav" src="img/heart-outline.svg" alt="">
                        </div>
                    </li>
                    <li>
                        <div class="card">
                            <img src="img/user-gray.svg" alt="">
                            <div>
                                <p style="font-size: 13pt; font-weight: bold; color: #202020;">Produto Exemplos</p>
                                <p style="color: #00ff88;">R$60,00</p>
                                <p style="color: #202020;" ;>Descrição: <span></span> </p>
                            </div>
                            <img class="fav" src="img/heart-outline.svg" alt="">
                        </div>
                    </li>
                    <li>
                        <div class="card">
                            <img src="img/user-gray.svg" alt="">
                            <div>
                                <p style="font-size: 13pt; font-weight: bold; color: #202020;">Produto Exemplos</p>
                                <p style="color: #00ff88;">R$60,00</p>
                                <p style="color: #202020;" ;>Descrição: <span></span> </p>
                            </div>
                            <img class="fav" src="img/heart-outline.svg" alt="">
                        </div>
                    </li>
                    <li>
                        <div class="card">
                            <img src="img/user-gray.svg" alt="">
                            <div>
                                <p style="font-size: 13pt; font-weight: bold; color: #202020;">Produto Exemplos</p>
                                <p style="color: #00ff88;">R$60,00</p>
                                <p style="color: #202020;" ;>Descrição: <span></span> </p>
                            </div>
                            <img class="fav" src="img/heart-outline.svg" alt="">
                        </div>
                    </li>
                </ul>
            </main>
        </div>

        <aside class="menu-lateral">
            <div class="title">
                <img style="cursor: pointer;" src="img/hamburger.png" alt="" onclick="clickMenu()">
                <p id='display'>Minha Conta</p>
            </div>
            <ul>
                <a href="perfil.php">
                    <li class="disseletec-topic"><img src="img/user-gray.svg" alt="perfil-icon">
                        <p>Meu Perfil</p>
                    </li>
                </a>
                <a href="favoritos.php">
                    <li class="seletec-topic"><img src="img/heart-gray.svg" alt="favoritos-icon">
                        <p>Favoritos</p>
                    </li>
                </a>
                <a href="">
                    <li class="disseletec-topic"><img src="img/bag-gray.svg" alt="historico-icon">
                        <p>Historico/Compras</p>
                    </li>
                </a>
                <?php
                if ($_SESSION['cargo'] == 2) {
                    ?>
                    <a href="vender.php">
                        <li class="disseletec-topic"><img src="img/tag-gray.svg" alt="vender-icon">
                            <p>Vender</p>
                        </li>
                    </a>
                    <?php
                }
                ?>
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