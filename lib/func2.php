<?
   function latest_article2($table, $loop, $char_limit, $con_limit) 
   {
		include "dbconn.php";

		$sql = "select * from $table order by num desc limit $loop";
		$result = mysqli_query($sql, $connect);

		while ($row = mysqli_fetch_array($result))
		{
			$num = $row[num];
			$len_subject = mb_strlen($row[subject], 'utf-8');
            $len_con = mb_strlen($row[content], 'utf-8');
			$subject = $row[subject];
            $content = $row[content];

			if ($len_subject > $char_limit)
			{
				 $subject = str_replace( "&#039;", "'", $subject);                                       $subject = mb_substr($subject, 0, $char_limit, 'utf-8');
				$subject = $subject."...";
			}
            if ($len_con > $con_limit)
			{
				 $content = str_replace( "&#039;", "'", $content);                                       $content = mb_substr($content, 0, $con_limit, 'utf-8');
				$content = $content."...";
			}

			$regist_day = substr($row[regist_day], 0, 10);

             //목록 이미지 경로 불러오기
			$img_name = $row[file_copied_0];
			if($img_name){
				$img_name = "$table/data/".$img_name;
			}else{
				$img_name = "$table/data/default.jpg"; 
			}


			echo "  

                <li> <a href='$table/view.php?table=$table&num=$num'>
                    <div><img src='$img_name' alt=''></div>
                    <dl>
                        <dt>$subject</dt>
                        <dd>$content</dd>
                    </dl> <span>Read More</span></a>
                </li>

			";
		}
		mysqli_close();
   }
?>


<!--

-->
