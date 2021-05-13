<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" type="text/css" href="css/header.css" />
    <link rel="stylesheet" type="text/css" href="css/layout.css" />
    <link rel="stylesheet" type="text/css" href="css/section.css">
    <link rel="stylesheet" type="text/css" href="css/view.css">

        <script type="text/javascript" src="./js/login.js"></script>
    <script src="js/jquery-1.9.1.min.js"></script>
    <script src="js/gnb.js"></script>
    <script src="js/activity.js"></script>
  </head>

  <body>
    <header id="main_header">
      <?php include "header.php"; ?>
    </header>

    <section>
      <?php
         // $search_name = $_POST["serch"];
         $search_name = $_GET["pro_name"];
         $con = mysqli_connect("localhost", "root", "", "project");
         mysqli_set_charset($con, 'utf8');
         $sql = "select * from product order by num desc";
         $result = mysqli_query($con, $sql);

         // 품목 최대 8개
         // $page_num = 8;

         // 최근  상품등록순으로 위에서 8개를 메인에 출력
          $sql = "select * from product where pro_name like '%$search_name%'";
         $result = mysqli_query($con,$sql);
         $tmp = mysqli_fetch_array($result);
         $total_record = mysqli_num_rows($result);

       ?>
      <div id="c_menu">
        <?php
        echo "$search_name";

         ?>
      </div>
      <div id="c_main">
         <table border="0" cellpadding="0" id="main_table">

       <?php
        if($total_record != 0){
       for($i=0; $i<$total_record; $i++){
           mysqli_data_seek($result, $i);
           $data = mysqli_fetch_array($result);
        ?>
        <td style="text-align:center; padding-right:20px; padding-bottom:25px;"  >
         <a href="list_view.php?num=<?=$data['num']?>&category=<?=$data['category']?>">  <img src="<?=$data['img']?>"></a><br>
         <b><a href="list_view.php?num=<?=$data['num']?>&category=<?=$data['category']?>"><!--<?=$data['pro_name']?>!--></a></b><br>
         <!--<?=number_format($data['pro_price'])?>원!-->
         <div id="johwi">조회수 <?=$data["hit"]?> </div>

       </td>
        <?php
        if((($i+1)%4)==0){
         ?>
       </tr><tr>
         <?php
         }
       }
     }else{
         ?>
        <div style="padding-left:750px"><img src="./image/nothing.PNG"></div>
       <?php } ?>
       </table><br>

     </div>
     <div id="term">
     </div>
    </section>

    <footer>
      <?php include "footer.php";?>
    </footer>
  </body>
</html>
