<?php
    include "session.php";
    include "db.php";
    include "functions.php";

    //fetch company details
    $company = fetchFunc('`admin.company_setup`' , 'none' , $pdo);

    //get currency
    $act_curr_id = $company['currency'];
    // select currency
    $act_curr = fetchFunc('`admin.currency`' , '`id` = '.$act_curr_id, $pdo);

