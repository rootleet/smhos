<?php
    include "session.php";
    include "db.php";

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

    if ($main === 'Tax')
    {
        //count tax
        $tax_count = rowsOf("tax_master",'none',$pdo);
        if ($tax_count > 0)
        {
            if (!isset($_SESSION['tax_id']))
            {
                $_SESSION['tax_id'] = fetchFunc("tax_master",'none', $pdo)['id'];
            }


            $tax_id = $_SESSION['tax_id'];

            //get tax details
            $tax = fetchFunc("tax_master", "`id` = $tax_id", $pdo);
            $t_d = $tax['description'];


            if ($sub === 'View')
            {

                //get next
                $next_count = rowsOf("tax_master","`id` > $tax_id",$pdo);
                //get previous
                $previous_count = rowsOf("tax_master","`id` < $tax_id",$pdo);

            }



        }

    }
