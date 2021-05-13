<?php

$con = mysqli_connect("localhost", "root", "", "project");
mysqli_set_charset($con, 'utf8');

$name = $_POST["name"];
$email1 = $_POST["email1"];
$email2 = $_POST["email2"];


if($name == "" || $email1 == ""){
		echo '<script> alert("항목을 입력하세요"); history.back(); </script>';
	}else{

	$email = $email1.'@'.$email2;

$sql = "select * from members where name = '{$name}' && email = '{$email}'";
$result = mysqli_query($con, $sql);

$data = mysqli_fetch_array($result);

if($data["name"] == $name){
	echo "<script>alert('회원님의 ID는 ".$data['id']."입니다.'); history.back();</script>";
}else{
echo "<script>alert('없는 계정입니다.'); history.back();</script>";
}
}
?>
