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
    function check(){
      if(!document.find_form.pw.value){
        alert("비밀번호를 입력하세요");
        document.find_form.pw.focus();
        return;

      }
      document.find_form.submit();

    }

  </script>

  <body>
    <header id="main_header">
      <?php include "header.php"; ?>
    </header>

    <?php
    $id = $_GET["id"];
     ?>
    <section>
      <div id="find_position">
        <div id="find_text">

          <div class="find">
            <form method="post" action="find_pw_update_ok.php" name="find_form">
              <input type="hidden" name="id" value="<?=$id?>">
              <h1>비밀번호 변경</h1>
                <fieldset>
                  <legend></legend>
                    <table>
                      <tr>
                        <td>비밀번호 변경 : </td>
                        <td><input type="password" size="35" name="pw" placeholder="변경비밀번호"></td>
                      </tr>
                    </table>
                <a href="#"><img src="./image/aaa.png" onclick="check()"></a>
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
