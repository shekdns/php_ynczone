<?php


$con = mysqli_connect("localhost", "root", "", "project");
mysqli_set_charset($con, 'utf8');


$userid = $_POST['id'];
$sql = "select * from members where id='{$userid}'";
$result = mysqli_query($con, $sql);

$data = mysqli_fetch_array($result);


if($data["id"] == $userid){

	echo "<script>alert('회원님의 비밀번호를 변경합니다.'); location.href='find_pw_update.php?id=$userid';</script>";

}else{
	echo "<script>alert('없는 계정입니다.'); history.back();</script>";
}
?>
