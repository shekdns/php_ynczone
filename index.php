<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>PHP</title>
    <!-- css 파일 -->
    <link rel="stylesheet" type="text/css" href="css/header.css" />
    <link rel="stylesheet" type="text/css" href="css/layout.css" />
    <link rel="stylesheet" type="text/css" href="css/section.css">

    <link rel="stylesheet"  href="https://han3283.cafe24.com/js/lightslider/css/lightslider.css"/>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="https://han3283.cafe24.com/js/lightslider/js/lightslider.js"></script>
    <script src="js/activity.js"></script>
    <!-- <script src="js/jquery-1.9.1.min.js"></script> -->
    <!-- 자바스크립트 제이쿼리 파일 -->
  </head>
  <script>
  $(document).ready(function() {
      $("#main_slider").lightSlider({
          mode:'slide',    // 이미지가 표시되는 형식 (fade / slide)
          loop:true,       // 무한반복 할 것인지
          auto:true,       // 자동 슬라이드
          keyPress:true,   // 키보드 탐색 허용
          pager:false,     // 페이지 표시
          speed:1500,      // 슬라이드 되는 속도
          pause:3000       // 이미지가 머무는 시간
      });
  });

  </script>
  <body>
    <header id="main_header">
      <?php include "header.php"; ?>

    </header>
    <section>
    <?php include "main.php"; ?>
    </section>

    <footer>
      <?php include "footer.php"; ?>
    </footer>

  </body>
</html>
