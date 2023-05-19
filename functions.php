<?php

    include 'config.php';

    /**
     * checks either user is logged in or not
     * @return bool
     */
    function login_check(){
        // if(isset($_SESSION['login_id'])){
        //     return true;
        // }
        // return false;

        return (isset($_SESSION['login_id']))?true:false;
    }

    /**
     * @param $url (redirection location)
     * @return null
     */

     function redirect($url){
         header('location:'.$url);
     }

     function escape($field){
        global $dbconnect;
        return mysqli_escape_string($dbconnect,$field);
     }