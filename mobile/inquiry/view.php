<? 
	session_start(); 
     @extract($_POST);
    @extract($_GET);
    @extract($_SESSION);

    //세션변수
    //view.php?num=7&page=1

	include "../../lib/dbconn.php";

	$sql = "select * from $table where num=$num";
	$result = mysql_query($sql, $connect);
    $row = mysql_fetch_array($result);       
      // 하나의 레코드 가져오기
	
	$item_num     = $row[num];
	$item_id      = $row[id];
	$item_name    = $row[name];
	$item_hit     = $row[hit];
    $image_name[0]   = $row[file_name_0];
	$image_name[1]   = $row[file_name_1];
	$image_name[2]   = $row[file_name_2];
	$image_copied[0] = $row[file_copied_0];
	$image_copied[1] = $row[file_copied_1];
	$image_copied[2] = $row[file_copied_2];
    $item_date    = $row[regist_day];

	$item_subject = str_replace(" ", "&nbsp;", $row[subject]);

	$item_content = $row[content];
	$is_html      = $row[is_html];

	if ($is_html!="y")
	{
		$item_content = str_replace(" ", "&nbsp;", $item_content);
		$item_content = str_replace("\n", "<br>", $item_content);
	}	if($is_html!="y"){
        $item_content = str_replace("&lt", "<", $item_content);
		$item_content = str_replace("&gt", ">", $item_content);
    }

	for ($i=0; $i<3; $i++)
	{
		if ($image_copied[$i]) 
		{
			$imageinfo = GetImageSize("./data/".$image_copied[$i]);
			$image_width[$i] = $imageinfo[0];
			$image_height[$i] = $imageinfo[1];
			$image_type[$i]  = $imageinfo[2];

			if ($image_width[$i] > 785)
				$image_width[$i] = 785;
		}
		else
		{
			$image_width[$i] = "";
			$image_height[$i] = "";
			$image_type[$i]  = "";
		}
	}
	$new_hit = $item_hit + 1;

	$sql = "update $table set hit=$new_hit where num=$num";   // 글 조회수 증가시킴
	mysql_query($sql, $connect);
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">
<meta name="format-detection" content="telephone=no">
    <title>1:1문의</title>
    <link href="../css/common.css" rel="stylesheet">
    <link href="../css/sub4.css" rel="stylesheet">
    <link href="css/inquiry.css" rel="stylesheet">
    <link rel="apple-touch-icon-precomposed" href="app_icon.png">
<link rel="apple-touch-startup-image" href="startup.png">
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
    <script>
	function check_input()
	{
		if (!document.ripple_form.ripple_content.value)
		{
			alert("내용을 입력하세요!");    
			document.ripple_form.ripple_content.focus();
			return;
		}
		document.ripple_form.submit();
    }

    function del(href) 
    {
        if(confirm("한번 삭제한 자료는 복구할 방법이 없습니다.\n\n정말 삭제하시겠습니까?")) {
                document.location.href = href;
        }
    }
</script>

</head>
<body>
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
            <li><a href="../news/list.php">KIDP Main News</a></li>
        </ul>
    </li>
    <li class="depth1"><a href="#"><span>▼</span> 문화확산 및 해외시장</a>
        <ul>
            <li><a href="../sub4-1.html">대한민국디자인전람회</a></li>
            <li><a href="list.php">1:1문의</a></li>
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
<h2>디자인전람회</h2>
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
		<div id="view_title">
			<div id="view_title1"><?= $item_subject ?></div>
           <div id="view_title2"><?= $item_id ?> | 조회 : <?= $item_hit ?> | <?= $item_date ?> </div>	
		</div>

			<div id="view_content">
<?
	for ($i=0; $i<3; $i++)
	{
		if ($image_copied[$i])
		{
			$img_name = $image_copied[$i];
			$img_name = "./data/".$img_name;
			$img_width = $image_width[$i];
			
			echo "<img src='$img_name' width='$img_width'>"."<br><br>";
		}
	}
?>
			<?= $item_content ?>
		</div>
	<div id="ripple">
<?
	    $sql = "select * from inquiry_ripple where parent='$item_num'";
	    $ripple_result = mysql_query($sql);

		while ($row_ripple = mysql_fetch_array($ripple_result))
		{
			$ripple_num     = $row_ripple[num];
			$ripple_id      = $row_ripple[id];
			$ripple_content = str_replace("\n", "<br>", $row_ripple[content]);
			$ripple_content = str_replace(" ", "&nbsp;", $ripple_content);
			$ripple_date    = $row_ripple[regist_day];
?>
			<div id="ripple_writer_title">
			<ul>
			<li id="writer_title1"><?=$ripple_id?></li>
			<li id="writer_title2"><?=$ripple_date?></li>
			<li id="writer_title3"><? if($userid=="helle" || $userid==$ripple_id)   echo "<a href='delete_ripple.php?table=$table&num=$item_num&ripple_num=$ripple_num'>[삭제]</a>"; 
			  ?>
			</li>
			</ul>
			</div>
			<div id="ripple_content"><?=$ripple_content?></div>
			<div class="hor_line_ripple"></div>
<?
		}
?>			
			<form  name="ripple_form" method="post" action="insert_ripple.php?table=<?=$table?>&num=<?=$item_num?>">  
			<div id="ripple_box">
				<div id="ripple_box1"><textarea rows="5" cols="65" name="ripple_content"></textarea>
				</div>
				<div id="ripple_box2"><a href="#" onclick="check_input()">댓글등록</a></div>
			</div>
			</form>
		</div> <!-- end of ripple -->
		<div id="page_button">
		<div id="button">
				<a href="list.php?table=<?=$table?>&page=<?=$page?>">목록</a>&nbsp;
<? 
	if($userid==$item_id)
	{
?>  <div class="adminbtn">
				<a href="write_form.php?table=<?=$table?>&mode=modify&num=<?=$num?>&page=<?=$page?>" class="modify">수정</a>
            <a href="javascript:del('delete.php?table=<?=$table?>&num=<?=$num?>')" class="delete">삭제</a></div>
<?
	}
?>
<? 
	if($userid)  //로인인이 되면 글쓰기
	{
?>
				<a href="write_form.php?table=<?=$table?>">글쓰기</a>
<?
	}
?>
		</div></div>

		<div class="clear"></div>

	</div> 
  </article>
  </div> <!-- end of wrap -->   
     <? include "../common/sub_foot.html" ?>
</body>
</html>