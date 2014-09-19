<?php
header ('Content-type: text/html; charset=UTF-8');

$sql = mysql_connect("localhost", "root", "0000") or die ("Falha ao Conetar ao BD / Error !");

$db = mysql_select_db("chat", $sql) or die ("Falha ao Conetar ao BD / Error !");

// A sessão precisa ser iniciada em cada página diferente
if (!isset($_SESSION)) session_start(); 

//Abaixo declaramos que o valor da variavel name sera os dados vindos do formulário!
$name = $_POST['name'];

//Abaixo declaramos que o valor da variavel password sera os dados vindos do formulário e criptografamos com base_64!!!
$password = $_POST['password'];

//Abaixo iniciamos a consulta ao Banco de Dados na tabela de usuários
$sql = mysql_query("SELECT * FROM users WHERE name = '$name' AND password = '$password'");
while($listar = mysql_fetch_array($sql)){
	$my_avatar = $listar['avatar'];
}




//Abaixo criamos a condição if para caso a consulta retorne um ou mais valores!!
if(@mysql_num_rows($sql) == 1){



$_SESSION['name_released'] = $name;
$_SESSION['password_released'] = $password;

header("Location: teste.php");//Redirecionamos o usuário para HOME!
}else{

//Caso haja erro de não correspondência entre nome de usuário e senha lançamos um alerta e redirecionamos para INDEX !!!
echo "<META HTTP-EQUIV=REFRESH CONTENT='1; URL=./'>
						<script type=\"text/javascript\">
						 alert(\"Usuário ou Senha não correspondem, tente novamente !!!\");
						</script>";

//Abaixo apagamos os valores de seção e damos um exit!!!						
unset($_SESSION['name_released']);
unset($_SESSION['password_released']);
exit();
}