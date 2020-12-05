$(document).ready(function () {
                
        $('.content').find('div:eq(0)').addClass('boxMove');
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
            if(scroll>=700 && scroll<1000){
                $('.content').find('div:eq(0)').addClass('boxMove');
            }else if(scroll>=1000 && scroll<1300){
                 $('.content').find('div:eq(1)').addClass('boxMove');
            }else if(scroll>=1300 && scroll<1600){
                 $('.content').find('div:eq(2)').addClass('boxMove');
            }else if(scroll>=1600 && scroll<1900){
                 $('.content').find('div:eq(3)').addClass('boxMove');
            }else if(scroll>=1900 && scroll<2200){
                 $('.content').find('div:eq(4)').addClass('boxMove');
            }else if(scroll>=2200 && scroll<2500){
                 $('.content').find('div:eq(5)').addClass('boxMove');
            }else if(scroll>=2500 && scroll<2800){
                 $('.content').find('div:eq(6)').addClass('boxMove');
            }else if(scroll>=2800 && scroll<3100){
                 $('.content').find('div:eq(7)').addClass('boxMove');
            }else if(scroll>=3100 && scroll<3400){
                 $('.content').find('div:eq(8)').addClass('boxMove');
            }else if(scroll>=3400 && scroll<3700){
                 $('.content').find('div:eq(9)').addClass('boxMove');
            };
        });


    });