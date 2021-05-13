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


    $num = $_POST["num"];  //상품 넘버 값
    $category = $_POST["ctg"];
    $count = $_POST["amount"]; // 상품 카운트 값
    $size = $_POST["pro_size"];


    $con = mysqli_connect("localhost", "root", "", "project");
    mysqli_set_charset($con, 'utf8');



    $sql = "select * from product where num='$num'";
    $result = mysqli_query($con, $sql);
    $data = mysqli_fetch_array($result);

    $b_img = $data["img"];
    $b_price = $count * $data["pro_price"];
    $b_name = $data["pro_name"];
    $b_size = $size;
    $b_count = $count;
    $regist_day = date("Y-m-d (H:i)");

    $p_cnt = $data["pro_count"];

    $sql = "insert into basket(session_id, img, pro_name, pro_size, pro_count, pro_price, date)";
    $sql .= "values('$userid', '$b_img', '$b_name', '$size', '$b_count' , '$b_price' , '$regist_day')";

    mysqli_query($con, $sql);  // $sql 에 저장된 명령 실행W

    $new_cnt = $p_cnt - $b_count;
    $sql = "update product set pro_count=$new_cnt where num=$num";
    mysqli_query($con, $sql);

  

    mysqli_close($con);



 ?>
 <script>
   if(confirm('장바구니에 담겼습니다.\n 확인을 누르시면 장바구니로 이동합니다.\n 쇼핑을 계속하실려면 취소를 눌러주세요')){
     location.href = 'basket_view.php';
   }else{
     location.href = 'list_view.php?num=<?=$num?>&category=<?=$category?>';
   }
 </script>
