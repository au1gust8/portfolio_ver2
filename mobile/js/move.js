// JavaScript Document

$(document).ready(function() {
  var timeonoff; //자동기능 구현
  var imageCount=4;  //이미지 개수 *** 
  var cnt=1;  //이미지 순서 1 2 3 4 5 4 3 2 1 2 3 4 5 ...
  var direct=1;  //1씩 증가(+1)/감소(-1)
  var position=0; //겔러리 무비의 left값 0 -1000 -2000 -3000 -4000
  var onoff=true; // true=>타이머 동작중 , false=>동작하지 않을때
    
     $('.btn1').css('background','#333'); //첫번째 불켜
    $('.btn1').css('width','30');
    
    $('.copy li:eq(0)').fadeIn('slow');

 function moveg(){
      cnt+=direct;  //카운트가 1 2 3 4 5 4 3 2 1 2 3 4 5 ......
	     //각각의 카운트에 대한 left 좌표값을 처리
		if(cnt==1){
		   position=0;  
		}else if(cnt==2){
	       position=-640;
		}else if(cnt==3){
		   position=-1280;
		}else if(cnt==4){
		   position=-1920;
		}
     
        $('.copy li').hide();
        $('.copy li:eq('+ (cnt-1) +')').fadeIn('slow');
                                                
	   for(var i=1;i<=imageCount;i++){
          $('.btn'+i).css('background','#ccc'); //버튼불다꺼!!
         $('.btn'+i).css('width','16'); 
      }
      $('.btn'+cnt).css('background','#333');//자신만 불켜
      $('.btn'+cnt).css('width','30');   
                           
		$('.gallery').animate({left:position}, 'slow'); //겔러리 무비의 left값을 움직여라~
		if(cnt==imageCount)direct=-1;
        if(cnt==1)direct=1;
 }

  timeonoff= setInterval( moveg , 4000); //4초마다 자동기능 

  $('.mbutton').click(function(event){  //각각의 버튼을 클릭한다면...

	var $target=$(event.target); //$target == this =>실제 클릭한 버튼
	clearInterval(timeonoff);   //타이머를 중지!!

	for(var i=1;i<=imageCount;i++){
			  $('.btn'+i).css('background','#ccc'); //버튼 모두불꺼
              $('.btn'+i).css('width','16');
    }

	if($target.is('.btn1')){  //첫번째 버튼을 클릭했다면...
    	   $('.gallery').animate({left:0}, 'slow');
                cnt=1;
                direct=1;
	}else if($target.is('.btn2')){ //두번째 버튼을 클릭했다면...
    	   $('.gallery').animate({left:-320}, 'slow');
                cnt=2;
	}else if($target.is('.btn3')){ //세번째 버튼을 클릭했다면...
    	   $('.gallery').animate({left:-640}, 'slow');
                cnt=3;
	}else if($target.is('.btn4')){  //네번째 버튼을 클릭했다면...
    	   $('.gallery').animate({left:-960}, 'slow');
                cnt=4;
	}
      
    $('.copy li').hide();
    $('.copy li:eq('+ (cnt-1) +')').fadeIn('slow');  
      
      
    $('.btn'+cnt).css('background','#333');//자신 버튼만 불켜 
    $('.btn'+cnt).css('width','30');
      
    timeonoff= setInterval( moveg , 4000);  //타이머의 재 동작
      
    if(onoff==false){
		   onoff=true;
		   $('.ps').css('background','url(images/stop.png)');
     }  
  });
 
  
  });	
  




