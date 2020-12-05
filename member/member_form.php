<? 
	session_start(); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>회원가입</title>
	<link rel="stylesheet" href="../common/css/common.css">
	<link rel="stylesheet" href="css/member_form.css">
	
    <script src="../common/js/jquery-1.12.4.min.js"></script>
	<script src="../common/js/jquery-migrate-1.4.1.min.js"></script>
	<script>
	 $(document).ready(function() {
  
   
 
 //id 중복검사
 $("#id").keyup(function() {    // #id에 키보드 키 한개 누를때마다 실행
    var id = $('#id').val(); //aaa

    $.ajax({
        type: "POST",
        url: "check_id.php", //처리되는 php경로에 data변수 넘김
        data: "id="+ id,  
        cache: false,   //캐시X
        success: function(data) //처리성공(리턴)하면 해당 메소드 실행 반복
        {
             $("#loadtext").html(data);
        }
    });
});		
        
});
	
	
	
	</script>
	<script>
   

  
   function check_input()
   {
      if (!document.member_form.id.value)
      {
          alert("아이디를 입력하세요");    
          document.member_form.id.focus();
          return;
      }

      if (!document.member_form.pass.value)
      {
          alert("비밀번호를 입력하세요");    
          document.member_form.pass.focus();
          return;
      }

      if (!document.member_form.pass_confirm.value)
      {
          alert("비밀번호확인을 입력하세요");    
          document.member_form.pass_confirm.focus();
          return;
      }

      if (!document.member_form.name.value)
      {
          alert("이름을 입력하세요");    
          document.member_form.name.focus();
          return;
      }



      if (!document.member_form.hp2.value || !document.member_form.hp3.value )
      {
          alert("휴대폰 번호를 입력하세요");    
          document.member_form.nick.focus();
          return;
      }

      if (document.member_form.pass.value != 
            document.member_form.pass_confirm.value)
      {
          alert("비밀번호가 일치하지 않습니다.\n다시 입력해주세요.");    
          document.member_form.pass.focus();
          document.member_form.pass.select();
          return;
      }

      document.member_form.submit(); 
		   // insert.php 로 변수 전송
   }

   function reset_form()
   {
      document.member_form.id.value = "";
      document.member_form.pass.value = "";
      document.member_form.pass_confirm.value = "";
      document.member_form.name.value = "";
      document.member_form.hp1.value = "010";
      document.member_form.hp2.value = "";
      document.member_form.hp3.value = "";
      document.member_form.email1.value = "";
      document.member_form.email2.value = "";
	  
      document.member_form.id.focus();

      return;
   }
</script>
</head>
    <? include "../common/sub_head.html" ?>

<body>
    <article id="content">
<!--
        <header>
            <div class="headerInner">
                <h1>한국진흥원홈페이지로 돌아가기<a href="../index.html"></a></h1> </div>
        </header>
-->
       <h2>회원가입</h2>
       <p><span class="astric">*</span>는 필수입력사항입니다.</p>
       <div>
        <form name="member_form" method="post" action="insert.php">
            
               <div class="formbox">
                <ul>
                    <li>
                        <label for="id"><span class="astric">*</span>아이디</label>
                    </li>
                    <li>
                        <input type="text" name="id" id="id" required placeholder="사용할 아이디를 입력해주세요."> <span id="loadtext"></span> </li>
                </ul>
                </div> 
                <div class="formbox">
                <ul>
                    <li>
                        <label for="pass"><span class="astric">*</span>비밀번호</label>
                    </li>
                    <li>
                        <input type="password" name="pass" id="pass" required placeholder="사용할 비밀번호를 입력해주세요."> </li>
                </ul>
                </div>
                <div class="formbox">
                <ul>
                    <li>
                        <label for="pass_confirm"><span class="astric">*</span>비밀번호확인</label>
                    </li>
                    <li>
                        <input type="password" name="pass_confirm" id="pass_confirm" required placeholder="비밀번호 확인을 위해 한 번 더 입력해주세요."></li>
                </ul>
                </div>
                <div class="formbox">
                <ul>
                    <li>
                        <label for="name"><span class="astric">*</span>이름</label>
                    </li>
                    <li>
                        <input type="text" name="name" id="name" required placeholder="이름을 입력하세요."> </li>
                </ul>
                </div>
                <div class="formbox">
                <ul class="hp">
                    <li>
                        <label for="hp"><span class="astric">*</span>휴대폰</label></li>
                    <li>
                        <label class="hidden" for="hp1"><span class="astric">*</span>전화번호앞3자리</label>
                        <select class="hp" name="hp1" id="hp hp1">
                            <option value='010'>010</option>
                            <option value='011'>011</option>
                            <option value='016'>016</option>
                            <option value='017'>017</option>
                            <option value='018'>018</option>
                            <option value='019'>019</option>
                        </select> -
                        <label class="hidden" for="hp2">전화번호중간4자리</label>
                        <input type="text" class="hp" name="hp2" id="hp hp2" required placeholder="1234"> -
                        <label class="hidden" for="hp3">전화번호끝4자리</label>
                        <input type="text" class="hp" name="hp3" id="hp hp3" required placeholder="5678"> </li>
                </ul>
                </div>
                <div class="formbox">
                <ul class="email">
                    <li><label for="email"><span class="astric">*</span>이메일</label></li>
                    <li>
                        <label class="hidden" for="email1">이메일아이디</label>
                        <input type="text" id="email1" name="email1" required placeholder="email"> @
                        <label class="hidden" for="email2">이메일주소</label>
                        <input type="text" name="email2" id="email2" required placeholder="address.com"> </li>
                </ul>
                </div>
                <div class="button">
                   <a href="#" class="join" onclick="check_input()">가입하기</a> <a href="../index.html" class="cancel">취소하기</a> 
                </div>
       
            
        </form>
             </div>
    </article>
    <? include "../common/sub_foot.html" ?>
</body>
</html>


