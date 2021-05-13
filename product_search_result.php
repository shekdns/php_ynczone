<!DOCTYPE html>

<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" type="text/css" href="css/header.css" />
    <link rel="stylesheet" type="text/css" href="css/layout.css" />
      <link rel="stylesheet" type="text/css" href="css/section.css">
        <link rel="stylesheet" type="text/css" href="css/login.css">
         <link rel="stylesheet" type="text/css" href="css/admin.css">
        <script type="text/javascript" src="./js/login.js"></script>
    <script src="js/jquery-1.9.1.min.js"></script>
    <script src="js/gnb.js"></script>
    <script src="js/activity.js"></script>
  </head>
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
    <?php
    if($userlevel < 99){
      echo("
          <script>
          alert('관리자가 아닙니다! 상품등록은 관리자만 가능합니다!');
          history.go(-1)
          </script>
      ");
      exit;
      $con = mysqli_connect("localhost", "root", "", "project");
      mysqli_set_charset($con, 'utf8');


    }?>
      <div class="product_position">
        <div class="product_text">
          상품목록
          <div style="padding-left:1200px"><a href="admin_form.php"><img src="./image/product.png"></a></div>

          <table width="1200px" id="pro_list">
            <tr>

            </tr>
            <tr>
              <th width="100px">카테고리</th>
              <th width="400px">상품명</th>
              <th width="200px">상품이미지</th>
              <th width="200px">가격</th>
              <th width="300px">기타</th>
           </tr>
           <?php
                $p_cate = $_GET["p_cate"];
                $search = $_GET["search"];
             //맨 처음 접속할 경우 처음 부터 출력하기위한값
             if(isset($_GET['page'])){
               $page = $_GET['page'];
             }else{
               $page = 1;
             }

             //현재 테이블의 전체개수

             if($p_cate == '카테고리'){

             $sql = "select * from product where category like '%$search%'";

             }if($p_cate =='이름'){

               $sql = "select * from product where pro_name like '%$search%'";

             }

             //$sql = "select count(*) as cnt from product";
             $result = mysqli_query($con, $sql);
               if(isset($sql)){
             $total_record = mysqli_num_rows($result);

             //한 화면에 보여질 게시글수
             $page_num = 5;

             //페이지 수 계산
             if($total_record % $page_num == 0){
               $total_page = floor($total_record/$page_num);
             }else{
               $total_page = floor($total_record/$page_num) +1;
             }
             $start = ($page - 1) * $page_num;

             $number = $total_record - $start;
           }
            ?>

           <?php
                if($total_record != 0){

             for($i= $start; $i<$start+$page_num && $i < $total_record; $i++){
               mysqli_data_seek($result, $i);
               $data = mysqli_fetch_array($result);
               ?>
             <tr>
               <td  align="center" class="b_tr"><?=$data['category']?></td>
               <td  align="center" class="b_tr"><?=$data['pro_name']?></td>
               <td  align="center" class="b_tr">
                 <?php if($data['img'] != './data/'){?>
                 <img src="<?=$data['img']?>" width="50%" height="35%">
               <?php }else{ ?>
                 <img src="./image/No.jpg" width="50%" height="35%">
               <?php } ?>
               </td>
               <td width="100px" align="center">$<?=number_format($data['pro_price'])?></td>
               <td align="center">
                 <a href="product_adit_form.php?num=<?=$data['num']?>&page=<?=$page?>"><img src="./image/adit.png"><br>
                 <a href="product_delete.php?num=<?=$data['num']?>&page=<?=$page?>"><img src="./image/pdel.png"></a><br>
             </tr>
               <?php
             }
           }
             mysqli_close($con);
                ?>
              </table><br>

              <div id ="serch_box">
                <form name="product_search_form" action="product_search_result.php?p_cate=<?=$p_cate?>&search=<?=$search?>" method="get">
                    <select name="p_cate">
                      <option value="카테고리">카테고리</option>
                      <option value="이름">이름</option>
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
                   echo "<li><a href='product_search_result.php?page=$new_page&p_cate=$p_cate&search=$search'>◀ 이전</a> </li>";
                 }
                 else
                   echo "<li>&nbsp;</li>";

                   // 게시판 목록 하단에 페이지 링크 번호 출력
                   for ($i=1; $i<=$total_page; $i++){

                     if ($page == $i){    // 현재 페이지 번호 링크 안함

                     echo "<li><b> $i </b></li>";
                     }
                     else{

                     echo "<li><a href='product_search_result.php?page=$i&p_cate=$p_cate&search=$search'> $i </a><li>";
                     }
                   }
                   if ($total_page>=2 && $page != $total_page)
                   {
                   $new_page = $page+1;
                   echo "<li> <a href='product_search_result.php?page=$new_page&p_cate=$p_cate&search=$search'>다음 ▶</a> </li>";
                 }
                 else
                   echo "<li>&nbsp;</li>";
               ?>
             </ul>


      </div>
   </div>


    <footer>
      <?php include "footer.php";?>
    </footer>
  </body>
</html>
