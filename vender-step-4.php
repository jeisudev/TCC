<?php



include('conexao/conexao.php');
$id_prod = $_GET["id"];
//Tabela no BD
$tabela = "imagens_prod";
//define o diretorio para envio de arquivos
$diretorio = "uploads-prod/";

// define a zona de tempo a ser utilizada.
date_default_timezone_set('America/Sao_Paulo');

if (isset($_POST['enviar'])) {
    $loop = false;
    $i = 0;
    //traz as variáveis do formulário
    $upload = 1;

    $sql = "SELECT * from produto WHERE ID_prod ='$id_prod'";
    $sql_prod = $conn->query($sql)->fetch_assoc();
    $id_prod = $sql_prod['ID_prod'];

    while ($i < count($_FILES['arquivo']['name'])) {

        $titulo = $sql_prod['nome'];

        //echo "<pre>";
        //var_dump($_FILES);
        //echo "</pre>";

        //recupera a extensao do arquivo
        $extensao = strtolower(substr($_FILES['arquivo']["name"][$i], -4));
        $tamanho = $_FILES['arquivo']["size"][$i];

        //define o nome do arquivo
        $novo_nome = $titulo . $i . $extensao;

        $verificar = "uploads-prod/" . $novo_nome;

        $arquivo = $diretorio . $novo_nome;


        // Formatos de imagem permitidos
        //$allowedFormats = array(".jpg", ".jpeg", ".png", ".webp");
        switch ($extensao) {
            case '.jpg':
                $upload = 1;
                break;
            case 'jpeg':
                $upload = 1;
                break;
            case '.png':
                $upload = 1;
                break;
            case 'webp':
                $upload = 1;
                break;
            default:
                $upload = 0;
                break;
        }

        //Script para inserir o caminho do arquivo ao BD
        $sql = "INSERT INTO $tabela (ID_prod, nome_imagem, tamanho_imagem, tipo_imagem, caminho_imagem)
         VALUES ('{$id_prod}','{$titulo}','{$tamanho}','{$extensao}','{$arquivo}')";

        //concluindo operação
        // Verificar se o arquivo já existe
        if (file_exists($verificar)) {
            $loop = false;
            $Aviso = " Esse arquivo já existe no servidor ";
            break;
        } elseif ($upload == 1) {

            //efetua o upload para repositório de imagens
            move_uploaded_file($_FILES['arquivo']["tmp_name"][$i], $arquivo);
            // executando instrução SQL
            $instrucao = mysqli_query($conn, $sql);

            if (!$instrucao) {
                die(' Query Inválida: ' . mysqli_error($conn));
                echo 'Falha ao enviar arquivo!';
            } else {
                //vai verficar se o loop foi concluido, quando acabar o loop será impresso as linhas 92 a 97
                $loop = true;
            }
            //se o upload for 0, por N motivos, ele irá imprimir da linha 85 a 87
        } elseif ($upload == 0) {
            $loop = false;
            $AvisoEX = " Esse tipo de arquivo não é permitido <br>";
            $AvisoEXT = " Verifique se os arquivos que deseja enviar são: <br> PNG, JPG, JPEG OU WEBP. ";
            break;
        }
        
        $i++;
    }
    if ($loop == true) {
        header("location: index.php");
        // echo "<br> <a href='./'>Voltar para Local</a>";
        // echo "<br> <a href='./cadastraIMG.php'>Colocar mais uma IMG</a>";
        // echo "<br> <a href='./recupera.php'>Ver Imagem</a>";
        exit;
    }
}
?>

<!DOCTYPE html>

<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <link rel="shortcut icon" href="img/LOGO.png" type="image/x-icon">
    <link rel="stylesheet" href="css/cadastro.css">
    <link rel="stylesheet" href="css/menu.css">
    <link rel="stylesheet" href="css/vender-setp-3.css">
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

                                <li class="perfil-bloco"> <a href='perfil.php'> <img src="img/perfil.svg" alt="" srcset="">
                                        Meu perfil </a>
                                    <a href='#'> <img src="img/favorite.svg" alt="" srcset=""> Favoritos </a>
                                    <a href='#'> <img src="img/history.svg" alt="" srcset=""> Histórico/Compras
                                    </a>
                                </li>
                                <li class="vender-bloco"><a href='vender.php'> <img src="img/sell.svg" alt=""
                                            srcset="">
                                        Vender</a></li>
                                <li class="ajuda-bloco"><a href='#'> <img src="img/question.svg" alt="" srcset="">
                                        Perguntas</a></li>
                                <li class="sair-button"><a href='logout.php'> <img src="img/logout.svg" alt="" srcset="">
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
    <div id="container">
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
        <main class="bg-imagem">
            <section class="cadastra-imagem">
                <!-- <header class="header-login">
                    <h1> Conscientize, Recicle & Receba </h1>
                    <h2> Faça parte dessa equipe e mude o mundo! </h2>
                </header> -->
                <main class="main-cadastro">
                    <form action="" method="POST" enctype="multipart/form-data">
                        <h1>Coloque uma imagem para o produto!</h1>
                        <ul>
                            <li>
                                <div class="textfield">
                                    <!-- <label>Título: </label><br />
                                    <input type="text" name="titulo" /><br />
                                    <br> -->
                                    <label for="imagens" style="cursor: pointer;">
                                        Selecione o arquivo:
                                    </label>
                                    <input type="file" id="imagens" name="arquivo[]" multiple size="100"
                                        accept="image/*" required />
                                    <br />
                                    <?php
                                    if (isset($Aviso)) {
                                        echo $Aviso;

                                    }
                                    if (isset($AvisoEX)) {
                                        echo $AvisoEX;
                                        echo $AvisoEXT;
                                    }
                                    ?>
                                    <input type="submit" value="Enviar" class="imagens" name="enviar"><br>
                                    <input type="reset" value="Apagar" class="imagens">
                                </div>
                            </li>
                        </ul>


                    </form>
                </main>
                <ul class='opcoes'>
                    <li>1</li>
                    <li>2</li>
                    <li>3</li>
                    <li>4</li>
                    <li>5</li>
                    <li>6</li>
                    <li class="select">7</li>
                </ul>
            </section>
        </main>
    </div>
</body>
<script src="js/js.js"> </script>
<script src="js/cpf.js"> </script>

</html>