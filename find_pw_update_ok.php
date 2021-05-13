<?php


$con = mysqli_connect("localhost", "root", "", "project");
mysqli_set_charset($con, 'utf8');


$id = $_POST["id"];
$new_pw = $_POST['pw'];

$sql = "update members set pass='$new_pw' where id = '$id'";
mysqli_query($con,$sql);
echo "<script>alert('비밀번호를 변경했습니다.'); location.href='index.php';</script>";

?>
