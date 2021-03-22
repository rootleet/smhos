<?php
    include '../inc/session.php';
    include '../inc/db.php';
    require '../inc/functions.php';
    $main = $_SESSION['usermgmt_main'];
    $sub = $_SESSION['usermgmt_main_sub'];

    ######################
    ### navigating among #
    ### mains           ##
    ######################
    if(isset($_GET['nav']))
    {
        $level = $_GET['level'];
        if($level === 'top')
        {
            $to = $_GET['to'];
            $_SESSION['usermgmt_main'] = $to;
            header("Location:".$_SERVER['HTTP_REFERER']);
        }
        elseif ($level === 'sub')
        {
            $action = $_GET['to'];
            $_SESSION['usermgmt_main_sub'] = $action;
            gb($_SERVER['HTTP_REFERER']);
            exit();
        }
        if($level === 'usr')
        {
            $_SESSION['actusr_sub'] = $_GET['to'];
            gb('');
            exit();
        }
    }

    ################################
    ### IF NAVIGATING NEXT AND PREV#
    ################################
    elseif(isset($_GET['item_nav']))
    {
        $direction = $_GET['direction']; //diiretion

        if($direction == 'Previous') //if previous
        {
            if($main == 'groups') //if navigating to previous group
            {
                //PREVIOUS
                $sql = "SELECT * FROM `user_access_level` WHERE `id` < ? ORDER BY `id` DESC LIMIT 1";
                $stmt = $pdo->prepare($sql);
                $stmt->execute([$_SESSION['current_group']]);
                $stmt_res = $stmt->fetch(PDO::FETCH_ASSOC);
                $prev_id = $stmt_res['id'];

                $_SESSION['current_group'] = $prev_id;
                gb($_SERVER['HTTP_REFERER']);
            }

            elseif($main == 'users') //if navigating to previous user
            {
                $curr_user = $_SESSION['curr_user'];
                $prev_user = isConditionTrue('users' , 'id' , '`id`<'.$curr_user.' ORDER BY `id` DESC LIMIT 1' , 'id' , $pdo);

                $_SESSION['curr_user'] = $prev_user;
                gb($_SERVER['HTTP_REFERER']);
            }
        }
        elseif($direction == 'Next') //if next
        {
            if($main == 'groups') // if navigating to next group
            {
                //get next item
                $sql = "SELECT * FROM `user_access_level` WHERE `id` > ? LIMIT 1";
                $stmt = $pdo->prepare($sql);
                $stmt->execute([$_SESSION['current_group']]);
                $stmt_res = $stmt->fetch(PDO::FETCH_ASSOC);
                $next_id = $stmt_res['id'];
                $_SESSION['current_group'] = $next_id;
                gb($_SERVER['HTTP_REFERER']);
            }
            elseif($main == 'users') // if navigating to user group
            {
                $curr_user = $_SESSION['curr_user'];
                $next_user = isConditionTrue('users' , 'id' , '`id`>'.$curr_user.' LIMIT 1' , 'id' , $pdo);

                $_SESSION['curr_user'] = $next_user;
                gb($_SERVER['HTTP_REFERER']);
            }
        }
        else
        {
            echo 'no option';
        }
    }

    ##############################
    ### SUB NAV ##################
    ##############################
    elseif(isset($_GET['sub_nav']))
    {
        $_SESSION['usermgmt_main_sub'] = $_GET['sub'];
        header("Location:".$_SERVER['HTTP_REFERER']);
    }


    ##############################
    ### SAVING EDIT ##############
    ##############################
    elseif(isset($_POST['commitEdit']))
    {
        

        if($main === 'groups')// if edititng a group
        {
            $act_group = $_SESSION['current_group'];

            //get variables
            intval($grp_name = htmlentities($_POST['group_name']));
            intval($access_level = htmlentities($_POST['access_level']));


            if (updateRecord("user_access_level" , "SET `privilege` = '$access_level' , `name` = '$grp_name'" , "`id` = '$act_group'" , $pdo))
            {
                info("Access Level Updated");
                $_SESSION['usermgmt_main_sub'] = "View";
                gb($_SERVER['HTTP_REFERER']);
                exit();
            }
            else
            {
                die("COULD NOT UPDATE ACCESS LEVEL");
            }
        }

        elseif($main === 'users')// if edititng a user
        {

            $ual = htmlentities($_POST['ual']);
            $user = $_SESSION['curr_user'];

            if (updateRecord('users' , 'SET `access_level` = '.$ual , '`id` = '.$user , $pdo))
            {
                info("User Access Level Changed");
                $_SESSION['usermgmt_main_sub'] = 'View';
                gb($_SERVER['HTTP_REFERER']);
            }
            else
            {
                echo 'Could Not Update User Level';
                die();
            }

            echo "Saving user edit";
        }
        
    }

    ##############################
    ### DELETE #### ##############
    ##############################
    elseif(isset($_GET['del']))
    {

        if ($main === 'group')
        {
            die("Deleting Group");
        }
        elseif ($main === 'users')
        {
            $curr_user = $_SESSION['curr_user'];

            //delete current user
            if (deleteRow('users' , '`id` = '.$curr_user, $pdo))
            {
                $nextCount = '`id` > '.$_SESSION['curr_user'];
                $prevCount = '`id` < '.$_SESSION['curr_user'];

                //get previous
                $previous = nextPrevious('users' , $prevCount , $pdo);

                $next = nextPrevious('users' , $nextCount , $pdo);

                if ($next === true)
                {
                $curr_user = $_SESSION['curr_user'];
                    $next_user = isConditionTrue('users' , 'id' , '`id`>'.$curr_user.' LIMIT 1' , 'id' , $pdo);

                    $_SESSION['curr_user'] = $next_user;
                    $_SESSION['usermgmt_main_sub'] = 'View';
                    gb('');
                }
                elseif ($previous === true)
                {
                    $curr_user = $_SESSION['curr_user'];
                    $prev_user = isConditionTrue('users' , 'id' , '`id`<'.$curr_user.' ORDER BY `id` DESC LIMIT 1' , 'id' , $pdo);

                    $_SESSION['curr_user'] = $prev_user;
                    $_SESSION['usermgmt_main_sub'] = 'View';
                    gb('');
                }
                else
                {
                    echo 'confuse <br>';
                }
            }

            die("Deleting Users");
        }

    }


    ##############################
    ### COMMIT USERS RE-ASSIGN #####
    ##############################
    elseif(isset($_POST['re_assign_user']))
    {
        echo 're assign users';
    }

    ##############################
    ### ADD NEW USER GROUP #######
    ##############################
    elseif (isset($_POST['saveNew']))
    {
        if($_SESSION['usermgmt_main'] === 'groups')
        {
            $grp_name = htmlentities($_POST['grp_name']);
            $owner = $_SESSION['username'];
            $condition = "`name` = " . "'".$grp_name."'";

            //check if group exist
            if (ifRecordExist("user_access_level" , "name" , "'$grp_name'" , $pdo))
            {
                info("Group Exist");
                gb($_SERVER['HTTP_REFERER']);
                exit();
            }
            else
            {
                //add group to record
                if (insertIntoDatabase('user_access_level' , "`name` , `owner`" , "'$grp_name' ,  '$owner'" , $pdo))
                {
                    $perm_sql = "select COLUMN_NAME from information_schema.columns where table_name='user_access_level' and column_name like 'Perm%'";
                    $perm_stmt = $pdo->prepare($perm_sql);
                    $perm_stmt->execute();
                    while ($perm = $perm_stmt->fetch(PDO::FETCH_ASSOC))
                    {
                        $permission = $perm['COLUMN_NAME'];
                        $group = htmlentities($_POST['group']);
                        if (isset($_POST[$permission]))
                        {

                            $set = "`$permission`" . " = 1";
                            $condition = "`name` = '".$grp_name."'";
                            updateRecord('user_access_level' , "SET ".$set , $condition , $pdo);
                            echo $permission . "<span style='color: green'>". ' &plus; <br>' . "</span>";
                        }
                        else
                        {
                            $set = "`$permission`" . " = 0";
                            $condition = "`name` = '".$grp_name."'";
                            updateRecord('user_access_level' , "SET ".$set , $condition , $pdo);
                            echo $permission . "<span style='color: red'>". ' &times; <br>' . "</span>";
                        }
                    }

                    $_SESSION['usermgmt_main_sub'] = 'View';
                    info($grp_name . ' added successfully');
                    gb($_SERVER['HTTP_REFERER']);
                    exit();
                }
            }
        }

        elseif ($_SESSION['usermgmt_main'] === 'users')
        {
            $username = htmlentities($_POST['username']);
            $access_level = htmlentities($_POST['access_level']);
            $password = password_hash('12345' , PASSWORD_DEFAULT);

            if (ifRecordExist('users' , 'username',"'".$username."'" , $pdo))
            {
                info("Username taken");
                $_SESSION['usermgmt_main_sub'] = "View";
                gb($_SERVER['HTTP_REFERER']);
                exit();
            }
            else
            {
                //insert into database
                if (insertIntoDatabase('users' , '`username`,`password`,`access_level`' , "'$username' , '$password' , '$access_level'" , $pdo))
                {
                    //user_task
                    $task_msg = "Initialize your account";
                    if (insertIntoDatabase('user_task' , '`task`,`message`,`user`' , "1,'$task_msg','$username'" , $pdo))
                    {
                        info("User Added Successfully");
                        $_SESSION['usermgmt_main_sub'] = "View";
                        gb($_SERVER['HTTP_REFERER']);
                        exit();
                    }
                    else
                    {
                        die("User added but task not scheduled");
                    }
                }
                else
                {
                    die('COULD NOT ADD USER TO DATABASE');
                }
            }


        }


    }

    ##############################
    ### UPDATE USER PERMISSION ###
    ##############################
    elseif (isset($_POST['modifyPermissions']))
    {

        //Perm_Live_Update
        $perm_sql = "select COLUMN_NAME from information_schema.columns where table_name='user_access_level' and column_name like 'Perm%'";
        $perm_stmt = $pdo->prepare($perm_sql);
        $perm_stmt->execute();
        while ($perm = $perm_stmt->fetch(PDO::FETCH_ASSOC))
        {
            $permission = $perm['COLUMN_NAME'];
            $group = htmlentities($_POST['group']);
            if (isset($_POST[$permission]))
            {

                $set = "`$permission`" . " = 1";
                $condition = "`name` = '".$group."'";
                updateRecord('user_access_level' , "SET ".$set , $condition , $pdo);
                echo $permission . "<span style='color: green'>". ' &plus; <br>' . "</span>";
            }
            else
            {
                $set = "`$permission`" . " = 0";
                $condition = "`name` = '".$group."'";
                updateRecord('user_access_level' , "SET ".$set , $condition , $pdo);
                echo $permission . "<span style='color: red'>". ' &times; <br>' . "</span>";
            }
        }

        echo "<script>window.close()</script>";

    }
