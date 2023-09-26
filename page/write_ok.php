<?php

include $_SERVER['DOCUMENT_ROOT']."/post_board/db.php";

//각 변수에 write.php에서 input name값들을 저장한다
$username = $_POST['name'];
$userpw = password_hash($_POST['pw'], PASSWORD_DEFAULT);
$title = $_POST['title'];
$content = $_POST['content'];
$date = date('Y-m-d');
if($username && $userpw && $title && $content){
    $sql = mq("insert into board(name,pw,title,content,date) values('".$username."','".$userpw."','".$title."','".$content."','".$date."')"); 
    echo "<script>
    alert('글쓰기 완료되었습니다.');
    location.href='/post_board/index.php';</script>";
}else{
    echo "<script>
    alert('글쓰기에 실패했습니다.');
    history.back();</script>";
} //mysql database 에서 A_I를 선택했어야 duplicate 0 error가 안뜬다!! 
//pk: primary key, auto increment(Ai) 자동 증가이다. 선택안하면 수동으로 보내야함.
?>