<?php

/**
 * 
 * Conexão com o banco de dados
 * 
 */

$hostname = 'tecpuc-dev.tk';
$user_name = 'admin_t221_g10';
$password = '64STSPb7rg';
$port = '3306';
$database = 'admin_my_t221_g10';

$conexao = mysqli_connect($hostname, $user_name, $password, $database, $port);

if ($conexao->connect_error) {
    die("Connection failed: " . $conexao->connect_error);
}

$conexao->set_charset('utf8');

//$conn->close();
