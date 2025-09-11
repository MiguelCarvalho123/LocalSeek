<?php
include "conexao.php";
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST["email"]);
    $senha = $_POST["senha"];

    $sql = "SELECT * FROM usuarios WHERE email = :email";
    $stmt = $conn->prepare($sql); 
    $stmt->bindParam(":email", $email);
    $stmt->execute();

    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($usuario && password_verify($senha, $usuario["senha"])) {
        $_SESSION["nome"] = $usuario["nome"];
        $_SESSION["email"] = $usuario["email"];
        // retorna mensagem de sucesso para JS
        echo "success";
    } else {
        echo "❌ Email ou senha inválidos!";
    }
}
?>
