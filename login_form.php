<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" type="text/css" href="css/header.css" />
    <link rel="stylesheet" type="text/css" href="css/layout.css" />
      <link rel="stylesheet" type="text/css" href="css/section.css">
        <link rel="stylesheet" type="text/css" href="css/login.css">
        <script type="text/javascript" src="./js/login.js"></script>
          <link rel="stylesheet" type="text/css" href="css/test.css" />
    <script src="js/jquery-1.9.1.min.js"></script>
    <script src="js/gnb.js"></script>
    <script src="js/activity.js"></script>
  </head>
  <script>

     function check_input() {

       window.open("member_check_id.php?id=" + document.member_form.id.value,
           "IDcheck",
            "left=700,top=300,width=350,height=200,scrollbars=no,resizable=yes");

     }
  </script>

  <body>
    <header id="main_header">
      <?php include "header.php"; ?>
    </header>

    <section>

      <div id="main_content">
        <section class="container">
                <article class="half">
                      <h1>login</h1>
                      <div class="tabs">
                            <span class="tab signin active"><a href="#signin">Sign in</a></span>

                      </div>
                      <div class="content">
                            <div class="signin-cont cont">
                                  <form action="login.php" method="post" enctype="multipart/form-data">
                                        <input type="text" name="id" id="email" class="inpt" required="required" placeholder="Your ID">

                                        <input type="password" name="pass" id="password" class="inpt" required="required" placeholder="Your password">
                                        <input type="checkbox" id="remember" class="checkbox" checked>
                                        <label for="remember">Remember me</label>
                                        <div class="submit-wrap">
                                              <input type="submit" value="Sign in" class="submit">
                                              <a href="find.php" class="more">Forgot your password?</a>
                                        </div>
                                  </form>
                            </div>
                      </div>
                </article>
                <div class="half bg"></div>
          </section>
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
          <script type="text/javascript" src="./js/test.js"></script>



      </div> <!-- main_content -->
      </div>

    </section>

    <footer>
      <?php include "footer.php";?>
    </footer>
  </body>
</html>
