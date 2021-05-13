<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" type="text/css" href="css/header.css" />
    <link rel="stylesheet" type="text/css" href="css/layout.css" />
      <link rel="stylesheet" type="text/css" href="css/section.css">
        <link rel="stylesheet" type="text/css" href="css/board.css">
          <link rel="stylesheet" type="text/css" href="css/read.css">
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
      <div id="read_position">

      <div id="read_text">
        <?php
        $num = $_GET["num"];
        $con = mysqli_connect("localhost", "root", "", "project");
        mysqli_set_charset($con, 'utf8');
        $sql = "select * from uboard where num ='$num'";
        $result = mysqli_query($con, $sql);
        $data = mysqli_fetch_array($result);

        $check_id = $data['session_id'];
        $hit = $data['hit'];
        $new_hit = $hit + 1;
        $sql = "update uboard set hit=$new_hit where num=$num";
        mysqli_query($con, $sql);
         ?>
        <table class="view_table" align=center>
            <tr>
             <td colspan="4" class="view_title"><?=$data['title']?></td>
           </tr>
           <tr>
             <td class="view_id">작성자</td>
             <td class="view_id2"><?=$data['name']?></td>
             <td class="view_hit">조회수</td>
             <td class="view_hit2"><?=$data['hit']?></td>
           </tr>
           <tr>
             <td colspan="4" class="view_content" valign="top">
             <?php if($data['img']!='./data/'){ ?>
             <img src="<?=$data['img']?>" width="200px" height="200px"><br><?=$data['content']?></td>
           <?php }else{ ?>
             <?=$data['content']?></td>
           <?php } ?>
           </tr>
         </table>


     <!-- MODIFY & DELETE -->
     <div class="view_btn">
             <button class="view_btn1" onclick="location.href='board_view.php'">목록으로</button>
             <!-- <?php if($userid == $check_id){ ?>
             <button class="view_btn1" onclick="location.href='./modify.php?num=<?=$num?>&id=<?=$userid?>'">수정</button>
             <button class="view_btn1" onclick="location.href='./delete.php?num=<?=$num?>&id=<?=$userid?>'">삭제</button>
           <?php } ?> -->
           </div>


      </div>

      </div>

    </section>

    <footer>
      <?php include "footer.php";?>
    </footer>
  </body>
</html>
