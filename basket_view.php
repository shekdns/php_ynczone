<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" type="text/css" href="css/header.css" />
    <link rel="stylesheet" type="text/css" href="css/layout.css" />
      <link rel="stylesheet" type="text/css" href="css/section.css">
        <link rel="stylesheet" type="text/css" href="css/view.css">

    <script src="js/jquery-1.9.1.min.js"></script>
    <script src="js/gnb.js"></script>
    <script src="js/activity.js"></script>
  </head>
  <script>

  function cart_delete(){

    if (confirm("정말 삭제하시겠습니까??") == true){
       location.href = 'basket_all_delete.php';
    }else{   //취소

      return;
    }
  }
  </script>


  <style>
  th {
    font-size: 17px;
    font-family: 'Roboto Condensed', sans-serif;
  }
  tr th{
    border-bottom: 1px solid #444444;
    padding: 10px;

  }
  </style>
  <body>
    <header id="main_header">
      <?php include "header.php"; ?>
    </header>

    <section>
      <div class="login_position">
        <div class="login_text">
           <table width="1200px" id="pro_list">
             <tr>
               <th>이미지</th>
               <th>상품이름</th>
               <th>사이즈</th>
               <th>갯수</th>
               <th>가격</th>
               <th>등록일</th>
               <th>기타</th>
            </tr>
           <?php

           //맨 처음 접속할 경우 처음 부터 출력하기위한값
           if(isset($_GET['page'])){
             $page = $_GET['page'];
           }else{
             $page = 1;
           }

           //$userid
           $page_num = 4;
           $con = mysqli_connect("localhost", "root", "", "project");
           mysqli_set_charset($con, 'utf8');
           $sql = "select * from basket where session_id = '$userid'";
           $result = mysqli_query($con, $sql);
           if(isset($sql)){
           $total_record = mysqli_num_rows($result);

           if($total_record % $page_num == 0){
             $total_page = floor($total_record/$page_num);
           }else{
             $total_page = floor($total_record/$page_num) +1;
           }
           $start = ($page - 1) * $page_num;

           $number = $total_record - $start;
           }
           $total_price = 0;
           if($total_record != 0){

           for($i= $start; $i<$start+$page_num && $i < $total_record; $i++){
             mysqli_data_seek($result, $i);
             $data = mysqli_fetch_array($result);

           ?>
           <tr>
             <td width="150px" align="center">
               <?php if($data['img']!='./data/'){ ?>
               <img src="<?=$data['img']?>"  width="100%" height="30%">
             <?php }else{ ?>
              <img src="./image/No.jpg"  width="100%" height="30%">
             <?php } ?>
             </td>
             <td align="center" class="b_tr"><?=$data['pro_name']?></td>
             <td align="center" class="b_tr"><?=$data['pro_size']?></td>
             <td align="center" class="b_tr"><?=$data['pro_count']?></td>
             <td align="center" class="b_tr">₩<?=number_format($data['pro_price'])?></td>
             <td width="100px" align="center" class="b_tr"><?=$data['date']?></td>
             <td width="100px" align="center" class="b_tr"><a href="basket_delete.php?num=<?=$data['num']?>&page=<?=$page?>" style="text-decoration:none;">
             취소</a><br></td>
           </tr>
           <?php
            $total_price = $total_price + $data['pro_price'];
            ?>
         <?php
          }
         ?>

       <?php }else{

             ?>

           <?php } ?>
        </table>
        <div id="total">
           <?php if($total_record > 0){ ?>
          결제예상금액 : ₩<?=number_format($total_price)?><br>

            <a href="order.php"><img src="./image/order.png"></a>
            <a href="#"><img src="./image/del.png" onclick="cart_delete()"></a>
          <?php } ?>
        </div>

        <br>
       <ul id="page_num">


         <?php
           if ($total_page>=2 && $page >= 2)
           {
             $new_page = $page-1;
             echo "<li><a href='basket_view.php?page=$new_page'>◀ 이전</a> </li>";
           }
           else
             echo "<li>&nbsp;</li>";

             // 게시판 목록 하단에 페이지 링크 번호 출력
             for ($i=1; $i<=$total_page; $i++){

               if ($page == $i){    // 현재 페이지 번호 링크 안함

               echo "<li><b> $i </b></li>";
               }
               else{

               echo "<li><a href='basket_view.php?page=$i'> $i </a><li>";
               }
             }
             if ($total_page>=2 && $page != $total_page)
             {
             $new_page = $page+1;
             echo "<li> <a href='basket_view.php?page=$new_page'>다음 ▶</a> </li>";
           }
           else
             echo "<li>&nbsp;</li>";
         ?>
       </ul>

      </div>
    </div>
    </section>

    <footer>
      <?php include "footer.php";?>
    </footer>
  </body>
</html>
