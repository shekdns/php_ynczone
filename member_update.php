<?php


$id = $_GET["id"];
$pass = $_POST["pass"];
$name = $_POST["name"];
$email = $_POST["email"];

$con = mysqli_connect("localhost", "root", "", "project");
  mysqli_set_charset($con,'utf8');
$sql = "update members set pass='$pass', name='$name', email='$email'";
$sql .= " where id=$id";
mysqli_query($con, $sql);

mysqli_close($con);

echo "
    <script>
        alert('수정되었습니다.');
        location.href = 'mypage.php?id=$id';
    </script>
";



 ?>
