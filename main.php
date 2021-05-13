
<div id="main_position">
  <div class="main_wrapper">
    <div class="slide_wrap">
           <div class="slide_content" >
               <ul id="main_slider" class="main_slider">
                   <li class="item1">
                       <h3></h3>
                   </li>
                   <li class="item2">
                       <h3></h3>
                   </li>
                   <li class="item3">
                       <h3></h3>
                   </li>
                   <li class="item4">
                       <h3></h3>
                   </li>
                   <li class="item5">
                       <h3></h3>
                   </li>
                   <li class="item6">
                       <h3></h3>
                   </li>
               </ul>
           </div>
         </div>
         <!-- 신품목 -->
       </div>
       <div id="hit_menu">
         NEW PRODUCT
       </div>
       <div id="product_main">
         <?php
            $con = mysqli_connect("localhost", "root", "", "project");
            mysqli_set_charset($con, 'utf8');
            $sql = "select * from product order by num desc";
            $result = mysqli_query($con, $sql);

            // 인기 품목 최대 8개
            $hit_page_num = 8;
            // 신 품목 최대 8개
            $new_page_num = 8;
            // 최근  상품등록순으로 위에서 8개를 메인에 출력
            $sql = "select * from product order by num desc limit $new_page_num";
            $result = mysqli_query($con,$sql);
            $tmp = mysqli_fetch_array($result);
            $total_record = mysqli_num_rows($result);

          ?>
          <table border="0" cellpadding="0" id="main_table">
        <?php
        for($i=0; $i<$total_record; $i++){
            mysqli_data_seek($result, $i);
            $data = mysqli_fetch_array($result);
         ?>
         <td style="text-align:center; padding-right:20px; padding-bottom:25px;" >
          <a href="list_view.php?num=<?=$data['num']?>&category=<?=$data['category']?>">
            <?php if($data['img'] == './data/'){ ?>
              <img src="./image/No.jpg">
            <?php }else{ ?>
            <img src="<?=$data['img']?>">
          <?php } ?>
          </a><br>

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
          ?>
        </table><br>

      </div>
      <div id="term">
      </div>
      <!-- 인기 품목 -->
      <div id="hit_menu">
        BEST PRODUCT
      </div>
      <div id="product_main">
        <?php
           $con = mysqli_connect("localhost", "root", "", "project");
           mysqli_set_charset($con, 'utf8');
           $sql = "select * from product order by num desc";
           $result = mysqli_query($con, $sql);

           // 조회수 순으로 위에서 8개를 메인에 출력
           $sql = "select * from product order by hit desc limit $hit_page_num";
           $result = mysqli_query($con,$sql);
           $tmp = mysqli_fetch_array($result);
           $total_record = mysqli_num_rows($result);

         ?>
         <table border="0" cellpadding="0" id="main_table">
       <?php
       for($i=0; $i<$total_record; $i++){
           mysqli_data_seek($result, $i);
           $data = mysqli_fetch_array($result);
        ?>
        <td style="text-align:center; padding-right:20px; padding-bottom:25px;" >
         <a href="list_view.php?num=<?=$data['num']?>&category=<?=$data['category']?>">
           <?php if($data['img'] == './data/'){ ?>
             <img src="./image/No.jpg">
           <?php }else{ ?>
           <img src="<?=$data['img']?>">
         <?php } ?>

         </a><br>
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
         ?>
       </table><br>

      </div>


</div>
