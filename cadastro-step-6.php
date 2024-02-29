<?php
include('conexao/conexao.php');

if (isset($_POST['user_comum'])) {
    // Obtenha os dados do usuário da sessão
    $cargo = $_POST['user_comum'];
    $nome = $_SESSION['nome_user'];
    $sobrenome = $_SESSION['sobrenome_user'];
    $email = $_SESSION['email'];
    $cpf = $_SESSION['cpf'];
    $tel = $_SESSION['tel'];
    $cep = $_SESSION['cep'];
    $bairro = $_SESSION['bairro'];
    $cidade = $_SESSION['cidade'];
    $estado = $_SESSION['estado'];
    $endereco = $_SESSION['endereco'];
    $num = $_SESSION['num'];
    $complemento = $_SESSION['complemento'];
    $senha = $_SESSION['senha'];

    // Inserir endereço
    $sql_endereco = "INSERT INTO endereco (CEP, UF, rua, bairro, cidade, num_casa, complemento) VALUES ('$cep', '$estado', '$endereco', '$bairro', '$cidade', '$num', '$complemento')";
    $res_endereco = $conn->query($sql_endereco) or die("Falha: " . $conn->error);

    // Inserir usuário
    $sql = "INSERT INTO usuario (nome, sobrenome, senha, email, CPF, cargo) VALUES ('$nome', '$sobrenome', '$senha', '$email', '$cpf', '$cargo')";
    $res = $conn->query($sql) or die("Falha: " . $conn->error);

    // Obter o ID do usuário recém-inserido
    $id_user = $conn->insert_id;

    // Inserir contato
    $sql_contato = "INSERT INTO contato (ID_usuario, tel_fixo, tel_celular) VALUES ('$id_user', '', '$tel')";
    $res_contato = $conn->query($sql_contato) or die("Falha: " . $conn->error);

    // Inserir relação entre usuário e endereço
    $sql_popula_tudo = "INSERT INTO user_ender (ID_usuario, ID_endereco) VALUES ('$id_user', LAST_INSERT_ID())";
    $res_popula_tudo = $conn->query($sql_popula_tudo) or die("Falha: " . $conn->error);
    header("location: cadastro-step-7.php?id=$id_user.php");
}elseif (isset($_POST['user_vender'])) {
    // Obtenha os dados do usuário da sessão
    $cargo = $_POST['user_vender'];
    $nome = $_SESSION['nome_user'];
    $sobrenome = $_SESSION['sobrenome_user'];
    $email = $_SESSION['email'];
    $cpf = $_SESSION['cpf'];
    $tel = $_SESSION['tel'];
    $cep = $_SESSION['cep'];
    $bairro = $_SESSION['bairro'];
    $cidade = $_SESSION['cidade'];
    $estado = $_SESSION['estado'];
    $endereco = $_SESSION['endereco'];
    $num = $_SESSION['num'];
    $complemento = $_SESSION['complemento'];
    $senha = $_SESSION['senha'];

    // Inserir endereço
    $sql_endereco = "INSERT INTO endereco (CEP, UF, rua, bairro, cidade, num_casa, complemento) VALUES ('$cep', '$estado', '$endereco', '$bairro', '$cidade', '$num', '$complemento')";
    $res_endereco = $conn->query($sql_endereco) or die("Falha: " . $conn->error);

    // Inserir usuário
    $sql = "INSERT INTO usuario (nome, sobrenome, senha, email, CPF, cargo) VALUES ('$nome', '$sobrenome', '$senha', '$email', '$cpf', '$cargo')";
    $res = $conn->query($sql) or die("Falha: " . $conn->error);

    // Obter o ID do usuário recém-inserido
    $id_user = $conn->insert_id;

    // Inserir contato
    $sql_contato = "INSERT INTO contato (ID_usuario, tel_fixo, tel_celular) VALUES ('$id_user', '', '$tel')";
    $res_contato = $conn->query($sql_contato) or die("Falha: " . $conn->error);

    // Inserir relação entre usuário e endereço
    $sql_popula_tudo = "INSERT INTO user_ender (ID_usuario, ID_endereco) VALUES ('$id_user', LAST_INSERT_ID())";
    $res_popula_tudo = $conn->query($sql_popula_tudo) or die("Falha: " . $conn->error);
    header("location: cadastro-step-7.php?id=$id_user.php");
}
//     $cargo = $_POST['user_comum'];
//     $nome = $_SESSION['nome_user'];
//     $sobrenome = $_SESSION['sobrenome_user'];
//     $email = $_SESSION['email'];
//     $cpf = $_SESSION['cpf'];
//     $tel = $_SESSION['tel'];
//     $cep = $_SESSION['cep'];
//     $bairro = $_SESSION['bairro'];
//     $cidade = $_SESSION['cidade'];
//     $estado = $_SESSION['estado'];
//     $endereco = $_SESSION['endereco'];
//     $endereco = $_SESSION['endereco'];
//     $num = $_SESSION['num'];
//     $complemento = $_SESSION['complemento'];
//     $senha = $_SESSION['senha'];

