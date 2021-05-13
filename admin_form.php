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
  <script>
    function check_input(){
      if(!document.admin_form.category.value){
        alert("카테고리를 선택해주세요.");
        document.admin_form.category.focus();
        return;
      }
      if(!document.admin_form.pro_name.value){
        alert("상품 이름을 등록해주세요.")
        document.admin_form.pro_name.focus();
        return
      }
      if(!document.admin_form.pro_price.value){
        alert("상품 가격을 등록해주세요.")
        document.admin_form.pro_name.focus();
        return
      }
      if(!document.admin_form.pro_count.value){
        alert("상품 갯수를 등록해주세요.")
        document.admin_form.pro_count.focus();
        return
      }



      document.admin_form.submit();
    }



  </script>

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
    }
     ?>
    <section>
      <div class="admin_position">

        <div id="admin_bar">
          <ul>
            <li><a href="admin_main.php">메인</a></li>
            <!-- <li><a href="admin_member.php">회원관리</a></li> -->
          <li><a href="board_view.php">Q&A</a></li>
            <li><a href="admin_form.php">상품등록</a></li>
          </ul>

        </div>
        <div class="admin_text">
       관리자 모드 > 상품 등록
      </div>
      <div class="admin_section">
        <form name="admin_form" method="post" action="product_input.php" enctype="multipart/form-data">
          <table width="1000px" style="border-collapse:separate; border-spacing:0 35px; padding-left:150px;" id="admin_list">
          <tr height="2" bgcolor="#FFC8C3"><td colspan="2"></td></tr>

          <tr class="oc">
               <th>카테고리</th>
               <td><select name="category" style="width:100px;height:25px;" >
                 <option value="" selected>선택</option>
                 <option value="자켓" >자켓</option>
                 <option value="패딩" >패딩</option>
                 <option value="청바지" >청바지</option>
                 <option value="반바지" >반바지</option>
                 <option value="셔츠" >셔츠</option>
                 <option value="M2M" >맨투맨</option>
                 <option value="구두" >구두</option>
                 <option value="운동화" >운동화</option>
               </select></td>
             </tr>
             <tr>
             <th>상품이름</th>
             <td><input type="text" name="pro_name" size="30" class="input_size"><td>
            </tr>
            <tr>
            <th>가격</th>
           <td><input type="text" name="pro_price" size="20" class="input_size"><td>
             </tr>
             <tr>
              <th>갯수</th>
              <td><input type="text" name="pro_count" size="10" class="input_size"><td>
              </tr>

              <tr>
                <th>상품소개</td>
                <td><textarea name="pro_memo" cols="50" rows="10"></textarea><td>
              </tr>

              <tr>
                  <th>이미지</th>
                  <td><input type="file" name="img[]" multiple="multiple" class="input_size"><td>
               </tr>
                <tr>
                  <th></th>
                  <td><input type="file" name="img[]" multiple="multiple" class="input_size"><td>
                 </tr>
                 <tr>
                    <th></th>
                   <td><input type="file" name="img[]" multiple="multiple" class="input_size"><td>
                 </tr>
            <tr height="2" bgcolor="#FFC8C3"><td colspan="2"></td></tr>
              <tr>
                <td>
                  <a href="#"><img src="./image/product.PNG" onclick="check_input()"></a>
                </td>
                  <td>
                  <a href="#"><img src="./image/cate.PNG" onclick="location.href='product_list.php'"></a>
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
