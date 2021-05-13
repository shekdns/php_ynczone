<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" type="text/css" href="css/header.css" />
    <link rel="stylesheet" type="text/css" href="css/layout.css" />
      <link rel="stylesheet" type="text/css" href="css/section.css">
        <link rel="stylesheet" type="text/css" href="css/other.css">
        <script type="text/javascript" src="./js/login.js"></script>
    <script src="js/jquery-1.9.1.min.js"></script>
    <script src="js/gnb.js"></script>
    <script src="js/activity.js"></script>
  </head>
  <style>
  * {margin: 0 auto;}
  a {color:#333; text-decoration: none;}
  .find {text-align:center; width:1000px; margin-top:34px; }
  </style>
<script>
  function check_member(){
    if(!document.member_modify_check.pass.value){
      alert("비밀번호를 입력하세요");
      document.member_modify_check.pass.focus();
      return;
    }
      document.member_modify_check.submit();

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
      <div id="find_position">
        <div id="find_text">

          <div class="find">
            <form method="post" action="member_modify_check.php" name="member_modify_check">
              <h1><div style="font-size:20px; padding-bottom:20px; font-weight:bold;">정보수정을 위해 비밀번호를 입력해야합나다.</div></h1>
                <fieldset>
                  <legend></legend>
                    <table>
                      <tr>
                        <td>비밀번호 입력 : </td>
                        <td><input type="password" size="35" name="pass" placeholder="비밀번호"></td>
                          <td><a href="#"><img src="./image/aaa.PNG" onclick="check_member()"></a></td>
                      </tr>
                    </table>

                </fieldset>
            </form>
          </div>
        </div>
      </div>

    </section>

    <footer>
      <?php include "footer.php";?>
    </footer>
  </body>
</html>
