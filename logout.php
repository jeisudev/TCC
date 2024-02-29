<?php
include("conexao/conexao.php");
unset($_SESSION['nome'], $_SESSION['email']);
header("Location: index.php");

?>