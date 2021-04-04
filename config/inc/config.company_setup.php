<?php
    include "session.php";
    include "db.php";
    include "functions.php";

    $loc = 'company_setup';



    //config session
    $main = $_SESSION['company_setup_main'];
    $sub = $_SESSION['company_setup_sub'];
    $config = $_SESSION['company_setup_config'];

    //fetch company details
    $company = fetchFunc('`admin.company_setup`' , 'none' , $pdo);

    //get currency
    $act_curr_id = $company['currency'];
    // select currency
    $act_curr = fetchFunc('`admin.currency`' , '`id` = '.$act_curr_id, $pdo);

