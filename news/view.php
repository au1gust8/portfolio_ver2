<? 
	session_start(); 
    @extract($_POST);
    @extract($_GET);
    @extract($_SESSION);

    //table=concert num=1 page=1 이 넘어온다

	include "../lib/dbconn.php";

	$sql = "select * from $table where num=$num";
	$result = mysqli_query($sql, $connect);

    $row = mysqli_fetch_array($result);       
      // 하나의 레코드 가져오기
	
	$item_num     = $row[num];
	$item_id      = $row[id];
	$item_name    = $row[name];
  	$item_nick    = $row[nick];
	$item_hit     = $row[hit];

	$image_name[0]   = $row[file_name_0]; //첨부된 파일의 실제이름
	$image_name[1]   = $row[file_name_1];
	$image_name[2]   = $row[file_name_2];


	$image_copied[0] = $row[file_copied_0]; //테이블에 저장된 가상의 이름
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
	}
	
	for ($i=0; $i<3; $i++) //청부된 이미지 처리를 위한 반복문
	{
		if ($image_copied[$i]) //업로드한 파일이 존재하면 0 1 2
		{
			$imageinfo = GetImageSize("./data/".$image_copied[$i]);
            //GetImageSize(서버에 업로드된 파일 경로 파일명) => 배열 형태의 리턴값     imageinfo[] = 너비,높이,종류 3개종류로 배열로 리턴함 
              // => 파일의 너비와 높이값, 종류
			$image_width[$i] = $imageinfo[0];  //파일너비
			$image_height[$i] = $imageinfo[1]; //파일높이
			$image_type[$i]  = $imageinfo[2];  //파일종류

        if ($image_width[$i] > 785) //이미지의 가로 폭이 785를 넘어가면 width = 785 , 최대값을 지정해준것
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
    <title><?= $item_subject ?></title>
    <link href="../common/css/common.css" rel="stylesheet">
    <link href="css/news.css" rel="stylesheet">
<script>
    function del(href) 
    {
        if(confirm("한번 삭제한 자료는 복구할 방법이 없습니다.\n\n정말 삭제하시겠습니까?")) {
                document.location.href = href;
        }
    }
</script>
</head>
  <? include"../common/sub_head.html" ?>
<body>
 

    <div class="visual_view"><?
	for ($i=0; $i<3; $i++)  //업로드된 이미지를 출력한다
	{
		if ($image_copied[$i])
		{
			$img_name = $image_copied[$i];
			$img_name = "./data/".$img_name; 
             // ./data/2019_03_22_10_07_15_0.jpg
			$img_width = $image_width[$i];
			
			echo "<img src='$img_name'>"."<br><br>";
		}
	}
?></div>
    
<div id="wrap">
<article id="content_view">    
<div id="title">    
<div class="title_area_view">
<div class="linemap_view"><span>문화확산 및 해외시장</span>&gt;<span>KIDP MAIN NEWS</span>&gt;<strong><?= $item_subject ?></strong></div></div> 
   
<div class="content">    
        
		<div id="view_subject"><?= $item_subject ?></div>

		<div id="view_option"><?= $item_id ?> | 조회 : <?= $item_hit ?> | <?= $item_date ?></div>


		<div id="view_content">

			<?= $item_content ?>
		</div>
    <div id="page_button">
    <div id="button">
				<a href="list.php?table=<?=$table?>&page=<?=$page?>">목록</a>&nbsp;
<? 
	if($userid==$item_id)
	{
?>                <div class="adminbtn">
				<a href="write_form.php?table=<?=$table?>&mode=modify&num=<?=$num?>&page=<?=$page?>" class="modify">수정</a><a href="javascript:del('delete.php?table=<?=$table?>&num=<?=$num?>')" class="delete">삭제</a></div>
<?
	}
?>
<? 
	if($userid)
	{
?>
				<a href="write_form.php?table=<?=$table?>" class="write">글쓰기</a>
<?
	}
?>
		</div>
		</div>
		</div>
		</div>
    </article>
    </div>
      <? include"../common/sub_foot.html" ?>

</body>
</html>