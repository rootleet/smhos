<?php
    session_start();
    require '../../../inc/db.php';
    require '../../../inc/functions.php';

    $config = $_SESSION['task_config_stage'];
    $user_id = intval($_SESSION['id']);
    $task_id = intval($_SESSION['task_id']);
    $task = intval($_SESSION['user_task']);
    $task_msg = $_SESSION['task_message'];



    //personal details submit
    if (isset($_POST['personalDetails']))
    {
        $fname = htmlentities($_POST['first_name']);
        $lname = htmlentities($_POST['last_name']);

        //catch in session
        $_SESSION['user_first_name'] = $fname;
        $_SESSION['user_last_name'] = $lname;

        $_SESSION['task_config_stage'] = 2;
        header("Location:".$_SERVER['HTTP_REFERER']);
    }

    // security details
    elseif (isset($_POST['securityDetails']))
    {

        if ($_SESSION['user_task'] === 1)
        {
            echo 'hello';
            $_SESSION['user_password'] = password_hash($_POST['password'] , PASSWORD_DEFAULT);

            $_SESSION['task_config_stage'] = 3;
            header("Location:".$_SERVER['HTTP_REFERER']);
        }
        elseif ($task === 2)
        {
            $newPassword = password_hash($_POST['password'], PASSWORD_DEFAULT);

            //update password
            if(updateRecord('users' , "SET `password` = '$newPassword'", "`id`=$user_id ", $pdo))
            {
                //clear task
                if (updateRecord('user_task', "SET `task_status` = '0' ", "`id` = '$task_id'", $pdo))
                {
                    $_SESSION['task_config_stage'] = 2;
                    gb($_SERVER['HTTP_REFERER']);
                }
                else
                {
                    echo "Could to update task";
                    die();
                }
            }

            echo "Hello";
        }

    }

    elseif(isset($_GET['commit']))
    {

        if($task === 1)
        {
            $first_name = $_SESSION['user_first_name'];
            $last_name = $_SESSION['user_last_name'];
            $password = $_SESSION['user_password'];
            $user_id = $_SESSION['id'];

            //update user
            $updateAccountSql = "UPDATE `users` set `first_name` = ? , `last_name` = ? , `password` = ? WHERE `id` = ?";
            $updateAccountStmt = $pdo->prepare($updateAccountSql);
            if ($updateAccountStmt->execute([$_SESSION['user_first_name'], $_SESSION['user_last_name'] , $_SESSION['user_password'] , $_SESSION['id'] ]))
            {
                //update tas
                $tas_id = $_SESSION['task_id'];
                echo $tas_id;
                $updateTaskSql = "UPDATE `user_task` SET `task_status` = 0 WHERE `id` = ?";
                $updateTaskStmt = $pdo->prepare($updateTaskSql);
                $updateTaskStmt->execute([$tas_id]);
                // Unset all of the session variables
                $_SESSION = array();

                // Destroy the session.
                session_destroy();


                // Redirect to login page
                header("location: ../../../../");
                exit;
            }
        }
        else
        {
            echo "hello";

            // Unset all of the session variables
            $_SESSION = array();

            // Destroy the session.
            session_destroy();


            // Redirect to login page
            header("location: ../../../../");
            exit;
        }

    }


    else
    {
        header("HTTP/1.1 401 Unauthorized");
        exit;
    }