<?php
// Incluimos o arquivo de conexão
require "conn_/connect_db.php";

// Recuperamos os valores dos campos através do método POST
$name = $_POST["name"];

// Preparamos a conexão a tabela usuarios
$Search_name = $pdo->prepare('SELECT * FROM `users` WHERE `name` = :name');
// Iniciamos a conexão com o parâmetro vindo pelo método POST
$Search_name->bindParam(':name', $_POST['name'], PDO::PARAM_STR);;
// Executamos a conexão
$Search_name->execute();
// Verificamos se hover um ou mais reultados
if($Search_name->rowCount() >= 1){
	// Caso haja, lançamos um echo...isso serve como resposta ao script js!!
    echo 'Qualquer coisa aqui...';
    // Abaixo encerramos este script!
    exit();
}