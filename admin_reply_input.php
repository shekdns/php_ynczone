<?php
session_start();
if (isset($_SESSION["userid"])) $userid = $_SESSION["userid"];
else $userid = "";


$con = mysqli_connect("localhost", "root", "", "project");
mysqli_set_charset($con, 'utf8');

$num = $_GET["num"];

$sql = "select * from uboard where num=$num";
$thread_result = mysqli_query($con,$sql);
$thread_fetch = mysqli_fetch_array($thread_result);

$max_thread=$thread_fetch['thread']-100;
$depth=$thread_fetch['depth'];
$depth2=$depth+1;


$name = $_POST["name"];
$title = $_POST["title"];
$content = $_POST["content"];
$pass = $_POST["pass"];
$date = date("Y-m-d");
$lock = $_POST["locked"];

//이미지 처리
$img_name = $_FILES["img"]["name"];
$tmp_name = $_FILES["img"]["tmp_name"];

$upload_dir = "./data/";
$img_path = $upload_dir.$img_name;

if(isset($img_name)){
  move_uploaded_file($tmp_name, $img_path);
}
//이미지 처리 끝

if(isset($pass)){
  $lock = 1;
}else{
  $lock = 0;
}


$sql = "insert into uboard(session_id, thread, depth, name, pass, title, content, img, date, hit, locked) ";
$sql .= "values('$userid','$max_thread', '$depth2', '$name', '$pass', '$title', '$content' , '$img_path' , '$date', 0, '$lock')";

mysqli_query($con, $sql);  // $sql 에 저장된 명령 실행W
mysqli_close($con);

  echo "
      <script>
          location.href = 'board_view.php';
      </script>
  ";
 ?>
