<?php
    include "session.php";
    include "db.php";

    $loc = 'admin_tools';

    if (!isset($_SESSION['t_display']))
    {
        $_SESSION['t_display'] = 'Welcome';
    }
    $display = $_SESSION['t_display'];

    if (strtolower($display) === 'expenses')
    {
        //expenses query
        $expenses_count = rowsOf("expenses" , "`month` =  '$month'  ORDER BY `id` DESC" , $pdo);
        $expenses_sql = "SELECT * FROM `expenses` WHERE `month` = '$month' ORDER BY `id` DESC";
        $expenses_stmt = $pdo->prepare($expenses_sql);
        $expenses_stmt->execute();
    }