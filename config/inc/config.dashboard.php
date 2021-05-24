<?php
    require 'session.php';
    require 'db.php';




    //total bookings
    $total_booking = rowsOf('bookings' , "`date_booked` = '$today'" , $pdo);

    //total checkin
    $total_checkin = rowsOf('check_in' , "`date` = '$today'" , $pdo);




    //daily earning
    $daily_earning = getSumOfColumn('payment' , 'amount_paid', "`date_paid` = '$today'" , $pdo);
    if (count(explode('.', $daily_earning)) === 1)
    {
        $daily_earning_exe = $daily_earning.'.00';
    }
    else
    {
        $daily_earning_exe = $daily_earning;
    }


    //initialize permission
//    $iniPermArray = ['dashboard'];
//    if (checkPermission($iniPermArray) !== true)
//    {
//
//        include '../../gui/msg/access_denied.html';
//        die();
//    }

    $company_setup_array = ['tax','payment_method','backup','modify_company'];

    //get sales
    $monthly_sales_sql = "SELECT * FROM `sales` WHERE `year` = '$year' AND `stage` = 'month'";
    $monthly_sales_stmt = $pdo->prepare($monthly_sales_sql);
    $monthly_sales_stmt->execute();
    $total_sales = getSumOfColumn("sales" , 'value' , "`year` = '$year'" , $pdo, 1);
    // get expenses
    $monthly_exp_sql = "SELECT * FROM `expenses` WHERE `year` = '$year' AND `stage` = 'month'";
    $monthly_exp_stmt = $pdo->prepare($monthly_exp_sql);
    $monthly_exp_stmt->execute();
    $total_exp = getSumOfColumn("expenses" , 'amount' , "`year` = '$year'" , $pdo, 1);

    $sales_max = fetchFunc("`sales` ORDER BY `value` DESC" , 'none', $pdo)['value'] + 50;
    $expenses_max = fetchFunc("`expenses` ORDER BY `amount` DESC" , 'none', $pdo)['amount'] + 50;
    if ($sales_max > $expenses_max)
    {
        $max = $sales_max;
    }
    elseif ($sales_max < $expenses_max)
    {
        $max = $expenses_max;
    }
    else
    {
        $max = $sales_max;
    }

    $sales_min = fetchFunc("`sales` ORDER BY `value` ASC" , 'none', $pdo)['value'] - 50;
    $expenses_min = fetchFunc("`expenses` ORDER BY `amount` ASC" , 'none', $pdo)['amount'] - 50;
    if ($sales_min < $expenses_min)
    {
        $min = $sales_min;
    }
    elseif ($sales_min > $expenses_min)
    {
        $min = $expenses_min;
    }
    else
    {
        $min = $sales_min;
    }






