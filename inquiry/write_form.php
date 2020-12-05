<? 
	session_start(); 
    @extract($_POST);
    @extract($_GET);
    @extract($_SESSION);

	include "../lib/dbconn.php";

	if ($mode=="modify")
	{
		$sql = "select * from $table where num=$num";
		$result = mysqli_query($sql, $connect);
		$row = mysqli_fetch_array($result);       
	
		$item_subject = $row[subject];
		$item_content = $row[content];
		$item_file_0 = $row[file_name_0];
		$item_file_1 = $row[file_name_1];
		$item_file_2 = $row[file_name_2];

		$copied_file_0 = $row[file_copied_0];
		$copied_file_1 = $row[file_copied_1];
		$copied_file_2 = $row[file_copied_2];
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>1:1문의</title>
     <link href="../common/css/common.css" rel="stylesheet">
    <link href="css/inquiry.css" rel="stylesheet">
    <script>
      function check_input()
       {
          if (!document.board_form.subject.value)
          {
              alert("제목을 입력하세요1");    
              document.board_form.subject.focus();
              return;
          }

          if (!document.board_form.content.value)
          {
              alert("내용을 입력하세요!");    
              document.board_form.content.focus();
              return;
          }
          document.board_form.submit();
       }
    </script>   

</head>
    <? include"../common/sub_head.html" ?>
<body>
  
   <div id="wrap">
    
<article id="content">
 <!--sub3_4.html-->    
<div id="title_write">
<div class="title_area">
<div class="linemap"><span>통합디자인민원센터</span>&gt;<strong>1:1문의</strong></div><h3>1:1문의</h3> </div></div>  
  <div class="content_write"> 
<?
	if($mode=="modify")
	{
?>
		<form  name="board_form" method="post" action="insert.php?mode=modify&num=<?=$num?>&page=<?=$page?>&table=<?=$table?>" enctype="multipart/form-data"><?
	}
	else
	{
?>
    <form name="board_form" method="post" action="insert.php?table=<?=$table?>" enctype="multipart/form-data">
        <?
	}
?>
    <div id="write_form">
        <div id="write_row1">
            <div class="col1"> 아이디 </div>
            <div class="col2"><?=$userid?></div>
    <?
    if( $userid && ($mode != "modify"))
    {
    ?>
    <div class="col3">
        <input type="checkbox" name="html_ok" value="y"> HTML 쓰기</div>
    <?
    }
    ?>
        </div>
        <div class="write_line"></div>
        <div id="write_row2">
            <div class="col1"> 제목 </div>
            <div class="col2">
            <input type="text" name="subject" value="<?=$item_subject?>">
            </div>
        </div>
        <div class="write_line"></div>
        <div id="write_row3">
            <div class="col1"> 내용 </div>
            <div class="col2">
        <textarea rows="15" cols="79" name="content"><?=$item_content?></textarea>
            </div>
        </div>
        <div class="write_line"></div>
        <div id="write_row4">
            <div class="col1"> 이미지파일1 </div>
            <div class="col2">
                <input type="file" name="upfile[]">
            </div>
        </div>
        <div class="clear"></div>
        <? 	if ($mode=="modify" && $item_file_0)
    {
    ?>
            <div class="delete_ok">
                <?=$item_file_0?> 파일이 등록되어 있습니다.
                    <input type="checkbox" name="del_file[]" value="0"> 삭제</div>
            <div class="clear"></div>
            <?
    }
    ?>
                <div class="write_line"></div>
                <div id="write_row5">
                    <div class="col1"> 이미지파일2 </div>
                    <div class="col2">
                        <input type="file" name="upfile[]">
                    </div>
                </div>
                <? 	if ($mode=="modify" && $item_file_1)
    {
    ?>
                    <div class="delete_ok">
                        <?=$item_file_1?> 파일이 등록되어 있습니다.
                            <input type="checkbox" name="del_file[]" value="1"> 삭제</div>
                    <div class="clear"></div>
                    <?
    }
    ?>
                        <div class="write_line"></div>
                        <div class="clear"></div>
                        <div id="write_row6">
                            <div class="col1"> 이미지파일3 </div>
                            <div class="col2">
                                <input type="file" name="upfile[]">
                            </div>
                        </div>
                        <? 	if ($mode=="modify" && $item_file_2)
    {
    ?>
                            <div class="delete_ok">
                                <?=$item_file_2?> 파일이 등록되어 있습니다.
                                    <input type="checkbox" name="del_file[]" value="2"> 삭제</div>
                            <div class="clear"></div>
    <?
    }
    ?>
                                <div class="write_line"></div>
                                <div class="clear"></div>
    </div>
           <div id="page_button">
            <div id="button">
               <a href="#" onclick="check_input()">완료</a>
                <a href="list.php?table=<?=$table?>&page=<?=$page?>">목록</a>
            </div></div>
    </form>
        </form>
	</div> <!-- end of col2 -->
       </article> <!-- end of content -->
 <!-- end of wrap -->
    </div>
    <? include"../common/sub_foot.html" ?>
</body>
</html>