<?php
    session_start();
    $num   = $_GET["num"];
    $page   = $_GET["page"];

    $con = mysqli_connect("localhost", "root", "", "project");
    $sql = "select * from product where num = $num";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($result);


    $sql = "delete from product where num = $num";
    mysqli_query($con, $sql);
    mysqli_close($con);

    echo "
	     <script>
	         location.href = 'product_list.php?page=$page';
	     </script>
	   ";

?>
