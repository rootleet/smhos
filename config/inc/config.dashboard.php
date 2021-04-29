<?php
    require 'session.php';
    require 'db.php';
    require 'functions.php';





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



