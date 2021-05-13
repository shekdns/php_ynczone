
<?php


$con = mysqli_connect("localhost", "root", "", "project");
 mysqli_set_charset($con, 'utf8');

  $category = $_POST["category"];
  $pro_name = $_POST["pro_name"];
  $pro_price = $_POST["pro_price"];
  $pro_count = $_POST["pro_count"];
  $pro_memo = $_POST["pro_memo"];


  $img_name = $_FILES["img"]["name"][0];
  $tmp_name = $_FILES["img"]["tmp_name"][0];

  $img2_name = $_FILES["img"]["name"][1];
  $tmp2_name = $_FILES["img"]["tmp_name"][1];

  $img3_name = $_FILES["img"]["name"][2];
  $tmp3_name = $_FILES["img"]["tmp_name"][2];


  // var_dump($_FILES);

  $upload_dir = "./data/";
  $img_path = $upload_dir.$img_name;
  $img_path2 = $upload_dir.$img2_name;
  $img_path3 = $upload_dir.$img3_name;

  if(isset($img_name)){
    move_uploaded_file($tmp_name, $img_path);
  }
  if(isset($img2_name)){
    move_uploaded_file($tmp2_name, $img_path2);
  }
  if(isset($img3_name)){
    move_uploaded_file($tmp3_name, $img_path3);
  }

  	$sql = "insert into product(category, pro_name, pro_price, pro_count, price_memo, img, img2, img3, hit) ";

    $sql .= "values('$category', '$pro_name', '$pro_price', '$pro_count', '$pro_memo', '$img_path' , '$img_path2' , '$img_path3', 0)";

    mysqli_query($con, $sql);  // $sql 에 저장된 명령 실행W
    mysqli_close($con);

      echo "
          <script>
              location.href = 'product_list.php';
          </script>
      ";


 ?>
