<?php
    require 'session.php';
    require 'db.php';
    require 'functions.php';
    $loc = 'user_mgmt';

    if (isset($_SESSION['usermgmt_main']))
    {
        $usermgmt = $_SESSION['usermgmt_main'];
    }

    $main = $_SESSION['usermgmt_main'];
    $sub = $_SESSION['usermgmt_main_sub'];

    ###GEGERAL INITIALIZATION
    $group_count = rowsOf("user_access_level" , "none" , $pdo);
    $users_count = rowsOf("users" , "none" , $pdo);
    $online_users = rowsOf("users" , "`online` = 1" , $pdo);

    ##GROUP##
    if ($usermgmt === "groups")
    {
        //count groups

        if ($group_count > 0 )
        {

            //check if there is already a slected group 
            if (!isset($_SESSION['current_group']))
            {
                
                $fgSql = "SELECT * FROM `user_access_level` LIMIT 1";
                $fgStmt = $pdo->prepare($fgSql);
                $fgStmt->execute();
                $fgRes = $fgStmt->fetch(PDO::FETCH_ASSOC);
                $_SESSION['current_group'] = $fgRes['id'];

            }


            //get current group
            $current_group = $_SESSION['current_group'];
            if(ifRecordExist('user_access_level' , 'id' , $current_group , $pdo))
            {
                //get group details
                $current_group_sql = "SELECT * FROM `user_access_level` WHERE `id` = ?";
                $current_group_stmt = $pdo->prepare($current_group_sql);
                $current_group_stmt->execute([$current_group]);
                $group = $current_group_stmt->fetch(PDO::FETCH_ASSOC);

                $nextCount = '`id` > '.$current_group;
                $prevCount = '`id` < '.$current_group;

                //get previous
                $previous = nextPrevious('user_access_level' , $prevCount , $pdo);
                $next = nextPrevious('user_access_level' , $nextCount , $pdo);


            }
            else
            {
                echo "Group " .$current_group." Does not exist";
                die();
            }


        }
    }

    ##USER##
    elseif ($usermgmt === 'users')
    {
        //check users count
        if ($users_count > 0)
        {
            //check if current user is set
            if (!isset($_SESSION['curr_user']))
            {
                $get_single_user_sql = "SELECT * FROM `users` LIMIT 1";
                $get_single_user_stmt = $pdo->prepare($get_single_user_sql);
                $get_single_user_stmt->execute();
                $first_user = $get_single_user_stmt->fetch(PDO::FETCH_ASSOC);
                $first_user_id = $first_user['id'];
                $_SESSION['curr_user'] = $first_user_id;
            }

            //get current user details
            $curr_user = $_SESSION['curr_user'];

            //check if current user exist
            if (ifRecordExist('users' , 'id' , $curr_user, $pdo))
            {
                $curr_user_sql = "SELECT * FROM `users` WHERE `id` = ?";
                $curr_user_stmt = $pdo->prepare($curr_user_sql);
                $curr_user_stmt->execute([$curr_user]);
                $curr_user_det = $curr_user_stmt->fetch(PDO::FETCH_ASSOC);

                $user_id = $curr_user_det['id'];
                $username = $curr_user_det['username'];
                $ual = $curr_user_det['ual'];


                //get user access level
                if ($curr_user_det['ual'] === NULL)
                {
                    $access_level = "UNKNOWN";
                }
                else
                {
                    //get access level
                    $access_level_sql = "SELECT * FROM `user_access_level` WHERE `id` = ?";
                    $access_level_stmt = $pdo->prepare($access_level_sql);
                    $access_level_stmt->execute([$curr_user_det['ual']]);
                    $access_level_res = $access_level_stmt->fetch(PDO::FETCH_ASSOC);
                    $access_level = $access_level_res['name'];
                }

                $user_online = isConditionTrue('users' , 'online' , '`id` = '.$user_id , 'online' , $pdo);

                $nextCount = '`id` > '.$user_id;
                $prevCount = '`id` < '.$user_id;

                //get previous
                $previous = nextPrevious('users' , $prevCount , $pdo);
                $next = nextPrevious('users' , $nextCount , $pdo);
            }
            else
            {
                $nextCount = '`id` > '.$_SESSION['curr_user'];
                $prevCount = '`id` < '.$_SESSION['curr_user'];

                //get previous
                $previous = nextPrevious('users' , $prevCount , $pdo);

                $next = nextPrevious('users' , $nextCount , $pdo);
                if ($previous === true)
                {
                    $curr_user = $_SESSION['curr_user'];
                    $prev_user = isConditionTrue('users' , 'id' , '`id`<'.$curr_user.' ORDER BY `id` DESC LIMIT 1' , 'id' , $pdo);

                    $_SESSION['curr_user'] = $prev_user;
                    reload();
                }
                elseif ($next === true)
                {
                    $curr_user = $_SESSION['curr_user'];
                    $next_user = isConditionTrue('users' , 'id' , '`id`>'.$curr_user.' LIMIT 1' , 'id' , $pdo);

                    $_SESSION['curr_user'] = $next_user;
                    reload();
                }
                else
                {
                    echo 'confuse <br>';
                }

                echo 'user does not exist';
                die();
            }
        }
        else
        {

        }
    }
