<?php
    session_start();
    $num   = $_GET["num"];  //댓글 오토 넘버
    $page   = $_GET["page"]; //페이지
    $list_num = $_GET["list_num"]; //다시 돌아갈 상품 넘버
    $category = $_GET["category"]; //다시 돌아갈 상품 카테고리

    $con = mysqli_connect("localhost", "root", "", "project");
    $sql = "select * from reply where num = $num";
    mysqli_query($con, $sql);


    $sql = "delete from reply where num = $num";
    mysqli_query($con, $sql);
    mysqli_close($con);

    echo "
	     <script>
	         location.href = 'list_view.php?num=$list_num&category=$category';
	     </script>
	   ";

?>
