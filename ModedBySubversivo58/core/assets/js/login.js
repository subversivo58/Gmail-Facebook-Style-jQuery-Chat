
//Aqui iniciamos nosso script js !!!
$(function($){

       // Função que habilita o envio do formulário de login pelo click no link a !!!
       $('#login a.submit').on('click', function(e){
           e.preventDefault();
           $(this).closest('form').submit();
       });//Fechamos a função!

});//Aqui fechamos a função js aberta no inicio do script!!!