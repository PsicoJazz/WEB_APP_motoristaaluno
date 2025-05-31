<?php
$host = 'localhost';
$usuario = 'root';
$senha = '';
$banco = 'motoristaaluno'; 


$conexao = new mysqli($host, $usuario, $senha, $banco);


if ($conexao->connect_error) {
    die("Erro na conexão: " . $conexao->connect_error);
}


$conexao->set_charset("utf8");

$conn = $conexao;
?>