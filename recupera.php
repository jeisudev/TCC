<?php
// Configurações do banco de dados
include_once('conexao/conexao.php');
$campos = "ID_img, nome_imagem, tamanho_imagem, tipo_imagem, caminho_imagem";
$nomeDaTabela = "imagens";

//traz as variáveis do formulário
//$codigo = $_POST['codigo'];

//Script de uma busca em uma tabela no Banco de Dados

$sql = "SELECT $campos FROM $nomeDaTabela";

//transformando a solitação em uma query
$result = $conn->query($sql);

//concluindo operação

//testa resultados
//var_dump ($registro);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        // Exibe todas as colunas que têm valores
        echo "<h2>Dados da Linha</h2>";
        // foreach ($row as $column => $value) {
        //     if (!empty($value)) {
        //         echo "<p><strong>$column:</strong> $value</p>";
        //     }
        // }
        // Se houver um caminho de imagem na coluna 'caminho_imagem', exiba a imagem
        if (!empty($row['caminho_imagem'])) {
            echo "<img src='{$row['caminho_imagem']}'  height='350px'>";
        }
    }
} else {
    echo "Nenhum resultado encontrado.";
}

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <title>Manipulando arquivos</title>
    <meta charset="utf-8" />
</head>

<body>
    <br> <br> <a href='./'>Voltar para o diretório raiz</a>
</body>

</html>