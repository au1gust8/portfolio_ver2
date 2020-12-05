<?
    session_start();
    @extract($_POST);
    @extract($_GET);
    @extract($_SESSION);
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <title>회원정보수정</title>
        <link href="../common/css/common.css" rel="stylesheet">
        <link href="css/modify.css" rel="stylesheet">
        <script>
            //   function check_id()
            //   {
            //     window.open("check_id.php?id=" + document.member_form.id.value,
            //         "IDcheck",
            //          "left=200,top=200,width=250,height=100,scrollbars=no,resizable=yes");
            //   }
            function check_input() {
                if (!document.member_form.pass.value) {
                    alert("비밀번호를 입력하세요");
                    document.member_form.pass.focus();
                    return;
                }
                if (!document.member_form.pass_confirm.value) {
                    alert("비밀번호확인을 입력하세요");
                    document.member_form.pass_confirm.focus();
                    return;
                }
                if (!document.member_form.hp2.value || !document.member_form.hp3.value) {
                    alert("휴대폰 번호를 입력하세요");
                    document.member_form.nick.focus();
                    return;
                }
                if (document.member_form.pass.value != document.member_form.pass_confirm.value) {
                    alert("비밀번호가 일치하지 않습니다.\n다시 입력해주세요.");
                    document.member_form.pass.focus();
                    document.member_form.pass.select();
                    return;
                }
                document.member_form.submit();
            }

            function reset_form() {
                document.member_form.id.value = "";
                document.member_form.pass.value = "";
                document.member_form.pass_confirm.value = "";
                document.member_form.name.value = "";
                document.member_form.hp1.value = "010";
                document.member_form.hp2.value = "";
                document.member_form.hp3.value = "";
                document.member_form.email1.value = "";
                document.member_form.email2.value = "";
                document.member_form.id.focus();
                return;
            }
        </script>
    </head>
    <?
    //$userid='aaa'; 로그인한 본인의 아이디
    
    include "../lib/dbconn.php";

    $sql = "select * from member where id='$userid'";
    $result = mysqli_query($sql, $connect);

    $row = mysqli_fetch_array($result);
    //$row[id]....$row[level]

    $hp = explode("-", $row[hp]);  //010-0000-0000
    $hp1 = $hp[0];
    $hp2 = $hp[1];
    $hp3 = $hp[2];

    $email = explode("@", $row[email]);
    $email1 = $email[0];
    $email2 = $email[1];

    mysqli_close();
?>
        <? include "../common/sub_head.html"?>

            <body>
                <article>
                    <form name="member_form" method="post" action="modify.php">
                        <div id="form_join">
                            <h2>회원정보수정</h2>
                            <p><span class="astric">*</span>는 필수입력사항입니다.</p>

                            <div class="formbox">
                                <ul>
                                    <li> 아이디</li>
                                    <li>
                                        <?= $row[id] ?>
                                    </li>
                                </ul>
                            </div>
                            <div class="formbox">
                                <ul>
                                    <li><span class="astric">*</span>비밀번호</li>
                                    <li>
                                        <input type="password" name="pass" value=""> </li>
                                </ul>
                            </div>
                            <div class="formbox">
                                <ul>
                                    <li><span class="astric">*</span>비밀번호 확인</li>
                                    <li>
                                        <input type="password" name="pass_confirm" value=""> </li>
                                </ul>
                            </div>
                            <div class="formbox">
                                <ul>
                                    <li> 이름</li>
                                    <li>
                                        <?= $row[name] ?>
                                    </li>
                                </ul>
                            </div>
                            <div class="formbox">
                                <ul class="hp">
                                    <li><span class="astric">*</span>휴대폰</li>
                                    <li>
                                        <input type="text" class="hp" name="hp1" value="<?= $hp1 ?>"> -
                                        <input type="text" class="hp" name="hp2" value="<?= $hp2 ?>"> -
                                        <input type="text" class="hp" name="hp3" value="<?= $hp3 ?>"> </li>
                                </ul>
                            </div>
                            <div class="formbox">
                                <ul class="email">
                                    <li>이메일</li>
                                    <li>
                                        <input type="text" id="email1" name="email1" value="<?= $email1 ?>"> @
                                        <input type="text" name="email2" value="<?= $email2 ?>"> </li>
                                </ul>
                            </div>
                        </div>
                        <div id="button"><a href="#" class="save" onclick="check_input()">저장하기</a> <a href="../index.html" class="cancel" onclick="reset_form()">취소하기</a> </div>
                    </form>
                    <!--세션변수 살아있을 때 유효한 페이지.
	$_SESSION['userid'] = $userid;로그인한 회원의 정보를 검색
    $_SESSION['username'] = $username;
    $_SESSION['usernick'] = $usernick;
    $_SESSION['userlevel'] = $userlevel;-->
                </article>
            </body>
            <? include "../common/sub_foot.html"?>

    </html>