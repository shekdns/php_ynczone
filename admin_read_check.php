<?php
$con = mysqli_connect("localhost", "root", "", "project");
mysqli_set_charset($con, 'utf8');

session_start();
if (isset($_SESSION["userid"])) $userid = $_SESSION["userid"];
else $userid = "";

    $num = $_GET["num"];
    $admin = 'admin';

    $sql = "select * from uboard where num = $num";
    $result = mysqli_query($con,$sql);
    $data = mysqli_fetch_array($result);

    $check_id = $data['session_id'];
	 	$board_pass = $data['pass'];
    $check_pass = $_POST['pass'];

      if($userid == $admin){
            echo "<script> location.href = 'admin_read.php?num=$num'; </script>";
      }else if($board_pass == $check_pass){  //이 글의 걸린 비밀번호와 입력한 비밀번호 를 비교
          echo "<script> location.href = 'admin_read.php?num=$num'; </script>";
      }
      else{

        echo "
        <script>
          alert('비밀번호가 틀립니다. ');
          history.go(-1)
          </script>";
      }

?>
