$(document).ready(function () {
        
        $('.subNav li:eq(0)').find('a').addClass('spy');
        //첫번째 서브메뉴 활성화 첫번째 li에 자식a찾아 spy클래스준다
        
        $('#content div:eq(0)').addClass('boxMove');
        //첫번째 내용글 애니메이션 처리
        
        var stickyMenuH= $('.visual').height()+$('.sub_nav_box').height()
        +350;

         //스크롤의 좌표가 변하면.. 스크롤 이벤트
        $(window).on('scroll',function(){
            var scroll = $(window).scrollTop();
           
            //스크롤top의 좌표를 담는다

            $('.text').text(scroll);
            //스크롤 좌표의 값을 찍는다.
            
            
            //sticky menu
            if(scroll>stickyMenuH){ 
                $('.navBox').addClass('navOn');
                $('header').hide();
                //스크롤의 거리가 350px 이상이면 서브메뉴 고정
            }else{
                $('.navBox').removeClass('navOn');
                $('header').show();
                //스크롤의 거리가 350px 보다 작으면 서브메뉴 원래 상태로
            }
            
            
            
            $('.subNav li').find('a').removeClass('spy');
            //모든 서브메뉴 비활성화~ 불꺼!!!
            
            
            //스크롤의 거리의 범위를 처리
            if(scroll>=0 && scroll< 1300){
                $('.subNav li:eq(0)').find('a').addClass('spy');
                $('#content .sec1').addClass('boxMove');
            }else if(scroll>=1300 && scroll<2900){
                $('.subNav li:eq(1)').find('a').addClass('spy');
                 $('#content .sec2').addClass('boxMove');
            }else if(scroll>=2900 && scroll<6200){
                $('.subNav li:eq(2)').find('a').addClass('spy');
                 $('#content .sec3').addClass('boxMove');
            }else if(scroll>=6200 && scroll<7100){
                $('.subNav li:eq(3)').find('a').addClass('spy');
                 $('#content .sec4').addClass('boxMove');
            }else if(scroll>=7100 && scroll<8000){
                $('.subNav li:eq(4)').find('a').addClass('spy');
                 $('#content .sec5').addClass('boxMove');
            };
            
        });


    });