<?php
include('conexao/conexao.php');
if (isset($_POST['btn_go_cadastra'])) {
    $_SESSION['nome_user'] = $_POST['nome'];
    $_SESSION['sobrenome_user'] = $_POST['sobrenome'];
    header("location: cadastro-step-2.php");
}
// echo "<pre>";
// print_r($_SESSION);
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
                <header class="header-login">
                    <!-- <h1> Conscientize, Recicle & Receba </h1>
                    <h2> Faça parte dessa equipe e mude o mundo! </h2> -->
                </header>
                <main class="main-cadastro">
                    <h1>Complete os dados a seguir</h1>
                    <form action="" method="post">
                        <ul>
                            <li>
                                <div class="textfield">
                                    <label for="nome"> Nome </label>
                                    <input type="text" name="nome" id="nome" placeholder="Digite aqui..."
                                        autocomplete="off" required autofocus>
                                </div>
                            </li>
                            <li>
                                <div class="textfield">
                                    <label for="sobrenome"> Sobrenome </label>
                                    <input type="text" name="sobrenome" id="sobrenome" placeholder="Digite aqui..."
                                        autocomplete="off" required>
                                </div>
                            </li>
                        </ul>
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