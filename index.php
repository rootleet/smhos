<?php
// Initialize the session
session_start();




 
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["7c922db59b635d53f58462201588ee26"]) && $_SESSION["7c922db59b635d53f58462201588ee26"] === true){
    header("location: dashboard/");
    exit;
}


 
// Include config file
require_once "config/inc/db.php";
require_once "config/inc/functions.php";
 
// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST")
{



    // Check if username is empty
    if (empty(trim($_POST["username"]))) {
        $username_err = "Please enter username.";
    } else {
        $username = trim($_POST["username"]);

        // Check if password is empty
        if (empty(trim($_POST["password"]))) {
            $password_err = "Please enter your password.";
        } else {
            $password = trim($_POST["password"]);
        }

        // Validate credentials
        if (empty($username_err) && empty($password_err)) {
            // Prepare a select statement
            $sql = "SELECT id, username, password,ual FROM users WHERE username = ?";



            if ($stmt = mysqli_prepare($route, $sql)) {
                // Bind variables to the prepared statement as parameters
                mysqli_stmt_bind_param($stmt, "s", $param_username);

                // Set parameters
                $param_username = $username;


                // Attempt to execute the prepared statement
                if (mysqli_stmt_execute($stmt)) {
                    // Store result
                    mysqli_stmt_store_result($stmt);

                    // Check if username exists, if yes then verify password
                    if (mysqli_stmt_num_rows($stmt) == 1) {
                        // Bind result variables

                        mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password, $ual);
                        if (mysqli_stmt_fetch($stmt)) {
                            if (password_verify($password, $hashed_password)) {

                                //check task



                                if (task($username, $pdo)['task'] > 0) {

                                    $_SESSION["id"] = $id;
                                    $_SESSION['task_config_stage'] = 0;
                                    $_SESSION['task_id'] = task($username, $pdo)['id'];
                                    $_SESSION['user_task'] = task($username, $pdo)['task'];
                                    $_SESSION['task_message'] = task($username, $pdo)['message'];
                                    redirect('config/gui/task/');
                                    exit();
                                }


                                // Password is correct, so start a new session
                                // Store data in session variables
                                //general

                                $_SESSION["7c922db59b635d53f58462201588ee26"] = true;
                                $_SESSION['username'] = $username;
                                $_SESSION["id"] = $id;
                                $_SESSION['ual'] = $ual;
                                $_SESSION['edit_all'] = false;

                                //company setup session
                                $_SESSION['company_setup_main'] = 'home';
                                $_SESSION['company_setup_sub'] = 'View';
                                $_SESSION['company_setup_config'] = 'csetup';

                                //user mamangement session_start
                                $_SESSION['usermgmt_main'] = 'home';
                                $_SESSION['usermgmt_main_sub'] = "View";

                                //reports session_start
                                $_SESSION['reports_activity'] = 'main';
                                $_SESSION['reports_view'] = 'all';

                                $ip_address = $_SERVER['REMOTE_ADDR'];
                                //update user login
                                updateRecord('users', 'SET `online` = 1 , `ip_address` = ' . "'" . $ip_address . "' ", '`id` = ' . $id, $pdo);
                                //log user login
                                insertIntoDatabase('user_login_log', "`user_id` , `username`,`func`", "'" . $id . "'," . "'" . $username . "','login'", $pdo);


                                header("location: dashboard/");

                            } else {
                                // Display an error message if password is not valid
                                $password_err = "The password you entered was not valid.";
                            }
                        }
                    } else {
                        // Display an error message if username doesn't exist
                        $username_err = "No account found with that username.";
                    }
                } else {
                    echo "Oops! Something went wrong. Please try again later.";
                }

                // Close statement
                mysqli_stmt_close($stmt);
            }
        }

        // Close connection
        mysqli_close($route);
    }
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/login.css">
    <link rel="shortcut icon" href="assets/icos/general/Hms.png" type="image/x-icon">
    <title>SMHOS || Login</title>
</head>
<body class="w-100 vh-100">

    <div class="form_container w-25 text-center p-2">
        <h3 class="bold" style="letter-spacing: 3px;" >SMHOS - ADMIN</h3>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

            <!--USERNAME-->
            <input autocomplete="off" type="text" name="username" placeholder="username" value="<?php echo $username; ?>">
            <i class="help-block text-warning"><?php echo $username_err; ?></i>

            <!--PASSWORD-->
            <input placeholder="password" type="password" name="password" >
            <i class="help-block text-danger"><?php echo $password_err; ?></i>

            <input type="submit" style="background:#3498DB;cursor:pointer;color:white;margin:10px;letter-spacing: 1px;font-size:13px;font-weight:bold" value="LOGIN">
        </form>
        <a href="#" >Lost your password?</a>
    </div>

</body>
</html>