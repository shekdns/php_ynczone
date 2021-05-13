<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" type="text/css" href="css/header.css" />
    <link rel="stylesheet" type="text/css" href="css/layout.css" />
      <link rel="stylesheet" type="text/css" href="css/section.css">
        <link rel="stylesheet" type="text/css" href="css/board.css">
        <script type="text/javascript" src="./js/login.js"></script>
    <script src="js/jquery-1.9.1.min.js"></script>
    <script src="js/gnb.js"></script>
    <script src="js/activity.js"></script>
  </head>
  <style media="screen">
  <style>
          table.table2{
                  border-collapse: separate;
                  border-spacing: 1px;
                  text-align: left;
                  line-height: 1.5;
                  border-top: 1px solid #ccc;
                  margin : 20px 10px;
          }
          table.table2 tr {
                   width: 50px;
                   padding: 10px;
                  font-weight: bold;
                  vertical-align: top;
                  border-bottom: 1px solid #ccc;
          }
          table.table2 td {
                   width: 100px;
                   padding: 10px;
                   vertical-align: top;
                   border-bottom: 1px solid #ccc;
          }
  </style>
  <script>
  function board_check(){
    if(!document.write_form.name.value){
      alert("이름을 입력하세요!");
      document.write_form.id.focus();
      return;
    }
    if(!document.write_form.title.value){
      alert("제목을 입력하세요!");
      document.write_form.title.focus();
      return;
    }
    if(!document.write_form.content.value){
      alert("글을 입력하세요!");
      document.write_form.content.focus();
      return;
    }
    if(!document.write_form.pass.value){
      alert("비밀번호를 입력하세요!");
      document.write_form.pass.focus();
      return;
    }

    document.write_form.submit();
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
      <div id="write_position">

        <div id="write_text">
          <form method = "post" action = "user_write_insert.php" enctype="multipart/form-data" name="write_form">
            <table style="padding-top:20px" align = center width=700 border=0 cellpadding=2 >
          <tr>
          <td height=20 align= center bgcolor=#ccc><font color=white> 글쓰기</font></td>
          </tr>
          <tr>
          <td bgcolor=white>
          <table class = "table2">
                  <tr>
                  <td>작성자</td>
                  <td><input type="text" name ="name" size=20> </td>
                  </tr>

                  <tr>
                  <td>제목</td>
                  <td><input type = "text" name = "title" size=60></td>
                  </tr>

                  <tr>
                  <td>내용</td>
                  <td><textarea name = "content" cols=85 rows=15></textarea></td>
                  </tr>

                  <tr>
                  <td>이미지</td>
                  <td><input type="file" name="img" multiple="multiple" class="input_size"></td>
                </tr>

                  <tr>
                  <td>비밀번호</td>
                  <td><input type = "password" name = "pass" size=10 maxlength=10></td>
                  <input type="hidden" name="locked" value="1">
                  </tr>
                  </table>

                  <center style="padding-top:10px;">
                  <a href="#"><img src="./image/board.PNG" onclick="board_check()"></a>

                  </center>
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
