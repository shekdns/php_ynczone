<?php
    $id   = $_POST["id"];
    $pass = $_POST["pass"];
    $name = $_POST["name"];
    $email1  = $_POST["email1"];
    $email2  = $_POST["email2"];
    $email = $email1."@".$email2;
    $regist_day = date("Y-m-d (H:i)");  // 현재의 '년-월-일-시-분'을 저장
    // $ip = $_POST["ipp"];
    // db 연결
    $con = mysqli_connect("localhost", "root", "", "project");
    // 한글 설정
    mysqli_set_charset($con, 'utf8');

    $sql = "select * from members where id='$id'";
    $result = mysqli_query($con, $sql);
    $data = mysqli_fetch_array($result);
    if($data >= 1){
  		echo "<script>alert('아이디가 중복됩니다.'); history.back();</script>";
  	}else{
    // sql 쿼리 실행
	$sql = "insert into members(id, pass, name, email, regist_day, level, point) ";
// x = "조정현";
// y = "영남이공";
// x.y 문자열 결합   -> x = x."영남이공"  -> x .="영남이공" $sql = $sql."value~~~~";
  $sql .= "values('$id', '$pass', '$name', '$email', '$regist_day', 1, 0)";

	mysqli_query($con, $sql);  // $sql 에 저장된 명령 실행W
  mysqli_close($con);

    echo "
	      <script>
	          location.href = 'index.php';
	      </script>
	  ";
  }
?>
