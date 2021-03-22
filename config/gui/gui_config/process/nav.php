<?php
    @!session_start();

    function back()
    {
        header("Location:".$_SERVER['HTTP_REFERER']);
    }

    //config nav
    if(isset($_GET['config']))
    {
        $_SESSION['task_config_stage'] = intval($_GET['config']);
        back();
    }
