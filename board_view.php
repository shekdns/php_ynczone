<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" type="text/css" href="css/header.css" />
    <link rel="stylesheet" type="text/css" href="css/layout.css" />
      <link rel="stylesheet" type="text/css" href="css/section.css">
        <link rel="stylesheet" type="text/css" href="css/board.css">

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
      <div id="board_position">

        <div id="board_text">
          Q&A
        </div>

      <div id="board_area">
        <table class="list-table">
          <thead>
         <tr>
               <th width="70">no</th>
               <th width="100">item</th>
               <th width="600">subject</th>
               <th width="120">name</th>
               <th width="100">date</th>
               <th width="100">hit</th>
           </tr>
       </thead>
       <?php
         $con = mysqli_connect("localhost", "root", "", "project");
         mysqli_set_charset($con, 'utf8');
         //맨 처음 접속할 경우 처음 부터 출력하기위한값
         if(isset($_GET['page'])){
           $page = $_GET['page'];
         }else{
           $page = 1;
         }
         //현재 테이블의 전체개수
         $sql = "select * from uboard order by thread desc";
         $result = mysqli_query($con, $sql);
         $total_record = mysqli_num_rows($result);

        $lockimg = "<img src='./image/lock.png' alt='lock' title='lock' with='10' height='10' />";
        $arrowimg = "<img src='./image/arrow.png' alt='lock' title='lock' with='10' height='10' />";
        $heartming = "<img src='./image/hearts.png' alt='lock' title='lock' with='10' height='10' />";
         //한 화면에 보여질 게시글수
         $page_num = 10;

         //페이지 수 계산
         if($total_record % $page_num == 0){
           $total_page = floor($total_record/$page_num);
         }else{
           $total_page = floor($total_record/$page_num) +1;
         }
         $start = ($page - 1) * $page_num;

         $number = $total_record - $start;

        ?>

       <?php
       // $sql = "select * from product order by num desc ";
         for($i= $start; $i<$start+$page_num && $i < $total_record; $i++){
           mysqli_data_seek($result, $i);
           $data = mysqli_fetch_array($result);
           ?>
           <tbody>
           <tr>
             <td width="70"><?=$data['num']?></td>
            <!--  이미지가 있으면 이미지 출력-->
             <?php if($data['img']!='./data/'){ ?>
             <th width="100"><img src="<?=$data['img']?>" width="40%" height="10%"></th>
           <?php }else{ ?>  <!-- 이미지가 없으면 -->
              <th width="100"></th><?php } ?>
            <?php if($data['locked'] == 1){ ?>
              <?php if($data['depth']>0){ ?>
                <td width="600" style="text-align:left;"><a href="admin_read_check_form.php?num=<?=$data['num']?>">
                      <?=$arrowimg?><?=$data['title'],$lockimg?><?=$heartming?>
                </a></td>
              <?php }else{ ?>
             <td width="600" style="text-align:left;"><a href="board_check_read.php?num=<?=$data['num']?>">
               <?=$data['title'],$lockimg?>
             </a></td>
              <?php } ?>
           <?php }else{ ?>
             <td width="600" style="text-align:left;"><a href="board_read.php?num=<?=$data['num']?>"><?=$data['title']?></a></td>
           <?php } ?>
             <td width="120"><?=$data['name']?></td>
             <td width="100"><?=$data['date']?></td>
             <td width="100"><?=$data['hit']?></td>

           </tr>
           <tbody>
         <?php } ?>
     </table>

     <br>
     <div id ="board_serch_box">
       <form name="board_search_form" action="board_search_result.php" method="get">
           <select name="b_cate">
             <option value="작성자">작성자</option>
             <option value="제목">제목</option>
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
          echo "<li><a href='board_view.php?page=$new_page'>◀ 이전</a> </li>";
        }
        else
          echo "<li>&nbsp;</li>";

          // 게시판 목록 하단에 페이지 링크 번호 출력
          for ($i=1; $i<=$total_page; $i++){

            if ($page == $i){    // 현재 페이지 번호 링크 안함

            echo "<li><b> $i </b></li>";
            }
            else{

            echo "<li><a href='board_view.php?page=$i'> $i </a><li>";
            }
          }
          if ($total_page>=2 && $page != $total_page)
          {
          $new_page = $page+1;
          echo "<li> <a href='board_view.php?page=$new_page'>다음 ▶</a> </li>";
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
