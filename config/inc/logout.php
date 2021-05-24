<?php

    require 'session.php';// Initialize the session
    require 'db.php';

    //update user status
    if(updateRecord('users','SET `online` = 0' , '`id` = '.$_SESSION['id'] , $pdo))
    {
        //log user activity

        $cols = "`user_id`,`username`,`func`";
        $vals = $_SESSION['id'] . ',' ."'". $_SESSION['username'] ."'". ',' . "'".'logout'."'";

        insertIntoDatabase('user_login_log',$cols, $vals, $pdo);
    }

    // Unset all of the session variables
    $_SESSION = array();
        
    // Destroy the session.
    session_destroy();


    // Redirect to login page
    header("location: ../../");
    exit;
