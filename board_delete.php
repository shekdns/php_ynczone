<?php
    $num   = $_GET["num"];  //게시를 넘 값

    $con = mysqli_connect("localhost", "root", "", "project");

    $sql = "select * from uboard where num = $num";
    $result = mysqli_query($con, $sql);
    $data = mysqli_fetch_array($result);

    $thread = $data['thread'];
    $admin_board_thread = $thread-100;

    $sql = "select * from uboard where thread = $admin_board_thread";
    mysqli_query($con,$sql);

    $sql = "delete from uboard where num = $num";
    mysqli_query($con, $sql);
    $sql = "delete from uboard where thread = $admin_board_thread";
    mysqli_query($con, $sql);

    mysqli_close($con);

    echo "
	     <script>
	         location.href = 'board_view.php';
	     </script>
	   ";

?>
