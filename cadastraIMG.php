<?php


//Conectando ao banco
include_once('conexao/conexao.php');
//Tabela no BD
$tabela = "imagens";
//define campos do insert
$campos = "nome_imagem,tamanho_imagem,tipo_imagem,caminho_imagem";
//define o diretorio para envio de arquivos
$diretorio = "uploads/";

// define a zona de tempo a ser utilizada.
date_default_timezone_set('America/Sao_Paulo');

if (isset($_POST['enviar'])) {
    $loop = false;
    $i = 0;
    //traz as variáveis do formulário
    $upload = 1;
    while ($i < count($_FILES['arquivo']['name'])) {

        $titulo = $_POST['titulo'];

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
        $sql = "INSERT INTO $tabela ($campos) 
                VALUES ('$titulo','$tamanho','$extensao','$arquivo')";

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
                echo "Falha ao enviar arquivo!";
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
        echo 'Arquivos enviado com sucesso!';
        echo "<br> <a href='./'>Voltar para Local</a>";
        echo "<br> <a href='./cadastraIMG.php'>Colocar mais uma IMG</a>";
        echo "<br> <a href='./recupera.php'>Ver Imagem</a>";
        exit;
    }
}

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <title>Manipulando arquivos</title>
    <meta charset="utf-8" />
</head>

<body>
    <form action="" method="POST" enctype="multipart/form-data">
        <label>Título: </label><br />
        <input type="text" name="titulo" /><br />
        <br>
        <label>Selecione o arquivo: <br />
            <input type="file" name="arquivo[]" multiple size="100" accept="image/*" required /></label> <br />
        <input type="submit" value="Enviar" name="enviar">
        <input type="reset" value="Apagar">
    </form>
    <br> <br> <a href='./'>Voltar</a>
</body>

</html>