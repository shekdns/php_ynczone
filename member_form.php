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
    if ((document.member_form.id.value.length > 8) || (!document.member_form.id.value)) {
        // alert("아이디를 입력하세요!");
        alert("아이디는 8자 이하이거나 반듯이 입력해야합니다.");
        document.member_form.id.focus();
        return;
    }

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

    if (!document.member_form.email1.value) {
        alert("이메일 주소를 입력하세요!");
        document.member_form.email1.focus();
        return;
    }

    if (!document.member_form.email2.value) {
        alert("이메일 주소를 입력하세요!");
        document.member_form.email2.focus();
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
     document.member_form.id.value = "";
     document.member_form.pass.value = "";
     document.member_form.pass_confirm.value = "";
     document.member_form.name.value = "";
     document.member_form.email1.value = "";
     document.member_form.email2.value = "";

     document.member_form.id.focus();
     return;
   }

  $(document).ready(function(e) {
  	$(".check").on("keyup", function(){ //check라는 클래스에 입력을 감지
  		var self = $(this);
  		var userid;

  		if(self.attr("id") === "userid"){
  			userid = self.val();
  		}

  		$.post( //post방식으로 id_check.php에 입력한 userid값을 넘깁니다
  			"member_check_id.php",
  			{ userid : userid },
  			function(data){
  				if(data){ //만약 data값이 전송되면
  					self.parent().parent().find("div").html(data); //div태그를 찾아 html방식으로 data를 뿌려줍니다.
  					self.parent().parent().find("div").css("color", "#F00"); //div 태그를 찾아 css효과로 빨간색을 설정합니다
  				}
  			}
  		);
  	});
  });
  </script>


  <body>
    <header id="main_header">
      <?php include "header.php"; ?>
    </header>

    <section>
      <div id="member_position">
        <div class="admin_text">

          <div id="mmm">
            회원가입
          </div>

        </div>
        <div id="member_content">

        <form  name="member_form" method="post" action="member_insert.php">
            <table style="border-collapse:separate; border-spacing:0 35px;" id="member_list">

            <tr height="2" bgcolor="#FFC8C3"><td colspan="2"></td></tr>

              <tr>
                <th>아이디</th>
                <td><input type="text" name="id" id="userid" class="check" placeholder="아이디" required />
                  <div id="id_check"></div>
                </td>

              </tr>
              <tr>
                <th>비밀번호</th>
                <td><input type="password" name="pass"  placeholder="비밀번호" required></td>
              </tr>
              <tr>
                <th>비밀번호 확인</th>
                <td><input type="password" name="pass_confirm"></td>
              </tr>
              <tr>
                <th>이름</th>
                <td><input type="text" name="name"></td>
              </tr>
              <tr>
                <th>이메일</th>
                <td><input type="text" name="email1">@<select class="" name="email2" style="width:100px;height:25px;">
                  <option value="naver.com">naver.com</option>
             <option value="daum.net">daum.net</option>
             <option value="google.com">google.com</option>
           </select>
                </td>
              </tr>
              <tr height="2" bgcolor="#FFC8C3"><td colspan="2"></td></tr>
              <tr>
                <td><a href="#"><img src="./image/member.PNG" onclick="check_input()"></a>&nbsp;
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
