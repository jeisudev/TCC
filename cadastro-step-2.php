<?php
include('conexao/conexao.php');
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
                    <h1>Muito bem, estamos quase lá!</h1>
                    <form action="" method="post">
                        
                        <ul>
                            <li>
                                <div class="textfield">
                                    <label for="email"> Email </label>
                                    <input type="email" name="email" id="email" placeholder="Digite aqui..."
                                        autocomplete="off" required autofocus>
                                </div>
                            </li>
                            <li>
                                <div class="textfield">
                                    <label for="cpf"> CPF </label>
                                    <input type="text" name="cpf" id="cpf" placeholder="123.456.789-XX" maxlength="14"
                                        autocomplete="off" required>
                                </div>
                            </li>
                            <li>
                                <div class="textfield">
                                    <label for="tel"> telefone </label>
                                    <input type="text" name="tel" id="tel" placeholder="11 99999-9999" autocomplete="off" required oninput="this.value = this.value.replace(/[^0-9]/g, '');">

                                    <!-- <input type="tel" name="tel" minlength="15" maxlength="15" id="tel" placeholder="11 99999-9999" autocomplete="off" required> -->
                                </div>
                            </li>
                        </ul>
                        <?php
                        
                        if (isset($_POST['btn_go_cadastra'])) {
                            $cpf = $_POST['cpf'];
                            $cpf_val = preg_replace('/[^0-9]/is', '', $cpf);
                            // Verifique se o CPF tem 11 caracteres (sem considerar espaços em branco)
                            if (strlen($cpf_val) != 11) {
                                echo "O CPF deve conter 11 dígitos. Tente novamente.\n";
                            } else {
                                // Divida o CPF em caracteres individuais e armazene em variáveis separadas
                                list($n1, $n2, $n3, $n4, $n5, $n6, $n7, $n8, $n9, $n10, $n11, $n12, $n13, $n14) = str_split($cpf);

                                $soma1 = $n1 * 10 + $n2 * 9 + $n3 * 8 + $n5 * 7 + $n6 * 6 + $n7 * 5 + $n9 * 4 + $n10 * 3 + $n11 * 2;
                                $valid1 = $soma1 * 10 % 11;
                                $soma2 = $n1 * 11 + $n2 * 10 + $n3 * 9 + $n5 * 8 + $n6 * 7 + $n7 * 6 + $n9 * 5 + $n10 * 4 + $n11 * 3 + $n13 * 2;
                                $valid2 = $soma2 * 10 % 11;

                                if (preg_match('/(\d)\1{10}/', $cpf_val)) {
                                    echo "<div style='color:red'>  *Digite um CPF válido! </div>";
                                } elseif ($n13 == $valid1 and $n14 == $valid2) {
                                    $email = $conn->real_escape_string($_POST['email']);
                                    $sql_code = "SELECT * FROM usuario WHERE email = '$email' OR cpf = '$cpf_val'";
                                    $sql_query = $conn->query($sql_code) or die("Falha na execução do código SQL: " . $conn->error);
                                    $usuario = $sql_query->fetch_assoc();

                                    if ($usuario['email'] == $email ) {
                                        echo "<div class='error'> *Email já cadastrado! </div>";
                                    } elseif ($usuario['CPF'] == $cpf_val) {
                                        echo "<div class='error'> *CPF já cadastrado! </div>";
                                    }else{
                                        $_SESSION['email'] = $email;
                                        $_SESSION['cpf'] = $cpf_val;
                                        $_SESSION['tel'] = $_POST['tel'];
                                        header("location: cadastro-step-3.php");
                                    }
                                } else {
                                    echo "<div style='color:red'>  *Digite um CPF válido! </div>";
                                }
                            }
                            // if (preg_match('/(\d)\1{10}/', $cpf_val)) {
                            //     echo "<div style='color:red'>  *Digite um CPF válido! </div>";
                            // }else {
                            //     echo "<div style='color:red'>  *Digite um CPF válido! </div>";
                            // }
                        }
                        ?>
                        <button type="submit" name="btn_go_cadastra">
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 1024 1024">
                                <path fill="#36D273"
                                    d="M452.864 149.312a29.12 29.12 0 0 1 41.728.064L826.24 489.664a32 32 0 0 1 0 44.672L494.592 874.624a29.12 29.12 0 0 1-41.728 0a30.592 30.592 0 0 1 0-42.752L764.736 512L452.864 192a30.592 30.592 0 0 1 0-42.688zm-256 0a29.12 29.12 0 0 1 41.728.064L570.24 489.664a32 32 0 0 1 0 44.672L238.592 874.624a29.12 29.12 0 0 1-41.728 0a30.592 30.592 0 0 1 0-42.752L508.736 512L196.864 192a30.592 30.592 0 0 1 0-42.688z" />
                            </svg>
                        </button>
                    </form>
                </main>
                <ul class='opcoes'>
                    <li class="select"></li>
                    <li class="disselect"></li>
                    <li class="disselect"></li>
                </ul>
            </section>
        </main>
    </div>
</body>
<script src="js/js.js"> </script>
<script src="js/cpf.js"> </script>

</html>