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
            if(scroll>=600 && scroll<1300){
                $('.cus1').addClass('boxMove');
            }else if(scroll>=1300 && scroll<2200){
                 $('.cus2').addClass('boxMove');
            }else if(scroll>=2200 && scroll<2900){
                 $('.cus3').addClass('boxMove');
            };
        });


    });