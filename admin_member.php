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


  <body>
    <header id="main_header">
      <?php include "header.php"; ?>
    </header>

    <?php
    if($userlevel < 99){
      echo("
          <script>
          alert('관리자가 아닙니다! 관리자 페이지는 관리자만 가능합니다!');
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
          관리자 회원 관리
        </div>
      <div class="common_section">

      </div>
      </div>

    </section>

    <footer>
      <?php include "footer.php";?>
    </footer>
  </body>
</html>
