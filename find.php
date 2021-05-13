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


  <body>
    <header id="main_header">
      <?php include "header.php"; ?>
    </header>

    <section>
      <div id="find_position">
        <div id="find_text">
          <div class="find">
  <form method="post" action="find_id.php">
    <h1>회원계정 찾기</h1>
    <p><a href="/">홈으로</a></p>
      <fieldset>
        <legend>아이디 찾기</legend>
          <table style="border-spacing:0 10px;">
            <tr>
              <td>이름</td>
              <td><input type="text" size="35" name="name" placeholder="이름"></td>
            </tr>
            <tr>
              <td>이메일</td>
              <td><input type="text" name="email1">@<select name="email2" style="width:100px;height:25px;" >
                <option value="naver.com">naver.com</option>
                <option value="daum.net">daum.net</option>
                <option value="google.com">google.com</option>
              </select></td>
            </tr>
          </table>
        <input type="submit" value="아이디 찾기" />
    </fieldset>
  </form>
</div>
<div class="find">
    <form method="post" action="find_pw.php">
      <fieldset>
        <legend>비밀번호 찾기</legend>
          <table style="border-spacing:0 10px;">
            <tr>
              <td>아이디</td>
              <td><input type="text" size="35" name="id" placeholder="아이디"></td>
            </tr>
          </table>
        <input type="submit" value="비밀번호 찾기" />
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
