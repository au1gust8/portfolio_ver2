<?
   session_start();
   @extract($_POST);
    @extract($_GET);
    @extract($_SESSION);
   //$table, $num , 세션변수

   include "../lib/dbconn.php";

   $sql = "select * from $table where num = $num";
   $result = mysqli_query($sql, $connect);

   $row = mysqli_fetch_array($result);

    //날짜로 되어있는 저장된 파일의 이름을 배열로 저장
   $copied_name[0] = $row[file_copied_0];
   $copied_name[1] = $row[file_copied_1];
   $copied_name[2] = $row[file_copied_2];

   for ($i=0; $i<3; $i++)  //업로든된 파일 삭제
   {
		if ($copied_name[$i])
	   {
			$image_name = "./data/".$copied_name[$i];
			unlink($image_name);
            //unlink(업드로든 파일경로 파일명); => 파일삭제
	   }
   }

   $sql = "delete from $table where num = $num";
   mysqli_query($sql, $connect);

   mysqli_close();

   echo "
	   <script>
	    location.href = 'list.php?table=$table';
	   </script>
	";
?>

