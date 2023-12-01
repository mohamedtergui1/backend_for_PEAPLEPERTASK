<?php
session_start();
require("../dashboard/cnx.php");


if (isset($_POST['regester'])) {
    regestre();
} else if (isset($_POST['login'])) {
    login();
}









function login()
{
    require("../dashboard/cnx.php");

    if (empty($_POST['email']) || empty($_POST['password'])) {
        echo "You should enter your information to login";
    } else {
        $password = $_POST['password'];
        $email = $_POST['email'];
        $query = "SELECT * FROM users WHERE email = ? ";

        $stmt = mysqli_prepare($cnx, $query);

        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "s", $email);
            mysqli_stmt_execute($stmt);

            $result = mysqli_stmt_get_result($stmt);

            if ($result) {
                $row = mysqli_fetch_assoc($result);

                if ($row) {
                    $password_after_fetch = $row["password"];

                    if (password_verify($password, $password_after_fetch)) {
                        $role = $row["role"];
                        $id = $row["id"];

                        if ($role == "user") {
                            $_SESSION['role'] = 'user';
                            $_SESSION['id_user'] = $id;
                            header("Location:../index.php");
                        } else if ($role == "admin") {
                            $_SESSION['role'] = 'admin';
                            $_SESSION['id_admin'] = $id;
                            header("Location:../dashboard/dashboard.php");
                        } else {
                            echo "something is whrong";
                        }
                    }

                } else {
                    echo "Password is incorrect. Please try again";
                }
            } else {
                echo "You entered a wrong email";
            }
        } else {
            echo "Query execution failed";
        }

        mysqli_stmt_close($stmt);
    }

    mysqli_close($cnx);
}






function regestre()
{
    require("../dashboard/cnx.php");
    if (
        empty($_POST['fname']) || empty($_POST['lname'])
        || empty($_POST['email'])
        || empty($_POST['password']) || empty($_POST['region'])
        || empty($_POST['city']) || empty($_FILES['image'])
    ) {
        echo "you should enter your information to regester";
    } else {

        $fname_POST = $_POST["fname"];
        $lname_POST = $_POST["lname"];
        $password_POST = $_POST["password"];
        $email_POST = $_POST["email"];
        $city_POST = $_POST["city"];
        $region_POST = $_POST["region"];

        $password_POST = password_hash($password_POST, PASSWORD_DEFAULT);
        $image = $_FILES['image']['name'];
        $image_tmp = $_FILES['image']['tmp_name'];
        $destination_path = "../../images/users/" . $image;


        $add_user_query = "INSERT INTO users(username, password, email, city_id, id_region,image,role) VALUES ('$fname_POST $lname_POST', '$password_POST', '$email_POST', $city_POST, $region_POST,'$image','user')";
        $run_add_query = mysqli_query($cnx, $add_user_query);

        if ($run_add_query) {

            $bool = move_uploaded_file($image_tmp, $destination_path);
            if ($bool) {
                header('Location:../sign_in.php');
                exit();
            } else {
                echo "Eerror moving uploaded file";
            }
        } else {
            echo "Error: " . mysqli_error($cnx);
        }
    }
    mysqli_close($cnx);
}
