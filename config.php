<?php
    session_start();
    //db server credentials
    $hostname = 'localhost';
    $hostuser = 'root';
    $hostpass = '';
    $dbname = 'todo-project';

    //connection
    $dbconnect = mysqli_connect($hostname,$hostuser,$hostpass,$dbname);

    if($dbconnect){
        // echo "Server connected. ";
    }
    else{
        die("Error in connection");
    }
?>