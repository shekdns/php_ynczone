<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" type="text/css" href="css/header.css" />
    <link rel="stylesheet" type="text/css" href="css/layout.css" />
      <link rel="stylesheet" type="text/css" href="css/section.css">
        <link rel="stylesheet" type="text/css" href="css/mypage.css">
        <script type="text/javascript" src="./js/login.js"></script>
    <!-- <script src="js/jquery-1.9.1.min.js"></script> -->
    <script src="js/gnb.js"></script>
    <script src="js/activity.js"></script>
  </head>
  <script>

  function j_delete(){

    if (confirm("정말 삭제하시겠습니까??") == true){
       location.href = 'jumun_delete.php';
    }else{   //취소

      return;
    }
  }
  </script>

  <body>
    <header id="main_header">
      <?php include "header.php"; ?>

      <?php
      if($userid == ""){
        echo("
            <script>
            alert('잘못된접근입니다.');
            history.go(-1)
            </script>
        ");
        exit;
      }
       ?>
    </header>

    <section>
      <div id="mypage_position">
        <div class="admin_text">
          Mypage
      </div>
      <?php
      $con = mysqli_connect("localhost", "root", "", "project");
      mysqli_set_charset($con, 'utf8');
      $sql = "select * from members where id = '$userid'";
      $result = mysqli_query($con, $sql);
      $data = mysqli_fetch_array($result);

      $m_name = $data['name'];
      $m_point = $data['point'];
      $m_level = $data['level'];

      if($m_level  > 0 && $m_level < 5){
          $m_tear = "브론즈";
      }
      if($m_level  > 4 && $m_level < 9){
          $m_tear = "실버";
      }
      if($m_level >8){
          $m_tear = "골드";
      }

      $sql = "select * from basket where session_id = '$userid'";
      $result2 = mysqli_query($con, $sql);
      $count_basket = mysqli_num_rows($result2);

       ?>
       <!-- 마이페이지 영역 -->
      <table width="1000px" id="mypage_table">
        <tr>
          <th style="background-color:#ebe6e6"><div style="font-weight:bold; font-size:15px;"><?=$m_name?></div></th>
          <th>등급<br><div style="font-weight:bold; font-size:15px;"><?=$m_tear?></div></th>
          <th>레벨<br><div style="font-weight:bold; font-size:15px;"><?=$m_level?></div></th>
          <th>포인트<br><div style="font-weight:bold; font-size:15px;"><?=$m_point?></div></th>
          <th>장바구니<br><div style="font-weight:bold; font-size:15px;"><?=$count_basket?></div></th>
       </tr>
     </table>
      <div id="mypage_bar">
       <ul>
         <li><a href="member_modify_check_form.php">회원수정</a></li>
         <li><a href="board_view.php">Q&A</a></li>
         <li><a href="user_board_write.php">Q&A글쓰기</a></li>
       </ul>
      </div>
      <div id="m_order">
        주문내역
      </div>
      <div id ="m_line">
        <table width="1100px" id="order_table">
          <tr class="order_table_trth">
          <th class="order_table_trth" width="200px">주문일자/주문번호</th>
          <th class="order_table_trth" width="100px">이미지</th>
          <th class="order_table_trth" width="300px">상품이름</th>
          <th class="order_table_trth" width="100px">사이즈</th>
          <th class="order_table_trth" width="100px">수량</th>
          <th class="order_table_trth" width="200px">상품구매금액</th>
          <th class="order_table_trth" width="100px">주문처리</th>
          </tr>
        <?php
        if(isset($_GET['page'])){
          $page = $_GET['page'];
        }else{
          $page = 1;
        }
        $m_id = $_GET["id"];
        //$userid
        $page_num = 4;
        $con = mysqli_connect("localhost", "root", "", "project");
        mysqli_set_charset($con, 'utf8');
        $sql = "select * from temp where session_id = '$m_id' order by num desc";
        // $sql = "select onum, regist_day, pro_name, pro_count, pro_size, pro_price, img
        //         from temp join jumin on temp.onum = jumin.onum";
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
        ?>

        <?php
        for($i= $start; $i<$start+$page_num && $i < $total_record; $i++){
          mysqli_data_seek($result, $i);
          $data = mysqli_fetch_array($result);
         ?>
         <tr>
           <td align="center" style="font-size:13px;"><?=$data['regist_day']?><br><div style="font-weight:bold"><?=$data['onum']?></div></td>
           <td><img src="<?=$data['img']?>" width="100%" height="25%"></td>
           <td align="center" class="jumun_view"><?=$data['pro_name']?></td>
           <td align="center" class="jumun_view"><?=$data['pro_size']?></td>
           <td align="center" class="jumun_view"><?=$data['pro_count']?></td>
           <td align="center" class="jumun_view"><?=$data['pro_price']?></td>
          <td align="center" class="jumun_view"><?=$data['situ']?></td>
         </tr>

       <?php }
       } ?>
        </table>
        <br>
        <div id="m_del">
        <a href="jumun_delete.php"><img src="./image/jumun.PNG"></a>
        </div>

       <ul id="page_num">


         <?php
           if ($total_page>=2 && $page >= 2)
           {
             $new_page = $page-1;
             echo "<li><a href='mypage.php?id=$m_id&page=$new_page'>◀ 이전</a> </li>";
           }
           else
             echo "<li>&nbsp;</li>";

             // 게시판 목록 하단에 페이지 링크 번호 출력
             for ($i=1; $i<=$total_page; $i++){

               if ($page == $i){    // 현재 페이지 번호 링크 안함

               echo "<li><b> $i </b></li>";
               }
               else{

               echo "<li><a href='mypage.php?id=$m_id&page=$i'> $i </a><li>";
               }
             }
             if ($total_page>=2 && $page != $total_page)
             {
             $new_page = $page+1;
             echo "<li> <a href='mypage.php?id=$m_id&page=$new_page'>다음 ▶</a> </li>";
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
