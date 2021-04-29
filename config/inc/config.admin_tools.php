<?php
    include "session.php";
    include "db.php";
    include "functions.php";

    $loc = 'admin_tools';

    if (!isset($_SESSION['t_display']))
    {
        $_SESSION['t_display'] = 'Welcome';
    }
    $display = $_SESSION['t_display'];

    if (strtolower($display) === 'expenses')
    {
        //expenses query
        $expenses_count = rowsOf("expenses" , "`date_created` =  '$today'" , $pdo);
        $expenses_sql = "SELECT * FROM `expenses` WHERE `date_created` = '$today'";
        $expenses_stmt = $pdo->prepare($expenses_sql);
        $expenses_stmt->execute();
    }