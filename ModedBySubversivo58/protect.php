<?php

if (!isset($_SESSION)) session_start();

//Abaixo fazemos a verificação se o usuário tem sessão iniciada e se ele atende aos requisitos da sessão!
if(!isset($_SESSION['name_released'])){

//Aqui lançamos um aviso caso o usuário não tenha os requisitos necessários para usar o sitema
echo "<META HTTP-EQUIV=REFRESH CONTENT='1; URL=./'>
						<script type=\"text/javascript\">
						 alert(\"SEM PRIVILEGIOS PARA ACESSAR ESTA PAGINA !!!\");
						</script>";

unset($_SESSION['name_released']);

exit();

}
