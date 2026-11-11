<?php
include "conexao.php";
$conexao = conecta_db();

$nome  = $_POST["nome_completo"] ?? "";
$cpf  = $_POST["cpf"] ?? "";
$telefone  = $_POST["telefone"] ?? "";
$email = $_POST["email"] ?? "";
$senha = $_POST["senha"] ?? "";
$setor = $_POST["setor"] ?? "";
$nivel_permissao = $_POST["nivel_permissao"] ?? "";

if ($nome == "" || $email == "" || $senha == "" || $cpf == "" || $setor == "" || $telefone == "" || $nivel_permissao == "") {
    echo "Preencha todos os campos.";
    exit;
}

$senha_hash = password_hash($senha, PASSWORD_DEFAULT);

$sql = "INSERT INTO usuarios (nome_completo, cpf, telefone, email, senha, setor, nivel_permissao) VALUES (?, ?, ?, ?, ?, ?, ?)";

$stmt = mysqli_prepare($conexao, $sql);
if (!$stmt) {
    echo "Erro ao preparar SQL: $sql<br>";
    echo "Erro do banco: ";
    echo mysqli_error($conexao);
    exit;
}
mysqli_stmt_bind_param($stmt, "sssssss", $nome, $cpf, $telefone, $email, $senha_hash, $setor, $nivel_permissao);

if (mysqli_stmt_execute($stmt)) {
    echo "Usuário cadastrado com sucesso!";
} else {
    echo "Erro ao cadastrar usuário:<br>";
    echo "Erro do banco: ";
    echo mysqli_stmt_error($stmt);
}

mysqli_stmt_close($stmt);
mysqli_close($conexao);
?>