<?php
    require '../inc/session.php';
    require '../inc/db.php';
    require '../inc/functions.php';

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
            $values = "'".$title."',"."'".$reason."',"."'".$amount."',"."'".$owner."'";
            if (insertIntoDatabase('expenses' , "`title`,`reason`,`amount` , `owner`" , $values , $pdo))
            {
                info("Expense made, wait for approval");
                back();
            }
        }
    }
