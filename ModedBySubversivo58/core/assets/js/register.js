//Aqui iniciamos nosso script js !!!
$(function($){
//#################################################################################################################################################

       //Abaixo a função que mostra ou esconde o botão cadatrar conforme a marcação de aceitação dos termos de uso!!!
       $("#checkbox").click(function(){
           //Se o botão de aceitação dos termos de uso foi marcado...
           if($(this).is(':checked')){
               $("#sub_sig").show();//Mostra o botão de cadastro!

           //Do contrário (caso não tenha sido marcado)...
           }else{
               $("#sub_sig").hide();//Esconde o botão de adastro!
           }//Fechamos o else!
       });//Aqui fechamos a função!!!
//#######################################################################################################################

       // Função que habilita o envio do formulário pelo click no linka a !!!
       $('#new_user a.sub_sig').on('click', function(e){
           e.preventDefault();
           $(this).closest('form').submit();
       });//Fechamos a função!
//#######################################################################################################################

       // Quando o formulário for enviado, essa função é chamada para enviar os dados a página de cadastro!!!
       $("#new_user").submit(function(){
           // Colocamos os valores de cada campo em uma váriavel para facilitar a manipulação
           var name = $("#name").val();
           var mail = $("#mail").val();
           var password = $("#password").val();
           // Exibe mensagem de carregamento
           $("#status").html("<center><img src='core/assets/img/loader.gif' alt='Enviando'/></center>");
           // Fazemos a requisão ajax com o arquivo register.php e enviamos os valores de cada campo através do método POST
           $.post('core/securyt_/register.php', {name: name, mail: mail, password: password }, function(resposta){
                // Quando terminada a requisição
                // Exibe a div status
                $("#status").slideDown();
                // Se a resposta é um erro
                if (resposta != false) {
                      // Exibe o erro na div status!!!
                      $("#status").html("<center>Preencha todos os campos!</center>");
                      $("#status").css({"background": "white"});

            
                // Se resposta for false, ou seja, não ocorreu nenhum erro, exibe mensagem de sucesso!!!
                }else{
                      //Abaixo exibimos mensagem de sucesso, imagem de "ok" e adicionamos uma borda a div status!!!
                      $("#status").html("<center>Cadastro realizado com sucesso!</center>");
                      $("#status_ok").html("<img src='core/assets/img/icons/yes.png' width='100%' height='100%'/>");
                      $("#status").css({"border": "2px solid green"});
                      // Em segida limpamos todos os campos!!!
                      $('#new_user')[0].reset();//Aqui resetamos os campos do formulário
                      $("#status_name").html("");//Aqui limpamos o diálogo da caixa de status
                      $("#name").css({"border": "none"});//Aqui limpamos o css anteriormente aplicado!
                      $("#status_mail").html("");//Aqui limpamos o diálogo da caixa de status
                      $("#mail").css({"border": "none"});//Aqui limpamos o css anteriormente aplicado!
                      $("#status_password").html("");//Aqui limpamos o diálogo da caixa de status
                      $("#password").css({"border": "none"});//Aqui limpamos o css anteriormente aplicado!
                      //Aqui escondemos o formulário de cadastro!!!
                      $("#new_user").toggle("slow");
                      //Aqui escondemos o formulário de cadastro!!!
                      $(".sig_h1").toggle("slow");
                      //Aqui escondemos o campo termo de cadastro!!!
                      $(".terms").toggle("slow");
                      $(".img_signup").css({"left": "38%"});//Aqui limpamos o css anteriormente aplicado!
                      $(".signup_report").css({"left": "30%", "top": "45%"});//Aqui limpamos o css anteriormente aplicado!
                      $(".status_ok").css({"left": "70%", "top": "45%"});//Aqui limpamos o css anteriormente aplicado!
                      //Aqui mostramos o botão para Login!!!
                      $(".alert_signup").show("slow");
                }//Aqui fechamos o else de caso a resposta seja false!!!
           });//Aqui fechamos a função que verifica  a resposta vinda da página de verificação!!!
       });//Aqui fechamos a função de verificação de e-mail!!!
//######################################################################################################################

       // Abaixo a função que verifica disponibilidade do nome assim que o usuário sai da área de seleção !!! 
       $("#name").blur(function(){ 
            //Abaixo fazemos a verificação se o campo nome esta vazio!!!
            if($(this).val() == ""){
                  //Caso estaja vazio mostramos imagem de falha, adiconamos borda vermelha e exibimos mensagem!
                  $("#status_name").html("<img src='core/assets/img/icons/not.png' width='100%' height='100%'/>");
                  $("#name").css({"border": "2px solid red"});
                  $("#status").css({"background": "white"});
                  $("#status").html("<center>Campo <b>Nome</b> é Obrigatório!</center>"); 
            //Caso contrário, caso não estaja vazio...
            }else{
                  //Pegamos o que o usuário digitou no campo e salvamos em uma variável!!!
                  var name = $("#name").val();
                  //Enviamos o que o usuário digitou para a página de verficação...
                  $.post('core/securyt_/check_name.php', {name: name}, function(resposta){
                        // Quando terminado a verificcação...
                        $("#status").slideDown();
                        // Se a resposta é um erro (caso já haja um nome igual cadastrado)
                        if (resposta != false){
                              // Exibimos o erro na div status!!!
                              $("#status_name").html("<img src='core/assets/img/icons/not.png' width='100%' height='100%'/>");
                              $("#name").css({"border": "2px solid red"});
                              $("#status").css({"background": "white"});
                              $("#status").html("<center>Já existe <b>"+ name +"</b> no sistema!</center>");
                        // Se resposta for false, ou seja, não ocorreu nenhum erro...
                        }else{
                              // Exibimos mensagem de sucesso na div status!!!
                              $("#status").css({"background": "white"});
                              $("#status").html("<center>Nome <b>"+ name + "</b> Disponível!</center>");
                              $("#status_name").html("<img src='core/assets/img/icons/yes.png' width='100%' height='100%'/>");
                              $("#name").css({"border": "2px solid green"});
                        }//Aqui fechamos o else da verificação de nome!
                  });//Aqui fechamos função que verifica resposta da página de verificação de nome!!!
            }//Aqui fechamos o else aberto quando o campo nome não esteja vazio!!!
       });//Aqui fechamos a função de verificação de nome!!!
//########################################################################################################################

       // Abaixo a função que verifica disponibilidade do e-mail assim que o usuário sai da área de seleção !!! 
       $("#mail").blur(function(){
            //Abaixo verificamos se o campo de e-mail foi enviado vazio!!!
            if($(this).val() == ""){
                  //Caso esteja vazio lançamos alerta e exibimos imagem de falha assim como adiconamos borda vermelha!
                  $("#status_mail").html("<img src='core/assets/img/icons/not.png' width='100%' height='100%'/>");
                  $("#mail").css({"border": "2px solid red"});
                  $("#status").css({"background": "white"});
                  $("#status").html("<center>Campo <b>E-mail</b> é Obrigatório !</center>"); 
            //CCaso contrário, caso haja conteúdo...
            }else{
                  //Abaixo pegamos o valor do campo e-mail e guardamos em uma variavel!
                  var mail = $("#mail").val();
                 
                  //Abaixo criamos a variavel que será usada para validar e-mail! Ela verifica se os caracteres correspondem as expressões normais de um e-mail!!!
                  var ValidaMail = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
                  //Aqui realizamos a verificação e caso o e-mail não seja válido....
                  if(!ValidaMail.test(mail)){
                        //Caso não seja válido lançamos um alerta!!!
                        $("#status_mail").html("<img src='core/assets/img/icons/not.png' width='100%' height='100%'/>");
                        $("#mail").css({"border": "2px solid red"});
                        $("#status").css({"background": "white"});
                        $("#status").html("<center>E-mail inválido!</center>");
                  //Do contrário, caso o e-mail esteja regular....
                  }else{
                        //Enviamos o valor digitado pelo usuário para a página de verificação!!!
                        $.post('core/securyt_/check_mail.php', {mail: mail}, function(resposta){
                              // Quando terminado a verificcação...
                              $("#status").slideDown();
                              // Se a resposta é um erro (caso já haja um e-mail igual cadastrado)
                              if (resposta != false) {
                                    // Exibe o erro na div status!
                                    $("#status_mail").html("<img src='core/assets/img/icons/not.png' width='100%' height='100%'/>");
                                    $("#mail").css({"border": "2px solid red"});
                                    $("#status").css({"background": "white"});
                                    $("#status").html("<center>Este e-mail já esta cadastrado!</center>");
                              // Se resposta for false, ou seja, não ocorreu nenhum erro
                              }else{
                                    // Exibe mensagem de sucesso na div status!
                                    $("#status").css({"background": "white"});
                                    $("#status").html("<center>E-mail disponível para cadastro!</center>");
                                    $("#status_mail").html("<img src='core/assets/img/icons/yes.png' width='100%' height='100%'/>");
                                    $("#mail").css({"border": "2px solid green"});
                              }//Aqui encerramos o else caso não haja e-mail igual cadastrado!
                        });//Aqui fechamos a função que analiza resposta da página de verificação de e-mail!
                  }//Fechamos o else de validação
            }//Aqui fechamos o else aberto caso o campo e-mail não esteja vazio!!!
       });//Aqui fechamos a função de verificação de e-mail!!!
//##########################################################################################################################################################################

       // Abaixo a função que verifica se os requisitos minimos e máximos de caracteres foram inseridos no campo senha assim que o usuário sai da área de inserção !!! 
       $("#password").blur(function(){
             //Aqui verificamos se o campo de senha esta vazio!!!
             if ($(this).val() == ""){
                //Caso esteja vazio laçamos alerta!!!
                 $("#status_password").html("<img src='core/assets/img/icons/not.png' width='100%' height='100%'/>");
                 $("#password").css({"border": "2px solid red"});
                 $("#status").css({"background": "white"});
                 $("#status").html("<center>Campo <b>Senha</b> é Obrigatório !</center>"); 
             //Caso contrário (caso não esteja vazio) continuamos o script...
             }else{
                 //Aqui aramzenamos o que foi digitado pelo usuário em uma variável!!!
                 var password = $("#password").val();
                 //Abaixo verificamos se o número de caracteres é menor que 8!!!
                  if(this.value.length < 8){
                          //Constatado que tem menos que 8 caracteres, lançamos um alerta de falha!!!
                          $("#status_password").html("<img src='core/assets/img/icons/not.png' width='100%' height='100%'/>");
                          $("#password").css({"border": "2px solid red"});
                          $("#status").css({"background": "white"});
                          $("#status").html("<center>Min. 8 caracteres!</center>");
                  //Caso contrário...
                  }else{
                          //Caso tenha mais de 8 caracteres, lançamos alerta de "ok"!!!
                          $("#status_password").html("<img src='core/assets/img/icons/yes.png' width='100%' height='100%'/>");
                          $("#password").css({"border": "2px solid green"});
                          $("#status").css({"background": "white"});
                          $("#status").html("<center>Min. de 8 caracteres OK!</center>");
                  }//Aqui fechamos o else de caso haja mais de 8 caracteres digitdos!
                  //Agora abaixo verificamos se o usuário digitou mais de 20 caracteres!!!
                  if(this.value.length > 20){
                          //Caso tenha sido digitado mais de 20 caracteres, lançamos um alerta de falha!!!
                          $("#status_password").html("<img src='core/assets/img/icons/not.png' width='100%' height='100%'/>");
                          $("password").css({"border": "2px solid red"});
                          $("#status").css({"background": "white"});
                          $("#status").html("<center>Máx. 20 caracteres!</center>");
                  }//Aqui encerramos o if da verificação de caracteres máximos permitidos!
             }//Aqui fechamos o else aberto quando o campo senha tenha conteúdo!!!
       });//Aqui fechamos a função de verificação de caracteres minimos e máximos permitidos!!!
//#####################################################################################################################################################################


});//Aqui fechamos a função js aberta no inicio do script!!!