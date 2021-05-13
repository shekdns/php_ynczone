<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" type="text/css" href="css/header.css" />
    <link rel="stylesheet" type="text/css" href="css/layout.css" />
      <link rel="stylesheet" type="text/css" href="css/section.css">
        <link rel="stylesheet" type="text/css" href="css/login.css">
          <link rel="stylesheet" type="text/css" href="css/member.css">
          <link rel="stylesheet" type="text/css" href="css/admin.css">
    <!-- <script src="js/jquery-1.9.1.min.js"></script> -->
    <script src="./js/jquery-3.2.1.js"></script>
    <script src="js/gnb.js"></script>
    <script src="js/activity.js"></script>
  </head>
  <script>
  function check_input(){

    if (!document.member_form.pass.value) {
        alert("비밀번호를 입력하세요!");
        document.member_form.pass.focus();
        return;
    }

    if (!document.member_form.pass_confirm.value) {
        alert("비밀번호확인을 입력하세요!");
        document.member_form.pass_confirm.focus();
        return;
    }

    if (!document.member_form.name.value) {
        alert("이름을 입력하세요!");
        document.member_form.name.focus();
        return;
    }

    if (!document.member_form.email.value) {
        alert("이메일 주소를 입력하세요!");
        document.member_form.email.focus();
        return;
    }


    if (document.member_form.pass.value !=
          document.member_form.pass_confirm.value) {
        alert("비밀번호가 일치하지 않습니다.\n다시 입력해 주세요!");
        // 다시 그자리 포커스 패스워드에 맞춰줌 select 전체 선택해줌
        document.member_form.pass.focus();
        document.member_form.pass.select();
        return;
    }

    document.member_form.submit();
  }

  function reset_form() {
     document.member_form.pass.value = "";
     document.member_form.pass_confirm.value = "";
     document.member_form.name.value = "";
     document.member_form.email.value = "";

     document.member_form.id.focus();
     return;
   }

  </script>


  <body>
    <header id="main_header">
      <?php include "header.php"; ?>
    </header>
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

    <section>
      <div id="member_position">
        <div class="admin_text">

          <div id="mmm">
            회원수정
          </div>

        </div>
        <div id="member_content">
           <?php
            $con = mysqli_connect("localhost", "root", "" , "project");
             mysqli_set_charset($con, 'utf8');
            $sql = "select * from members where id = '$userid'";
            $result = mysqli_query($con, $sql);
            $data = mysqli_fetch_array($result);

            ?>
        <form  name="member_form" method="post" action="member_update.php?id=<?=$userid?>">
            <table style="border-collapse:separate; border-spacing:0 35px;" id="member_list">

            <tr height="2" bgcolor="#FFC8C3"><td colspan="2"></td></tr>

              <tr>
                <th>아이디</th>
                <td><input type="text" name="id" id="userid" class="check" value="<?=$data['id']?>" readonly />

                </td>

              </tr>
              <tr>
                <th>비밀번호</th>
                <td><input type="password" name="pass"></td>
              </tr>
              <tr>
                <th>비밀번호 확인</th>
                <td><input type="password" name="pass_confirm"></td>
              </tr>
              <tr>
                <th>이름</th>
                <td><input type="text" name="name" value="<?=$data['name']?>"></td>
              </tr>
              <tr>
                <th>이메일</th>
                <td><input type="text" name="email" style="width:400px;" value="<?=$data['email']?>">
                </td>
              </tr>
              <tr height="2" bgcolor="#FFC8C3"><td colspan="2"></td></tr>
              <tr>
                <td><a href="#"><img src="./image/mupdate.PNG" onclick="check_input()"></a>&nbsp;
                  	<a href="#"><img src="./image/reset.PNG" onclick="reset_form()"></a></td>

              </tr>


            </table>


          </form>

      </div> <!-- main_content -->

      </div>

    </section>

    <footer>
      <?php include "footer.php";?>
    </footer>
  </body>
</html>
