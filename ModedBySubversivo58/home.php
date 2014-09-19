<?php
ob_start('ob_gzhandler');
header ('Content-type: text/html; charset=UTF-8');
require "core/securyt_/conn_/connect_db.php";
require "protect.php";

$name = $_SESSION['name_released'];
$password = $_SESSION['password_released'];

$_SESSION['username'] = $name; // Must be already set

$Verific = $pdo->prepare("SELECT * FROM users WHERE `name` = :name AND `password` = :password");
$Verific->bindParam(':name', $_SESSION['name_released'], PDO::PARAM_STR);
$Verific->bindParam(':password', $_SESSION['password_released'], PDO::PARAM_STR);
$Verific->execute();

//Abaixo executamos um laço de repetição para buscarmos informações!!!
while($fetch = $Verific->fetch(PDO::FETCH_ASSOC)){

$name = $fetch['name'];//Adicionamos o nome de usuário a uma variável!
$password = $fetch['password'];//Adicionamos a senha de usuário a uma variável!
$avatar = $fetch['avatar'];//Adicionamos o avatar de usuário a uma variável!
$id = $fetch['id'];
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="utf-8">
<title>Chat</title>
     <meta charset="utf-8">
     <meta name="description" content="Simple Example Chat Style Gmail/Facebook by Original Project Anant Garg">
     <link rel="canonical" href="http://anantgarg.com/2009/05/13/gmail-facebook-style-jquery-chat/">
     <meta name="keywords" content="simple demo chat, gmail/facebook like style chat, developer58, subversivo58, css, jquery, php, html5">
     <meta name="author" content="Lauro Moraes">
     <meta name="reply-to" content="lauromoraes.poa.rs@gmail.com">
     <link rel="shortcut icon" href="core/assets/img/favicon.png"> 
     <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport'>
     <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
     <link href='http://fonts.googleapis.com/css?family=Electrolize' rel='stylesheet' type='text/css' />
<link rel='stylesheet' type="text/css" href="core/assets/css/style.css">
<link type="text/css" rel="stylesheet" media="all" href="core/assets/css/chat.css" />
<link type="text/css" rel="stylesheet" media="all" href="core/assets/css/screen.css" />
<!--[if lte IE 7]>
<link type="text/css" rel="stylesheet" media="all" href="core/assets/css/screen_ie.css" />
<![endif]-->
</head>
<body>
	 <div class="nav">
	     <nav>
	        <?php if(!isset($_SESSION['name_released'])){echo '<a id="link-signup" href="#signup" class="but white fr fa fa-pencil"><i> Register</i></a>';}?>
		      <?php if(!isset($_SESSION['name_released'])){echo '<a id="link-login" href="#login" class="but white fr fa fa-sign-in"><i> Login</i></a>';}?>
          <?php if(isset($_SESSION['name_released'])){echo '<a href="exit.php" class="but white fr fa fa-sign-out"><i> Logout</i></a>';}?>
         <nav>
	 </div>
<div id="main_container"><!-- Div Container !!! -->
<!-- YOUR BODY HERE -->

<div class="list_of_users">
	<div class="header_list_users">
	      <i id="Nusers" class="but orange fl fa fa-group"> Users</i>
	      <i id="hide_list" class="but orange fr fa fa-minus"></i>
	      <i id="show_list" class="but orange fr fa fa-plus"></i>
	</div>
	<div class="content_list">
       <?php

          $Verific = $pdo->prepare("SELECT * FROM users WHERE `name` != :name");
          $Verific->bindParam(':name', $_SESSION['name_released'], PDO::PARAM_STR);
          $Verific->execute();

          //Abaixo executamos um laço de repetição para buscarmos informações!!!
          while($fetch = $Verific->fetch(PDO::FETCH_ASSOC)){

          $nameList = $fetch['name'];//Adicionamos o nome de usuário a uma variável!
          $avatarList = $fetch['avatar'];//Adicionamos o avatar de usuário a uma variável!
          $idList = $fetch['id'];
          
       ?>
       <a href="javascript:void(0)" onclick="javascript:chatWith('<?php echo $nameList;?>')">
           <div class="chat_avatar">
              <img src="<?php echo $avatarList;?>" width="100%" height="100%">
           </div>
           <div class="name_chat_list">Fale com <?php echo $nameList;?></div>
       </a>
       <hr>
       <?php
          }
       ?>
	</div>
</div>


</div><!-- Div Container !!! -->

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script type="text/javascript" src="core/assets/js/chat.js"></script>
<script type="text/javascript" src="core/assets/js/hide_url.js"></script>
</body>
</html>