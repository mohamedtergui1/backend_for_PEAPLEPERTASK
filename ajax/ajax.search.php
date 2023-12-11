<?php require("../src/dashboard/cnx.php");

if (isset($_POST['search'])) {
    $s = $_POST['search'];
    $s.="%";
    $a="%".$s;
    $query = "SELECT projects.id as id, users.image as user_image, projectNAME, projrctDescription, users.username as user, name as categoryNAME, souscategoriesNAME, projects.image as image
    FROM projects
    INNER JOIN categories ON projects.categoriesID=categories.id
    INNER JOIN souscategories ON projects.souscategoriesID=souscategories.id
    INNER JOIN users ON projects.usersID=users.id
    WHERE projectNAME LIKE ? OR projectNAME LIKE ? ";
    $stmt = mysqli_prepare($cnx, $query);
    mysqli_stmt_bind_param($stmt, 'ss', $s, $a);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
     if(mysqli_num_rows($result)>0){
        while($row = mysqli_fetch_assoc($result)){
            $tab[]=$row;  
     }
     echo json_encode($tab);
    } 
}