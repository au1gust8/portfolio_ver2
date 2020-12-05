<?
	session_start();
    @extract($_GET); 
    @extract($_POST); 
    @extract($_SESSION);  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>한국디자인진흥원 로그인</title>
    <link href="../common/css/common.css" rel="stylesheet">
    <link href="css/log.css" rel="stylesheet">
    
</head>
<body>
    <div id="wrap">
  
	<div id="memberForm">
   <header>
            <div class="headerInner">
                <h1>한국진흥원홈페이지로 돌아가기<a href="../index.html"></a></h1> </div>
        </header>
    <form name="member_form" method="post" action="login.php">
        
        <div id="login_form">
           <h2>로그인</h2>
            <div id="id_pw_input">
               <div class="formbox">
                <ul>
                    <li><label for="id">아이디</label></li>
                    <li>
                        <input type="text" name="id" class="login_input">
                    </li>
                </ul></div>
               <div class="formbox">
                <ul>
                    <li><label for="pass">비밀번호</label></li>
                    <li>
                        <input type="password" name="pass" class="login_input">
                    </li>
                </ul></div>
            </div>
            <div class="btn">
            <input type="submit" value="로그인" class="login">
            <input type="button" onclick="location.href='../member/join.html'" value="회원가입" class="signup">
            
         </div>
        </div>
        
        <!--회원가입 링크넘김 -->
    </form>
	</div> <!-- end of col2 -->
</div> <!-- end of wrap -->

</body>
</html>