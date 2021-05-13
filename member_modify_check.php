<?php

session_start();
//  isset 값이 잇나 없나 검사하는 함수
//  ex 유저 아이디가 존재하면 변수에다가 세션 변수를 담아줌 아니면 흘러가기 밑으로
if (isset($_SESSION["userid"])) $userid = $_SESSION["userid"];
else $userid = "";
if (isset($_SESSION["username"])) $username = $_SESSION["username"];
else $username = "";
if (isset($_SESSION["userlevel"])) $userlevel = $_SESSION["userlevel"];
else $userlevel = "";
if (isset($_SESSION["userpoint"])) $userpoint = $_SESSION["userpoint"];
else $userpoint = "";


$pass = $_POST["pass"];

$con = mysqli_connect("localhost", "root", "" , "project");
$sql = "select * from members where id = '$userid'";
$result = mysqli_query($con, $sql);
$data = mysqli_fetch_array($result);

$check_pass = $data["pass"];

if($check_pass == $pass){
  echo "<script>  location.href = 'member_modify_form.php'; </script>";
}else{
  echo "<script>
    alert('비밀번호가 틀립니다.');
    history.go(-1)
    </script>";
}





 ?>
