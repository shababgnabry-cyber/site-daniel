<?php
function conecta_db(){
    $host = 'localhost';
    $user = 'root';
    $password = '';
    $dbname = 'daniel_lp';

$conn = new mysqli($host, $user, $password, $dbname);
if ($conn->connect_error) {
    die('Falha na Conexão: ' . $conn->connect_error);
}
return $conn;
}