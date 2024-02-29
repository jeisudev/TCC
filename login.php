<?php


include('conexao/conexao.php');

if (isset($_POST['email']) || isset($_POST['senha'])) {

    $email = $conn->real_escape_string($_POST['email']);
    $senha = $_POST['senha'];
    $sql_code = "SELECT * FROM usuario WHERE email = '$email'";
    $sql_query = $conn->query($sql_code) or die("Falha na execução do código SQL: " . $conn->error);
    $usuario = $sql_query->fetch_assoc();

    if ($usuario) {
        if (password_verify($senha, $usuario['senha'])) {
            $senha = $usuario['senha'];
        }
    }

    $new_code = "SELECT * FROM usuario WHERE email = '$email' AND senha = '$senha'";
    $new_sql = $conn->query($new_code) or die("Falha na execução do código SQL: " . $conn->error);
    unset($_SESSION['cpf_user']);
    unset($_SESSION['nome_user)']);
    unset($_SESSION['nome_prod']);
    unset($_SESSION['comentario_prod']);
    unset($_SESSION['qtd_prod']);
    unset($_SESSION['valor_prod']);
    unset($_SESSION['categ_prod']);
}
if (isset($_POST['btn-login'])) {
    $quantidade = $new_sql->num_rows;

    if ($quantidade == 1) {
        $_SESSION['id'] = $usuario['ID_usuario'];
        $_SESSION['nome'] = $usuario['nome'];
        $_SESSION['sobrenome'] = $usuario['sobrenome'];
        $_SESSION['email'] = $usuario['email'];
        $_SESSION['cargo'] = $usuario['cargo'];
        header("Location: index.php");
    } else {
        $loginError = "<div style='color:red;'> <br> As credenciais de login estão incorretas!</div>"; // Adicione uma mensagem de erro
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
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="css/menu.css">

    <title> CONCICLE | Login</title>
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
                            } else {
                                echo "<a href='login.php' class='cursor'> Login </a>";
                            }
                            ?>
                        </li>
                        <li class="sobre"><a href="Sobre.php"> Sobre </a></li>
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

                <form action="" method="post">
                    <main class="main-login">
                        <section class="card-login">
                            <h1> Entre na sua conta </h1>

                            <div class="textfield">
                                <label for="email"> E-mail </label>
                                <input type="email" name="email" placeholder="E-mail@exemplo.com">
                            </div>

                            <div class="textfield">
                                <label for="senha"> Senha* </label>
                                <input type="password" name="senha" id="senha" placeholder="Digite sua senha" required>
                                <label class="check" for="senha" onclick="mostrarsenha()" id="check"> Mostrar </label>

                            </div>

                            <div class="opcoes">
                                <div>
                                    <input type="checkbox" name="lembre-se" id="lembre-se">
                                    <label for="lembre-se">Lembre-se de mim</label>
                                </div>
                                <a href='#'> Esqueceu a Senha? </a>
                            </div>

                            <?php if (isset($loginError)) {

                                ?>
                                <div class="error-message">
                                    <?php echo $loginError; ?>
                                </div>
                                <?php
                            }
                            ?>
                            <input class="btn-cadastro" name="btn-login" type="submit" value="Entrar">

                            <footer class="link-cadastro">
                                <p> Não possui cadastro?
                                <p> <a href="cadastro-step-1.php">Clique aqui para criar o seu</a> </p>
                                </p>
                            </footer>

                        </section>
                    </div>
                </form>
            </section>
        </main>
    </div>
</body>
<script src="js/js.js"></script>

</html>