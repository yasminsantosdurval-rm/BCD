<?php

declare(strict_types=1);

header("Content-Type: application/json");

require_once "conexao.php";

if ($_SERVER["REQUEST_METHOD"] === "GET") {

    $sql = "SELECT * FROM chamados ORDER BY id";
    $stmt = $pdo->query($sql);

    $chamados = $stmt->fetchAll();

    echo json_encode($chamados, JSON_PRETTY_PRINT);
    exit;
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $dados = json_decode(file_get_contents("php://input"), true);

    if (
        empty($dados["equipamento"]) ||
        empty($dados["setor"]) ||
        empty($dados["descricao"]) ||
        empty($dados["prioridade"]) ||
        empty($dados["status"])
    ) {
        http_response_code(400);

        echo json_encode([
            "erro" => "Todos os campos são obrigatórios"
        ]);

        exit;
    }

    $prioridades = ["baixa", "media", "alta"];
    $statusValidos = ["aberto", "em andamento", "concluido"];

    if (!in_array($dados["prioridade"], $prioridades)) {
        http_response_code(400);

        echo json_encode([
            "erro" => "Prioridade inválida"
        ]);

        exit;
    }

    if (!in_array($dados["status"], $statusValidos)) {
        http_response_code(400);

        echo json_encode([
            "erro" => "Status inválido"
        ]);

        exit;
    }

    $sql = "INSERT INTO chamados
            (equipamento, setor, descricao, prioridade, status)
            VALUES (:equipamento, :setor, :descricao, :prioridade, :status)";

    $stmt = $pdo->prepare($sql);

    $stmt->execute([
        ":equipamento" => $dados["equipamento"],
        ":setor" => $dados["setor"],
        ":descricao" => $dados["descricao"],
        ":prioridade" => $dados["prioridade"],
        ":status" => $dados["status"]
    ]);

    echo json_encode([
        "mensagem" => "Chamado cadastrado com sucesso"
    ]);

    exit;
}

if ($_SERVER["REQUEST_METHOD"] === "PUT") {

    $dados = json_decode(file_get_contents("php://input"), true);

    if (
        empty($dados["id"]) ||
        empty($dados["equipamento"]) ||
        empty($dados["setor"]) ||
        empty($dados["descricao"]) ||
        empty($dados["prioridade"]) ||
        empty($dados["status"])
    ) {
        http_response_code(400);

        echo json_encode([
            "erro" => "Todos os campos são obrigatórios"
        ]);

        exit;
    }

    $prioridades = ["baixa", "media", "alta"];
    $statusValidos = ["aberto", "em andamento", "concluido"];

    if (!in_array($dados["prioridade"], $prioridades)) {
        http_response_code(400);

        echo json_encode([
            "erro" => "Prioridade inválida"
        ]);

        exit;
    }

    if (!in_array($dados["status"], $statusValidos)) {
        http_response_code(400);

        echo json_encode([
            "erro" => "Status inválido"
        ]);

        exit;
    }

    $sql = "UPDATE chamados
            SET equipamento = :equipamento,
                setor = :setor,
                descricao = :descricao,
                prioridade = :prioridade,
                status = :status
            WHERE id = :id";

    $stmt = $pdo->prepare($sql);

    $stmt->execute([
        ":id" => $dados["id"],
        ":equipamento" => $dados["equipamento"],
        ":setor" => $dados["setor"],
        ":descricao" => $dados["descricao"],
        ":prioridade" => $dados["prioridade"],
        ":status" => $dados["status"]
    ]);

    echo json_encode([
        "mensagem" => "Chamado atualizado com sucesso"
    ]);

    exit;
}

if ($_SERVER["REQUEST_METHOD"] === "DELETE") {

    $dados = json_decode(file_get_contents("php://input"), true);

    if (empty($dados["id"])) {
        http_response_code(400);

        echo json_encode([
            "erro" => "ID é obrigatório"
        ]);

        exit;
    }

    $sql = "DELETE FROM chamados WHERE id = :id";

    $stmt = $pdo->prepare($sql);

    $stmt->execute([
        ":id" => $dados["id"]
    ]);

    echo json_encode([
        "mensagem" => "Chamado excluído com sucesso"
    ]);

    exit;
}
