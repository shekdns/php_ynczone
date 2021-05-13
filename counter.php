<?php

  //방문자수
  $con = mysqli_connect("localhost", "root", "", "project");
	if(!isset($_SESSION)) { session_start(); }

	date_default_timezone_set('Asia/Seoul');

	$todayc = date("Y-m-d H:i:s");

	$userip = $_SERVER['REMOTE_ADDR'];


	if(isset($_SERVER['HTTP_REFERER']))

		$referer = $_SERVER['HTTP_REFERER'];

	else

		$referer = "";

	if($con){
		// 처음 방문했는지 검사

		if(!isset($userid)) {

			$_SESSION['visit'] = "1";
			$sql = "insert into visit (regdate, regip, referer) values'$currdt','$userip','$referer')";
      mysqli_query($con, $sql);

		}

		// 오늘 방문자수
		$sql = "select count(*) as count from visit where regdate = DATE('$currdt')";
    $result = mysqli_query($con, $sql);
    $data = mysqli_fetch_array($result);
    $today_visit_count = $data['count'];

		// 전체 방문자수

		$sql = "select count(*) as count from visit";
    $result = mysqli_query($con, $sql);
    $data = mysqli_fetch_array($result);
		$total_visit_count = $data['count'];
	}

?>
