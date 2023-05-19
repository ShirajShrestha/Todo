<?php
include 'functions.php';
if (login_check() == false) {
    redirect('index.php');
}

if (isset($_POST['todo_action']) and $_POST['todo_action'] == 'add') {
    $title = escape($_POST['title']);
    $description = escape($_POST['description']);
    $user_id = (int) $_SESSION['login_id'];

    $sql = "insert into todo (title, description, user_id) values ('$title','$description','$user_id')";

    if(mysqli_query($dbconnect, $sql)){
        $_SESSION['msg'] = "Record Saved";
        redirect('dashboard.php');
    }

}
else if(isset($_GET['did'])){
    $id = (int)$_GET['did'];

    $sql = "delete from todo where id = $id";
    if(mysqli_query($dbconnect,$sql)){
        $_SESSION['msg']= "Record deleted";
        redirect('dashboard.php');
    }
}
else if (isset($_POST['todo_action']) and $_POST['todo_action'] == 'edit'){
    $id = (int)$_POST['id'];
    $title = escape($_POST['title']);
    $description = escape($_POST['description']);

    $sql = "update todo set title = '$title', description = '$description' where id = $id";

    if(mysqli_query($dbconnect, $sql)){
        $_SESSION['msg'] = "Record Edited";
        redirect('dashboard.php');
    }

}
else {
    redirect('dashboard.php');
}
