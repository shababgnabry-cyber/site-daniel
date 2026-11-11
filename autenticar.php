<?php
session_start();
include "conexao.php";
$conexao = conecta_db();

$email = $_POST["email"] ?? "";
$senha = $_POST["senha"] ?? "";

$sql = "SELECT id, nome, email, senha FROM usuarios WHERE email = ?";

$stmt = mysqli_prepare($conexao, $sql);
if (!$stmt) {
    die("Erro ao preparar SQL: " . mysqli_error($conexao));
}

mysqli_stmt_bind_param($stmt, "s", $email);
mysqli_stmt_execute($stmt);
$resultado = mysqli_stmt_get_result($stmt);

if (mysqli_num_rows($resultado) != 1) {
    echo "E-mail ou senha inválidos.";
    exit;
}

$usuario = mysqli_fetch_assoc($resultado);

if (password_verify($senha, $usuario["senha"])) {
    session_regenerate_id(true);

    $_SESSION["usuario_id"] = $usuario["id_usuario"];
    $_SESSION["usuario_nome"] = $usuario["nome_completo"];
    $_SESSION["usuario_email"] = $usuario["email"];

    mysqli_stmt_close($stmt);
    mysqli_close($conexao);

    header("Location: painel.php");
    exit;
} else {
    echo "E-mail ou senha inválidos.";
}
?>