<?php
session_start();

// se não tiver login, manda pro login
if (!isset($_SESSION["nome"])) {
    header("Location: login.php");
    exit();
}

$nome = $_SESSION["nome"];
$email = $_SESSION["email"];
$inicial = strtoupper(substr($nome, 0, 1));
?>
