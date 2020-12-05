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
            if(scroll>=500 && scroll<2000){
                $('.value').addClass('boxMove');
            }else if(scroll>=2000 && scroll<2500){
                 $('.con1').addClass('boxMove');
            }else if(scroll>=2500 && scroll<3400){
                 $('.con2').addClass('boxMove');
            }else if(scroll>=3400 && scroll<3900){
                 $('.environment').addClass('boxMove');
            }else if(scroll>=3900 && scroll<4700){
                 $('.con4').addClass('boxMove');
            }else if(scroll>=4700 && scroll<5500){
                 $('.con5').addClass('boxMove');
            }else if(scroll>=5500 && scroll<6050){
                 $('.con6').addClass('boxMove');
            }else if(scroll>=6050 && scroll<6600){
                 $('.con7').addClass('boxMove');
            };
        });


    });