<? 
	session_start(); 
     @extract($_POST);
    @extract($_GET);
    @extract($_SESSION);

    //세션변수
    //view.php?num=7&page=1

	include "../lib/dbconn.php";

	$sql = "select * from $table where num=$num";
	$result = mysqli_query($sql, $connect);
    $row = mysqli_fetch_array($result);       
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
	mysqli_query($sql, $connect);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>1:1문의</title>
    <link href="../common/css/common.css" rel="stylesheet">
    <link href="../sub3/common/css/sub3common.css" rel="stylesheet">
    <link href="css/inquiry.css" rel="stylesheet">
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
    <? include "../common/sub_head.html" ?>
<body>
<!--sub3_4.html-->

<!--메인비주얼영역-->
<div class="visual"> <img src="../sub3/common/images/mainvisualsub.jpg" alt=""><h2>통합디자인민원센터</h2> </div>
<!--서브네비영역-->
<div class="sub_nav_box">
    <div class="subnav">
<ul>
    <li><a id="nav1" href="../sub3/sub3_1.html">고객서비스헌장</a></li>
    <li><a id="nav2" href="../sub3/sub3_2.html">핵심서비스이행표준</a></li>
    <li><a id="nav3" href="../sub3/sub3_3.html">고객응대서비스이행표준</a></li>
    <li><a id="nav4" class="current" href="list.php">1:1문의</a></li>
</ul>
    </div>
</div>
           
<div id="wrap">
    
<article id="content">
 <!--sub3_4.html-->    
<div id="title">
<div class="title_area">
<div class="linemap"><span>통합디자인민원센터</span>&gt;<strong>1:1문의</strong></div><h3>1:1문의</h3> </div></div>  
  <div class="content">
     

		<div id="view_comment"> &nbsp;</div>

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
	    $ripple_result = mysqli_query($sql);

		while ($row_ripple = mysqli_fetch_array($ripple_result))
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