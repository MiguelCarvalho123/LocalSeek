<?php
$host = "localhost";
$dbname = "localseek";
$user = "root";  // padrão do XAMPP
$pass = "";      // senha em branco no XAMPP por padrão

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Erro na conexão: " . $e->getMessage();
}
?>