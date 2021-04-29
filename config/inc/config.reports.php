<?php
    require 'session.php';
    require 'db.php';
    require 'functions.php';
    require 'fpdf182/fpdf.php';
    $loc = "reports";


    if ( isset($_SESSION['reports_activity']) || !empty( $_SESSION['reports_activity'] )) {
        $activity = $_SESSION['reports_activity'];
        $view = $_SESSION['reports_view'];

        //QUERIES
        if ($activity === 'main')
        {
            //bookings counts
            $bookings = rowsOf("bookings" , "`date_booked` = '$today'" , $pdo);

            $payments = rowsOf("payment" , "`date_paid` = '$today'" , $pdo); //paymemts count
            $paymentsCal = $_SESSION['currency'] . ' '. getSumOfColumn("payment" , 'amount_paid' , "`date_paid` = '$today'" , $pdo);

            $refund = rowsOf('payment', "`refund` = 1 AND `date_paid` = '$today'" , $pdo); //refund
            $refundCal = $_SESSION['currency'] . ' ' . getSumOfColumn("payment" , 'amount_paid' , "`refund` = 1 AND `date_paid` = '$today'" , $pdo);

            $checkin = rowsOf("check_in" , "`date` = '$today'" , $pdo); //check in
            $checkout = rowsOf("check_out" , "`date_recorded` = '$today'" , $pdo); //check out

        }

    } else {
        die ("Error: Please if this is not a legal access, go back!!");
    }








    if (isset($_GET['update']))
    {
        echo 'hello';
    }


    //live income queries
    if ($activity === 'Live Income')
    {

        //cash payment
        $cash_income = getSumOfColumn(
            'payment',
            'amount_paid',
            "`date_paid` = '$today' AND `method` = '1'",
            $pdo
        );

        //momo payments
        $momo_income = getSumOfColumn(
            'payment',
            'amount_paid',
            "`date_paid` = '$today' AND `method` = '2'",
            $pdo
        );

        //card payment
        $card_income = getSumOfColumn(
            'payment',
            'amount_paid',
            "`date_paid` = '$today' AND `method` = '3'",
            $pdo
        );



    }

    //booking
    elseif ($activity === 'Booking')
    {
        //bookings query
        $bookinsSql = "SELECT * FROM `bookings` WHERE `refund` = 0";
        $bookingStmt = $pdo->prepare($bookinsSql);
        $bookingStmt->execute();
        $bookingsCount = $bookingStmt->rowCount();

        if ($view === 'View Record')
        {
            $record_id = $_SESSION['record_id'];
            $record = fetchFunc('bookings' , "`id`=$record_id" , $pdo);

            //facility details
            $fac = $record['facility'];
            $facility = fetchFunc("facilities" , "`id` = $fac", $pdo)['name'];
            $fac_category = fetchFunc("facilities" , "`id` = $fac", $pdo)['facCat'];
            //get facility category charge type
            $charges_type = fetchFunc("facCat" , "`id` = $fac_category", $pdo)['charges_type'];

            //get amount paid so far;
            $booking_cost = $record['cost'];
            $total_paid = getSumOfColumn('payment' , 'amount_paid' , "`booking` = $record_id", $pdo);

            if ($booking_cost === $total_paid)
            {
                $paid_bg = 'bg-success';
                $toggle = 'Fully Paid ( ' . $_SESSION['currency'] . ' ' .$total_paid.' )';
            }
            elseif ($booking_cost > $total_paid)
            {
                $paid_bg = 'bg-danger';
                $toggle = 'Top up of '. $_SESSION['currency'] . ' '  . ($booking_cost - $total_paid) .' to be paid';
            }
            elseif ($booking_cost < $total_paid)
            {
                $paid_bg = 'bg-warning';
                $toggle = 'Balance of ' . $_SESSION['currency'] . ' ' . ($total_paid - $booking_cost) .' to be paid';
            }
        }
    }

    //Payment
    elseif ($activity === 'Payment')
    {
        //payments query
        $paymentSql = "SELECT * FROM `payment` where `level` = 'Primary'";
        $paymentStmt = $pdo->prepare($paymentSql);
        $paymentStmt->execute();


        $payments = fetchFunc('payment' , "`level` = 'Primary' AND `refund` = 0", $pdo);
        $paymentCount = rowsOf('payment' , "`level` = 'Primary' AND `refund` = 0" , $pdo);

        if ($view === 'View Record')
        {
            $record_id = $_SESSION['record_id'];
            //get subs from view
            $subPaymentsCount = rowsOf("payment" , "`master` = $record_id", $pdo);

        }

    }

    //checkin
    elseif ($activity === 'CheckIn')
    {
        //check in query
        $checkin_sql = "SELECT * FROM `check_in`";
        $checkin_stmt = $pdo->prepare($checkin_sql);
        $checkin_stmt->execute();
        $checkin_count = $checkin_stmt->rowCount();
    }


