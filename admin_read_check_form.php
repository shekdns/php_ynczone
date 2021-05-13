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
  .view_btn {
  text-align: center;
  margin: auto;
  margin-top: 50px;
  }
  .view_btn1 {
  height: 50px;
  width: 100px;
  font-size: 20px;
  text-align: center;
  background-color: white;
  border: 2px solid black;
  border-radius: 10px;
  }
  #check_go{
    height: 50px;
    width: 100px;
    font-size: 20px;
    text-align: center;
    background-color: white;
    border: 2px solid black;
    border-radius: 10px;

  }

  .view_btn1 a:hover {
    background: #ccc;
    color: #fff;
  }
  </style>


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
    <script>
      function check_read(){
        //   var userid = '<?= $userid ?>';
        //
        //   if(!document.check_form.pass.value){
        //     alert("비밀번호를 입력하세요");
        //     document.check_form.pass.focus();
        //     return;
        // }else if(userid == 'admin'){
        // document.check_form.submit();
        // }
        document.check_form.submit();
      }
      function back(){
        location.href='board_view.php';
      }

    </script>


    <section>
      <?php
        $num = $_GET["num"];
       ?>
      <div id="find_position">
        <div id="find_text">

          <div class="find">
            <form method="post" action="admin_read_check.php?num=<?=$num?>" name="check_form">
              <h1><div style="font-size:20px; padding-bottom:20px; font-weight:bold;">질문글 비밀번호랑 동일합니다.
              <br>관리자는 확인버튼만 누르시면됩니다.</div></h1>
                <fieldset>
                  <legend></legend>
                    <table>
                      <tr>
                        <td>비밀번호 입력 : </td>
                        <td><input type="password" size="35" name="pass" placeholder="비밀번호"></td>
                        <td><a href="#"><img src="./image/aaa.PNG" onclick="check_read()"></a></td>
                      </tr>

                    </table>
                </fieldset>

            </form>
              <a href="#"><button class="view_btn1" onclick="back()">목록</button></a>
          </div>

        </div>
      </div>

    </section>

    <footer>
      <?php include "footer.php";?>
    </footer>
  </body>
</html>
