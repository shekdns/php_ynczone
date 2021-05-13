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


$con = mysqli_connect("localhost", "root", "", "project");
 mysqli_set_charset($con, 'utf8');

 $id = $userid;
 $oname = $_POST["oname"]; //받는사람
 $zip = $_POST["zip"]; // 우편번호
 $addr1 = $_POST["addr1"]; //주소1
 $addr2 = $_POST["addr2"];//상세주소

 //집번호
 $tel1 = $_POST["tel1"];
 $tel2 = $_POST["tel2"];
 $tel3 = $_POST["tel3"];
 //휴대폰 번호
 $phone1 = $_POST["phone1"];
 $phone2 = $_POST["phone2"];
 $phone3 = $_POST["phone3"];

 $email = $_POST["email"]; //이메일
 $message = $_POST["message"]; //메세지

 $tel = $tel1.'-'.$tel2.'-'.$tel3; //집번
 $phone = $phone1.'-'.$phone2.'-'.$phone3; //폰번

 $regist_day = date("Y-m-d"); //날짜

 $order_num = date("ymdhis"); //주문 고유 번호

 $total_price = $_POST["total_price"];

 $sql = "insert into jumun(onum, session_id, name, zip, adress1, adress2, tell, phone, email ,message, total, date, situ)";
 $sql .= "values('$order_num', '$id', '$oname', '$zip' , '$addr1' , '$addr2' , '$tel',
        '$phone', '$email', '$message' , '$total_price', '$regist_day' , '배송준비')";

 mysqli_query($con, $sql);  // $sql 에 저장된 명령 실행W

 $sql = "select * from basket where session_id = '$userid'";
 $result = mysqli_query($con, $sql);


 // $regist_day = date("Y-m-d (H:i)"); //날짜
 // $order_num = date("ymdhis"); //주문 고유 번호

 $total_record = mysqli_num_rows($result);


  for($i=0; $i<$total_record; $i++){


    $temp = mysqli_fetch_array($result);
     $temp_name = $temp["pro_name"];
     $temp_count = $temp["pro_count"];
     $temp_size = $temp["pro_size"];
     $temp_price = $temp["pro_price"];
     $temp_img = $temp["img"];
     $sql = "insert into temp(regist_day, onum, session_id, pro_name, pro_count, pro_size, pro_price, img, situ)";
     $sql .= "values('$regist_day', '$order_num', '$userid', '$temp_name', '$temp_count', '$temp_size', '$temp_price', '$temp_img' ,'배송준비')";
     mysqli_query($con, $sql);
  }

  $sql = "delete from basket where session_id ='$id'";
  mysqli_query($con, $sql);

  // 주문시 포인트 UP
  $point_up = 100;
  $sql = "select point from members where id='$userid'";
  $result = mysqli_query($con, $sql);
  $data = mysqli_fetch_array($result);
  $new_point = $data["point"] + $point_up;

  $sql = "update members set point=$new_point where id='$userid'";
  mysqli_query($con, $sql);



 mysqli_close($con);

echo "
  <script>

    location.href = 'mypage.php?id=$id';

    </script>

";



 ?>
