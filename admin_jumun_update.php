<?php
//step 이 0이면 왼쪽 버튼 1이번 오른쪽 버튼


$onum = $_GET["onum"];
$step = $_GET["step"];  //1또는0

  $con = mysqli_connect("localhost", "root", "", "project");
  mysqli_set_charset($con,'utf8');

  $sql = "select * from jumun where onum = $onum";
  $result = mysqli_query($con, $sql);
  $data = mysqli_fetch_array($result);

  $situ = $data["situ"];

  if($step == 1 && $situ == '배송준비'){
 //$sql = "update product set hit=$new_hit where num=$num";
  $sql = "update jumun set situ = '배송중' where onum=$onum";
  mysqli_query($con, $sql);
  $sql = "update temp set situ = '배송중' where onum=$onum";
  mysqli_query($con, $sql);
  }
  if($step == 1 && $situ == '배송중'){
  $sql = "update jumun set situ = '배송완료' where onum=$onum";
  mysqli_query($con, $sql);
  $sql = "update temp set situ = '배송완료' where onum=$onum";
  mysqli_query($con, $sql);

  }
  if($step == 0 && $situ == '배송중'){
  $sql = "update jumun set situ = '배송준비' where onum=$onum";
  mysqli_query($con, $sql);
  $sql = "update temp set situ = '배송준비' where onum=$onum";
  mysqli_query($con, $sql);
  }
  mysqli_close($con);
echo "
    <script>
        location.href = 'admin_main.php';
    </script>
";

  // $sql = "update jumun A INNER JOIN temp B ON A.onum = B.onum set A.situ = '배송완료' AND B.situ = '배송완료' where onum=$onum'";


 ?>
