$(document).ready(function () {
                
        $('div:eq(0)').addClass('boxMove');
        //첫번째 내용글 애니메이션 처리
        
        var stickyMenuH= $('.visual').height()+$('.sub_nav_box').height()
        +350;

         //스크롤의 좌표가 변하면.. 스크롤 이벤트
        $(window).on('scroll',function(){
            var scroll = $(window).scrollTop();
           
            //스크롤top의 좌표를 담는다

            $('.text').text(scroll);
            //스크롤 좌표의 값을 찍는다.
            
         
            //스크롤의 거리의 범위를 처리
            if(scroll>=400 && scroll<900){
                $('.con0').addClass('boxMove');
            }else if(scroll>=900 && scroll<1500){
                 $('.con1').addClass('boxMove');
            }else if(scroll>=1500 && scroll<3300){
                 $('.con2').addClass('boxMove');
            }else if(scroll>=3300 && scroll<4000){
                 $('.con3').addClass('boxMove');
            };
        });


    });