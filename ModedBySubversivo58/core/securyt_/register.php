<?php
header ('Content-type: text/html; charset=UTF-8');

// Incluimos o arquivo de conexão
require "conn_/connect_db.php";

// Recuperamos os valores dos campos através do método POST
$name = $_POST["name"];
$mail = $_POST["mail"];
$password = $_POST["password"];

//Abaixo verificamos se o nome já existe no Banco de Dados!!!   
$Verific_name = $pdo->prepare('SELECT * FROM `users` WHERE `name` = :name');
$Verific_name->bindParam(':name', $_POST['name'], PDO::PARAM_STR);
$Verific_name->execute();
//Caso exista lançamos um echo e saimos do script !!
if($Verific_name->rowCount() >= 1){
    echo '<center>Nome já existente!</center>';
    exit();// Aqui saimos encerrando a execução deste script!!!
}

//Abaixo verificamos se o e-mail já existe no Banco de Dados!!!
$Verific_mail = $pdo->prepare('SELECT * FROM `users` WHERE `mail` = :mail');
$Verific_mail->bindParam(':mail', $_POST['mail'], PDO::PARAM_STR);
$Verific_mail->execute();
//Caso exista lançamos um echo e saimos do script !!!
if($Verific_mail->rowCount() >= 1){
    echo '<center>E-mail já existente!</center>';
    exit();// Aqui saimos encerrando a execução deste script!!!
}

// Verifica se o campo nome não foi enviado vazio!
if(empty($name)){
  echo "<center>Escreva seu nome!</center>";
  exit();
}

// Verifica se o email é válido!
elseif(!preg_match('/^[^@\s]+@([-a-z0-9]+\.)+[a-z]{2,}$/i', $mail)){
  echo "<center>Digite um email válido!</center>";
  exit();
} 

// Verifica se o campo senha não foi enviado vazio!
elseif(empty($password)){
  echo "<center>Digite uma senha!</center>";
  exit();
} 

// Verifica se a senha não foi enviada com menos que 8 carcteres!
elseif(strlen($password) < 8){
  echo "<center>Min. 8 caracteres!</center>";
  exit();
}

// Verifica se a senha não foi enviada com mais que 20 carcteres!
elseif(strlen($password) > 20){
  echo "<center>Máx. 20 caracteres!</center>";
  exit();
} 
//Aqui encriptamos o password com base64 !!!
$crypto_password = base64_encode($password);

// Se todos os requisitos de nome, e-mail e senha foram atendidos e não foi dado nenhum "exit", então gravamos os valores no banco de dados!!!
$stmte = $pdo->prepare("INSERT INTO users (name, mail, password) VALUES (:name, :mail, :password)");
$stmte->bindParam(':name', $name, PDO::PARAM_STR);
$stmte->bindParam(':mail', $mail, PDO::PARAM_STR);
$stmte->bindParam(':password', $crypto_password, PDO::PARAM_STR);
$register = $stmte->execute();

// Se os dados tenham sido gravados nós encerramos o script!!!
if($register){
  exit();// Aqui encerramos o script após a conclusão de gravação!!!  
  
}else{
  // Caso contrário, caso não tenha sidos gravados no Banco de Dados!!
  echo "<center>Erro ao cadastrar!</center>";
  exit();// Saimos!!!
}