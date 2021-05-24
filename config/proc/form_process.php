<?php
    require '../inc/session.php';
    require '../inc/db.php';


    if ($_SERVER['REQUEST_METHOD'] === 'POST')
    {
        //addExpenses
        if (isset($_POST['addExpenses']))
        {
            $reason = htmlentities($_POST['reason']);
            $amount = htmlentities($_POST['amount']);
            $title = htmlentities($_POST['title']);


            if (intval($amount) <= 0)
            {
                info("Amount must be more than ".$amount);
                back();
            }

            //insert date
            $owner = $user_details['username'];
            $values = "'".$title."',"."'".$reason."',"."'".$amount."',"."'".$owner."',"."'".$month."',"."'".$year."',"."'".$day."'";

            if (insertIntoDatabase('expenses' , "`title`,`reason`,`amount` , `owner` , `month` , `year` , `day`" , $values , $pdo))
            {
                info("Expense made, wait for approval");
                back();
            }
        }

        //add new tax
        elseif(isset($_POST['create_tax']))
        {
            $tax_desc = htmlspecialchars($_POST['tax_desc']);
            $tax_rate = htmlspecialchars($_POST['tax_rate']);


            $col = "`description`,`rate`,`date_added`,`time_added`,`owner`";
            $val = "'$tax_desc','$tax_rate','$today','$time','$owner'";

            insertIntoDatabase("tax_master",$col,$val,$pdo);
            info($tax_desc." added");
            gb('');
        }

        //save new edited item
        elseif(isset($_POST['commitEdit']))
        {
            //if committing company setup
            if (isset($_SESSION['company_setup_main']))
            {
                $main = $_SESSION['company_setup_main'];

                //if committing tax
                if ($main === 'Tax')
                {
                    //get values
                    $tax_desc = htmlentities($_POST['tax_desc']);
                    $tax_rate = htmlentities($_POST['tax_rate']);
                    $tax = $_SESSION['tax_id'];

                    //check if tax exist
                    if (rowsOf('tax_master', "`description` = '$tax_desc' AND `id` != $tax", $pdo) < 1)
                    {
                        //update
                        $set = "`description` = '$tax_desc', `rate` = '$tax_rate'";
                        updateRecord("tax_master","SET $set", "`id` = $tax",$pdo);
                    }

                    info("Tax Updated");
                    $_SESSION['company_setup_sub'] = "View";
                    gb('');
                }
            }


        }

        elseif(isset($_POST['saveNew']))
        {
            $main = $_SESSION['company_setup_main'];

            //if adding new tax
            if ($main === 'Tax')
            {
                //get values
                $tax_desc = htmlentities($_POST['tax_desc']);
                $tax_rate = htmlentities($_POST['tax_rate']);

                //check if tax exist
                if (rowsOf('tax_master', "`description` = '$tax_desc'", $pdo) < 1)
                {
                    //add
                    $col = "`description`,`rate`,`date_added`,`time_added`,`owner`";
                    $val = "'$tax_desc','$tax_rate','$today','$time','$owner'";

                    insertIntoDatabase("tax_master",$col,$val,$pdo);
                    info($tax_desc." added");

                    $_SESSION['tax'] = fetchFunc("tax_master","`id` > 0 ORDER BY `id` DESC", $pdo)['id'];

                }
                else
                {
                    info($tax_desc." Exist");
                }
                $_SESSION['company_setup_sub'] = "View";
                gb('');
            }
        }
    }
