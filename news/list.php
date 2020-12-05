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
    <title>KIDP MAIN NEWS</title>
    <link rel="stylesheet" href="../common/css/common.css">
    <link rel="stylesheet" href="../sub4/common/css/sub4common.css">
    <link rel="stylesheet" href="css/news.css">

</head>
<? include "../lib/dbconn.php";

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

	$result = mysqli_query($sql, $connect);

	$total_record = mysqli_num_rows($result); // 전체 글 수

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
<? include"../common/sub_head.html" ?>

<body>
<div class="visual"><img src="../sub4/common/images/mainvisualsub.jpg" alt=""><h2>문화확산 및 해외시장</h2></div>
<!--서브네비영역-->
<div class="sub_nav_box">
<div class="subnav"><ul>
<li><a id="nav1" href="../sub4/sub4_1.html">대한민국디자인전람회</a></li>
<li><a id="nav2" href="../sub4/sub4_2.html">한국청소년디자인전람회</a></li>
<li><a id="nav3" href="../sub4/sub4_3.html">디자인코리아</a></li>
<li><a id="nav4" class="current" href="list.php">KIDP MAIN NEWS</a></li>
</ul></div>
</div>
<!--sub3_4.html-->                 
<div id="wrap">
<article id="content">    
<div id="title">
<div class="title_area">
<div class="linemap"><span>문화확산 및 해외시장</span>&gt;<strong>KIDP MAIN NEWS</strong></div><h3>KIDP MAIN NEWS</h3> </div></div> 
   
<div class="content">
<div id="list_top_title">
    <ul>
        <li id="list_title1">OCTOBER 2020</li>
    </ul>
</div>
 <form name="board_form" method="post" action="list.php?table=<?=$table?>&mode=search">
    <div id="list_search">
    <div id="list_search1">전체 <?= $total_record ?> 개의 게시물</div>
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
      mysqli_data_seek($result, $i);       
      // 가져올 레코드로 위치(포인터) 이동  
      $row = mysqli_fetch_array($result);       
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
            <a href="view.php?table=<?=$table?>&num=<?=$item_num?>&page=<?=$page?>"><p><?= $item_subject ?></p>
            <div class="thumimg"><img src="<?=$item_img?>" alt=""></div>
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

    
        
    </div> <!-- end of wrap -->
   
    
    
    
    
    

  
   
</article>
</div>
<? include"../common/sub_foot.html" ?>

</body>
</html>