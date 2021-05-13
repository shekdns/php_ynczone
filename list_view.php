<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" type="text/css" href="css/header.css" />
    <link rel="stylesheet" type="text/css" href="css/layout.css" />
      <link rel="stylesheet" type="text/css" href="css/section.css">
      <link rel="stylesheet" type="text/css" href="css/view.css">
        <link rel="stylesheet" type="text/css" href="css/replay.css">
      <script src="js/Calculation.js"></script>
    <script src="js/jquery-1.9.1.min.js"></script>
    <script src="js/gnb.js"></script>
    <script src="js/activity.js"></script>
    <script>
    function cart_input()
    {
      if (!document.view_form.pro_size.value)
      {
          alert("사이즈를 선택해주세요");
          document.view_form.pro_size.focus();
          return;
      }

        document.view_form.submit();
    }


    </script>

  </head>

  <?php

    $num = $_GET["num"]; //현재 넘어온 넘버
    $category = $_GET["category"]; //현재 넘어온 카테고리

    $con = mysqli_connect("localhost", "root", "", "project");
    mysqli_set_charset($con, 'utf8');
    $sql = "select * from product where num=$num";

    $result = mysqli_query($con, $sql);
    $data = mysqli_fetch_array($result);
    $pro_name = $data["pro_name"];
    $img    = $data["img"];
    $price_memo    = $data["price_memo"];
    $pro_price = $data["pro_price"];
    $img2    = $data["img2"];
    $img3    = $data["img3"];
    $hit     = $data["hit"];
    $p_cnt   = $data["pro_count"];

    $new_hit = $hit + 1;
    $sql = "update product set hit=$new_hit where num=$num";
    mysqli_query($con, $sql);
   ?>
  <body onload="init();">
    <header id="main_header">
      <?php include "header.php"; ?>
    </header>

    <section>
      <div id="view_position">
          <form name="view_form" action="basket_input.php" method="post">
            <input type="hidden" name="num" value="<?= $num?>">   <!-- 히든으로 현재 상품 번호 전송-->
        <div id="view_img">
          <input type="hidden" name="c_img" value="<?=$img?>">  <!--히든으로 img 장바구니 전송-->
          <?php if($img != './data/'){ ?>
          <img src="<?=$img?>">
        <?php }else{?>
          <img src="./image/No.jpg">
        <?php } ?>
        </div>
        <div id="list_name">
          <input type="hidden" name="c_name" value="<?=$pro_name?>"> <!--히든으로 상품이름 장바구니 전송-->
          <?=$pro_name?><br><br>
          <div id="list_memo">
              카테고리  : <?=$category?><br><br>
              <input type="hidden" name="ctg" value="<?=$category?>">
              <input type="hidden" name="c_price" value="<?=$pro_price?>">
              갯수     : <?=$p_cnt?><br><br>
              판매가   : <?=$pro_price?>원<br><br>
              <?php
              if($category == "구두"){
              ?>
              Size    : <select  name="pro_size" style="text-align:center; width:300px; font-size: 15px;">
                      <option value="" selected>------사이즈를 선택 해주세요-------</option>
                      <option value="S" >250</option>
                      <option value="M" >260</option>
                      <option value="L" >270</option>
                    </select><br>
              <?php
              }else{
              ?>
              Size    : <select  name="pro_size" style="text-align:center; width:300px; font-size: 15px;">
                      <option value="" selected>------사이즈를 선택 해주세요-------</option>
                      <option value="S" >S(1)</option>
                      <option value="M" >M(2)</option>
                      <option value="L" >L(3)</option>
                    </select><br>
              <?php } ?>
          </div>
          <div id="list_price">
            <hr><br>
          </div>
          <div id="count">
            수량 : <input type="hidden" name="sell_price" value="<?=$pro_price?>"style="text-align:center; width:50px; font-size: 15px;"/>
            <input type="text" name="amount" value="1" size="3" onchange="change();">
            <input type="button" value=" + " onclick="add();"><input type="button" value=" - " onclick="del();"> 벌<br>

            금액 : <input type="text" name="sum" size="11" readonly>원
          </div>

            <br>
            <?php
            if(!$userid){
           ?>
           <a href="category_view.php?category=<?=$category?>"><img src="./image/cate.png"></a>
         <?php }else{ ?>

           <?php if($p_cnt == 0){ ?>
              <img src="./image/pum.png">
              <a href="category_view.php?category=<?=$category?>"><img src="./image/cate.png"></a>
           <?php }else{ ?>
            <a href="#"><img src="./image/jang.png" onclick="cart_input()" name="cart"></a>
            <a href="category_view.php?category=<?=$category?>"><img src="./image/cate.png"></a>
          <?php } ?>
        <?php } ?>
        </div>
      </form>
        <!-- 리스트 내용 -->
          <div id="list_content">

              <?php if($img2 == './data/' && $img3 == './data/'){ ?>

              <?php }else if($img3 == './data/'){ ?>
                  <img src="<?=$img2?>">

                <?php }else if($img2 == './data/'){ ?>

                  <img src="<?=$img3?>">
              <?php }else{ ?>
              <img src="<?=$img2?>">
              <img src="<?=$img3?>">
            <?php } ?>
            <br>
            <div id="memo">
              <br>
            <?=$price_memo?>
            </div>

        </div>
        <?php
        $num = $_GET["num"]; //현재 넘어온 넘버
        $category = $_GET["category"]; //현재 넘어온 카테고리

        //  isset 값이 잇나 없나 검사하는 함수
        //  ex 유저 아이디가 존재하면 변수에다가 세션 변수를 담아줌 아니면 흘러가기 밑으로
        if (isset($_SESSION["userid"])) $userid = $_SESSION["userid"];
        else $userid = "";

        if(isset($_GET['page'])){
          $page = $_GET['page'];
        }else{
          $page = 1;
        }
        $page_num = 4;

         // if(isset($_SESSION["userid"])){ ?>
        <script>

        function reply_check(e){
          var userid = '<?= $userid ?>';
          if (userid == '')
          {
            alert("로그인을 하셔야됩니다.");
            document.reply_form.p_num.focus();

              e.preventDefault(); //막는것
            // if(confirm('로그인 페이지로 가시겠습니까?')){
            //     location.href = 'basket_view.php';
            // }else{
            //   return;
            // }


          }
        }
        </script>
        <!-- 리뷰 영역 -->
        <div id="r_a">
          Review

        <form name="reply_form" action="reply_insert.php" method="post">

        <div class="dap_ins">
          <div id="ip">
          <input type="hidden" name="p_num" value="<?=$num?>">
          <input type="hidden" name="p_ctg" value="<?=$category?>">
          <select id="star" name="star">
            <option value="★★★★★">★★★★★</option>
            <option value="★★★★">★★★★</option>
            <option value="★★★">★★★</option>
            <option value="★★">★★</option>
            <option value="★">★</option>
          </select>
          </div>
            <div style="margin-top:10px; ">
              <textarea name="content" class="reply_content" id="re_content" ></textarea>
              <button id="rep_bt" class="re_bt" onclick="reply_check(event)">등록</button>
            </div>
        </div>
      </form>
    <?php  //} ?>
      </div>
      <?php
      $con = mysqli_connect("localhost", "root", "", "project");
      mysqli_set_charset($con, 'utf8');
      $sql = "select * from reply where p_num = $num order by num desc";
      $result = mysqli_query($con,$sql);
      $total_record = mysqli_num_rows($result);

      if($total_record % $page_num == 0){
        $total_page = floor($total_record/$page_num);
      }else{
        $total_page = floor($total_record/$page_num) +1;
      }
      $start = ($page - 1) * $page_num;

      $number = $total_record - $start;

       for($i= $start; $i<$start+$page_num && $i < $total_record; $i++){
         mysqli_data_seek($result, $i);
         $data = mysqli_fetch_array($result);
         $d_num = $data["num"];
         $star = $data["star"];
         $r_id = $data["name"];
         $r_content = $data["content"];
         $r_date = $data["date"];
         $id = $data["id"];

         switch ($star) {
           case '★★★★★':
             $grade = "매우만족";
             break;
           case '★★★★':
               $grade = "만족";
               break;
           case '★★★':
              $grade = "보통";
                break;
            case '★★':
              $grade = "불만족";
               break;
             case '★':
              $grade = "매우불만족";
                break;
           default:
             // code...
             break;
         }
        ?>
        <!-- 리뷰 라인 -->
      <div id ="r_line">
        <br>
        <hr><br>
        <?=$star?> <?=$grade?>
        <div id = "r_id">작성자 : <?=$r_id?></div><br>
        <br><?=$r_content?><br><br>
        <?=$r_date?><br>
          <?php if($id == $userid){ ?>
            <a href="reply_delete.php?num=<?=$d_num?>&list_num=<?=$num?>&category=<?=$category?>
              &page=<?=$page?>" style="text-decoration:none; font-family: 'Roboto Condensed', sans-serif; ">삭제</a>
            <?php } ?>
      </div>
      <!-- <div id ="r_line">
        <br>
        <hr><br>
        ★★★★★ 매우만족
        <div id = "r_id">작성자 : </div><br>
        <br>실시간 댓글<br><br>
        2019-11-18 12:50:14

      </div> -->
    <?php } ?>
    <div id ="r_line">
      <br>
      <hr><br>
    </div>

    <ul id="page_num2">
      <?php

        if ($total_page>=2 && $page >= 2)
        {
          $new_page = $page-1;
          echo "<li><a href='list_view.php?num=$num&category=$category&page=$new_page'>◀ 이전</a> </li>";
        }
        else
          echo "<li>&nbsp;</li>";

          // 게시판 목록 하단에 페이지 링크 번호 출력
          for ($i=1; $i<=$total_page; $i++){

            if ($page == $i){    // 현재 페이지 번호 링크 안함

            echo "<li><b> $i </b></li>";
            }
            else{

            echo "<li><a href='list_view.php?num=$num&category=$category&page=$i'> $i </a><li>";
            }
          }
          if ($total_page>=2 && $page != $total_page)
          {
          $new_page = $page+1;
          echo "<li> <a href='list_view.php?num=$num&category=$category&page=$new_page'>다음 ▶</a> </li>";
        }
        else
          echo "<li>&nbsp;</li>";
      ?>
    </ul>

    </div>
    </section>
    <?php
    mysqli_close($con);
     ?>

    <footer>
      <?php include "footer.php";?>
    </footer>
  </body>
</html>
