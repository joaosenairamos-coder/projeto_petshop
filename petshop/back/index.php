<?php
header("Content-Type: application/json; charset=utf-8");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET");

require "config.php";

// Roteador simples baseado em query string (?rota=...)
$rota = $_GET["rota"] ?? "teste";

function teste() {
    echo json_encode(["mensagem" => "Back-end respondendo"]);
}

// Rota já pronta 1: lista todos os animais
function listarAnimais($con) {
    $stmt = $con->query("SELECT * FROM Animais");
    echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
}

// Rota já pronta 2: filtra animais por espécie (?rota=animais/especie&especie=Cachorro)
function listarPorEspecie($con) {
    $especie = $_GET["especie"] ?? "";
    $stmt = $con->prepare("SELECT * FROM Animais WHERE especie = ?");
    $stmt->execute([$especie]);
    echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
}

//Rota 3
function listarPorRaca($con) {
    $raca = $_GET["raca"] ?? "";
    $stmt = $con->prepare("SELECT * FROM Animais WHERE raca = ?");
    $stmt->execute([$raca]);
    echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
}

 //Rota 4
function idadeMedia($con) {
    $stmt = $con->query("SELECT AVG(idade) AS idade_media FROM Animais");
    echo json_encode($stmt->fetch(PDO::FETCH_ASSOC));
}


switch ($rota) {
    case "animais":
        listarAnimais($con);
        break;

    case "animais/especie":
        listarPorEspecie($con);
        break;

    case "animais/raca":
        listarPorRaca($con);
        break;

    case "animais/idade-media":
        idadeMedia($con);
        break;

    // TODO (atividade): crie aqui as rotas novas
    // case "animais/raca": ...
    // case "animais/idade-media": ...

    default:
        teste();
        break;
}
