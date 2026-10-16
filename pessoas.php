<?php
$conexao = new mysqli("localhost", "root", "", "aula_metodos");

// Verifica se houve erro na conexão
if ($conexao->connect_error) {
    die("Falha na conexão: " . $conexao->connect_error);
}

$metodo = $_SERVER["REQUEST_METHOD"];

echo "Método: " . $metodo . "\n";

if ($metodo === "GET") {
    $r = $conexao->query("SELECT * FROM pessoas");
    
    // O loop while fica DENTRO do bloco GET
    while ($linha = $r->fetch_assoc()) {
        echo $linha["id"] . " - " . $linha["nome"] . " - " . $linha["email"] . "\n";
    }
}

if ($metodo === "POST") {
    $conexao->query("INSERT INTO pessoas (nome, email) VALUES ('Thiago', 'thiago@email.com')");
    echo "Pessoa inserida com sucesso!\n";
}

if ($metodo === "PUT") {
    $conexao->query("UPDATE pessoas SET nome = 'Thomas', email = 'thomas@email.com' WHERE id = 1");
    echo "Pessoa atualizada com sucesso!\n";
}
if ($metodo === "PATCH") {
    $conexao->query("UPDATE pessoas SET email = 'thomas1@novo.com' WHERE id = 1");
    echo "E-mail atualizado com sucesso!\n";
}
if ($metodo === "DELETE") {
    $conexao->query("DELETE FROM pessoas WHERE id = 1");
    echo "Pessoa removida com sucesso!\n";
}
if ($metodo === "OPTIONS") {
    echo "Aceito: GET, POST, PUT, PATCH, DELETE, OPTIONS\n";
}
