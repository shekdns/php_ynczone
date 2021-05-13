<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" type="text/css" href="css/header.css" />
    <link rel="stylesheet" type="text/css" href="css/layout.css" />
      <link rel="stylesheet" type="text/css" href="css/section.css">
          <link rel="stylesheet" type="text/css" href="css/order.css">
        <script type="text/javascript" src="./js/order.js"></script>
    <script src="js/jquery-1.9.1.min.js"></script>
    <script src="http://code.jquery.com/jquery-latest.min.js"></script>
    <script src="js/gnb.js"></script>
    <script src="js/activity.js"></script>
  </head>


  <body>
    <header id="main_header">
      <?php include "header.php"; ?>
    </header>

    <section>
      <div id="order_position">
          <div id="order_text">
        <table width="1200px" id="pro_list">
          <tr class="c">
            <th class="c">이미지</th>
            <th class="c">상품이름</th>
            <th class="c">사이즈</th>
            <th class="c">갯수</th>
            <th class="c">가격</th>

         </tr>
        <?php
        $con = mysqli_connect("localhost", "root", "", "project");
        mysqli_set_charset($con, 'utf8');
        $sql = "select * from basket where session_id = '$userid'";
        $result = mysqli_query($con, $sql);
        $total_record = mysqli_num_rows($result);
        $total_price = 0;
        for($i=0; $i<$total_record ;$i++){
          mysqli_data_seek($result, $i);
          $data = mysqli_fetch_array($result);

         ?>
         <tr>
           <td width="150px" align="center">
             <img src="<?=$data['img']?>"  width="100%" height="30%">
           </td>
           <td align="center" class="b_tr"><?=$data['pro_name']?></td>
           <td align="center" class="b_tr"><?=$data['pro_size']?></td>
           <td align="center" class="b_tr"><?=$data['pro_count']?></td>
           <td align="center" class="b_tr">₩<?=number_format($data['pro_price'])?></td>

         </tr>



     <?php
        $total_price = $total_price + $data['pro_price'];
        } ?>

      </table>

      <br>


      <script src="https://ssl.daumcdn.net/dmaps/map_js_init/postcode.v2.js"></script>
      <div id="o_info">
            배송정보
      </div>
      <div id="order_form">
      <form name="order_form" method="post" action="order_insert.php">
        <table width="1200px" style="border-collapse:separate; border-spacing:0 35px;" id="order_list">
        <tr height="2" bgcolor="#FFC8C3"><td colspan="2"></td></tr>

        <tr class="oc">
           <th>받으시는 분*</th>
           <td><input type="text" name="oname"></td>
        </tr>
        <tr class="oc">
           <th>우편번호*</th>
           <td><input type="text" name="zip" style="width:80px; height:26px;" />
              <button type="button" style="width:60px; height:32px;" onclick="openZipSearch()">검색</button>
           </td>

        </tr>
        <tr class="oc">
          <th>주소*</th>
          <td> <input type="text" name="addr1" style="width:300px; height:30px;" readonly /></td>
        </tr>
        <tr class="oc">
          <th>상세*</th>
          <td> <input type="text" name="addr2" style="width:300px; height:30px;" /></td>
        </tr>
        <tr class="oc">
          <th>일반전화</th>
          <td><input type="text" name="tel1" style="width:80px; height:26px;" /> -
            <input type="text" name="tel2" style="width:80px; height:26px;" /> -
            <input type="text" name="tel3" style="width:80px; height:26px;" /></td>
        </tr>
        <tr class="oc">
          <th>휴대전화*</th>
          <td><input type="text" name="phone1" style="width:80px; height:26px;" /> -
            <input type="text" name="phone2" style="width:80px; height:26px;" /> -
            <input type="text" name="phone3" style="width:80px; height:26px;" /></td>
        </tr>
        <tr class="oc">
          <th>이메일*</th>
          <td> <input type="text" name="email" style="width:300px; height:30px;"/></td>
        </tr>
        <tr class="oc">
          <th>배송메시지</th>
          <td><textarea name="message" style="width:400px;height:100px; font-size:17px;"></textarea></td>

        </tr>
          <tr height="2" bgcolor="#FFC8C3"><td colspan="2"></td></tr>
        </table>
        <input type="hidden" name="total_price" value="<?=number_format($total_price)?>">
        <div id="total3">
                  결제예상금액 : ₩<?=$total_price?>
                  <a href="#"><img src="./image/order.png" onclick="order_input()"></a>

          </div>
        </form>
        <script>

        function openZipSearch() {
        	new daum.Postcode({
        		oncomplete: function(data) {
        			$('[name=zip]').val(data.zonecode); // 우편번호 (5자리)
        			$('[name=addr1]').val(data.address);
        			$('[name=addr2]').val(data.buildingName);
        		}
        	}).open();
        }

        </script>

          </div>
      </div>
    </div>
    <br>
    </section>

    <footer>
      <?php include "footer.php";?>
    </footer>
  </body>
</html>
