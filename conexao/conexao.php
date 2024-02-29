<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <link rel="shortcut icon" href="img/LOGO.png" type="image/x-icon">
</head>
<?php

if(!isset($_SESSION)) {
    session_start();
}

$local = 'localhost';
$user = 'root';
$pass = '';
$db_name = 'tcc_concicle';

$conn = mysqli_connect($local, $user, $pass, $db_name);
if ($conn->error) {
    die("Conexão Mal-sucedida!" . $conn->error);
}
//   else {
//      echo "Conexão Bem-sucedida!";
//  }
$select = $conn->query("SELECT * from produto");
$rese = mysqli_fetch_assoc($select);
?>  