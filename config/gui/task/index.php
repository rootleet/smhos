<?php
  session_start();

  $config = $_SESSION['task_config_stage'];
  $user_id = intval($_SESSION['id']);
  $task_id = intval($_SESSION['task_id']);
  $task = intval($_SESSION['user_task']);
  $task_msg = $_SESSION['task_message'];





  //get task details
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Task</title>
    <link rel="stylesheet" href="../../../css/general.css">
    <link rel="stylesheet" href="../../../css/bootstrap.min.css">
</head>
<body class="bg-info d-flex flex-wrap align-content-center justify-content-center">

    <?php if ($task === 1): ?>

        <?php if ($config === 0): ?>

            <!--TASK MESSAGE-->
            <div class="card cust_shadow border-0 w-25">

                <div class="card-header">
                    <span class="card-title">
                        <?php echo $task_msg ?>
                    </span>
                </div>

                <div class="card-body p-2 text-center">
                    <p>
                        You are here because this is the first time you are logging into the system. please initialize your profile to have effective
                        usage.
                    </p>
                    <button onclick="location.href='../gui_config/process/nav.php?config=1'" class="btn btn-sm btn-info rounded-0">INITIALIZE</button>
                </div>
            </div>

        <?php endif; ?>

        <?php if ($config === 1): ?>
            <form class="w-25 card cust_shadow" method="post" action="../gui_config/process/task_form_processing.php">
                <div class="card-header">
                    <div style="width: 25px; height: 25px" class="float-left">
                        <img alt="Security" src="../assets/icons/user_info.png" class="img-fluid">
                    </div>
                </div>
                <div class="card-body p-2">
                    <div class="w-100">
                        <div>
                            <p class="mb-0">First Name</p>
                        </div>
                        <div class="input-group mb-2">

                            <input class="form-control font-italic text-muted" autocomplete="off" autofocus value="<?php if (isset($_SESSION['user_first_name'])){echo $_SESSION['user_first_name'];} ?>" required name="first_name">
                        </div>

                        <div>
                            <p class="mb-0">Last Name</p>
                        </div>
                        <div class="input-group">

                            <input class="form-control font-italic text-muted" autocomplete="off" autofocus value="<?php if (isset($_SESSION['user_last_name'])){echo $_SESSION['user_last_name'];} ?>" required name="last_name">
                        </div>


                    </div>
                </div>
                <div class="card-footer d-flex flex-wrap justify-content-between align-content-center">
                    <div class="btn btn-sm btn-danger w-25">Cancel</div>
                    <button type="submit" name="personalDetails" class="btn btn-sm btn-info w-25">Next</button>
                </div>
            </form>
        <?php endif; ?>

        <?php if ($config === 2): ?>
            <form class="w-25 card cust_shadow" method="post" action="../gui_config/process/task_form_processing.php">
                <div class="card-header clearfix">
                    <div style="width: 25px; height: 25px" class="float-left">
                        <img alt="Security" src="../assets/icons/finger_print.png" class="img-fluid">
                    </div>
                    <div class="float-right">
                        <span class="text-danger" id="minPassword"></span>
                        <span class="text-success" id="maxPassword"></span>
                    </div>
                </div>

                <div class="card-body p-2">
                    <div class="w-100">
                        <div>
                            <p class="mb-0">Password</p>
                        </div>
                        <div class="input-group border rounded d-flex flex-wrap align-content-center justify-content-between mb-2">

                            <input onkeyup="validatePassword(0)" type="password" class="form-control border-0 no-focus font-italic text-muted" autocomplete="off" autofocus required name="password" id="password">
                            <div class="d-flex flex-wrap p-1 align-content-center justify-content-center">
                                <div style="width: 20px; height: 20px">
                                    <img onclick="document.getElementById('password').type = 'text'" class="img-fluid" title="show characters" src="../assets/icons/password_preview.png">
                                </div>
                            </div>
                        </div>

                        <div>
                            <p class="mb-0">Confirm Password</p>
                        </div>
                        <div class="input-group border rounded">
                            <input onkeyup="validatePassword(1)" type="password" class="form-control border-0 no-focus font-italic text-muted" autocomplete="off" autofocus required name="confirm_password" id="confirm_password">
                            <div class="d-flex flex-wrap p-1 align-content-center justify-content-center">
                                <div style="width: 20px; height: 20px">
                                    <img onclick="document.getElementById('confirm_password').type = 'text'" class="img-fluid" title="show characters" src="../assets/icons/password_preview.png">
                                </div>
                            </div>
                        </div>


                    </div>
                </div>

                <div class="card-footer d-flex flex-wrap align-content-center justify-content-between">
                    <div onclick="location.href='../gui_config/process/nav.php?config=1'" class="btn btn-warning btn-sm w-25">Back</div>
                    <button type="submit" name="securityDetails" id="securityDetails" class="btn btn-sm btn-info w-25">Next</button>
                </div>
            </form>
        <?php endif; ?>

        <?php if ($config === 3): ?>
            <div class="w-25 card cust_shadow">
                <div class="card-header">
                    <div style="width: 25px; height: 25px" class="float-left">
                        <img alt="Security" src="../assets/icons/summary.png" class="img-fluid">
                    </div>
                </div>

                <div class="card-body text-center p-2">
                    <p class="text_sm">
                        Hello <strong><?php if (isset($_SESSION['user_first_name'])){echo $_SESSION['user_first_name'];} ?> <?php if (isset($_SESSION['user_last_name'])){echo $_SESSION['user_last_name'];} ?></strong>, thank you for initializing your account.
                        You can still make changes to your <kbd>name</kbd> or <kbd onclick="location.href='../gui_config/process/nav.php?config=2'" class="pointer">password</kbd>  if you wish.
                    </p>

                    <button onclick="location.href='../gui_config/process/task_form_processing.php?commit'" class="btn btn-sm btn-success rounded-0">COMMIT CONFIGURATION</button>
                </div>

            </div>
        <?php endif; ?>

    <?php endif; ?>

    <?php if ($task === 2): ?>
        <!--RESET PASSWORD-->
        <?php if ($config === 0): ?>

            <!--TASK MESSAGE-->
            <div class="card cust_shadow border-0 w-25">

                <div class="card-header">
                    <span class="card-title">
                        <?php echo $task_msg ?>
                    </span>
                </div>

                <div class="card-body p-2 text-center">
                    <p>
                        You have requested a password reset. If this is not ture, exist and contact system admin. else reset your password
                    </p>
                    <button onclick="location.href='../gui_config/process/nav.php?config=1'" class="btn btn-sm btn-info rounded-0">RESET PASSWORD</button>
                </div>
            </div>

        <?php endif; ?>

        <?php if ($config === 1): ?>
            <form class="w-25 card cust_shadow" method="post" action="../gui_config/process/task_form_processing.php">
                <div class="card-header clearfix">
                    <div style="width: 25px; height: 25px" class="float-left">
                        <img alt="Security" src="../assets/icons/finger_print.png" class="img-fluid">
                    </div>
                    <div class="float-right">
                        <span class="text-danger" id="minPassword"></span>
                        <span class="text-success" id="maxPassword"></span>
                    </div>
                </div>

                <div class="card-body p-2">
                    <div class="w-100">
                        <div>
                            <p class="mb-0">Password</p>
                        </div>
                        <div class="input-group border rounded d-flex flex-wrap align-content-center justify-content-between mb-2">

                            <input onkeyup="validatePassword(0)" type="password" class="form-control border-0 no-focus font-italic text-muted" autocomplete="off" autofocus required name="password" id="password">
                            <div class="d-flex flex-wrap p-1 align-content-center justify-content-center">
                                <div style="width: 20px; height: 20px">
                                    <img onclick="document.getElementById('password').type = 'text'" class="img-fluid" title="show characters" src="../assets/icons/password_preview.png">
                                </div>
                            </div>
                        </div>

                        <div>
                            <p class="mb-0">Confirm Password</p>
                        </div>
                        <div class="input-group border rounded">
                            <input onkeyup="validatePassword(1)" type="password" class="form-control border-0 no-focus font-italic text-muted" autocomplete="off" autofocus required name="confirm_password" id="confirm_password">
                            <div class="d-flex flex-wrap p-1 align-content-center justify-content-center">
                                <div style="width: 20px; height: 20px">
                                    <img onclick="document.getElementById('confirm_password').type = 'text'" class="img-fluid" title="show characters" src="../assets/icons/password_preview.png">
                                </div>
                            </div>
                        </div>


                    </div>
                </div>

                <div class="card-footer d-flex flex-wrap align-content-center justify-content-between">
                    <div onclick="location.href='../gui_config/process/nav.php?config=1'" class="btn btn-warning btn-sm w-25">Back</div>
                    <button type="submit" name="securityDetails" id="securityDetails" class="btn btn-sm btn-info w-25">Next</button>
                </div>
            </form>
        <?php endif; ?>

        <?php if ($config === 2): ?>

            <!--TASK MESSAGE-->
            <div class="card cust_shadow border-0 w-25">

                <div class="card-header">
                    <span class="card-title text-success">
                        Congratulations!!
                    </span>
                </div>

                <div class="card-body p-2 text-center">
                    <p>
                        Your password has been reset. Please login to continue;
                    </p>
                    <button onclick="location.href='../gui_config/process/task_form_processing.php?commit'" class="btn btn-sm btn-info rounded-0">RESET PASSWORD</button>
                </div>
            </div>

        <?php endif; ?>

    <?php endif; ?>


</body>
</html>

<script>

    document.getElementById('confirm_password').disabled = true;
    document.getElementById('securityDetails').disabled = true;

    function validatePassword(task)
    {
        const password_value = document.getElementById('password').value;
        const confirm_password_value = document.getElementById('confirm_password').value;



        const maxPass = document.getElementById('maxPassword');
        const minPass = document.getElementById('minPassword');

        if (task === 0)
        {
            //check password length
            if (password_value.length >= 6 && password_value != '123456' && password_value != '147852')
            {
                maxPass.innerHTML = "pass";
                document.getElementById('confirm_password').disabled = false;
                minPass.innerHTML = '';
            }
            else
            {
                minPass.innerHTML= 'weak password';
                maxPass.innerHTML = '';
            }
        }

        if (task === 1)
        {
            if (password_value === confirm_password_value)
            {
                maxPass.innerHTML = "pass match";
                document.getElementById('securityDetails').disabled = false;
                minPass.innerHTML = '';
            }
            else
            {
                minPass.innerHTML = 'unmatched password';
                maxPass.innerHTML = '';
            }
        }
    }
</script>