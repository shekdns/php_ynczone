<?php
    session_start();
    $num   = $_GET["num"];
    $page   = $_GET["page"];

    $con = mysqli_connect("localhost", "root", "", "project");
    $sql = "select * from basket where num = $num";
    $result = mysqli_query($con, $sql);
    $data = mysqli_fetch_array($result);

    $sql = "delete from basket where num = $num";
    mysqli_query($con, $sql);

    mysqli_close($con);

    echo "
	     <script>
	         location.href = 'basket_view.php?page=1';
	     </script>
	   ";

?>
