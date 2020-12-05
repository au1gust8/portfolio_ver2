$(document).ready(function() {
   
 	
   $(".menu-trigger").click(function() { //메뉴버튼 클릭시
       
       var documentHeight =  $(document).height();
       //실제 페이지의 높이 = $(document).height();
       $(".box").css('height',documentHeight);
       $("#nav").css('height',documentHeight);
       //반투명박스와 네비의 높이를 실제 페이지의 높이로 바꾸어라   

       $("#nav").animate({right:0,opacity:1}, 'slow');
       $(".box").show();
   });
   
   $(".box,.mclose").click(function() { //닫기버튼 클릭시
     $("#nav").animate({right:'-100%',opacity:1}, 500);
     $(".box").hide();
     $(".menu-trigger span").css('background-color', 'red');
   });
    //2depth 메뉴 교대로 열기 처리 (show/hide대신 변수사용)
    var onoff=[false,false,false,false];//depth개수로 맞춘다
    //onoff[0]=false, onoff[1]=false, onoff[2]=false, onoff[3]=false
    var arrcount=onoff.length; //배열의 방 개수
    
    console.log(arrcount); //방개수맞는지 확인
    
    $('#nav .depth1>a').click(function(){ 
        var ind=$(this).parents('.depth1').index();
        //.depth1>a(메뉴)누르면 li의 순서를 뽑음. 공통class.depth1
        //index는 부모에 가서 잡아야 함. 잡을 것의 부모
        //각 메뉴 클릭시 해당 index를 뽑아낸다 0~5 (n=6)
        console.log(ind);
        
       if(onoff[ind]==false){ //클릭한 메뉴의 서브메뉴 닫혀있으면 
        //$('#gnb .depth1 ul').hide();
        $(this).next('ul').slideDown('slow');//클릭한 메뉴의 다음 ul열어라
        $(this).parents('.depth1').siblings('li').find('ul').slideUp('slow');
         for(var i=0; i<arrcount; i++) onoff[i]=false; 
         onoff[ind]=true; 
           
           $('.depth1 span').text('▼');
           $(this).find('span').text('▲');
            
       }else{
         $(this).next('ul').slideUp('fast'); //아니라면(==열려있으면) 닫아라
         onoff[ind]=false;   
           
           $(this).find('span').text('▼');
       }
    });    
   
  });


