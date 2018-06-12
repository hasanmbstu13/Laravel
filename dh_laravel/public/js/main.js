$( document ).ready(function() {
  var wrapperMenu = document.querySelector('.wrapper-menu');
  wrapperMenu.addEventListener('click', function(){
    wrapperMenu.classList.toggle('open');  
    $('body').toggleClass('open-menu');
  });

  $('.menu li a').hover(function(){
    $(this).parents('li').siblings().find('a').toggleClass('non-active');
  });

  $('.contact-box .form-control').focus(function(){
    $(this).parents('.form-group').toggleClass('effect');
    $(this).parents('.form-group').siblings().removeClass('effect');
  });
  
});
