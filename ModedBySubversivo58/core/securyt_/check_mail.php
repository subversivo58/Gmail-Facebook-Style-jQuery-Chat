<?php
// Incluimos o arquivo de conexão
require "conn_/connect_db.php";

// Recuperamos os valores dos campos através do método POST
$mail = $_POST["mail"];

// Preparamos a conexão a tabela usuarios
$Search_email = $pdo->prepare('SELECT * FROM `users` WHERE `mail` = :mail');
// Iniciamos a conexão com o parâmetro vindo pelo método POST
$Search_email->bindParam(':mail', $_POST['mail'], PDO::PARAM_STR);;
// Executamos a conexão
$Search_email->execute();
// Verificamos se hover um ou mais reultados 
if($Search_email->rowCount() >= 1){
	// Caso haja, lançamos um echo...isso serve como resposta ao script js!!!
    echo 'Qualquer coisa aqui...';
    // Abaixo encerramos este script!
    exit();
}