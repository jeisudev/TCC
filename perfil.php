<?php
include_once("conexao/conexao.php");
if (isset($_SESSION['nome']) && $_SESSION['nome'] != '') {
    ;
    ?>

    <!DOCTYPE html>
    <html lang="pt-br">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
        <link rel="shortcut icon" href="img/LOGO.png" type="image/x-icon">
        <link rel="stylesheet" href="css/perfil.css">
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
                                        <li class="ajuda-bloco"><a href='http://'> <img src="img/question.svg" alt="" srcset="">
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
            <main>
                <ul>
                    <li class="perfil-area">
                        <div class="dados">
                            <?php
                            $id_usuario = $_SESSION['id'];
                            $sql = $conn->query("SELECT ID_img, nome_imagem, tamanho_imagem, tipo_imagem, caminho_imagem FROM imagens WHERE ID_user = '$id_usuario'")->fetch_assoc();
                            echo "<img src='{$sql['caminho_imagem']}' alt=''>";
                            ?>
                            <!-- <img src="img/profile-test.jpeg" alt=""> -->
                            <div>
                                <p style="font-size: 13pt; font-weight: bold; color: #202020;">
                                    <?= $_SESSION['nome'] . " " . $_SESSION['sobrenome']; ?>
                                </p>
                                <p style="color: #6B7741;">
                                    <?php
                                    if (isset($_SESSION['email']) && $_SESSION['email'] != '') {
                                        echo "Email: " . $_SESSION['email'];
                                    }
                                    ?>
                                </p>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="dados">
                            <img src="img/user-green.svg" alt="">
                            <div>
                                <p style="font-size: 13pt; font-weight: bold; color: #202020;">Dados da conta</p>
                                <p style="color: #777777;">Email, telefone, usuario...</p>
                            </div>
                        </div>
                        <img class="edit" src="img/arrow.svg" alt="">
                    </li>
                    <li>
                        <div class="dados">
                            <img src="img/card-green.svg" alt="">
                            <div>
                                <p style="font-size: 13pt; font-weight: bold; color: #202020;">Cartões</p>
                                <p style="color: #777777;">Cartões cadastrados na sua conta</p>
                            </div>
                        </div>
                        <img class="edit" src="img/arrow.svg" alt="">
                    </li>
                    <li>
                        <div class="dados">
                            <img src="img/address-marker-green.svg" alt="">
                            <div>
                                <p style="font-size: 13pt; font-weight: bold; color: #202020;">Endereço</p>
                                <p style="color: #777777;">Endereços salvos na sua conta</p>
                            </div>
                        </div>
                        <img class="edit" src="img/arrow.svg" alt="">
                    </li>
                    <li>
                        <div class="dados">
                            <img src="img/privacy-green.svg" alt="">
                            <div>
                                <p style="font-size: 13pt; font-weight: bold; color: #202020;">Termos de privacidade</p>
                                <p style="color: #777777;">Termos de privacidade, notificações...</p>
                            </div>
                        </div>
                        <img class="edit" src="img/arrow.svg" alt="">
                    </li>

                    <?php
                    if ($_SESSION['cargo'] == 1) {
                        ?>
                        <li>
                            <div class="dados">

                                <img src="img/privacy-green.svg" alt="">
                                <div>
                                    <p style="font-size: 13pt; font-weight: bold; color: #202020;">Torne-se um vendedor</p>
                                    <p style="color: #777777;"> Clique aqui para atualizar sua conta </p>
                                </div>
                            </div>

                            <form action="" method="post">
                                <button type="submit" name="btn-att" class="btn-att"> Atualizar </button>
                                <?php
                    }
                    if (isset($_POST['btn-att'])) {
                        $_SESSION['cargo'] = 2;
                        $update_user = "UPDATE usuario SET cargo = 2 WHERE ID_usuario = '$id_usuario'";
                        $sql_update = $conn->query($update_user);
                        $_SESSION['mensagem_att'] = "Conta atualizada com sucesso!";
                        echo "<script> alert(\"{$_SESSION['mensagem_att']}\")</script>";
                        echo "<script> window.location.href = 'index.php' </script>";
                    } else {
                        unset($_SESSION['mensagem_att']);
                    }
                    ?>
                        </form>

                    </li>


                </ul>
            </main>
            <aside class="menu-lateral">
                <div class="title">
                    <img style="cursor: pointer;" src="img/hamburger.png" alt="" onclick="clickMenu()">
                    <p id='display'>Minha Conta</p>
                </div>
                <ul>
                    <a href="">
                        <li class="seletec-topic"><img src="img/user-gray.svg" alt="perfil-icon">
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
    <?php
} else {
    header("location: login.php");
} ?>