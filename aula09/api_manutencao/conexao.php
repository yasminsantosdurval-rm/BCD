<?php

declare(strict_types=1);

$host = "192.168.10.105";
$port = "5432";
$dbname = "manutencao";
$user = "postgres";
$password = "1234";

try {

    $pdo = new PDO(
        "pgsql:host=$host;port=$port;dbname=$dbname",
        $user,
        $password
    );

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

} catch (PDOException $e) {

    http_response_code(500);

    echo json_encode([
        "erro" => "Erro na conexão com o banco de dados"
    ]);

    exit;
}
