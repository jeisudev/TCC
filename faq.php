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
        <link rel="stylesheet" href="css/faq.css">
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
                <h1>No Que Podemos Ajudá-Lo?</h1>
                <ul>
                    <h2>compras</h2>
                    <li>
                        <div class="dados">
                            <img src="img/lock.svg" alt="">
                            <div>
                                <p style="font-size: 13pt; font-weight: bold; color: #202020;">Administrar E Cancelar Compras</p>
                                <p style="color: #777777;">Email, telefone, usuario...</p>
                            </div>
                        </div>
                        <img class="edit" src="img/arrow.svg" alt="">
                    </li>
                    <li>
                        <div class="dados">
                            <img src="img/assignment-return-outline-sharp.svg" alt="">
                            <div>
                                <p style="font-size: 13pt; font-weight: bold; color: #202020;">Devoluções e reembolsos</p>
                                <p style="color: #777777;">Cartões cadastrados na sua conta</p>
                            </div>
                        </div>
                        <img class="edit" src="img/arrow.svg" alt="">
                    </li>
                    <li>
                        <div class="dados">
                            <img src="img/faq-green.svg" alt="">
                            <div>
                                <p style="font-size: 13pt; font-weight: bold; color: #202020;">Perguntas frequentes sobre compras</p>
                                <p style="color: #777777;">Endereços salvos na sua conta</p>
                            </div>
                        </div>
                        <img class="edit" src="img/arrow.svg" alt="">
                    </li>
                </ul>
                <ul>
                    <h2>vendas</h2>
                    <li>
                        <div class="dados">
                            <img src="img/sell-green.svg" alt="">
                            <div>
                                <p style="font-size: 13pt; font-weight: bold; color: #202020;">Reputação, vendas e envios</p>
                                <p style="color: #777777;">Email, telefone, usuario...</p>
                            </div>
                        </div>
                        <img class="edit" src="img/arrow.svg" alt="">
                    </li>
                    <li>
                        <div class="dados">
                            <img src="img/faq-green.svg" alt="">
                            <div>
                                <p style="font-size: 13pt; font-weight: bold; color: #202020;">Perguntas frequentes sobre vendas</p>
                                <p style="color: #777777;">Termos de privacidade, notificações...</p>
                            </div>
                        </div>
                        <img class="edit" src="img/arrow.svg" alt="">
                    </li>
                </ul>
                <ul>
                    <h2>Ajuda com sua conta </h2>
                    <li>
                        <div class="dados">
                            <div>
                                <p style="font-size: 13pt; font-weight: bold; color: #202020;">Configuração da minha conta</p>
                            </div>
                        </div>
                        <img class="edit" src="img/arrow.svg" alt="">
                    </li>
                    <li>
                        <div class="dados">
                            <div>
                                <p style="font-size: 13pt; font-weight: bold; color: #202020;">Segurança</p>
                            </div>
                        </div>
                        <img class="edit" src="img/arrow.svg" alt="">
                    </li>
                </ul>
                <ul>
                    <h2>Este tópico podem ser so seu interesse </h2>
                    <li>
                        <div class="dados">
                            <div>
                                <p style="font-size: 13pt; font-weight: bold; color: #202020;">Quero alterar meus dados pessoais</p>
                            </div>
                        </div>
                        <img class="edit" src="img/arrow.svg" alt="">
                    </li>                       
                </ul>
                <ul>
                    <h2>Você precisa de mais ajuda? </h2>
                    <li>
                        <div class="dados">
                            <div>
                                <p style="font-size: 13pt; font-weight: bold; color: #202020;">Fale conosco</p>
                            </div>
                        </div>
                        <img class="edit" src="img/arrow.svg" alt="">
                    </li>                       
                </ul>
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
    </body>

    </html>
    <?php
} else {
    header("location: login.php");
} ?>