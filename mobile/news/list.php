<? 
	session_start(); 
    @extract($_POST);
    @extract($_GET);
    @extract($_SESSION);

	$table = "news";//해당 게시판의 테이블명으로 담아놓고 sql문만 수정한다.
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">
<meta name="format-detection" content="telephone=no">
    <title>KIDP MAIN NEWS</title>
   <link rel="apple-touch-icon-precomposed" href="app_icon.png">
<link rel="apple-touch-startup-image" href="startup.png">
<!--<link rel="stylesheet" href="css/sub1.css">-->
<link rel="stylesheet" href="../css/common.css">    
<link rel="stylesheet" href="../css/sub3.css">    
<link rel="stylesheet" href="css/news.css">    
<script src="js/prefixfree.min.js"></script>
<script>
// <![CDATA[
try {
    window.addEventListener('load', function () {
        setTimeout(scrollTo, 0, 0, 1);
    }, false);
}
catch (e) {}
// ]]>
</script>
<script src="../js/jquery-1.7.1.min.js"></script>
<script src="../js/nav_new.js"></script>
</head>
<? include "../../lib/dbconn.php";

    if (!$scale)
    $scale=10;			// 한 화면에 표시되는 글 수
    
    if ($mode=="search")
	{
		if(!$search)
		{
			echo("
				<script>
				 window.alert('검색할 단어를 입력해 주세요!');
			     history.go(-1);
				</script>
			");
			exit;
		}

		$sql = "select * from $table where $find like '%$search%' order by num desc";
	}
	else
	{
		$sql = "select * from $table order by num desc";
	}

	$result = mysql_query($sql, $connect);

	$total_record = mysql_num_rows($result); // 전체 글 수

	// 전체 페이지 수($total_page) 계산 
	if ($total_record % $scale == 0)     
		$total_page = floor($total_record/$scale);      
	else
		$total_page = floor($total_record/$scale) + 1; 
 
	if (!$page)                 // 페이지번호($page)가 0 일 때
		$page = 1;              // 페이지 번호를 1로 초기화
 
	// 표시할 페이지($page)에 따라 $start 계산  
	$start = ($page - 1) * $scale;      
	$number = $total_record - $start;
?>
<body>
<!--sub3_4.html-->                 
<div id="wrap">
 <div class="box"></div>
<header id="headerArea">
<div class="headerBox">
<h1><a href="../index.html"></a></h1>
<a href="#" class="menuBtn menu-trigger"><span></span><span></span><span></span></a>
<div id="nav">
<nav id="gnb">
<h2 class="hidden">글로벌네비게이션영역</h2>
<ul class="mainMenu">
    <li class="depth1"><a href="#"><span>▼</span> 기관정보 및 사업정보</a>
        <ul>
            <li><a href="../sub1-1.html">인사말</a></li>
            <li><a href="../sub1-2.html">기관역사</a></li>
            <li><a href="../sub1-3.html">경영목표·비전</a></li>
        </ul>
    </li>
    <li class="depth1"><a href="#"><span>▼</span> 디자인의 사회적 가치</a>
        <ul>
            <li><a href="../sub2-1.html">추진체계</a></li>
            <li><a href="../sub2-2.html">전략과제 및 추진활동</a></li>
        </ul>
    </li>
    <li class="depth1"><a href="#"><span>▼</span> 통합 디자인 민원센터</a>
        <ul>
            <li><a href="../sub3-1.html">핵심서비스 이행표준</a></li>
            <li><a href="list.php">KIDP Main News</a></li>
        </ul>
    </li>
    <li class="depth1"><a href="#"><span>▼</span> 문화확산 및 해외시장</a>
        <ul>
            <li><a href="../sub4-1.html">대한민국디자인전람회</a></li>
            <li><a href="../inquiry/list.php">1:1문의</a></li>
        </ul>
    </li>
</ul>
<!--<a class="mclose" href="#"></a>-->
</nav>
<ul class="join"> <?
if(!$userid) 
{
?>
<li><a href="../login/login_form.php">로그인</a></li>
<li><a href="../member/join.html">회원가입</a></li>
<?
}
else
{
?>
<li><a href="../login/logout.php">로그아웃</a></li>
<li><a href="../login/member_form_modify.php">정보수정</a></li>
<?
}
?>
</ul>
</div>
</div>
</header>
<div id="skipNav"><a href="#content">본문바로가기</a><a href="#gnb">네비게이션바로가기</a> </div>

<div class="visual visual3">
<h2>통합디자인민원센터</h2>
</div>
<div class="sub_nav_box">
 <div class="subnav">
    <ul>
        <li><a id="nav1" href="../sub3-1.html">핵심서비스이행표준</a></li>
        <li><a id="nav2" href="list.php" class="current">KIDP Main News</a></li>
    </ul>
</div>
</div> 

<article id="content">    
   
<div class="content">
<div id="list_top_title">
    <ul>
        <li id="list_title1">OCTOBER 2020</li>
    </ul>
</div>
 <form name="board_form" method="post" action="list.php?table=<?=$table?>&mode=search">
    <div id="list_search">
    <div id="list_search1">TOTAL<?= $total_record ?></div>
        <div id="list_search2">
         <select name="scale" onchange="location.href='list.php?scale='+this.value">
            <option value=''>보기</option>
            <option value='1'>10</option>
            <option value='2'>15</option>
            <option value='3'>20</option>
            <option value='4'>30</option>
        </select>
        </div>
    <div id="list_search3">
        <select name="find">
            <option value='subject'>제목</option>
            <option value='content'>내용</option>
            <option value='id'>아이디</option>
            <option value='name'>이름</option>
        </select></div>
    <div id="list_search4"><input type="text" name="search"></div>
    <div id="list_search5"><input type="submit" value="검색"></div>
</div>
</form>

<div class="clear"></div>


<div id="list_content">
<?		
   for ($i=$start; $i<$start+$scale && $i < $total_record; $i++)                    
   {
      mysql_data_seek($result, $i);       
      // 가져올 레코드로 위치(포인터) 이동  
      $row = mysql_fetch_array($result);       
      // 하나의 레코드 가져오기
	
	  $item_num     = $row[num];
	  $item_id      = $row[id];
	  $item_name    = $row[name];
	  $item_hit     = $row[hit];
      $item_date    = $row[regist_day];
	  $item_date = substr($item_date, 0, 10);  
	  $item_subject = str_replace(" ", "&nbsp;", $row[subject]);
      if($row[file_copied_0]){ //배열에 인덱스0에 값이 있다면 (파일이 있다면)
        $item_img = 'data/'.$row[file_copied_0];  
      }else{ //첨부된 이미지가 없으면
        $item_img = 'data/default.jpg'  ;
      }
      
?>
<div id="list_item">
    <div id="list_item1"><span><?= $number ?></span></div>
    <div id="list_item2">
            <a href="view.php?table=<?=$table?>&num=<?=$item_num?>&page=<?=$page?>"> <div class="thumimg"><img src="<?=$item_img?>" alt=""></div><p><?= $item_subject ?></p>
            <!--		 변수에 이미지 담겨있으면 src에 이미지가 출력된다.-->
            </a>
    </div>
    <div id="list_item3"><?= $item_id ?>&nbsp; |&nbsp; </div> &nbsp;<div id="list_item4"><?= $item_date ?>&nbsp; |&nbsp;</div> <div id="list_item5"><?= $item_hit ?></div>
</div>
<?
   	   $number--;
   }
?>
                    <div id="page_button">
                        <div id="page_num"> ◀  &nbsp;&nbsp;&nbsp;&nbsp;
                            <?
   // 게시판 목록 하단에 페이지 링크 번호 출력
   for ($i=1; $i<=$total_page; $i++)
   {
		if ($page == $i)     // 현재 페이지 번호 링크 안함
		{
			echo "<b> $i </b>";
		}
		else
		{ 
            
          if($mode=="search"){
             echo "<a href='list.php?page=$i&scale=$scale&mode=search&find=$find&search=$search'> $i </a>"; 
          }else{    
            
			  echo "<a href='list.php?page=$i&scale=$scale'> $i </a>";
           }
            
          
		}      
   }
?>
            &nbsp;&nbsp;&nbsp;&nbsp; ▶
        </div>
        <div id="button">
            <a href="list.php?table=<?=$table?>&page=<?=$page?>">목록</a>
            <? 
	if($userid==$item_id)
 	{
?>
    <a href="write_form.php?table=<?=$table?>">글쓰기</a>
    <?
	}
?>
            </div>
        </div> <!-- end of page_button -->
    </div> <!-- end of list content -->
    <div class="clear"></div>

    
        
    </div> <!-- end of .content -->
   
</article>
<? include "../foot.html" ?>
</div>
</body>
</html>