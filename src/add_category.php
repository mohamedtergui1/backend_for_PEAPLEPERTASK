
<?php
require("cnx.php");
    if(isset($_POST['nom_cetegoty'])){  
  $input_add_cate_value = $_POST['nom_cetegoty'];
  $query ="INSERT INTO categories (name) VALUES ('$input_add_cate_value')";
  $run_qeury=mysqli_query($cnx,$query);
  header('Location:CategoryManagement.php');
  } else{
    echo "<h1> eroor</h1>";
  }
      mysqli_close($cnx);
?>