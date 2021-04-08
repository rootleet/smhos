<?php
    // Initialize the session
    @!session_start();
    $today = date('Y-m-d');
    $hostN = 'http://localhost/smhos/';
    
    // Check if the user is logged in, if not then redirect to login page
    if(!isset($_SESSION["7c922db59b635d53f58462201588ee26"]) || $_SESSION["7c922db59b635d53f58462201588ee26"] !== true){

        $page = $_SERVER['SCRIPT_NAME'];
        if ($page === '/index.php')
        {

        }
        else
        {
            header("location: ../");
            exit;
        }

    }
    if(isset($_SESSION['7c922db59b635d53f58462201588ee26']) && $_SESSION['7c922db59b635d53f58462201588ee26'] === true)
    {
        include "db.php";
        include "permissions.php";

        date_default_timezone_set('Africa/Accra');

        //get company details
        $company_setup_sql = "SELECT * FROM `admin.company_setup`";
        $company_setup_stmt = $pdo->prepare($company_setup_sql);
        $company_setup_stmt->execute();
        $company_setup = $company_setup_stmt->fetch(PDO::FETCH_ASSOC);

        //currency
        $currency_sql = "SELECT * FROM `admin.currency` where `active` = 1";
        $currency_stmt = $pdo->prepare($currency_sql);
        $currency_stmt->execute();
        $currency = $currency_stmt->fetch(PDO::FETCH_ASSOC);
        $_SESSION['currency'] = $currency['symbol'];
        $_SESSION['curr_short'] = $currency['short'];



        //user config
        $user_details_sql = "SELECT * FROM `users` WHERE `id` = ?";
        $user_details_stmt = $pdo->prepare($user_details_sql);
        $user_details_stmt->execute([$_SESSION['id']]);
        $user_details = $user_details_stmt->fetch(PDO::FETCH_ASSOC);






    }

    //unsest session infos
?>



