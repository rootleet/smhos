
<?php
  include '../config/inc/config.dashboard.php';
  if (isset($_POST['start_shift']))
  {
    $key = htmlentities($_POST['admin_key']);

    if (validateKey($_SESSION['id'] , $key , $pdo))
    {

    }
    else
    {

        die("Wrong Password");
    }
    //start_shift

    $date = date('d/m/Y');
    $time = date("H:i:s");
    $user = $_SESSION['username'];
    $ip = $_SERVER['REMOTE_ADDR'];
    $func = 'start';
    $vals = "'".$user . "'". ',' ."'". $date ."'". ',' ."'". $ip."'". ',' ."'". $time."'". ',' ."'". $func."'";

    if (updateRecord('admin.company_setup' , 'SET `shift_start` = 1' , 'none' , $pdo))
    {
        //update company shift
        insertIntoDatabase('shift', "`user`,`shift_date`,`device_ip`,`shift_time`,`function`",$vals, $pdo);


        echo '<script>window.close()</script>';
    }
  }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
  <link rel="stylesheet"
        href="../css/bootstrap.min.css">
  <link rel="stylesheet" href="../css/general.css">
  <link rel="shortcut icon"
        href="../assets/icos/general/Hms.png"
        type="image/x-icon">
  <title>SMHOS || SHIFT</title>
</head>
<body class="bg-light d-flex flex-wrap align-content-center">

  <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" class="p-1 mx-auto" style="width: 250px; overflow: hidden">

    <p class="text-center"><?php echo date('d/m/yy') ?></p>
    <!--DATE-->
<!--    <div class="input-group input-group-sm mb-2">-->
<!--      <div class="input-group-prepend w-25">-->
<!--        <span class="input-group-text w-100 bg-dark text-light">Date</span>-->
<!--      </div>-->
<!--      <input readonly value="<?php echo date('d/m/yy') ?>" type="text" class="form-control form-control-sm" autocomplete="off" required>-->
<!--    </div>-->
    <!--KEY-->
    <div class="input-group input-group-sm mb-2">
      <div class="input-group-prepend w-25">
        <span class="input-group-text w-100 bg-dark text-light">Key</span>
      </div>
      <input autofocus type="password" name="admin_key" class="form-control form-control-sm" autocomplete="off" required>
    </div>

    <div class="w-100 text-center">
      <button name="start_shift" class="btn btn-sm btn-success">
        Start
      </button>
    </div>

  </form>

</body>
</html>