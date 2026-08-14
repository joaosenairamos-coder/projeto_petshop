<?php
// Conexão com o MySQL do Laragon usando PDO
// No Laragon, o usuário padrão do MySQL é "root" e a senha é vazia
$host = "localhost";
$dbname = "petshop";
$user = "root";
$pass = "";

try {
    $con = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(["erro" => "Falha na conexão: " . $e->getMessage()]);
    exit;
}
