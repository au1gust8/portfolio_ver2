// JavaScript Document

$(document).ready(function(){
  var cnt=$('.tabs h3 .tab').length;  //탭메뉴개수  ***
    //.length를 쓰면 common.js에 넣고 사용가능 (계층,태그 공통으로 맞추고)
    alert(cnt);
  $('.tabs .contlist:eq(0)').show(); //첫번째 내용만 보여라
  $('.tabs .tab1').addClass('on');
  
  $('.tabs .tab').each(function (index) {  // index=> 0 1 2
    $(this).click(function(){   //각각의 탭메뉴를 클릭하면 
	  $('.tabs .contlist').hide(); // 모든 탭내용을 안보이게 한다
	  $('.tabs .contlist:eq('+index+')').show();
	  for(var i=1;i<=cnt;i++){
           $('.tab'+i).removeClass('on');
      }//모든탭메뉴를 비활성화 시켜라
      $(this).addClass('on'); 
   });
  });
});
