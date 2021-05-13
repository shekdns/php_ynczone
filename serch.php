<?php

  $search_name = $_POST["serch"];

  $con = mysqli_connect("localhost", "root", "", "project");
  mysqli_set_charset($con, 'utf8');

  $sql = "select * from product where pro_name like '%$search_name%'";

   $result = mysqli_query($con,$sql);

  if(isset($result)){
    echo "<script>
    location.href = 'serch_result.php?pro_name=$search_name'
    </script>
    ";
  }

  if(!isset($result)){
    echo "<script>
    location.href = 'serch_false.php'
    </script>
    ";

  }



 ?>
