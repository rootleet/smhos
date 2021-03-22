<?php

    //includes
    include '../inc/db.php';
    include '../inc/functions.php';

    //get live incone query
    if(isset($_GET['update']))
    {

        $sql = "SELECT `amount_paid` FROM `payment` WHERE `date_paid` = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$today]);

        $payment = 0.00;

        while ($payment_row = $stmt->fetch(PDO::FETCH_ASSOC))
        {
            $p = $payment_row['amount_paid'];
            if ($p > 0)
            {
                $payment =+ $p;
            }
        }

        //check if there is dot
        if (explode('.',$payment) === true)
        {
            $act_live_income = $payment;
        }
        else
        {
            $act_live_income = $payment.'.00';
        }

        $cs_curr = $company_setup['currency'];
        $currency = fetchFunc('admin.currency','`id` = '.$cs_curr, $pdo)['symbol'];
        echo $currency . ' ' . $act_live_income;
    }

    //check shift start
    elseif (isset($_GET['check_sift_start']))
    {
        $date = date('d/m/Y');
        $shift_check = fetchFunc('admin.company_setup' , '`c_name` = "'.$company_setup['c_name'].'"',$pdo)['shift_start'];
        if ($shift_check === 1)
        {
            echo 'reload';
        }
        else
        {
            echo 'no_reload';
            echo $date;
        }
    }