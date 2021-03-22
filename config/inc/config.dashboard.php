<?php
    require 'session.php';
    require 'db.php';
    require 'functions.php';





    //total bookings
    $total_booking = rowsOf('bookings' , "`date_booked` = '$today'" , $pdo);

    //total checkin
    $total_checkin = rowsOf('check_in' , "`date` = '$today'" , $pdo);

    //get_currency
    $cs_curr = $company_setup['currency'];
    $currency = fetchFunc('admin.currency','`id` = '.$cs_curr, $pdo)['symbol'];


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

    //check_master_shift
    $date = date('d/m/Y');

    $shift_check = fetchFunc('admin.company_setup' , '`c_name` = "'.$company_setup['c_name'].'"',$pdo)['shift_start'];
    if ($shift_check === 1)
    {
        $shift = true;
        //get_shift_details
        $shit_detail = fetchFunc('`shift` ORDER BY `id` DESC' , "none", $pdo);
        $shift_time = $shit_detail['shift_time'];
    }
    else
    {
        $shift = false;
    }


