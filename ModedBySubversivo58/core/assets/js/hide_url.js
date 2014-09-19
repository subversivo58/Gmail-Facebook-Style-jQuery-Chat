
$(document).ready(function(){

// Hide/Un-hide mask !!! ######################################################################
$('html a[id^="link-"]').on('touchstart click', function(ev){
   ev.preventDefault();
   //Criando variáveies para altura e largura!!!
   var Height = $(document).height(); //Altura do Documento (da página)
   var Width = $(document).width();  //Largura do Documento (da página)
  
   //Colocando o fundo preto!!!
   $('#masck').css({'width':Width,'height':Height}); //Aplicando altura e lergura por css
   $('#masck').fadeIn(500); //Definindo tempo de aparição
   $('#masck').fadeTo("fast",0.8); //Deinindo o efeito "fade" e a transparência da mascára!!!
});

// Criando função que esconde a mascára
$('html a[id^="link-exit"]').on('touchstart click', function(ev){
   ev.preventDefault();
   $("#masck").hide(); //Aqui escondemos a mascára!!!
});

// Hide/Un-Hide scroll bar on body !!! ##########################################################
$('html a[id^="link-"]').on('touchstart click', function(e){
   e.preventDefault();
   $('#body').css('overflow-y', 'hidden');

   $('html a[id^="link-exit"]').on('touchstart click', function(e){
      e.preventDefault();
      $('#body').css('overflow-y', 'auto');
   });

});


// Slides of Top !!! ############################################################################
var login = $('.forms .login');
$('html a[id^="link-"]').on('touchstart click', function(e){
   e.preventDefault();
    login.css('margin-top', '-102%');
    var loginID = this.getAttribute('href').substr(1);
    document.getElementById(loginID).style.marginTop = '0%';
});


var signup = $('.forms .signup');
$('html a[id^="link-"]').on('touchstart click', function(e){
   e.preventDefault();
    signup.css('margin-top', '-102%');
    var signupID = this.getAttribute('href').substr(1);
    document.getElementById(signupID).style.marginTop = '0%';
});


$('#hide_list').hide();// Hide buttom hide list on start

var show_list = $('#main_container .list_of_users');
$('#show_list').on('touchstart click', function(e){
   e.preventDefault();
    show_list.css('margin-bottom', '42.5%');

    $('#show_list').hide();
    $('#hide_list').show();
});

var hide_list = $('#main_container .list_of_users');
$('#hide_list').on('touchstart click', function(e){
   e.preventDefault();
    hide_list.css('margin-bottom', '0%');

    $('#show_list').show();
    $('#hide_list').hide();
});






















});
