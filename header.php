<script src="js/gnb.js"></script>
<script>
  function bookmarksite(title,url){
    if (document.all) { //msie
        window.external.AddFavorite(url, title);
    } else {
        alert("해당브라우저는 즐겨찾기 추가기능이 지원되지 않습니다.\n\n수동으로 즐겨찾기에 추가해주세요.");
        return true;
    }
  }

</script>
<?php

session_start();
//  isset 값이 잇나 없나 검사하는 함수
//  ex 유저 아이디가 존재하면 변수에다가 세션 변수를 담아줌 아니면 흘러가기 밑으로
if (isset($_SESSION["userid"])) $userid = $_SESSION["userid"];
else $userid = "";
if (isset($_SESSION["username"])) $username = $_SESSION["username"];
else $username = "";
if (isset($_SESSION["userlevel"])) $userlevel = $_SESSION["userlevel"];
else $userlevel = "";
if (isset($_SESSION["userpoint"])) $userpoint = $_SESSION["userpoint"];
else $userpoint = "";

 ?>
  <!-- <?php include "counter.php"; ?> -->

<div class="top">
 <div class="wrapper">
   <div id="login_menu">
    <ul class="login_menu">
        <?php
          $logged = $username."(".$userid.")님[Level:".$userlevel.", Point:".$userpoint."]";
          if(!$userid){
         ?>
          <li class="sometimes"><a href="javascript:bookmarksite('YNCZONE','http://172.16.136.39/final2/index.php')"><p>즐겨찾기</p></a></li>
          <li class="sometimes"><a href="board_view.php"><p>Q&A</p></a></li>
          <li class="test"><a href="member_form.php"><p>회원가입</p></a></li>
          <li class="test"><a href="login_form.php"><p>로그인</p></a></li>
        <?php
      } else if($userlevel==100){
        ?>
            <li class="sometimes"><a href="board_view.php"><p>Q&A</p></a></li>
        <li class="test"><a href="admin_main.php"><p>관리자페이지</p></a></li>
          <li class="test"><a href="product_list.php"><p>상품목록관리</p></a></li>
          <li class="test"><a href="logout.php"><p>로그아웃<p></a> </li>
          <li class="test"><a href="#"><p><?=$logged?></p></a></li>
        <?php
      }
      else {
         ?>
           <li class="sometimes"><a href="#"><p>즐겨찾기</p></a></li>
               <li class="sometimes"><a href="board_view.php"><p>Q&A</p></a></li>
          <li class="test"><a href="basket_view.php"><p>장바구니</p></a></li>
          <li class="test"><a href="mypage.php?id=<?=$userid?>"><p>마이페이지</p></a></li>
              <li class="test"><a href="logout.php"><p>로그아웃<p></a> </li>
          <li class="test"><a href="#"><p><?=$logged?></p></a></li>
         <?php
       }
          ?>
      </ul>
    </div>
    <div id="header_menu">
      <h1 class="logo">
        <a href="index.php"><img class="Slogo" src="/final2/image/SLoge_white.png" /></a>

      </h1>
      <form name="serch_form" action="serch.php" method="post">
      <div class="serch">
      <span class='green_window'>
      <input type='text' class='input_text' name="serch" placeholder="검색어를 입력해주세요."/>
    </span>
    <button type='submit' class='sch_smit'>검색</button>
      </div>
      </form>

      <!-- 슬라이드 쇼 -->
      <div class="slide">
         <ul>
           <li><img src="/final2/image/main_icon01.jpg"></li>
           <li><img src="/final2/image/main_icon03.jpg"></li>
           <li><img src="/final2/image/main_icon04.jpg"></li>
         </ul>
       </div>
     </div>
  </div>
  <!-- 카테고리 별 이동 연결 -->
  <?php

    $con = mysqli_connect("localhost", "root", "", "project");
    mysqli_set_charset($con, 'utf8');
    $sql = "select * from product order by num";

    $result = mysqli_query($con, $sql);
    $data = mysqli_fetch_array($result);

   ?>

  <div id="wrap">
    <!--top_wrap-->
    <div class="top_wrap">

      <!--드롭다운메뉴-->
      <div id="gnb">
        <div class="gnb_wrap">
          <ul id="gnb_menu">
            <li id="menu01"><a href="" class="dep01">아우터</a> <!--대분류넣는곳-->
              <div id="dep02_01" class="dep02">
                <div class="sub_nav">
                  <div class="sub_rt_nav">
                    <ul class="dep02_nav">
                      <?php
                       $c_array=['자켓', '패딩', '청바지', '반바지', '셔츠', 'M2M', '구두', '운동화'];
                       ?>

                    <li><a href="category_view.php?category=<?=$c_array[0];?>">자켓</a></li>
                    <li><a href="category_view.php?category=<?=$c_array[1];?>">패딩</a></li>
                    </ul>

                    <ul class="dep02_nav">
                      <li><a href="category_view.php?category=<?=$c_array[2];?>">청바지</a></li>
                      <li><a href="category_view.php?category=<?=$c_array[3];?>">반바지</a></li>
                    </ul>
                    <ul class="dep02_nav">
                      <li><a href="category_view.php?category=<?=$c_array[4];?>">셔츠</a></li>
                      <li><a href="category_view.php?category=<?=$c_array[5];?>">맨투맨</a></li>
                    </ul>
                    <ul class="dep02_nav">
                      <li><a href="category_view.php?category=<?=$c_array[6];?>">구두</a></li>
                      <li><a href="category_view.php?category=<?=$c_array[7];?>">운동화</a></li>
                    </ul>

                  </div>
                </div>
              </div>
            </li>

            <li id="menu02"><a href="#" class="dep01">바지</a> <!--대분류넣는곳-->
              <div id="dep02_02" class="dep02">
                <div class="sub_nav">
                  <div class="sub_rt_nav">
                    <ul class="dep02_nav">

                    <li><a href="category_view.php?category=<?=$c_array[0];?>">자켓</a></li>
                    <li><a href="category_view.php?category=<?=$c_array[1];?>">패딩</a></li>
                    </ul>

                    <ul class="dep02_nav">
                      <li><a href="category_view.php?category=<?=$c_array[2];?>">청바지</a></li>
                      <li><a href="category_view.php?category=<?=$c_array[3];?>">반바지</a></li>
                    </ul>
                    <ul class="dep02_nav">
                      <li><a href="category_view.php?category=<?=$c_array[4];?>">셔츠</a></li>
                      <li><a href="category_view.php?category=<?=$c_array[5];?>">맨투맨</a></li>
                    </ul>
                    <ul class="dep02_nav">
                      <li><a href="category_view.php?category=<?=$c_array[6];?>">구두</a></li>
                      <li><a href="category_view.php?category=<?=$c_array[7];?>">운동화</a></li>
                    </ul>
                  </div>
                </div>
              </div>
            </li>

            <li id="menu03"><a href="" class="dep01">상의</a> <!--대분류넣는곳-->
              <div id="dep02_03" class="dep02">
                <div class="sub_nav">
                  <div class="sub_rt_nav">
                    <ul class="dep02_nav">

                    <li><a href="category_view.php?category=<?=$c_array[0];?>">자켓</a></li>
                    <li><a href="category_view.php?category=<?=$c_array[1];?>">패딩</a></li>
                    </ul>

                    <ul class="dep02_nav">
                      <li><a href="category_view.php?category=<?=$c_array[2];?>">청바지</a></li>
                      <li><a href="category_view.php?category=<?=$c_array[3];?>">반바지</a></li>
                    </ul>
                    <ul class="dep02_nav">
                      <li><a href="category_view.php?category=<?=$c_array[4];?>">셔츠</a></li>
                      <li><a href="category_view.php?category=<?=$c_array[5];?>">맨투맨</a></li>
                    </ul>
                    <ul class="dep02_nav">
                      <li><a href="category_view.php?category=<?=$c_array[6];?>">구두</a></li>
                      <li><a href="category_view.php?category=<?=$c_array[7];?>">운동화</a></li>
                    </ul>
                  </div>
                </div>
              </div>
            </li>

            <li id="menu04"><a href="" class="dep01">신발</a> <!--대분류넣는곳-->
              <div id="dep02_04" class="dep02">
                <div class="sub_nav">
                  <div class="sub_rt_nav">
                    <ul class="dep02_nav">

                    <li><a href="category_view.php?category=<?=$c_array[0];?>">자켓</a></li>
                    <li><a href="category_view.php?category=<?=$c_array[1];?>">패딩</a></li>
                    </ul>

                    <ul class="dep02_nav">
                      <li><a href="category_view.php?category=<?=$c_array[2];?>">청바지</a></li>
                      <li><a href="category_view.php?category=<?=$c_array[3];?>">반바지</a></li>
                    </ul>
                    <ul class="dep02_nav">
                      <li><a href="category_view.php?category=<?=$c_array[4];?>">셔츠</a></li>
                      <li><a href="category_view.php?category=<?=$c_array[5];?>">맨투맨</a></li>
                    </ul>
                    <ul class="dep02_nav">
                      <li><a href="category_view.php?category=<?=$c_array[6];?>">구두</a></li>
                      <li><a href="category_view.php?category=<?=$c_array[7];?>">운동화</a></li>
                    </ul>
                  </div>
                </div>
              </div>
            </li>

          </ul>
        </div>
      </div>
      <!--//드롭다운메뉴-->
    </div>
    <!--//top_wrap-->

  </div>
</div>
