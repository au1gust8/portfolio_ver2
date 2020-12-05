
$(document).ready(function() {
	$('.select01 .arrow01').click(function(){
		$('.select01 .aList01').show();			  
	});
	$('.select01 .aList01').mouseleave(function(){
		$(this).hide();			  
	});
	//tab키 처리
	  $('.select01 .arrow01').bind('focus', function () {        
              $('.select .aList').show();	
       });
       $('.select01 .aList01 li:last').find('a').bind('blur', function () {        
              $('.select01 .aLis01t').hide();
       });  
});


$(document).ready(function() {
	$('.select02 .arrow02').click(function(){
		$('.select02 .aList02').show();			  
	});
	$('.select02 .aList02').mouseleave(function(){
		$(this).hide();			  
	});
	//tab키 처리
	  $('.select02 .arrow02').bind('focus', function () {        
              $('.select02 .aList02').show();	
       });
       $('.select02 .aList02 li:last').find('a').bind('blur', function () {        
              $('.select02 .aList02').hide();
       });  
});


$(document).ready(function() {
	$('.select03 .arrow03').click(function(){
		$('.select03 .aList03').show();			  
	});
	$('.select03 .aList03').mouseleave(function(){
		$(this).hide();			  
	});
	//tab키 처리
	  $('.select03 .arrow03').bind('focus', function () {        
              $('.select03 .aList03').show();	
       });
       $('.select03 .aList03 li:last').find('a').bind('blur', function () {        
              $('.select03 .aList03').hide();
       });  
});
