    $(document).ready(function () {
            var th =($('#headerArea').height())+($('.visual').height());
              $('.topMove').hide();
        
        //console.log(th);
        //탑무브숨겨라 또는 css에서 display:none;하고 시작해도 된다
           
        
        //Top기능->commonjs/scrolllTop.js
             $(window).on('scroll',function(){ //scroll event주체: window, window에 만들어지는 event. 윈도우에서 스크롤(의 거리발생)이 조금이라도 움직이면 발생하는 이벤트(스크롤의 거리==scroll Top)
                  var scroll = $(window).scrollTop();
                 //scroll변수에 scrolltop method의 거리값 담김
                 
                  //$('.text').text(scroll);
                  if(scroll>th){ //scrollTop변경. header+visual 높이값
                      /*또는  if(scroll>th){*/
                      $('.topMove').fadeIn('slow');
                  }else{
                      $('.topMove').fadeOut('fast');
                  }
             });
       
             $('.topMove').click(function(){ 
                  //상단으로 스르륵 이동합니다.
                 $("html,body").stop().animate({"scrollTop":0},1000); 
              }); //click event주체==html,body <-scrollTop속성
        
        
       });