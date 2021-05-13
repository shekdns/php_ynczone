<?php

$num = $_GET["num"];

$title = $_POST["title"];
$content = $_POST["content"];
$pass = $_POST["pass"];
$date = date("Y-m-d");

$img_name = $_FILES["img"]["name"];
$tmp_name = $_FILES["img"]["tmp_name"];

$upload_dir = "./data/";
$img_path = $upload_dir.$img_name;

if(isset($img_name)){
  move_uploaded_file($tmp_name, $img_path);
}


$con = mysqli_connect("localhost", "root", "", "project");
mysqli_set_charset($con, 'utf8');

$sql = "update uboard set pass='$pass', title='$title', content='$content', img = '$img_path', date='$date'";
$sql .= " where num=$num";
mysqli_query($con, $sql);

mysqli_close($con);

echo "
    <script>
        alert('수정되었습니다.');
        location.href = 'board_read.php?num=$num';
    </script>
";



?>