//     $sql_endereco = "INSERT INTO endereco (CEP, UF, rua, bairro, cidade, num_casa, complemento) VALUES ('{$cep}','{$estado}', '{$endereco}', '{$bairro}', '{$num}', '{$complemento}')";
//     $res_endereco = $conn->query($sql_endereco) or die("Falha: " . $conn->error);

//     $sql = "INSERT INTO usuario (nome, sobrenome, senha, email, CPF, cargo) VALUES ('{$nome}','{$sobrenome}', '{$senha}', '{$email}', '{$cpf}', '{$cargo}')";
//     $res = $conn->query($sql) or die("Falha: " . $conn->error);

//     $id_user = $conn->insert_id;

//     $sql_popula_tudo = "INSERT INTO user_ender (ID_usuario, ID_endereco) VALUES('{$id_user}','{$id_endereco}')";
//     $res_popula_tudo = $conn->query(($sql_popula_tudo));
// } elseif (isset($_POST['user_comum'])) {
//     $cargo = $_POST['user_comum'];
//     $nome = $_SESSION['nome_user'];
//     $sobrenome = $_SESSION['sobrenome_user'];
//     $email = $_SESSION['email'];
//     $cpf = $_SESSION['cpf'];
//     $tel = $_SESSION['tel'];
//     $cep = $_SESSION['cep'];
//     $bairro = $_SESSION['bairro'];
//     $cidade = $_SESSION['cidade'];
//     $estado = $_SESSION['estado'];
//     $endereco = $_SESSION['endereco'];
//     $num = $_SESSION['num'];
//     $complemento = $_SESSION['complemento'];
//     $senha = $_SESSION['senha'];

//     // Inserir endereço
//     $sql_endereco = "INSERT INTO endereco (CEP, UF, rua, bairro, cidade, num_casa, complemento) VALUES ('$cep', '$estado', '$endereco', '$bairro', '$cidade', '$num', '$complemento')";
//     $res_endereco = $conn->query($sql_endereco) or die("Falha: " . $conn->error);

//     // Inserir usuário
//     $sql = "INSERT INTO usuario (nome, sobrenome, senha, email, CPF, cargo) VALUES ('$nome', '$sobrenome', '$senha', '$email', '$cpf', '$cargo')";
//     $res = $conn->query($sql) or die("Falha: " . $conn->error);

//     $id_user = $conn->insert_id;

//     $id_user = $id_user_sele['ID_usuario'];
//     $id_endereco = $id_user_sele['ID_endereco'];

//     $sql_contato = "INSERT INTO contato (ID_usuario, tel_fixo, tel_celular) VALUES ('{$id_user}','{''}','{$tel}')";
//     $res_contato = $conn->query($sql_contato) or die("Falha: " . $conn->error);


//     $sql_popula_tudo = "INSERT INTO user_ender (ID_usuario, ID_endereco) VALUES('{$id_user}','{$id_endereco}')";
//     $res_popula_tudo = $conn->query(($sql_popula_tudo));
// }

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
            <section class="login">
                <!-- <header class="header-login">
                    <h1> Conscientize, Recicle & Receba </h1>
                    <h2> Faça parte dessa equipe e mude o mundo! </h2>
                </header> -->
                <main class="main-login">
                    <h1>COMO DESEJA CADASTRAR-SE?</h1>
                    <form action="" method="post" class="">
                        <main class="buttons">
                            <button type="submit" name="user_comum" value="1">
                                <h2>Usuário comum</h2>
                                <p>você poderá somente navegar e comprar dentro da plataforma</p>
                            </button>

                            <button type="submit" name="user_vender" value="2">
                                <h2>Usuário Vendedor</h2>
                                <p>você poderá navegar, comprar e vender seus dentro da plataforma</p>
                            </button>
                        </main>
                    </form>
                </main>
                <ul class='opcoes'>
                    <li class="disselect"></li>
                    <li class="disselect"></li>
                    <li class="select"></li>
                    
                </ul>
            </section>
    </div>
</body>
<script src="js/js.js"> </script>
<script src="js/cpf.js"> </script>

</html>