<?php
header ('Content-type: text/html; charset=UTF-8');

$sql = mysql_connect("localhost", "root", "0000") or die ("Falha ao Conetar ao BD / Error !");

$db = mysql_select_db("chat", $sql) or die ("Falha ao Conetar ao BD / Error !");

$name_new_user = $_POST['name'];
$password_new_user = $_POST['password'];

if (empty($_POST['name']) || empty($_POST['password'])) { 

   //Não tem mensagem vindo pelo formulário, não manda nada ao BD e avisa o usuário além de redirecioná-lo para o formulario 
   
	     echo "<META HTTP-EQUIV=REFRESH CONTENT='0; URL=./'>
						<script type=\"text/javascript\">
						 alert(\"Prencha todos os Campos\");
						</script>";
						
						exit();

}

//A função a seguir verifica se o nome vindo do formulário já esta cadastrado no sistema caso não esteja, nós prosseguimos
$list_exist_name = mysql_query("SELECT * FROM users WHERE name = '$name_new_user'");

//Esta função faz a verificação usando mysql num rowls
if(mysql_num_rows($list_exist_name) == 1){

  echo "<META HTTP-EQUIV=REFRESH CONTENT='0; URL=./'>
						<script type=\"text/javascript\">
						 alert(\"Usuário já cadastrado!!!\");
						</script>";
						
						exit();
}else{

//Abaixo temos a função que insere os dados no Banco de Dados na tabela de usuários
$cadastar = mysql_query("INSERT INTO users (name, password) VALUES ('$name_new_user', '$password_new_user')") or die ("FALHA!!!");


//Dizemos agora para o usuário que o cadastro foi realizado e o enviamos de volta a página index.php

	     echo "<META HTTP-EQUIV=REFRESH CONTENT='0; URL=./'>
						<script type=\"text/javascript\">
						 alert(\"Cadastrado com sucesso! Faça login!\");
						</script>";

						exit();


}