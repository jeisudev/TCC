<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/menu.css">
    <link rel="shortcut icon" href="img/LOGO.png" type="image/x-icon">
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
                                        <a href=''> <img src="img/history.svg" alt="" srcset=""> Histórico/Compras
                                        </a>
                                    </li>
                                    <li class="vender-bloco"><a href='vender.php'> <img src="img/sell.svg" alt="" srcset="">
                                            Vender</a></li>
                                    <li class="ajuda-bloco"><a href='http://'> <img src="img/question.svg" alt="" srcset="">
                                            Perguntas</a></li>
                                    <li class="sair-button"><a href='logout.php'> <img src="img/logout-gray.svg" alt=""
                                                srcset=""> sair </a></li>
                                </ul>

                                <?php
                            } else {
                                echo "<a href='login.php' class='cursor'> Entrar/Cadastrar </a>";
                            }
                            ?>
                        </li>
                        <li class="sobre"><a href="Sobre.php">Sobre</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div class="bg">
            <div class="button">
                <a href="#information"><button class="iniciar">Saiba Mais</button></a>
            </div>
        </div>
        <section class="conteudo">
            <section id="information">

                <p class="title">Lixeiras e seus usos</p>

                <section class="sec1">
                    <img src="img/red-bin.png" alt="" srcset="">
                    <div class="text">
                        <p class="title">Lixeira para descarte de plástico</p> <br>
                        <p>O que descartar: Copos, Sacolas, Frascos, Potes, Tampinhas, Tubos de PVC, Embalagens PET
                            (Refrigerantes, sucos, água, etc).<br> <br>

                            O que não descartar: Cabos de panelas, Adesivos, Espuma, Acrílico, Embalagens metalizadas
                            (Biscoitos e Salgadinhos).</p>
                    </div>
                </section>
                <section class="sec2">
                    <img src="img/blue-bin.png" alt="" srcset="">
                    <div class="text">
                        <p class="title">Lixeira para descarte de papel e papelão</p> <br>
                        <p>O que descartar: Jornais, revistas, sulfite, rascunhos, folhas de caderno, formulários,
                            caixas de papelão, aparas de papel, envelopes, cartazes, panfletos etc. <br> <br>
                            O que não descartar: Adesivos, papel carbono, Celofane, Guardanapos, bitucas de cigarro,
                            papéis plastificados, metalizados, papéis sanitários, etc. </p>
                    </div>
                </section>
                <section class="sec1">
                    <img src="img/yellow-bin.png" alt="" srcset="">
                    <div class="text">
                        <p class="title">Lixeira para descarte de metal</p> <br>
                        <p>O que descartar: Tampinhas de garrafas, lacres de latinhas, latas, ferragens, arames, chapas,
                            canos, pregos, parafusos, porcas, ferramentas, etc. <br> <br>

                            O que não descartar: Clipes, grampos, esponjas de aço, aerossóis, latas de tinta ou verniz,
                            solventes ou químicos, latas de inseticida, etc.</p>
                    </div>
                </section>
                <section class="sec2">
                    <img src="img/green-bin.png" alt="" srcset="">
                    <div class="text">
                        <p class="title">Lixeira para descarte de vidros</p><br>
                        <p> O que descartar: Garrafas, potes de conserva, Embalagens, Frascos, Vazios de remédios,
                            Copos, Cacos dos resíduos citados, etc. <br> <br>

                            O que não descartar: Espelhos, Óculos, Boxes temperados, Pirex, Cerâmicas, Porcelanas, Tubos
                            de TV, Tampas de forno, etc.</p>
                    </div>
                </section>
                <section class="sec1">
                    <img src="img/organica.png" alt="" srcset="">
                    <div class="text">
                        <p class="title">Lixeira para descarte de orgânicos</p><br>
                        <p> O que descartar: Cascas e restos de frutas, Legumes e Verduras, Saquinhos de chá, Restos de
                            pães, Biscoitos, Pó e coador de café, Esterco de animais herbívoros (Galinhas, Gado,
                            Cavalos). <br> <br>

                            O que não descartar: Produtos Químicos, Remédios, Poeira, Papéis higiênicos, Guardanapos
                            sujos, Gorduras, Óleos, Graxa, Leite e derivados, Ossos, restos de carne, etc.</p>
                    </div>
                </section>
                <section class="sec2">
                    <img src="img/naoreciclavel.png" alt="" srcset="">
                    <div class="text">
                        <p class="title">Lixeira para descarte de não recicláveis</p><br>
                        <p> O que descartar: Papéis higiênicos, Guardanapos sujos, Papéis metalizados ou parafinados,
                            Adesivos, Papel carbono, Fraldas, Absorventes, Fotografias, Espelhos, Esponjas de aço, itens
                            de cerâmica, isopor, EVA, Vidro temperado, Vidros de carro, Cortiça, Ampolas de remédio,
                            Lentes de óculos, etc.
                            <br> <br>
                            O que não descartar: Resíduos que podem ser reciclados conforme orientação de descarte desse
                            artigo.
                        </p>
                    </div>
                </section>
                <section class="sec1">
                    <img src="img/perigosos.png" alt="" srcset="">
                    <div class="text">
                        <p class="title">Lixeira para descarte de resíduos perigosos</p> <br>
                        <p> O que descartar: Pilhas e Baterias, Pneus, Óleos Lubrificantes, Produtos Eletrônicos,
                            Lâmpadas Fluorescentes, de vapor, de Sódio / Mercúrio ou de luz mista, Tintas, Produtos
                            Químicos, etc.
                            <br><br>
                            Todos os resíduos perigosos necessitam de tratamento e destinação final especiais.
                            <br><br>
                            O que não descartar: Outros tipos de resíduos.
                        </p>
                    </div>
                </section>
                <section class="sec2">
                    <img src="img/MADEIRA.png" alt="" srcset="">
                    <div class="text">
                        <p class="title">Lixeira para descarte de madeiras</p> <br>
                        <p> O que descartar: Galhos de árvores, Caixas, Restos de Construção, Móveis, Artefatos e
                            objetos, Palitos de dente ou sorvete, Resíduos Industriais, etc.
                            <br> <br>
                            Ao descartar madeira, retirar todos os pregos, parafusos ou metais cortantes.
                            <br> <br>
                            O que não descartar: Outros tipos de resíduos.
                        </p>
                    </div>
                </section>
                <section class="sec1">
                    <img src="img/HOSPITALAR.png" alt="" srcset="">
                    <div class="text">
                        <p class="title">Lixeira para descarte de resíduos hospitalares</p> <br>
                        <p> O que descartar: Resíduos infectantes, Resíduos químicos, Gessos, Luvas, Gazes, Materiais
                            Perfurocortantes como Lâminas, Bisturis, Agulhas, Ampolas etc.
                            <br><br>
                            Todos os resíduos hospitalares necessitam de tratamento e destinação final especiais.
                            <br><br>
                            O que não descartar: Outros tipos de resíduos não hospitalares.
                        </p>
                    </div>
                </section>
                <section class="sec2">
                    <img src="img/radiativos.png" alt="" srcset="">
                    <div class="text">
                        <p class="title">Lixeira para descarte de resíduos radioativos</p> <br>
                        <p> O que descartar: Materiais Radioativos, ou Contaminados, Seringas, Frascos, Papéis
                            Absorventes, Solventes Aquosos, Solventes Orgânicos etc.
                            <br> <br>
                            Resíduos Radioativos são altamente tóxicos e não podem ser reutilizados. Sua segregação deve
                            ser realizada de acordo com as normas do CNEN.
                            <br> <br>
                            O que não descartar: Outros tipos de resíduos não radioativos.
                        </p>
                    </div>
                </section>
            </section>
        </section>
        
    </div>
</body>
<script src="js/js.js"></script>

</html>