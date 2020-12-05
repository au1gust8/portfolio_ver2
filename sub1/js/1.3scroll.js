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
            if(scroll>=0 && scroll<800){
                $('.mission').addClass('boxMove');
            }else if(scroll>=800 && scroll<900){
                 $('.vision').addClass('boxMove');
            }else if(scroll>=900 && scroll<1800){
                 $('.goal').addClass('boxMove');
            }else if(scroll>=1800 && scroll<2200){
                 $('.policy').addClass('boxMove');
            }else if(scroll>=2200 && scroll<2600){
                 $('.value').addClass('boxMove');
            }else if(scroll>=2600 && scroll<3100){
                 $('.strategy').addClass('boxMove');
            };
        });


    });