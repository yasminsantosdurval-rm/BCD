<?php

header("Content-Type: application/json");

require "conexao.php";

$metodo = $_SERVER["REQUEST_METHOD"];

// ADICIONAR UMA PEÇA
if ($metodo == "POST") {

    $json = file_get_contents("php://input");
    $dados = json_decode($json, true);

    // if pros campo obrigatorio
    if (
        !isset($dados["nome"]) ||
        !isset($dados["categoria"]) ||
        !isset($dados["fornecedor"]) ||
        !isset($dados["quantidade"]) ||
        !isset($dados["preco_unitario"])
    ) {
        echo json_encode(["Mensagem" => "Esqueceu de algum campo foi? tudo é obrigatorio pequeno gafanhoto"]);
        exit;
    };

    // Verificar categoria
    if (
        $dados["categoria"] != "eletrica" &&
        $dados["categoria"] != "mecanica" &&
        $dados["categoria"] != "hidraulica"
    ) {
        echo json_encode(["Mensagem" => "Acho q vc errou a categoria em, Tem que ser uma categoria valida!!!"]);
        exit;
    };

    // quantidade
    if ($dados["quantidade"] < 0) {
        echo json_encode(["Mensagem" => "Pode negativo não pae"]);
        exit;
    };

    // Verificar os preço
    if ($dados["preco_unitario"] <= 0) {
        echo json_encode(["Mensagem" => "Pode 0 ou menor não em. tem que ser maior, ou tu vai por um produto negativo ou sem preço? pode não"]);
        exit;
    };


    $sql = "INSERT INTO pecas (nome, categoria, fornecedor, quantidade, preco_unitario)
            VALUES (?, ?, ?, ?, ?)";

    $comando = $pdo->prepare($sql);

    $comando->execute([
        $dados["nome"],
        $dados["categoria"],
        $dados["fornecedor"],
        $dados["quantidade"],
        $dados["preco_unitario"]
    ]);

    echo json_encode(["Mensagem" => "Peça cadastrada com sucesso!!"]);
}


// Listar as peças
if ($metodo == "GET") {

    $sql = "SELECT * FROM pecas ORDER BY id";

    $comando = $pdo->query($sql);

    $pecas = $comando->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($pecas);
}


// Atualizar qualquer peça
if ($metodo == "PUT") {

    $json = file_get_contents("php://input");
    $dados = json_decode($json, true);

    // Campos obrigatorios
    if (
        !isset($dados["id"]) ||
        !isset($dados["nome"]) ||
        !isset($dados["categoria"]) ||
        !isset($dados["fornecedor"]) ||
        !isset($dados["quantidade"]) ||
        !isset($dados["preco_unitario"])
    ) {
        echo json_encode(["Mensagem" => "Esqueceu de algum campo foi? tudo é obrigatorio pequeno gafanhoto"]);
        exit;
    }

    // Verificar categoria
    if (
        $dados["categoria"] != "eletrica" &&
        $dados["categoria"] != "mecanica" &&
        $dados["categoria"] != "hidraulica"
    ) {
        echo json_encode(["Mensagem" => "Acho q vc errou a categoria em, Tem que ser uma categoria valida!!!"]);
        exit;
    }

    // verificação da quantidade
    if ($dados["quantidade"] < 0) {
        echo json_encode(["Mensagem" => "Pode negativo não em!!"]);
        exit;
    }

    // verifica os preço
    if ($dados["preco_unitario"] <= 0) {
        echo json_encode(["Mensagem" => "O preço unitário tem que ser maior que 0, abaixo ou igual é invalido"]);
        exit;
    }

    $sql = "UPDATE pecas SET nome = ?, categoria = ?, fornecedor = ?, quantidade = ?, preco_unitario = ? WHERE id = ?";

    $comando = $pdo->prepare($sql);

    $comando->execute([
        $dados["nome"],
        $dados["categoria"],
        $dados["fornecedor"],
        $dados["quantidade"],
        $dados["preco_unitario"],
        $dados["id"]
    ]);

    echo json_encode([
        "Mensagem" => "Peça atualizada com sucesso!"
    ]);
}


// deletar peças
if ($metodo == "DELETE") {

    $json = file_get_contents("php://input");
    $dados = json_decode($json, true);

    // ver se o id ta informando
    if (!isset($dados["id"])) {
        echo json_encode(["Mensagem" => "Esqueceu do Id em, informe ele por favor"]);
        exit;
    }

    $sql = "DELETE FROM pecas WHERE id = ?";

    $comando = $pdo->prepare($sql);

    $comando->execute([
        $dados["id"]
    ]);

    echo json_encode(["Mensagem" => "Peça deletada com sucesso!"]);
};

?>