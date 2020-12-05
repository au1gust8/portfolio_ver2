<? 
	session_start(); 
    @extract($_POST);
    @extract($_GET);
    @extract($_SESSION);
    //새글쓰기 =>  $table=concert
	include "../lib/dbconn.php";

	if ($mode=="modify") //수정 글쓰기면
	{
		$sql = "select * from $table where num=$num";
		$result = mysqli_query($sql, $connect);
		$row = mysqli_fetch_array($result);       
	
		$item_subject     = $row[subject];
		$item_content     = $row[content];
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
    <title>새글쓰기</title>
    <link href="../common/css/common.css" rel="stylesheet">
    <link href="css/news.css" rel="stylesheet">
    <script>
        function check_input() {
            if (!document.board_form.subject.value) {
                alert("제목을 입력하세요!");
                document.board_form.subject.focus();
                return;
            }

            if (!document.board_form.content.value) {
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
<div id="title_write">
<div class="title_area">
<div class="linemap"><span>KIDP MAIN NEWS</span>&gt;<strong>새글쓰기</strong></div><h3>KIDP MAIN NEWS</h3> </div></div>
<div class="content_write">
<?
	if($mode=="modify")//수정모드일때
	{

?>
    <form name="board_form" method="post" action="insert.php?mode=modify&num=<?=$num?>&page=<?=$page?>&table=<?=$table?>" enctype="multipart/form-data">
<?
	}
	else //새글쓰기일때
	{
?>
    <form name="board_form" method="post" action="insert.php?table=<?=$table?>" enctype="multipart/form-data">
        <!--  enctype="multipart/form-data 이미지, 동영상, 등 큰 데이터를 해결할 때 사용  -->
<?
	}
?>
    <div id="write_form">
        <div class="write_line"></div>
        <div id="write_row1">
            <div class="col1">아이디</div>
            <div class="col2"><?=$userid?></div>
<?
	if( $userid && ($mode != "modify") )
	{   //새글쓰기 에서만 HTML 쓰기가 보인다
?>
                                <div class="col3"><input type="checkbox" name="html_ok" value="y"> HTML 쓰기</div>
                                <?
	}
?>
                            </div>
                            <div class="write_line"></div>
                            <div id="write_row2">
                                <div class="col1"> 제목 </div>
                                <div class="col2"><input type="text" name="subject" value="<?=$item_subject?>"></div>
                            </div>
                            <div class="write_line"></div>
                            <div id="write_row3">
                                <div class="col1"> 내용 </div>
                                <div class="col2"><textarea rows="15" cols="79" name="content"><?=$item_content?></textarea></div>
                            </div>
                            <div class="write_line"></div>
                            <div id="write_row4">
                                <div class="col1"> 이미지파일1 </div>
                                <div class="col2"><input type="file" name="upfile[]"></div>
                            </div>
                            <div class="clear"></div>
                            <? 	if ($mode=="modify" && $item_file_0)
	{
?>
                            <div class="delete_ok"><?=$item_file_0?> 파일이 등록되어 있습니다. <input type="checkbox" name="del_file[]" value="0"> 삭제</div>
                            <div class="clear"></div>
                            <?
	}
?>
                            <div class="write_line"></div>
                            <div id="write_row5">
                                <div class="col1"> 이미지파일2 </div>
                                <div class="col2"><input type="file" name="upfile[]"></div>
                            </div>
                            <? 	if ($mode=="modify" && $item_file_1)
	{
?>
                            <div class="delete_ok"><?=$item_file_1?> 파일이 등록되어 있습니다. <input type="checkbox" name="del_file[]" value="1"> 삭제</div>
                            <div class="clear"></div>
                            <?
	}
?>
                            <div class="write_line"></div>
                            <div class="clear"></div>
                            <div id="write_row6">
                                <div class="col1"> 이미지파일3 </div>
                                <div class="col2"><input type="file" name="upfile[]"></div>
                            </div>
                            <? 	if ($mode=="modify" && $item_file_2)
	{
?>
                            <div class="delete_ok"><?=$item_file_2?> 파일이 등록되어 있습니다. <input type="checkbox" name="del_file[]" value="2"> 삭제</div>
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
            <a href="list.php?table=<?=$table?>&page=<?=$page?>">목록</a></div>
        </div>
     </form>
        </form>
     </div>
</article>
 </div>
      <? include"../common/sub_foot.html" ?>
</body>
</html>