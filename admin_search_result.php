<!DOCTYPE html>

<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" type="text/css" href="css/header.css" />
    <link rel="stylesheet" type="text/css" href="css/layout.css" />
      <link rel="stylesheet" type="text/css" href="css/section.css">
      <link rel="stylesheet" type="text/css" href="css/admin.css" />
        <link rel="stylesheet" type="text/css" href="css/order.css" />
        <script type="text/javascript" src="./js/login.js"></script>
    <script src="js/jquery-1.9.1.min.js"></script>
    <script src="js/gnb.js"></script>
    <script src="js/activity.js"></script>
  </head>

<?php

 ?>

  <body>
    <header id="main_header">
      <?php include "header.php"; ?>
    </header>

    <?php
    if($userlevel < 99){
      echo("
          <script>
          alert('관리자가 아닙니다! 관리자 페이지는 관리자만 가능합니다!');
          history.go(-1)
          </script>
      ");
      exit;
    }
    $a_cate = $_GET["a_cate"];
    $search = $_GET["search"];
     ?>
    <section>
      <div class="admin_position">

        <div id="admin_bar">
          <ul>
            <li><a href="admin_main.php">메인</a></li>
            <li><a href="admin_member.php">회원관리</a></li>
            <li><a href="board_view.php">Q&A</a></li>
            <li><a href="admin_form.php">상품등록</a></li>
          </ul>
        </div>
        <div class="admin_text">
            <div style="font-size:30px; font-weight:bold;"><?=$a_cate?> 에서 <?=$search?> 검색결과 </div>
        </div>
        <div class="admin_text">
          <table width="1800px" id="order_table" border="1 "style=" border-collapse: collapse;">
            <tr>
            <th class="jumun_table"></th>
            <th class="jumun_table">주문번호</th>
            <th class="jumun_table">등록일</th>
            <th class="jumun_table">받는분</th>
            <th class="jumun_table">우편번호</th>
            <th class="jumun_table">주소</th>
            <th class="jumun_table">상세주소</th>
            <th class="jumun_table">일반전화</th>
            <th class="jumun_table">휴대폰</th>
            <th class="jumun_table">이메일</th>
            <th class="jumun_table">메세지</th>
            <th class="jumun_table">주문처리</th>
            <th class="jumun_table"></th>
            </tr>

            <?php



            if(isset($_GET['page'])){
              $page = $_GET['page'];
            }else{
              $page = 1;
            }
            $page_num = 10;

            $con = mysqli_connect("localhost", "root", "", "project");
            mysqli_set_charset($con, 'utf8');

            if($a_cate == '주문번호'){

            $sql = "select * from jumun where onum like '%$search%'";

          }if($a_cate =='받는분'){

              $sql = "select * from jumun where name like '%$search%'";

            }
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
              $cnt = $total_record;
            ?>
            <?php
            for($i= $start; $i<$start+$page_num && $i < $total_record; $i++){
              mysqli_data_seek($result, $i);
              $data = mysqli_fetch_array($result);

             ?>
             <tr>
               <th class="jumun_table"><?=$cnt?></th>
               <th class="jumun_table"><?=$data['onum']?></th>
               <th class="jumun_table"><?=$data['date']?></th>
               <th class="jumun_table"><?=$data['name']?></th>
               <th class="jumun_table"><?=$data['zip']?></th>
               <th class="jumun_table"><?=$data['adress1']?></th>
               <th class="jumun_table"><?=$data['adress2']?></th>
               <th class="jumun_table"><?=$data['tell']?></th>
               <th class="jumun_table"><?=$data['phone']?></th>
               <th class="jumun_table"><?=$data['email']?></th>
               <th class="jumun_table"><?=$data['message']?></th>
                <th class="jumun_table"><?=$data['situ']?></th>
                  <th>
                  <?php if($data['situ'] != '배송완료'){ ?>
                   <a href="admin_jumun_update.php?step=0&onum=<?=$data['onum']?>">◀</a>
                   <a href="admin_jumun_update.php?step=1&onum=<?=$data['onum']?>">▶</a>
             <?php } $cnt--;?></th>
            </tr>
          <?php }
        }else{
           ?>
           검색결과가 없습니다.
         <?php  }?>

          </table>
          <br>
          <div id ="serch_box">

            <form name="admin_serch_form" action="admin_search_result.php?a_cate=<?=$a_cate?>&search=<?=$search?>" method="get">

                <select name="a_cate">
                  <option value="주문번호">주문번호</option>
                  <option value="받는분">받는분</option>
                </select>
                <input type="text" name="search" size="40" required="required" /> <button>검색</button>
            </form>

          </div>
          <br>

         <ul id="page_num">


           <?php
             if ($total_page>=2 && $page >= 2)
             {
               $new_page = $page-1;
               echo "<li><a href='admin_search_result.php?page=$new_page&a_cate=$a_cate&search=$search'>◀ 이전</a> </li>";
             }
             else
               echo "<li>&nbsp;</li>";

               // 게시판 목록 하단에 페이지 링크 번호 출력
               for ($i=1; $i<=$total_page; $i++){

                 if ($page == $i){    // 현재 페이지 번호 링크 안함

                 echo "<li><b> $i </b></li>";
                 }
                 else{

                 echo "<li><a href='admin_search_result.php?page=$i&a_cate=$a_cate&search=$search'> $i </a><li>";
                 }
               }
               if ($total_page>=2 && $page != $total_page)
               {
               $new_page = $page+1;
               echo "<li> <a href='admin_search_result.php?page=$new_page&a_cate=$a_cate&search=$search'>다음 ▶</a> </li>";
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
