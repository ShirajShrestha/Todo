<?php

include 'config.php';

if (isset($_POST['action'])) {
    if ($_POST['action'] == 'login') {
        $email = mysqli_escape_string($dbconnect, $_POST['email']);
        $password = mysqli_escape_string($dbconnect, $_POST['password']);

        $sql = "select * from users where email = '$email'";

        $sqlExec = mysqli_query($dbconnect, $sql);

        $data = mysqli_fetch_assoc($sqlExec);
        if ($data == null) {
            $_SESSION['msg'] = "user not found";
            header('location:index.php');
            exit;
        } else {
            $userPassword = $data['password'];
            if (password_verify($password, $userPassword)) {

                $_SESSION['login_id']=$data['id'];
                $_SESSION['name']=$data['name'];
                header('location:dashboard.php');
                // echo json_encode("logged in");
            } else {
                $_SESSION['msg'] = "Invalid username or password";
                header('location:index.php');
                exit;
            }
        }
    } else if ($_POST['action'] == 'register') {
        $name = mysqli_escape_string($dbconnect, $_POST['name']);
        $email = mysqli_escape_string($dbconnect, $_POST['email']);
        $password = mysqli_escape_string($dbconnect, $_POST['password']);

        $password = password_hash($password, PASSWORD_DEFAULT);

        $image = $_FILES['image']['name'];

        $extension = pathinfo($image, PATHINFO_EXTENSION);

        $new_name = rand() . "." . time() . "." . $extension;

        move_uploaded_file($_FILES['image']['tmp_name'], "uploads/$new_name");

        $sql = "insert into users (name,email,password,image) values('$name', '$email','$password','$new_name')";
        mysqli_query($dbconnect, $sql);
    }
} else {
    header('location:index.php');
}
