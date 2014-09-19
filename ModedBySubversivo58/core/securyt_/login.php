<?php
header ('Content-type: text/html; charset=UTF-8');

require "conn_/connect_db.php";

// A sessão precisa ser iniciada em cada página diferente
if(!isset($_SESSION)){session_start();}  

$crypto_password = base64_encode($_POST['password']);

$Verific = $pdo->prepare("SELECT * FROM users WHERE `name` = :name AND `password` = :password");
$Verific->bindParam(':name', $_POST['name'], PDO::PARAM_STR);
$Verific->bindParam(':password', $crypto_password, PDO::PARAM_STR);
$Verific->execute();

if($Verific->rowCount() >= 1){

//Abaixo executamos um laço de repetição para buscarmos informações!!!
while($fetch = $Verific->fetch(PDO::FETCH_ASSOC)){

$name = $fetch['name'];//Adicionamos o nome de usuário a uma variável!
$password = $fetch['password'];//Adicionamos a senha de usuário a uma variável!
$avatar = $fetch['avatar'];//Adicionamos o avatar de usuário a uma variável!
$status = $fetch['status'];//Adicionamos o status de usuário a uma variável!
}

if($status == 'locked'){

//Aqui lançamos um aviso caso o usuário não tenha os requisitos necessários para usar o sitema
echo "<META HTTP-EQUIV=REFRESH CONTENT='1; URL=../../'>
						<script type=\"text/javascript\">
						 alert(\"YOU IS BLOCKED FOR ADMINISTRATION!!!\");
						</script>";

session_destroy(); // Destrói a sessão limpando todos os valores salvos

exit(); //Paramos o script php e saimos!

}

//Abaixo criamos a sessão baseada no nome, senha, avatar e status do usuário!!!
$_SESSION['name_released'] = $name;
$_SESSION['password_released'] = $password;
$_SESSION['avatar_released'] = $avatar;
$_SESSION['status_released'] = $status;

//Abaixo redirecionamos o usuário de volta a página principal!!!
header("Location: ../../home.php");

}else{
// Caso Nome e Senha não estiverem incorretos, lançamos um alerta e redirecionamos!!!

session_destroy(); // Destrói a sessão limpando todos os valores salvos

//Aqui lançamos um aviso caso o usuário não tenha os requisitos necessários para usar o sitema!!!
echo "<META HTTP-EQUIV=REFRESH CONTENT='1; URL=../../'>
						<script type=\"text/javascript\">
						 alert(\"INVALI NAME OR PASSWORD !!!\");
						</script>";
}

exit(); //Paramos o script php e saimos!