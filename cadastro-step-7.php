<?php



include('conexao/conexao.php');
$id_usuario = $_GET["id"];
//Tabela no BD
$tabela = "imagens";
//define o diretorio para envio de arquivos
$diretorio = "uploads/";

// define a zona de tempo a ser utilizada.
date_default_timezone_set('America/Sao_Paulo');

if (isset($_POST['enviar'])) {
    $loop = false;
    $i = 0;
    //traz as variáveis do formulário
    $upload = 1;

    $sql = "SELECT * from usuario WHERE ID_usuario ='$id_usuario'";
    $sql_user = $conn->query($sql)->fetch_assoc();
    $id_usuario = $sql_user['ID_usuario'];

    while ($i < count($_FILES['arquivo']['name'])) {

        $titulo = $sql_user['nome'].$sql_user['ID_usuario'];

        //echo "<pre>";
        //var_dump($_FILES);
        //echo "</pre>";

        //recupera a extensao do arquivo
        $extensao = strtolower(substr($_FILES['arquivo']["name"][$i], -4));
        $tamanho = $_FILES['arquivo']["size"][$i];

        //define o nome do arquivo
        $novo_nome = $titulo . $i . $extensao;

        $verificar = "uploads/" . $novo_nome;

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
        $sql = "INSERT INTO $tabela (ID_user, nome_imagem, tamanho_imagem, tipo_imagem, caminho_imagem) VALUES ('{$id_usuario}','{$titulo}','{$tamanho}','{$extensao}','{$arquivo}')";

        //concluindo operação
        // Verificar se o arquivo já existe
        if (file_exists($verificar)) {
            echo 'Essa imagem já existe no servidor';
            echo "<br> <a href='./cadastraIMG.php'>Voltar para cadastro de imagens</a>";
            exit;
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
            echo "Esse tipo de arquivo não é permitido. <br>";
            echo "Verifique se os arquivos que deseja enviar são: PNG, JPG, JPEG OU WEBP. <br>";
            echo "<a href='./cadastraIMG.php'>Voltar para cadastro de imagens</a>";
            exit;
        }
        $i++;
    }
    if ($loop == true) {
        header("location: login.php");
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
    <title>CONCICLE | Cadastro</title>
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
                        <li>
                            <a href='login.php' class='cursor'>Login</a>
                        </li>
                        <li class="sobre"><a href="Sobre.php">Sobre</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <main class="bg">
            <section class="login">
                <!-- <header class="header-login">
                    <h1> Conscientize, Recicle & Receba </h1>
                    <h2> Faça parte dessa equipe e mude o mundo! </h2>
                </header> -->
                <main class="main-cadastro">
                    <form action="" method="POST" enctype="multipart/form-data">
                        <h1>Coloque uma imagem de perfil!</h1>
                        <ul>
                            <li>
                                <div class="textfield">
                                    <!-- <label>Título: </label><br />
                                    <input type="text" name="titulo" /><br />
                                    <br> -->
                                    <label for="imagens" style="cursor: pointer;">
                                        Selecione o arquivo:
                                    </label>
                                    <input type="file" id="imagens" name="arquivo[]" multiple size="100" accept="image/*" required />
                                    <br />
                                    <input type="submit" value="Enviar" class="imagens" name="enviar"><br>
                                    <input type="reset" value="Apagar" class="imagens">
                                </div>
                            </li>
                        </ul>


                    </form>
                </main>
                <ul class='opcoes'>
                    <li class="disselect"></li>
                    <li class="disselect"></li>
                    <li class="select"></li>
                </ul>
            </section>
        </main>
    </div>
</body>
<script src="js/js.js"> </script>
<script src="js/cpf.js"> </script>

</html>