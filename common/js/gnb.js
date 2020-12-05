   $(document).ready(function () {
       $('ul.dropdownmenu').hover(function () {
           $(this).parents('#headerArea').stop().animate({
               height: 500
           }, 'fast');
           $('ul.dropdownmenu li.menu ul').stop().fadeIn('slow').css('opacity','1');

       }, function () {
           
           $(this).parents('#headerArea').stop().animate({
               height: 200
           }, 'fast');
           $('ul.dropdownmenu li.menu ul').stop().fadeOut('slow');
       });




       //tab키처
       $('ul.dropdownmenu li.menu .depth1').on('focus', function () {
           $('ul.dropdownmenu li.menu ul').slideDown('slow');
           $('.menu_box').slideDown('fast');
       });

       $('ul.dropdownmenu li.m6 li:last').find('a').on('blur', function () {
           $('ul.dropdownmenu li.menu ul').slideUp('slow');
           $('.menu_box').slideUp('fast');
       });

   });
