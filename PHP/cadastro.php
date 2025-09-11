<?php
include "conexao.php";
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nome  = trim($_POST["nome"]);
    $email = trim($_POST["email"]);
    $senha = password_hash($_POST["senha"], PASSWORD_DEFAULT);

    try {
        $stmt = $conn->prepare("INSERT INTO usuarios (nome, email, senha) VALUES (:nome, :email, :senha)");
        $stmt->bindParam(":nome", $nome);
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":senha", $senha);
        $stmt->execute();

        // guarda dados na sessão
        $_SESSION["nome"]  = $nome;
        $_SESSION["email"] = $email;

        echo "success"; // JS interpreta e redireciona para login

        }catch (PDOException $e) {
            if ($e->getCode() == 23000) {
                echo "❌ Esse email já está cadastrado!";
            } else {
                echo "Erro ao cadastrar: " . $e->getMessage();
            }
        }
}
?>