<?php
    require 'session.php';
    require 'db.php';
    require 'functions.php';
    $loc = "reports";

    if ( isset($_SESSION['reports_activity']) || !empty( $_SESSION['reports_activity'] )) {
        $activity = $_SESSION['reports_activity'];
        $view = $_SESSION['reports_view'];
    } else {
        die ("Error: Please if this is not a legal access, go back!!");
    }

    //bookings query
    $bookinsSql = "SELECT * FROM `bookings`";
    $bookingStmt = $pdo->prepare($bookinsSql);
    $bookingStmt->execute();
    $bookingsCount = $bookingStmt->rowCount();

    //payments query
    $paymentSql = "SELECT * FROM `payment` where `level` = 'Primary'";
    $paymentStmt = $pdo->prepare($paymentSql);
    $paymentStmt->execute();
    $paymentCount = $paymentStmt->rowCount();

    if (isset($_GET['update']))
    {
        echo 'hello';
    }
