<?php
ob_start('ob_gzhandler');
header ('Content-type: text/html; charset=UTF-8');
session_start();
require "core/securyt_/conn_/connect_db.php";

if(isset($_SESSION['name_released']) AND isset($_SESSION['password_released'])){

$Verific = $pdo->prepare("SELECT * FROM users WHERE `name` = :name AND `password` = :password");
$Verific->bindParam(':name', $_SESSION['name_released'], PDO::PARAM_STR);
$Verific->bindParam(':password', $_SESSION['password_released'], PDO::PARAM_STR);
$Verific->execute();

//Abaixo executamos um laço de repetição para buscarmos informações!!!
while($fetch = $Verific->fetch(PDO::FETCH_ASSOC)){

$name = $fetch['name'];//Adicionamos o nome de usuário a uma variável!
$password = $fetch['password'];//Adicionamos a senha de usuário a uma variável!
$avatar = $fetch['avatar'];//Adicionamos o avatar de usuário a uma variável!
$status = $fetch['status'];//Adicionamos o status de usuário a uma variável!
$id = $fetch['id'];
}

}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
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
</head>
<body id="body">
	 <div class="nav">
	     <nav>
	        <?php if(!isset($_SESSION['name_released'])){echo '<a id="link-signup" href="#signup" class="but white fr fa fa-pencil"><i> Register</i></a>';}?>
		      <?php if(!isset($_SESSION['name_released'])){echo '<a id="link-login" href="#login" class="but white fr fa fa-sign-in"><i> Login</i></a>';}?>
          <?php if(isset($_SESSION['name_released'])){echo '<i class="but white fl fa fa-home"><i> Home</i></i>';}?>
          <?php if(isset($_SESSION['name_released'])){echo '<a href="exit.php" class="but white fr fa fa-home"><i> Logout</i></a>';}?>
         <nav>
	 </div>

   <div class="forms">
   <div id="login" class="login"><!-- Login -->

      <a id="link-exit" href="#body" class="but black fa fa-arrow-up abs-frt"></a>
      <br />
      <center><h1>Login</h1></center>

      <form id="form_login" action="core/securyt_/login.php" method="post">
       
          <input class="name_login" type="text" name="name" maxlenght="22" placeholder="Nome"/>
          <br />
          <input class="pass_login" type="password" name="password" maxlenght="22" placeholder="Senha"/>
          <br />
          <center>
          <div class="enter">
              <a class="submit_login but blue fa fa-key" id="submit" onclick="document.getElementById('form_login').submit();"> Login!</a>
          </div>
          </center>
      </form>
   
   </div><!--/ Login -->

   <div class="signup" id="signup"><!-- Signup -->

                 <a id="link-exit" href="#body" class="but black fa fa-arrow-up abs-frt"></a>

                 <center>
                   <h1 class="sig_h1">Registre-se!</h1>             
                 </center> 
               
                 
                 <div class="img_signup"></div>
                 
                 <div class="signup_report" id="status" placeholder="Preencha todos os campos!"></div>
                 <div class="status_ok" id="status_ok"></div>

                 <form id="new_user" method="post" action="javascript:func()">
                                      
   
                        <input class="inp_name" name="name" type="text" id="name" maxlength="22" placeholder="Digite um Nome de Usuário" /><!-- onBlur="alert('Isto é um Blur!')"required pattern="{20}" placeholder="Digite um Nome de Usuário" title="Somente letras são Aceitas!"-->
                        <div class="status_name" id="status_name"></div>

                        <input class="inp_mail" name="mail" type="text" id="mail" placeholder="Digite um E-mail" /><!-- required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" -->
                        <div class="status_mail" id="status_mail"></div>

                        <input class="inp_pass" name="password" type="password" id="password" maxlength="22" placeholder="Digite uma Senha Min.8 e Máx. 20 caracteres"/><!-- pattern="[a-z]{3}[0-9]{4}" title="Min. de 3 caracteres de a-z e 4 de 0-9" -->                                
                        <div class="status_password" id="status_password"></div>

                        <a id="sub_sig" class="sub_sig but blue fa fa-pencil" onclick="document.getElementById('new_user').submit();"> Registrar</a>

                 </form>
                 
                 <div class="terms"><!-- Terms (Terms of Use) -->

                     <center><h3>Termos de Uso.</h3></center>
                     <hr />

                     <p>Os termos a seguir dizem respeito as politicas de uso deste software/site assim como das regras de uso da comunidade e as politicas de privacidade de usuário.</p>

                     <br>
                     <h4><b>Aos termos de uso do software/site:</b></h4>

                     <p>Os termos a seguir se aplicam ao uso do software/site.</p>

                        <br>

                        <p><b>1-</b> Fica o usuário ciente de que este software/site encontra-se no atual estágio de desenvolvimento e que por este motivo eventuais inconsistências podem ocorrer ou se manifestarem sem prévio aviso e sem tempo delimitado para suas correções.</p>
                        
                        <br>

                        <p><b>2-</b> Fica proibida toda e qualquer ação de "hacking" ou "pilshing" que modifiquem ou adulterem este software/site de toda ou qualquer forma e natureza.</p>
                        
                        <br>
                        <br>

                        <h4><b>Regras de uso dos membros:</b></h4>                       
                        <p>As seguintes regras de uso se aplicam a todos os usuários do site.</p>
                        <br>
                        <p><b>1-</b> Não praticar de ofenças verbais, morais ou toda e qualquer forma de descriminação: étinica, de genero, de orientação sexual ou de credo que configurem crime segundo legislação vigente.</p>
                        <br>
                        <p><b>2-</b> Não postar ou compartilhar conteúdo que não seja de sua própria autoria ou que infrinjam direitos autorais ou intelectuais de terceiros.</p>
                        <br>
                        <p><b>3-</b> Não criar conteúdo ou compartilhar material pornografico...em hipótese alguma postar fotos ou links que contenham pornografia e (ou) abuso infantiu. Isto configura crime nos moldes da lei e os autores serão identificados, banidos e denunciados!!!</p>
                        <br>
                        <p><b>4-</b> Não praticar ações de "spamer"! Spamers serão imediatamente excluidos!</p>

                        <br>
                        <br>

                      <h4><b>Politicas de Privacidade:</b></h4>
                      <p>Os termos a seguir se referem as politicas de privacidade dos usuários.</p>
                      <br>
                      <p><b>1-</b> O site declara coletar informações de IP, data e local de acesso de usuários para salvar em um histórico de acesso próprio de cada usuário.</p>
                      <br>
                      <p><b>2-</b> O site declara que informações pessoais do perfil de usuário como nome, login de acesso, senha, e-mail, endereço, telefone que sejam adicionadas ao perfil de usuários são armazenadas de maneira criptografada no Banco de Dados.</p>
                      <br>
                      <p><b>3-</b> O site adverte que no atual estágio de desenvolvimento não recomenda "postar", "guardar" ou "salvar" no site informações ou documentos de senhas de serviços externos, documentos de cunho intimo em geral! Nem em postagens, nem em mensagens!</p>
                      <br>
                      <p><b>4-</b> O site declara não compartilhar suas informações ou imagens com terceiros. Salvo caso onde haja necessidade de força maior em decorrência de ordem judicial (Ex: processos civeis e criminais de queija crime)!</p>


                      <br>
                      <br>
                      <h4><b>Adesão e Registro:</b></h4>
                      <p>Os termos a seguir se referem ao ingresso/registro no site.</p>
                      <br>
                      <p><b>1-</b> O novo usuário/membro declara ao se cadastrar estar ciente da lista completa de termos de uso do software/site! Disponivél em <a href="#" target="blank_">Termos de Uso</a>.</p>
                      <br>
                      <p><b>2-</b> O novo usuário/membro declara ao se cadastrar estar ciente da lista completa de regras de uso da comunidade do site! Disponivél em <a href="#" target="blank_">Regras de Uso</a>.</p>
                      <br>
                      <p><b>3-</b> O novo usuário/membro declara ao se cadastrar estar ciente da lista completa das politicas de privacidade do software/site! Disponivél em <a href="#" target="blank_">Politicas de Privacidade</a>.</p>
                      <br>
                      <p><b>4-</b> O novo usuário/membro declara ter lido e entendido todos os termos, regras e politicas de uso do software/site! E esta pronto para ingressar!</p>
                      <br>

                     <hr />
                     <br>        
                     <center><p><input id="checkbox" type="checkbox" name="accept" value="accept"/> <b>Li e aceito os termos de uso.</b></p></center>
                     <br>
                       
                 </div><!--/ Terms (Terms of Use) -->

                 <div class="alert_signup">
                       <center>
                         Um link de ativação foi enviado para seu e-mail! Verifique-o.
                       <center>

                 </div>

   </div><!--/ Signup -->
   </div><!-- Forms -->
   <div id="masck"></div><!-- Masck -->
   <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
   <!-- Hide URL Script -->
   <script type="text/javascript" src="core/assets/js/hide_url.js"></script>
   <!-- Register user Js!!! -->
   <script type="text/javascript" src="core/assets/js/register.js"></script>
</body>
</html>