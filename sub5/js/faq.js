// JavaScript Document

 $(document).ready(function () {
	var article = $('.faq .article');//article==모든 li들 타깃의네임이 길면 변수에 담아 컨트롤
	//article.find('.a').slideUp(100); //==css display:none;
	
	$('.faq .article .trigger').click(function(){  
        //각각의 질문을 클릭하면 
	var myArticle = $(this).parents('.article'); 
        //클릭한 해당질문(q)의  li
	
	if(myArticle.hasClass('hide')){ //클릭한 li의 답변이 닫혀있어?  
	    article.find('.a').slideUp(100); //모든li의 a를 닫아라
		article.removeClass('show').addClass('hide'); //show를 hide로
		article.find('span').text('+'); //show를 hide로
        
	    myArticle.removeClass('hide').addClass('show'); //자기만 열리게해라
	    myArticle.find('.a').slideDown(100);  //자손a닫으세요
        myArticle.find('span').text('-');
        
	 } else {  //클릭한 li의 답변이 열려있어?
	   myArticle.removeClass('show').addClass('hide'); //show를 hide로
	   myArticle.find('.a').slideUp(100);  
       myArticle.find('span').text('+');
	}  
  });    
	
	$('.all').toggle(function(){ //모두여닫기
	    article.find('.a').slideDown(100); //모든 li 열어라
	    article.removeClass('hide').addClass('show');
	    article.find('span').text('-');;
        $(this).text('모두닫기 ▲');
	},function(){ 
	    article.find('.a').slideUp(100); //모든 li 닫아라
	    article.removeClass('show').addClass('hide');
	    articlefind('span').text('+');;
        $(this).text('모두열기 ▼');
	});
	
});  