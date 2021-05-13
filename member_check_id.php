<?php

session_start();
// if (isset($_SESSION["userid"])) $userid = $_SESSION["userid"];
// else $userid = "";
// if (isset($_SESSION["username"])) $username = $_SESSION["username"];
// else $username = "";

  $con = mysqli_connect("localhost", "root", "", "project");

  if($_POST['userid'] != NULL){
	$sql = "select * from members where id='{$_POST['userid']}'";
  $result = mysqli_query($con, $sql);
  $data = mysqli_fetch_array($result);

	if($data >= 1){
		echo "존재하는 아이디입니다.";
	} else {
		echo "존재하지 않는 아이디입니다.";
	}
} ?>
