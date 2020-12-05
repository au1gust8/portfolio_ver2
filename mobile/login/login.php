<?
           session_start();
?>
<meta charset="utf-8">
<?
   @extract($_GET); 
  @extract($_POST); 
  @extract($_SESSION); 
   // 이전화면에서 이름이 입력되지 않았으면 "이름을 입력하세요"
   // 메시지 출력
   // $id=>입력id값    $pass=>입력 pass
   //$id(post)
   //$password(post)
  

   if(!$id) {   //아무값도 입력되지 않았냐?
     echo("
           <script>
             window.alert('아이디를 입력하세요.');
             history.go(-1);
           </script>
         ");
         exit;
   }

   if(!$pass) {
     echo("
           <script>
             window.alert('비밀번호를 입력하세요.');
             history.go(-1);
           </script>
         ");
         exit;
   }
//null값처리
 

   include "../../lib/dbconn.php";

   $sql = "select * from member where id='$id'";
   $result = mysql_query($sql, $connect); //$id있는지 쿼리문으로 중복검사

   $num_match = mysql_num_rows($result);  //있으면1 없으면null

   if(!$num_match) //해당 검색레코드가 없으면 
   {
     echo("
           <script>
             window.alert('등록되지 않은 아이디입니다.');
             history.go(-1);
           </script>
         ");
    }
    else    //해당 검색레코드가 검색되었으면..
    {
		 $row = mysql_fetch_array($result); //_fetch_array:결과 필드명 불러옴
          //$row[id] ,.... $row[level] //db pw 암호화 안해뒀을 때
         $sql ="select * from member where id='$id' and pass=password('$pass')";
        //암호화해둔 db에 있는 pw와 비교시, 암호화해서 비교
        //id and pw 모두 만족하는 지 검색
         $result = mysql_query($sql, $connect);
         $num_match = mysql_num_rows($result);//있으면 1 없으면 null
     
  

        if(!$num_match)  //적은 패스워드와 디비 패스워드가 같지않을때
        {
           echo("
              <script>
                window.alert('비밀번호가 틀립니다.');
                history.go(-1);
              </script>
           ");

           exit;
        }
        else    //테이블에 저장된 id, pw와 모두 일치한다면
        {
           $userid = $row[id]; //일반변수에 담아둠
		   $username = $row[name];
		   $usernick = $row[nick];
		   $userlevel = $row[level];
  
            
           //세션변수에 id~level 값을 저장한다(로그인상태) 모든 페이지에 로그인 유지되려면 세션변수 생성***.
           $_SESSION['userid'] = $userid;//$_SESSION['userid'] = $row[id];
           $_SESSION['username'] = $username;//$_SESSION['username'] = $row[name];
           $_SESSION['usernick'] = $usernick;//$_SESSION['usernick'] = $row[nick];
           $_SESSION['userlevel'] = $userlevel;//$_SESSION['userlevel'] = $row[level];

           echo("
              <script>
			    alert('로그인이 되었습니다.');
                location.href = '../index.html';
              </script>
           ");
        }
   }          
?>
