<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" type="text/css" href="css/header.css" />
    <link rel="stylesheet" type="text/css" href="css/layout.css" />
      <link rel="stylesheet" type="text/css" href="css/section.css">
      <link rel="stylesheet" type="text/css" href="css/admin.css" />
        <script type="text/javascript" src="./js/login.js"></script>
    <script src="js/jquery-1.9.1.min.js"></script>
    <script src="js/gnb.js"></script>
    <script src="js/activity.js"></script>
  </head>
  <script>
    function check_input(){
      if(!document.adit_form.category.value){
        alert("카테고리를 선택해주세요.");
        document.adit_form.category.focus();
        return;
      }
      if(!document.adit_form.pro_name.value){
        alert("상품 이름을 등록해주세요.")
        document.adit_form.pro_name.focus();
        return
      }
      if(!document.adit_form.pro_price.value){
        alert("상품 가격을 등록해주세요.")
        document.adit_form.pro_name.focus();
        return
      }
      if(!document.adit_form.pro_count.value){
        alert("상품 갯수를 등록해주세요.")
        document.adit_form.pro_count.focus();
        return
      }
      document.adit_form.submit();
    }

  </script>


  <body>
    <header id="main_header">
      <?php include "header.php"; ?>
    </header>

    <section>
      <div class="admin_position">
        <div class="admin_text">
       상품 수정
      </div>
      <?php
      $num  = $_GET['num'];
      $page = $_GET["page"];

      $con = mysqli_connect("localhost", "root", "", "project");
       mysqli_set_charset($con, 'utf8');
      $sql = "select * from product where num = $num";
      $result = mysqli_query($con, $sql);
      $row = mysqli_fetch_array($result);

      $category = $row["category"];
      $pro_name = $row["pro_name"];
      $pro_price = $row["pro_price"];
      $pro_count = $row["pro_count"];
      $pro_memo = $row["price_memo"];
      $img = $row["img"];

       ?>
      <div class="common_section">
        <form name="adit_form" action="product_adit.php?num=
        <?=$num?>&page=<?=$page?>" method="post" class="common_section"
        enctype="multipart/form-data"
        >
          <table class="table_css">
            <tr class="tt">
              <td class="ss">카테고리</td>
              <td><select name="category" >
                <option value="" selected>선택</option>
                <option value="자켓" >자켓</option>
                <option value="패딩" >패딩</option>
                <option value="코트" >코트</option>
                <option value="청바지" >청바지</option>
                <option value="반바지" >반바지</option>
                <option value="셔츠" >셔츠</option>
                <option value="M2M" >맨투맨</option>
                <option value="구두" >구두</option>
                <option value="운동화" >운동화</option>
              </select></td>
            </tr>

            <tr>
              <td class="ss">상품이름</td>
              <td><input type="text" name="pro_name" value=
                "<?=$pro_name?>" size="30"><td>
            </tr>

            <tr>
              <td class="ss">가격</td>
              <td><input type="text" value="<?=$pro_price?>" name="pro_price" size="20"><td>
            </tr>

            <tr>
              <td class="ss">갯수</td>
              <td><input type="text" name="pro_count" value="<?=$pro_count?>"size="10" ><td>
            </tr>

            <tr>
              <td class="ss">상품소개</td>
              <td><textarea name="pro_memo" cols="50" rows="10">
              <?=$pro_memo?></textarea><td>
            </tr>

            <tr>
              <td class="ss">이미지</td>
              <td><input type="file" name="img[]" multiple="multiple"><td>
            </tr>
            <tr>
                <td class="ss"></td>
              <td><input type="file" name="img[]" multiple="multiple"><td>
            </tr>
            <tr>
                <td class="ss"></td>
              <td><input type="file" name="img[]" multiple="multiple"><td>
            </tr>

            <tr>
              <td style="padding-top:10px">
                <button type="button" onclick="check_input()">
                수정하기</button>
                <button type="button" onclick="location.href='product_list.php'">
                목록</button>
              </td>


            </tr>

          </table>


        </form>
      </div>
      </div>

    </section>

    <footer>
      <?php include "footer.php";?>
    </footer>
  </body>
</html>
