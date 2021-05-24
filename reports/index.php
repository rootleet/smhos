<?php
    include '../config/inc/config.reports.php';


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet"
          href="../css/bootstrap.min.css">
    <link rel="stylesheet"
          href="../css/general.css">
    <link rel="shortcut icon"
          href="../assets/icos/general/Hms.png"
          type="image/x-icon">
    <title>SMHOS || Reports</title>
</head>

<body class="container-fluid p-0 bg-cprimary">

    <div class="row h-100 no-gutters">

        <!--Navigation-->
        <?php require '../config/inc/parts/general_nav.inc.php' ?>

        <!--Work Space-->
        <section class="col-sm-10 h-100 bg-cmain o-hide">
            <!--work space header-->
            <?php require '../config/inc/parts/top_bar.php' ?>

            <!--WorkSpace-->
            <article style='overflow:auto !important'>

                <div class="container p-1 w-90 h-100">
                    <!--Head-->
                    <header class="head p-3 d-flex flex-wrap align-content-center justify-content-between">
                        <div>
                            <span onclick="location.href='../config/proc/inside_nav.process.php?page=reports&activity=main'"
                                  class="text-info pointer">
                                Reports
                            </span>
                            <span class="text-muted">
                                /
                            </span>
                            <span onclick="location.href='../config/proc/inside_nav.process.php?page=reports&activity=<?php echo $activity; ?>'"
                                  class="<?php if ($view === 'View Record') {echo 'text-info pointer';} else {echo 'text-muted';} ?>">
                                <?php
                                        if ( $activity === 'CheckIn')
                                        {
                                            echo 'Check In';
                                        }
                                        elseif ($activity === 'CheckOut')
                                        {
                                            echo 'Check Out';
                                        }
                                        else
                                        {
                                            echo $activity;
                                        }
                                    ?>
                            </span>
                            <?php if ($view === 'View Record'): ?>
                            <span class="text-muted">/ <?php echo $view ?></span>
                            <?php endif; ?>
                        </div>
                    </header>

                    <?php if($activity == 'main'): ?>
                    <!--Main-->
                    <article class="container w-100 p-0">
                        <div class="row o-hide no-gutters w-100">

                            <!--Live Income-->
                            <div class="col-sm-4 p-3">
                                <div onclick="location.href='../config/proc/inside_nav.process.php?page=reports&activity=Live Income'"
                                     id="liveIncome"
                                     class="rcard w-100 p-3 h-100 d-flex flex-wrap align-content-between">

                                    <div class="w-100 h-100">
                                        <div class="w-100 clearfix h-40">
                                            <span class="rcard-title text-dark float-left">Live Income</span>

                                        </div>

                                        <div class="w-100 h-60 rcard_details clearfix">
                                            <strong>$60,000.00</strong>

                                        </div>
                                    </div>

                                </div>
                            </div>

                            <!--Booking-->
                            <div class="col-sm-4 p-3">
                                <div onclick="location.href='../config/proc/inside_nav.process.php?page=reports&activity=Booking'"
                                     id="bookingsButt"
                                     class="rcard w-100 p-3 h-100 d-flex flex-wrap align-content-between">

                                    <div class="w-100 h-100">
                                        <div class="w-100 clearfix h-40">
                                            <span class="rcard-title float-left text-dark">Booking</span>

                                        </div>

                                        <div class="w-100 h-60 rcard_details clearfix">
                                            <strong class="text-muted"><?php echo $bookings ?></strong>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <!--Payment-->
                            <div class="col-sm-4 p-3">
                                <div onclick="location.href='../config/proc/inside_nav.process.php?page=reports&activity=Payment'"
                                     id="paymentButt"
                                     class="rcard w-100 p-3 h-100 d-flex flex-wrap align-content-between">

                                    <div class="w-100 h-100">
                                        <div class="w-100 d-flex flex-wrap align-content-center justify-content-between h-40">
                                            <span class="rcard-title text-magento">Payment</span>
                                            <span class="rcard-title badge badge-dark text-light "><?php echo $payments ?></span>

                                        </div>

                                        <div class="w-100 h-60 rcard_details d-flex flex-wrap align-content-end">
                                            <strong><?php echo $paymentsCal ?></strong>

                                        </div>
                                    </div>

                                </div>
                            </div>

                            <!--Refund-->
                            <div class="col-sm-4 p-3">
                                <div onclick="location.href='../config/proc/inside_nav.process.php?page=reports&activity=Refund'"
                                     id="refundButt"
                                     class="rcard w-100 p-3 h-100 d-flex flex-wrap align-content-between">

                                    <div class="w-100 h-100">
                                        <div class="w-100 d-flex flex-wrap align-content-center justify-content-between h-40">
                                            <span class="rcard-title">Refund</span>
                                            <span class="rcard-title badge badge-dark text-light "><?php echo $refund ?></span>

                                        </div>

                                        <div class="w-100 h-60 rcard_details clearfix">
                                            <strong class="text-dark"><?php echo $refundCal ?></strong>

                                        </div>
                                    </div>

                                </div>
                            </div>

                            <!--Check in-->
                            <div class="col-sm-4 p-3">
                                <div onclick="location.href='../config/proc/inside_nav.process.php?page=reports&activity=Check In'"
                                     id="checkinButt"
                                     class="rcard w-100 p-3 h-100 d-flex flex-wrap align-content-between">

                                    <div class="w-100 h-100">
                                        <div class="w-100 clearfix h-40">
                                            <span class="rcard-title float-left">Check In</span>

                                        </div>

                                        <div class="w-100 h-60 rcard_details clearfix">
                                            <strong class="text-magento"><?php echo $checkin ?></strong>

                                        </div>
                                    </div>

                                </div>
                            </div>

                            <!--Check Out-->
                            <div class="col-sm-4 p-3">
                                <div onclick="location.href='../config/proc/inside_nav.process.php?page=reports&activity=Check Out'"
                                     id="checkOutButt"
                                     class="rcard w-100 p-3 h-100 d-flex flex-wrap align-content-between">

                                    <div class="w-100 h-100">
                                        <div class="w-100 clearfix h-40">
                                            <span class="rcard-title float-left">Check Out</span>

                                        </div>

                                        <div class="w-100 h-60 rcard_details clearfix">
                                            <strong><?php echo $checkout ?></strong>

                                        </div>
                                    </div>

                                </div>
                            </div>




                        </div>
                    </article>
                    <?php endif; ?>

                    <?php if ($activity === 'Live Income'): ?>
                    <!--Live Income-->
                    <article class="pl-3 pr-3 o-hide">
                        <header class="d-flex p-0 flex-wrap align-content-end">
                            <form method="get"
                                  action="../config/proc/inside_nav.process.php"
                                  class="h-70 o-hide w-25 clearfix">
                                <!--Select-->
                                <div class="w-65 h-100 float-left bg-dark">
                                    <input type="hidden"
                                           value="reports"
                                           name="page">
                                    <select name="activity"
                                            class="form-control-sm border-0 w-100 rounded-0 bg-dark text-light">
                                        <option <?php if ($activity === 'Live Income'){echo 'selected';}?>
                                                value="Live Income">Live Income</option>
                                        <option <?php if ($activity === 'Booking'){echo 'selected';}?>
                                                value="Booking">Booking</option>
                                        <option <?php if ($activity === 'Payment'){echo 'selected';}?>
                                                value="Payment">Payment</option>
                                        <option <?php if ($activity === 'Refund'){echo 'selected';}?>
                                                value="Refund">Refund</option>
                                        <option <?php if ($activity === 'CheckIn'){echo 'selected';}?>
                                                value="Check In">Check In</option>
                                        <option <?php if ($activity === 'CheckOut'){echo 'selected';}?>
                                                value="Check Out">Check Out</option>
                                        <option <?php if ($activity === 'Invoice'){echo 'selected';}?>
                                                value="Invoice">Invoice</option>
                                    </select>
                                </div>
                                <!--Button-->
                                <div class="w-25 float-right bg-danger text_sm text-center o-hide h-100">
                                    <button class="btn btn-sm btn-magento w-100 bold h-100">LOAD</button>
                                </div>
                            </form>
                        </header>



                        <article class="d-flex flex-wrap align-content-center justify-content-center o-hide">
                            <div
                                 class="w-100 h-95 bg-clight d-flex flex-wrap align-content-center justify-content-center">
                                <div class="w-50 text-center text-center">
                                    <!--LIVE FIGURES-->
                                    <h1 style="font-size: 50px !important;"
                                        class="text-c-success">

                                        <strong id="updatedValue">$ Loading......
                                        </strong>

                                        <script>

                                            setInterval(
                                                function updateLiveIncome() {
                                                if (window.XMLHttpRequest) {
                                                    xmlhttp = new XMLHttpRequest();
                                                }
                                                else {
                                                    xmlhttp = new ActiveXObject('Microsoft.XMLHTTP');
                                                }

                                                xmlhttp.onreadystatechange = function () {
                                                    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                                                        document.getElementById('updatedValue').innerHTML = xmlhttp.responseText;
                                                    }
                                                }

                                                xmlhttp.open('GET', '../config/proc/ajax.php?update', true);
                                                xmlhttp.send();
                                            }, 1000);

                                        </script>

                                    </h1>

                                    <!--LIVE FIGURES DETAIL MODAL-->
                                    <button data-toggle="modal" data-target="#liveIncDetails" class="btn btn-info btn-sm">Details</button>
                                    <div class="modal fade text-dark" id="liveIncDetails">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">

                                                <div class="modal-header">
                                                    <strong class="modal-title">Income Details</strong>
                                                    <button class="close" data-dismiss="modal">&times;</button>
                                                </div>

                                                <div class="modal-body p-2">
                                                    <div class="table table-responsive-sm mb-0">
                                                        <table class="table text-left table-bordered table-sm mb-0">

                                                            <thead class="thead-dark">
                                                                <tr>
                                                                    <th>Payment Function</th>
                                                                    <th>Value</th>
                                                                </tr>
                                                            </thead>

                                                            <tbody>
                                                                <tr>
                                                                    <td>Cash</td>
                                                                    <td><?php echo $cash_income ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Mobile Money</td>
                                                                    <td><?php echo $momo_income ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Card</td>
                                                                    <td><?php echo $card_income ?></td>
                                                                </tr>
                                                            </tbody>

                                                        </table>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </article>
                    </article>
                    <?php endif; ?>

                    <?php if ($activity === 'Booking'): ?>
                    <!--Booking-->
                    <article class="pl-3 pr-3 o-hide">


                        <header class="d-flex p-0 flex-wrap align-content-end justify-content-between">
                            <?php if ($view === 'all'): ?>
                            <form method="get"
                                  action="../config/proc/inside_nav.process.php"
                                  class="h-70 o-hide w-25 clearfix">
                                <!--Select-->
                                <div class="w-65 h-100 float-left bg-dark">
                                    <input type="hidden"
                                           value="reports"
                                           name="page">
                                    <select name="activity"
                                            class="form-control-sm border-0 w-100 rounded-0 bg-dark text-light">
                                        <option <?php if ($activity === 'Live Income'){echo 'selected';}?>
                                                value="Live Income">Live Income</option>
                                        <option <?php if ($activity === 'Booking'){echo 'selected';}?>
                                                value="Booking">Booking</option>
                                        <option <?php if ($activity === 'Payment'){echo 'selected';}?>
                                                value="Payment">Payment</option>
                                        <option <?php if ($activity === 'Refund'){echo 'selected';}?>
                                                value="Refund">Refund</option>
                                        <option <?php if ($activity === 'Check In'){echo 'selected';}?>
                                                value="Check In">Check In</option>
                                        <option <?php if ($activity === 'Check Out'){echo 'selected';}?>
                                                value="Check Out">Check Out</option>
                                        <option <?php if ($activity === 'Invoice'){echo 'selected';}?>
                                                value="Invoice">Invoice</option>
                                    </select>
                                </div>
                                <!--Button-->
                                <div class="w-25 float-right bg-danger text_sm text-center o-hide h-100">
                                    <button class="btn btn-sm btn-magento w-100 bold h-100">LOAD</button>
                                </div>
                            </form>

                            <?php if ($bookingsCount > 0): ?>
                            <div class="input-group input-group-sm w-50">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><img src="../assets/icos/general/delete.png"
                                             alt=""
                                             class="img-fluid"></span>
                                </div>


                                <input type="text"
                                       autocomplete="off"
                                       class="w-75 inside_search text-dark pl-2"
                                       id="<?php echo $activity ?>Search"
                                       placeholder="Search String">

                            </div>
                            <?php endif; ?>
                            <?php endif; ?>
                        </header>



                        <article class="d-flex flex-wrap align-content-center justify-content-center o-hide">

                            <?php if ($view === 'all'): ?>
                            <div class="w-100 h-95 bg-clight text-dark">
                                <?php
                                                if ($bookingsCount > 0): //if bookings is greater than 0
                                        ?>
                                <header style="background-color: #F5F6FA;">
                                    <table class="table border-0">
                                        <thead>
                                            <tr class="c_tr_head">
                                                <th class="p-0 pl-2 c_th w-25">Catrgory</th>
                                                <th class="p-0 c_th w-25">Facility</th>
                                                <th class="p-0 c_th w-25">Quantity</th>
                                                <th class="p-0 pr-2 c_th w-25 text-right">Receptionist</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </header>
                                <?php endif; ?>

                                <article class="o-auto">


                                    <?php
                                                if ($bookingsCount < 1): //if bookings is less than 1
                                            ?>
                                    <div
                                         class="w-100 h-100 d-flex flex-wrap align-content-center justify-content-center o-hide">
                                        <p class="enc">No Bookings Yet</p>
                                    </div>
                                    <?php endif; ?>

                                    <?php
                                                if ($bookingsCount > 0): //if bookings is greater than 0
                                            ?>
                                    <div class="w-100 h-100 o-auto">

                                        <table class="table border-0 table-hover pointer">
                                            <tbody id="<?php echo $activity ?>Table">

                                                <?php while ($bookings = $bookingStmt->fetch(PDO::FETCH_ASSOC)): ?>

                                                    <tr onclick="location.href='../config/proc/inside_nav.process.php?reports_view=View Record&record_id=<?php echo $bookings['id'] ?>'"
                                                        class="border-bottom">
                                                        <td class="pl-1 c_td_xsm w-25">
                                                            <?php echo $bookings['fac_category'] ?>
                                                        </td>
                                                        <td class="c_td_xsm pl-0 w-25">
                                                            <?php
                                                                $b_facility = $bookings['facility'];
                                                                echo fetchFunc("facilities" , "`id` = $b_facility", $pdo)['name'];
                                                            ?>
                                                        </td>
                                                        <td class="c_td_xsm pl-0 w-25">
                                                            <?php echo $bookings['quantity']  ?>
                                                        </td>
                                                        <td class="pr-2 c_td_xsm w-25 text-right">
                                                            <?php echo $bookings['receptionist'] ?>
                                                        </td>
                                                    </tr>

                                                <?php endwhile; ?>

                                            </tbody>
                                        </table>


                                    </div>
                                    <?php endif; ?>



                                </article>

                            </div>
                            <?php endif; ?>


                            <?php if ($view === 'View Record'): ?>

                            <!--View Single Record -->
                            <div class="w-100 h-100 container p-0 o-hide">
                                <div class="row w-100 h-100 no-gutters">
                                    <!--Back Arrow-->
                                    <div class="col-sm-1 h-100">
                                        <span onclick="location.href='../config/proc/inside_nav.process.php?page=reports&activity=Booking'"
                                              data-toggle="tooltip"
                                              title="Back"
                                              class="text-info pointer"><img class="img-fluid h_btn_sm"
                                                 src="../assets/icos/general/arrow_left.png"> </span>
                                    </div>

                                    <!--Information-->
                                    <div class="col-sm-10 h-100 <?php if ($record['refund'] === 1){echo 'light-bg-warning';} else {echo 'bg-clight';} ?> text-dark p-3 o-hide">
                                        <!--Top-->
                                        <div class="w-100 h-50">
                                            <div class="h-40 w-100 clearfix">
                                                <!--Receptionist Name-->
                                                <div class="float-left w-40 h-100 o-hide">
                                                    <div class="w-100 h-30 d-flex flex-wrap align-content-end">
                                                        <strong><?php echo $record['receptionist']; ?></strong>
                                                    </div>
                                                    <div class="w-100 h-70 pt-1 o-hide">
                                                        <p class="text_sm m-0 p-0">Booking ID:
                                                            <?php echo $record['id']; ?></p>
                                                        <p class="text_sm m-0 p-0">Booking Time:
                                                            <?php echo $record['date_booked'].' ' ?><kbd><?php echo $record['time_booked']; ?></kbd>
                                                        </p>
                                                    </div>
                                                </div>

                                                <!--Category -->
                                                <div class="float-right w-40 h-100 o-hide">
                                                    <div
                                                         class="w-100 h-30 d-flex flex-wrap align-content-end justify-content-end">
                                                        <strong><?php echo $record['fac_category']; ?></strong>
                                                    </div>
                                                </div>
                                            </div>

                                            <!--Paid & Check in-->
                                            <?php if ($record['refund'] === 0): ?>
                                                <div class="h-30 w-100 d-flex flex-wrap justify-content-end">

                                                <div class="w-25 h-100">
                                                    <!--PAID-->
                                                    <div class="w-100 h-50 d-flex flex-wrap justify-content-end align-content-center">
                                                        <?php if ($total_paid < 1) : ?>
                                                            <kbd class="light-bg-warning h-fit w-40 text-center text_xxsm badge-pill">Not Paid</kbd>
                                                        <?php endif; ?>

                                                        <?php if ($total_paid > 0): ?>
                                                            <kbd data-toggle="tooltip" title="<?php echo $toggle ?>" data-placement="right" class="h-fit w-40 pointer <?php echo $paid_bg ?> text-center text_xxsm badge-pill">Paid</kbd>
                                                        <?php endif; ?>
                                                    </div>
                                                    <!--CHECK IN-->
                                                    <div
                                                         class="w-100 h-50 d-flex flex-wrap justify-content-end align-content-center">
                                                        <?php if ($record['checkin'] === 0) :?>
                                                        <kbd
                                                             class="light-bg-warning w-40 text-center h-fit text_xxsm badge-pill">Hanging</kbd>
                                                        <?php endif; ?>

                                                        <?php if ($record['checkin'] === 1) :?>
                                                        <kbd
                                                             class="light-bg-warning w-40 text-center h-fit text_xxsm badge-pill">Check
                                                            In</kbd>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php endif; ?>

                                            <!--REFUND NOTICE-->
                                            <?php if ($record['refund'] === 1): ?>
                                                <div class="h-30 w-100 d-flex flex-wrap justify-content-center align-content-center">
                                                    <span class="text-muted">BILL REFUNDED</span>
                                                </div>
                                            <?php endif; ?>

                                            <!--Order Details -->
                                            <div class="h-30 w-100">

                                                <div class="w-100 h-30 o-hide">
                                                    <table class="table border-0 m-0">
                                                        <thead>
                                                            <tr class="c_tr_head">
                                                                <th class="p-1 pl-2 c_th_sm w-25">Category</th>
                                                                <th class="p-1 c_th_sm w-25">Facility</th>
                                                                <th class="p-1 c_th_sm w-25">Quantity</th>

                                                                    <th class="p-1 pr-2 c_th_sm w-25">
                                                                        <?php

                                                                            if ($charges_type === 'h')
                                                                            {
                                                                                echo "N<u>0</u> Of Hours";
                                                                            }
                                                                            elseif ($charges_type === 'd')
                                                                            {
                                                                                echo "N<u>0</u> Of Days";
                                                                            }

                                                                        ?>

                                                                    </th>
                                                            </tr>
                                                        </thead>
                                                    </table>
                                                </div>

                                                <div class="w-100 h-70 o-hide">
                                                    <table class="table border-0 m-0">
                                                        <tbody>

                                                            <tr class="border-bottom">
                                                                <td class="pl-2 c_td_xsm w-25">
                                                                    <?php echo $record['fac_category']; ?>
                                                                </td>
                                                                <td class="c_td_xsm pl-1 w-25">
                                                                    <?php
                                                                        echo $facility;
                                                                    ?>
                                                                </td>
                                                                <td class="c_td_xsm pl-1 w-25">
                                                                    <?php echo $record['quantity']; ?>
                                                                </td>
                                                                <td class="c_td_xsm pl-1 w-25">
                                                                    <?php
                                                                        if ($charges_type === 'h')
                                                                        {
                                                                            echo timeDifference($record['arr_time'],$record['dep_time']) * dateDifference($record['arri_date'] , $record['dep_date']);
                                                                        }
                                                                        elseif ($charges_type === 'd')
                                                                        {
                                                                            echo dateDifference($record['arri_date'] , $record['dep_date']);
                                                                        }

                                                                    ?>
                                                                </td>
                                                            </tr>

                                                        </tbody>
                                                    </table>
                                                </div>

                                            </div>
                                        </div>

                                        <!--Bottom-->
                                        <div class="w-100 h-50 o-hide">
                                            <div class="container p-0 w-100 h-100">
                                                <div class="row no-gutters w-100 h-100">
                                                    <!--Card-->
                                                    <div class="col-sm-4 h-50 p-3">
                                                        <div
                                                             class="w-100 h-100 p-2 d-flex flex-wrap align-content-center justify-content-center rview_butt pointer cust_shadow">
                                                            <div class="w-fit h-fit text_xxsm">
                                                                <div><strong>Name &thinsp;:
                                                                    </strong><span><?php echo $record['cust_first_name'].' '.$record['cust_last_name']; ?></span>
                                                                </div>
                                                                <div><strong>Phone :
                                                                    </strong><span><?php echo $record['cust_phone'] ?></span>
                                                                </div>
                                                                <div><strong>Email &thinsp;: </strong><span><a
                                                                           href="mailto:<?php echo $record['cust_email'] ?>"><?php echo $record['cust_email'] ?></a></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!--Card-->
                                                    <div class="col-sm-4 h-50 p-3">
                                                        <div data-toggle="modal"
                                                             data-target="#specialRequest"
                                                             class="w-100 h-100 p-2 d-flex flex-wrap align-content-center justify-content-center rview_butt pointer cust_shadow">
                                                            <div class="w-fit h-fit text_xxsm">
                                                                <strong>Special Request</strong>
                                                            </div>
                                                        </div>

                                                        <!--Special Request Modal-->
                                                        <div class="modal fade"
                                                             id="specialRequest">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content border-0">

                                                                    <div class="modal-header bg-csecondary">
                                                                        <strong class="modal-title">
                                                                            Special Request
                                                                        </strong>
                                                                        <button class="close"
                                                                                data-dismiss="modal">&times;</button>
                                                                    </div>

                                                                    <div class="modal-body p-3">
                                                                        <?php if ($record['special_request'] === 'None') : ?>
                                                                        <!-- No Special Request -->
                                                                        <p class="text_sm m-0 p-0">
                                                                            No Special Request
                                                                        </p>
                                                                        <?php endif; ?>

                                                                        <?php if ($record['special_request'] !== 'None') : ?>
                                                                        <!-- Special Request -->
                                                                        <p class="text_sm m-0 p-0">
                                                                            <?php echo $record['special_request'] ?>
                                                                        </p>
                                                                        <?php endif; ?>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!--Card-->
                                                    <div class="col-sm-4 h-50 p-3">
                                                        <div
                                                             class="w-100 h-100 p-2 d-flex flex-wrap align-content-center justify-content-center rview_butt pointer cust_shadow">
                                                            <div class="w-fit h-fit text_xxsm">
                                                                <div><strong>Room # &thinsp;:
                                                                    </strong><span><?php echo $record['fac_number'] ?></span>
                                                                </div>
                                                                <div><strong>Arrival Date :
                                                                    </strong><span><?php echo $record['arri_date'] ?></span>
                                                                </div>
                                                                <div><strong>Depature Date &thinsp;:
                                                                    </strong><span><?php echo $record['dep_date'] ?></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!--Card-->
                                                    <div class="col-sm-4 h-50 p-3">
                                                        <div
                                                             class="w-100 h-100 p-2 d-flex flex-wrap align-content-center justify-content-center rview_butt pointer cust_shadow">
                                                            <div class="w-fit h-fit text_xxsm">
                                                                <div><strong>Cost :
                                                                    </strong><span><?php echo $record['cost'] ?></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!--Card-->
                                                    <div class="col-sm-4 h-50 p-3">
                                                        <div
                                                             class="w-100 h-100 p-2 d-flex flex-wrap align-content-center justify-content-center rview_butt pointer cust_shadow">
                                                            <div class="w-fit h-fit text_xxsm">
                                                                <div><strong>Last Modified Date :
                                                                    </strong><span><?php echo $record['date_modified'] ?></span>
                                                                </div>
                                                                <div><strong>Last Modified Time :
                                                                    </strong><span><?php echo $record['time_modified'] ?></span>
                                                                </div>
                                                                <div><strong>Last Modified By &thinsp;:
                                                                    </strong><span><?php echo $record['modified_by'] ?></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!--Card Hold-->
                                                    <div class="col-sm-4 h-50 p-3">
                                                        <div data-toggle="modal"
                                                             data-target="#holdModal"
                                                             class="w-100 h-100 p-2 d-flex flex-wrap align-content-center justify-content-center <?php if ($record['hold'] === 1){echo 'btn-danger';} else { echo 'rview_butt'; } ?> pointer cust_shadow">
                                                            <div class="w-fit h-fit text_xxsm">
                                                                <?php if ($record['hold'] === 0) : ?>
                                                                <strong>Hold</strong>
                                                                <?php endif; ?>

                                                                <?php if ($record['hold'] === 1) : ?>
                                                                <strong>Unhold</strong>
                                                                <?php endif; ?>
                                                            </div>
                                                        </div>

                                                        <!--Hold MOdal-->
                                                        <div class="modal fade"
                                                             id="holdModal">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content border-0">
                                                                    <!--Modal Header-->
                                                                    <div class="modal-header bg-csecondary">
                                                                        <strong class="modal-title">
                                                                            Hold
                                                                        </strong>
                                                                        <button class="close"
                                                                                data-dismiss="modal">&times;</button>
                                                                    </div>

                                                                    <!--Modal Body-->
                                                                    <div class="modal-body p-3">

                                                                        <?php if($record['hold'] === 0): ?>
                                                                        <!--Not Hold-->
                                                                        <p class="text_sm m-0 p-0">
                                                                            Bill not on hold
                                                                        </p>

                                                                        <?php endif; ?>

                                                                        <?php if($record['hold'] === 1): ?>
                                                                        <!--Bill is on hold-->
                                                                        <p class="text_sm m-0 p-0">
                                                                            <?php echo $record['hold_reason'] ?>
                                                                        </p>

                                                                        <?php endif; ?>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>


                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php endif; ?>
                        </article>
                    </article>
                    <?php endif; ?>

                    <?php if ($activity === 'Payment'): ?>
                    <!--Payment-->
                    <article class="pl-3 pr-3 o-hide">

                        <?php
                                //if record view is all
                                if ($view === 'all'):
                            ?>

                        <header class="d-flex p-0 flex-wrap align-content-end justify-content-between">
                            <?php if ($view === 'all'): ?>
                            <form method="get"
                                  action="../config/proc/inside_nav.process.php"
                                  class="h-70 o-hide w-25 clearfix">
                                <!--Select-->
                                <div class="w-65 h-100 float-left bg-dark">
                                    <input type="hidden"
                                           value="reports"
                                           name="page">
                                    <select name="activity"
                                            class="form-control-sm border-0 w-100 rounded-0 bg-dark text-light">
                                        <option <?php if ($activity === 'Live Income'){echo 'selected';}?>
                                                value="Live Income">Live Income</option>
                                        <option <?php if ($activity === 'Booking'){echo 'selected';}?>
                                                value="Booking">Booking</option>
                                        <option <?php if ($activity === 'Payment'){echo 'selected';}?>
                                                value="Payment">Payment</option>
                                        <option <?php if ($activity === 'Refund'){echo 'selected';}?>
                                                value="Refund">Refund</option>
                                        <option <?php if ($activity === 'Check In'){echo 'selected';}?>
                                                value="Check In">Check In</option>
                                        <option <?php if ($activity === 'Check Out'){echo 'selected';}?>
                                                value="Check Out">Check Out</option>
                                        
                                    </select>
                                </div>
                                <!--Button-->
                                <div class="w-25 float-right bg-danger text_sm text-center o-hide h-100">
                                    <button class="btn btn-sm btn-magento w-100 bold h-100">LOAD</button>
                                </div>
                            </form>

                            <?php if ($paymentCount > 0): ?>
                            <div class="input-group input-group-sm w-50">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><img src="../assets/icos/general/delete.png"
                                             alt=""
                                             class="img-fluid"></span>
                                </div>


                                <input type="text"
                                       autocomplete="off"
                                       class="w-75 inside_search text-dark pl-2"
                                       id="<?php echo $activity ?>Search"
                                       placeholder="Search String">

                            </div>
                            <?php endif; ?>
                            <?php endif; ?>
                        </header>

                        <article class="d-flex flex-wrap align-content-center justify-content-center o-hide">

                            <div class="w-100 h-95 bg-clight">

                                <?php if ($paymentCount < 1 ): ?>
                                <!-- No Payment -->
                                <div class="w-100 h-100 d-flex flex-wrap align-content-center justify-content-center">
                                    <p class="enc">
                                        No Payment Yet
                                    </p>
                                </div>
                                <?php endif; ?>

                                <?php if ($paymentCount > 0 ): ?>
                                <!-- Payments -->
                                <header style="background-color: #F5F6FA;">
                                    <table class="table border-0">
                                        <thead>
                                            <tr class="c_tr_head">
                                                <th class="p-0 pl-2 c_th w-25">Payment Method</th>
                                                <th class="p-0 c_th w-25">Amount Paid</th>
                                                <th class="p-0 c_th w-25">Customer Name</th>
                                                <th class="p-0 pr-2 c_th w-25 text-right">Receptionist</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </header>

                                <article class="o-auto">
                                    <table class="table border-0 table-hover pointer">
                                        <tbody id="<?php echo $activity ?>Table">
                                            <?php while ($payment = $paymentStmt->fetch(PDO::FETCH_ASSOC)): ?>

                                            <tr onclick="location.href='../config/proc/inside_nav.process.php?reports_view=View Record&record_id=<?php echo $payment['id'] ?>'"
                                                class="border-bottom <?php if ($payment['refund'] === 1){echo 'bg-ligh-danger';} ?>">
                                                <td class="pl-2 c_td_xsm w-25">

                                                    <img class="img-fluid h_btn_sm mr-1"
                                                         src="../assets/icos/general/<?php echo $payment['method'] ?>.png">
                                                    <?php echo $payment['method'] ?>

                                                </td>
                                                <td class="c_td_xsm pl-0 w-25">
                                                    <?php
                                                                        if($payment['refund'] ===1)
                                                                        {
                                                                            echo '-';
                                                                        }
                                                                    ?>
                                                    GHS
                                                    <?php
                                                                        //get sum for all
                                                                        $p_paid = $payment['amount_paid'];
                                                                        $rId = $payment['id'];

                                                                        //get count

                                                                        $other_payment = "SELECT SUM(amount_paid) FROM payment WHERE master = ?";
                                                                        $other_stmt = $pdo->prepare($other_payment);
                                                                        $other_stmt->execute([$payment['id']]);
                                                                        $other_payment_result = $other_stmt->fetch(PDO::FETCH_ASSOC);
                                                                        $other_paid_amount = $other_payment_result['SUM(amount_paid)'];
                                                                    ?>

                                                    <?php echo $payment['amount_paid']+$other_paid_amount ?>
                                                    <span data-toggle="tooltip"
                                                          title="GHS <?php echo $payment['amount_paid']; ?> on booking"
                                                          data-placement="right"
                                                          class="text-info ml-2">&dotsquare;</span>
                                                    <?php if ($payment['p_count'] === 1 || $payment['p_count'] === 2) :?>

                                                    <?php
                                                                            $rID = $payment['id'];
                                                                            //get count one amount
                                                                            $c1_amt_sql = "SELECT * FROM `payment` WHERE `master` = $rID and `p_count`= 1";
                                                                            $c1_amt_stmt = $pdo->prepare($c1_amt_sql);
                                                                            $c1_amt_stmt->execute();
                                                                            $c1_amt_res = $c1_amt_stmt->fetch(PDO::FETCH_ASSOC);
                                                                            $c1_amt = $c1_amt_res['amount_paid'];
                                                                        ?>
                                                    <span data-toggle="tooltip"
                                                          title="GHS <?php echo $c1_amt; ?> paid on count 1"
                                                          data-placement="right"
                                                          class="text-magento ml-2">&dotsquare;</span>

                                                    <?php endif; ?>

                                                    <?php if ($payment['p_count'] === 2) :?>
                                                    <?php
                                                                            $rID = $payment['id'];
                                                                            //get count one amount
                                                                            $c2_amt_sql = "SELECT * FROM `payment` WHERE `master` = $rID and `p_count`= 2";
                                                                            $c2_amt_stmt = $pdo->prepare($c2_amt_sql);
                                                                            $c2_amt_stmt->execute();
                                                                            $c2_amt_res = $c2_amt_stmt->fetch(PDO::FETCH_ASSOC);
                                                                            $c2_amt = $c2_amt_res['amount_paid'];
                                                                        ?>
                                                    <span data-toggle="tooltip"
                                                          title="GHS <?php echo $c2_amt; ?> paid on count 2"
                                                          data-placement="right"
                                                          class="text-success ml-2">&dotsquare;</span>
                                                    <?php endif; ?>

                                                </td>
                                                <td class="c_td_xsm pl-0 w-25">
                                                    <?php echo $payment['customer'] ?>
                                                </td>
                                                <td class="c_td_xsm pl-0 text-sm-right w-25">
                                                    <?php echo $payment['receptionist'] ?>
                                                </td>
                                            </tr>

                                            <?php endwhile; ?>


                                        </tbody>
                                    </table>
                                </article>
                                <?php endif; ?>

                            </div>

                        </article>

                        <?php endif; ?>

                        <?php
                                //if view is single record
                                $record_id = $_SESSION['record_id'];
                                $recordSql = "SELECT * FROM `payment` where `id` = ?";
                                $recordStmt = $pdo->prepare($recordSql);
                                $recordStmt->execute([$record_id]);
                                $recordRes = $recordStmt->fetch(PDO::FETCH_ASSOC);

                                if ($view === 'View Record'):
                            ?>

                        <div class="w-100 h-100 container p-0 o-hide">
                            <div class="row h-100 no-gutters">
                                <!-- Back -->
                                <div class="col-sm-1 h-100">
                                    <span onclick="location.href='../config/proc/inside_nav.process.php?page=reports&activity=Payment'"
                                          data-toggle="tooltip"
                                          title="Back"
                                          class="text-info pointer"><img class="img-fluid h_btn_sm"
                                             src="../assets/icos/general/arrow_left.png"> </span>
                                </div>

                                <!-- Record Details -->
                                <div
                                     class="col-sm-10 h-100 <?php if ($recordRes['refund'] === 1){ echo 'bg-ligh-danger' ;} else {echo  'bg-clight'; }?> text-dark p-3 o-hide">
                                    <!-- Top -->
                                    <div class="w-100 h-25 border-bottom clearfix">

                                        <!--Receptionist Name-->
                                        <div class="float-left w-40 h-100 o-hide">
                                            <div class="w-100 h-30 d-flex flex-wrap align-content-end">
                                                <strong><?php echo $recordRes['customer'] ?></strong>
                                            </div>
                                            <div class="w-100 h-70 pt-1 o-hide">
                                                <p class="text_sm m-0 p-0"><strong>Payment ID :</strong>
                                                    <?php echo $recordRes['id']; ?></p>
                                                <p class="text_sm m-0 p-0"><strong>Payment Time :
                                                    </strong><?php echo $recordRes['date_paid'].' ' ?><kbd><?php echo $recordRes['time_paid']; ?></kbd>
                                                </p>
                                            </div>
                                        </div>

                                        <!--Category -->
                                        <div class="float-right w-40 h-100 o-hide">

                                            <div
                                                 class="w-100 h-30 d-flex flex-wrap align-content-end justify-content-end">
                                                <strong><?php echo $recordRes['facility'] ?></strong>
                                            </div>
                                            <!-- Total Paid -->
                                            <div class="w-100 d-flex flex-wrap justify-content-end h-70">

                                                <div class="w-100 h-fit text-right">
                                                    <kbd class="bg-info h-fit text_sm text-right"> <strong>Totally Paid :
                                                    </strong> GHS
                                                        <?php

                                                                $p_paid = $recordRes['amount_paid'];

                                                                //get count

                                                                $other_payment = "SELECT SUM(amount_paid) FROM payment WHERE master = $record_id";
                                                                $other_stmt = $pdo->prepare($other_payment);
                                                                $other_stmt->execute();
                                                                $other_payment_result = $other_stmt->fetch(PDO::FETCH_ASSOC);
                                                                $other_paid_amount = $other_payment_result['SUM(amount_paid)'];

                                                                echo $p_paid + $other_paid_amount;

                                                        ?>
                                                    </kbd>
                                                </div>

                                                <button onclick="popupwindow('extra_func.php?pmt_inv&pid=<?php echo $recordRes['id'] ?>', 'User Access Level', 800, 620)" class="btn btn-sm h-fit btn-cprimary">Invoice</button>

                                            </div>

                                        </div>

                                    </div>

                                    <!-- Middle -->
                                    <div class="w-100 h-50 d-flex flex-wrap align-content-center o-auto">

                                        <?php if ($recordRes['method'] === 'Cash'): ?>

                                        <!-- Cash Payment -->
                                        <div class="w-100 h-fit clearfix">
                                            <!-- Payment Details -->
                                            <div class="float-left w-40 h-fit">
                                                <div class="table-responsive-sm max-width">
                                                    <table class="table-sm">
                                                        <tbody>

                                                            <!-- Payment Method -->
                                                            <tr>
                                                                <td class="text_sm clearfix">
                                                                    <strong class="float-left">Payment Method
                                                                        &thinsp;</strong>
                                                                    <strong class="float-right">&thinsp;:</strong>
                                                                </td>
                                                                <td><?php echo $recordRes['method'] ?></td>
                                                            </tr>

                                                            <!-- Payment By -->
                                                            <tr>
                                                                <td class="text_sm clearfix">
                                                                    <strong class="float-left">Payment By
                                                                        &thinsp;</strong>
                                                                    <strong class="float-right">&thinsp;:</strong>
                                                                </td>
                                                                <td><?php echo $recordRes['customer'] ?></td>
                                                            </tr>

                                                            <!-- Payment Date -->
                                                            <tr>
                                                                <td class="text_sm clearfix">
                                                                    <strong class="float-left">Payment Date
                                                                        &thinsp;</strong>
                                                                    <strong class="float-right">&thinsp;:</strong>
                                                                </td>
                                                                <td><?php echo $recordRes['date_paid'] ?></td>
                                                            </tr>

                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>

                                            <!-- Money Details -->
                                            <div class="w-40 float-right h-fit d-flex flex-wrap justify-content-end">
                                                <div class="table-responsive-sm max-width">
                                                    <table class="table-sm text-right">
                                                        <tbody>

                                                            <!-- Amount  Owed -->
                                                            <tr>
                                                                <td class="text_sm clearfix">
                                                                    <strong class="float-left">Amount Owed
                                                                        &thinsp;</strong>
                                                                    <strong class="float-right">&thinsp;:</strong>
                                                                </td>
                                                                <td><?php echo $recordRes['amount_owed'] ?></td>
                                                            </tr>

                                                            <!-- Amount Paid -->
                                                            <tr>
                                                                <td class="text_sm clearfix">
                                                                    <strong class="float-left">Amount Paid
                                                                        &thinsp;</strong>
                                                                    <strong class="float-right">&thinsp;:</strong>
                                                                </td>
                                                                <td><?php echo $recordRes['amount_paid'] ?></td>
                                                            </tr>

                                                            <!-- Amount Balance -->
                                                            <tr>
                                                                <td class="text_sm clearfix">
                                                                    <strong class="float-left">Amount Balance
                                                                        &thinsp;</strong>
                                                                    <strong class="float-right">&thinsp;:</strong>
                                                                </td>
                                                                <td><?php echo $recordRes['amount_balance'] ?></td>
                                                            </tr>

                                                            <!--Authorized By -->
                                                            <tr>
                                                                <td class="text_sm clearfix">
                                                                    <strong class="float-left">Authorized By
                                                                        &thinsp;</strong>
                                                                    <strong class="float-right">&thinsp;:</strong>
                                                                </td>
                                                                <td><?php echo $recordRes['receptionist'] ?></td>
                                                            </tr>

                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>

                                        </div>


                                        <?php endif; ?>


                                        <?php if ($recordRes['method'] === 'Mobile Money'): ?>

                                        <!-- Mobile Money Payment -->
                                        <div class="w-100 h-fit d-flex flex-wrap justify-content-between">

                                            <!--First Card -->
                                            <div class="w-30 card border-0  h-fit">
                                                <div class="table-responsive-sm max-width">

                                                    <table class="table-sm">
                                                        <tbody>

                                                            <!-- Payment Method -->
                                                            <tr>
                                                                <td class="text_sm clearfix">
                                                                    <strong class="float-left">Payment Method
                                                                        &thinsp;</strong>
                                                                    <strong class="float-right">&thinsp;:</strong>
                                                                </td>
                                                                <td class='text_sm'><?php echo $recordRes['method'] ?>
                                                                </td>
                                                            </tr>

                                                            <!-- Mobile Carrier -->
                                                            <tr>
                                                                <td class="text_sm clearfix">
                                                                    <strong class="float-left">Mobile Carrier
                                                                        &thinsp;</strong>
                                                                    <strong class="float-right">&thinsp;:</strong>
                                                                </td>
                                                                <td class='text_sm'>
                                                                    <?php echo $recordRes['momo_carrier'] ?></td>
                                                            </tr>

                                                            <!-- Mobile Number -->
                                                            <tr>
                                                                <td class="text_sm clearfix">
                                                                    <strong class="float-left">Mobile Number
                                                                        &thinsp;</strong>
                                                                    <strong class="float-right">&thinsp;:</strong>
                                                                </td>
                                                                <td class='text_sm'>
                                                                    <?php echo $recordRes['momo_number'] ?></td>
                                                            </tr>

                                                            <!-- Transaction Id -->
                                                            <tr>
                                                                <td class="text_sm clearfix">
                                                                    <strong class="float-left">Transaction ID
                                                                        &thinsp;</strong>
                                                                    <strong class="float-right">&thinsp;:</strong>
                                                                </td>
                                                                <td class='text_sm'>
                                                                    <?php echo $recordRes['momo_trans_id'] ?></td>
                                                            </tr>

                                                        </tbody>
                                                    </table>

                                                </div>
                                            </div>

                                            <!--Second Card -->
                                            <div class="w-30 card border-0 h-fit">
                                                <div class="table-responsive-sm max-width">

                                                    <table class="table-sm">
                                                        <tbody>

                                                            <!-- Sender's Name -->
                                                            <tr>
                                                                <td class="text_sm clearfix">
                                                                    <strong class="float-left">Sender's Name
                                                                        &thinsp;</strong>
                                                                    <strong class="float-right">&thinsp;:</strong>
                                                                </td>
                                                                <td class='text_sm'>
                                                                    <?php echo $recordRes['momo_sender'] ?></td>
                                                            </tr>

                                                            <!-- Authorized By -->
                                                            <tr>
                                                                <td class="text_sm clearfix">
                                                                    <strong class="float-left">Authorized By
                                                                        &thinsp;</strong>
                                                                    <strong class="float-right">&thinsp;:</strong>
                                                                </td>
                                                                <td class='text_sm'>
                                                                    <?php echo $recordRes['receptionist'] ?></td>
                                                            </tr>

                                                        </tbody>
                                                    </table>

                                                </div>
                                            </div>

                                            <!-- Third Card -->
                                            <div class="w-30 card border-0 h-fit">
                                                <div class="table-responsive-sm max-width">

                                                    <table class="table-sm">
                                                        <tbody>

                                                            <!-- Amount Owed -->
                                                            <tr>
                                                                <td class="text_sm clearfix">
                                                                    <strong class="float-left">Amount Owed
                                                                        &thinsp;</strong>
                                                                    <strong class="float-right">&thinsp;:</strong>
                                                                </td>
                                                                <td class='text_sm'>
                                                                    <?php echo $recordRes['amount_owed'] ?></td>
                                                            </tr>

                                                            <!-- Amount Paid -->
                                                            <tr>
                                                                <td class="text_sm clearfix">
                                                                    <strong class="float-left">Amount Paid
                                                                        &thinsp;</strong>
                                                                    <strong class="float-right">&thinsp;:</strong>
                                                                </td>
                                                                <td class='text_sm'>
                                                                    <?php echo $recordRes['amount_paid'] ?></td>
                                                            </tr>

                                                            <!-- Mobile Number -->
                                                            <tr>
                                                                <td class="text_sm clearfix">
                                                                    <strong class="float-left">Amount Balance
                                                                        &thinsp;</strong>
                                                                    <strong class="float-right">&thinsp;:</strong>
                                                                </td>
                                                                <td class='text_sm'>
                                                                    <?php echo $recordRes['amount_balance'] ?></td>
                                                            </tr>

                                                            <!-- Timestamp -->
                                                            <tr>
                                                                <td class="text_sm clearfix">
                                                                    <strong class="float-left">Timestamp
                                                                        &thinsp;</strong>
                                                                    <strong class="float-right">&thinsp;:</strong>
                                                                </td>
                                                                <td class='text_sm'>
                                                                    <?php echo $recordRes['date_paid'] ?></td>
                                                            </tr>

                                                        </tbody>
                                                    </table>

                                                </div>
                                            </div>

                                        </div>

                                        <?php endif; ?>

                                        <?php if ($recordRes['method'] === 'Card'): ?>

                                        <!-- Card Payment -->
                                        <div class="w-100 h-fit clearfix">
                                            <!-- Payment Details -->
                                            <div class="float-left w-40 h-fit">
                                                <div class="table-responsive-sm max-width">
                                                    <table class="table-sm">
                                                        <tbody>

                                                            <!-- Payment Method -->
                                                            <tr>
                                                                <td class="text_sm clearfix">
                                                                    <strong class="float-left">Payment Method
                                                                        &thinsp;</strong>
                                                                    <strong class="float-right">&thinsp;:</strong>
                                                                </td>
                                                                <td><?php echo $recordRes['method'] ?></td>
                                                            </tr>

                                                            <!-- Card Type -->
                                                            <tr>
                                                                <td class="text_sm clearfix">
                                                                    <strong class="float-left">Card Type
                                                                        &thinsp;</strong>
                                                                    <strong class="float-right">&thinsp;:</strong>
                                                                </td>
                                                                <td><?php echo $recordRes['card_type'] ?></td>
                                                            </tr>

                                                            <!-- Card Number -->
                                                            <tr>
                                                                <td class="text_sm clearfix">
                                                                    <strong class="float-left">Card Number
                                                                        &thinsp;</strong>
                                                                    <strong class="float-right">&thinsp;:</strong>
                                                                </td>
                                                                <td><?php echo $recordRes['card_number'] ?></td>
                                                            </tr>

                                                            <!-- Payment Date -->
                                                            <tr>
                                                                <td class="text_sm clearfix">
                                                                    <strong class="float-left">Payment Date
                                                                        &thinsp;</strong>
                                                                    <strong class="float-right">&thinsp;:</strong>
                                                                </td>
                                                                <td><?php echo $recordRes['date_paid'] ?></td>
                                                            </tr>

                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>

                                            <!-- Money Details -->
                                            <div class="w-40 float-right h-fit d-flex flex-wrap justify-content-end">
                                                <div class="table-responsive-sm max-width">
                                                    <table class="table-sm text-right">
                                                        <tbody>

                                                            <!-- Amount  Owed -->
                                                            <tr>
                                                                <td class="text_sm clearfix">
                                                                    <strong class="float-left">Amount Owed
                                                                        &thinsp;</strong>
                                                                    <strong class="float-right">&thinsp;:</strong>
                                                                </td>
                                                                <td><?php echo $recordRes['amount_owed'] ?></td>
                                                            </tr>

                                                            <!-- Amount Paid -->
                                                            <tr>
                                                                <td class="text_sm clearfix">
                                                                    <strong class="float-left">Amount Paid
                                                                        &thinsp;</strong>
                                                                    <strong class="float-right">&thinsp;:</strong>
                                                                </td>
                                                                <td><?php echo $recordRes['amount_paid'] ?></td>
                                                            </tr>

                                                            <!-- Amount Balance -->
                                                            <tr>
                                                                <td class="text_sm clearfix">
                                                                    <strong class="float-left">Amount Balance
                                                                        &thinsp;</strong>
                                                                    <strong class="float-right">&thinsp;:</strong>
                                                                </td>
                                                                <td><?php echo $recordRes['amount_balance'] ?></td>
                                                            </tr>

                                                            <!--Authorized By -->
                                                            <tr>
                                                                <td class="text_sm clearfix">
                                                                    <strong class="float-left">Authorized By
                                                                        &thinsp;</strong>
                                                                    <strong class="float-right">&thinsp;:</strong>
                                                                </td>
                                                                <td><?php echo $recordRes['receptionist'] ?></td>
                                                            </tr>

                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>

                                        </div>

                                        <?php endif; ?>

                                    </div>

                                    <!-- Bottom -->
                                    <div
                                         class="w-100 d-flex flex-wrap align-content-center justify-content-center h-25">

                                        <?php if ($subPaymentsCount > 0): ?>

                                        <button data-toggle="modal"
                                                data-target="#pCountOne"
                                                class="w-25 ml-2 mr-2 btn h-50 btn-cprimary bold text-magento cust_shadow">Payment
                                            Count 1</button>

                                        <?php
                                                        //payment count one query
                                                        $pCountOneSql = "SELECT * FROM `payment` where `master` = ? AND `p_count` = ? LIMIT 1";
                                                        $pCountOneStmt = $pdo->prepare($pCountOneSql);
                                                        $pCountOneStmt->execute([$record_id , 1]);
                                                        $pCountOne = $pCountOneStmt->fetch(PDO::FETCH_ASSOC);
                                                    ?>

                                        <!-- Payment Count 1 Modal -->
                                        <div class="modal fade"
                                             id="pCountOne">
                                            <div class="modal-dialog">
                                                <div class="modal-content border-0">

                                                    <div class="modal-header bg-csecondary">
                                                        <strong class="modal-title">Payment Count One</strong>
                                                        <button class="close"
                                                                data-dismiss="modal">&times;</button>
                                                    </div>

                                                    <div class="modal-body p-3 text_sm">

                                                        <div class="w-100 h-fit d-flex flex-wrap justify-content-end">
                                                            <button onclick="popupwindow('extra_func.php?pmt_inv&pid=<?php echo $pCountOne['id'] ?>', 'User Access Level', 800, 620)" class="btn btn-sm btn-cprimary">Invoice</button>
                                                        </div>

                                                        <?php
                                                                        //if pcount one is momo payment
                                                                        if ($pCountOne['method'] === 'Mobile Money'):
                                                                    ?>



                                                        <!-- Payment Details Mobile Money -->
                                                        <div class="h-fit text_sm w-75 mx-auto">
                                                            <table class="table text_sm">
                                                                <tbody>
                                                                    <!-- Payment Method -->
                                                                    <tr>
                                                                        <td class="clearfix p-1 border-0">
                                                                            <strong class="float-left">Payment
                                                                                Method</strong>
                                                                            <strong class="float-right">:</strong>
                                                                        </td>
                                                                        <td class="p-1 border-0 pl-5">
                                                                            <?php echo $pCountOne['method'] ?>
                                                                        </td>
                                                                    </tr>

                                                                    <!-- Carrier -->
                                                                    <tr>
                                                                        <td class="clearfix p-1 border-0">
                                                                            <strong class="float-left">Mobile
                                                                                Carrier</strong>
                                                                            <strong class="float-right">:</strong>
                                                                        </td>
                                                                        <td class="p-1 border-0 pl-5">
                                                                            <?php echo $pCountOne['momo_carrier'] ?>
                                                                        </td>
                                                                    </tr>

                                                                    <!-- Mobile Number -->
                                                                    <tr>
                                                                        <td class="clearfix p-1 border-0">
                                                                            <strong class="float-left">Mobile
                                                                                Number</strong>
                                                                            <strong class="float-right">:</strong>
                                                                        </td>
                                                                        <td class="p-1 border-0 pl-5">
                                                                            <?php echo $pCountOne['momo_number'] ?>
                                                                        </td>
                                                                    </tr>

                                                                    <!-- Transaction ID -->
                                                                    <tr>
                                                                        <td class="clearfix p-1 border-0">
                                                                            <strong class="float-left">Transaction
                                                                                ID</strong>
                                                                            <strong class="float-right">:</strong>
                                                                        </td>
                                                                        <td class="p-1 border-0 pl-5">
                                                                            <?php echo $pCountOne['momo_trans_id'] ?>
                                                                        </td>
                                                                    </tr>

                                                                    <!-- Sender Name -->
                                                                    <tr>
                                                                        <td class="clearfix p-1 border-0">
                                                                            <strong class="float-left">Sender's
                                                                                Name</strong>
                                                                            <strong class="float-right">:</strong>
                                                                        </td>
                                                                        <td class="p-1 border-0 pl-5">
                                                                            <?php echo $pCountOne['momo_sender'] ?>
                                                                        </td>
                                                                    </tr>

                                                                    <!-- Amount Owed -->
                                                                    <tr>
                                                                        <td class="clearfix p-1 border-0">
                                                                            <strong class="float-left">Amount
                                                                                Owed</strong>
                                                                            <strong class="float-right">:</strong>
                                                                        </td>
                                                                        <td class="p-1 border-0 pl-5">
                                                                            <?php echo 'GHS '. $pCountOne['amount_owed'] ?>
                                                                        </td>
                                                                    </tr>

                                                                    <!-- Amount Paid -->
                                                                    <tr>
                                                                        <td class="clearfix p-1 border-0">
                                                                            <strong class="float-left">Amount
                                                                                Paid</strong>
                                                                            <strong class="float-right">:</strong>
                                                                        </td>
                                                                        <td class="p-1 border-0 pl-5">
                                                                            <?php echo 'GHS '.$pCountOne['amount_paid'] ?>
                                                                        </td>
                                                                    </tr>

                                                                    <!-- Amount Balance -->
                                                                    <tr>
                                                                        <td class="clearfix p-1 border-0">
                                                                            <strong class="float-left">Amount
                                                                                Balance</strong>
                                                                            <strong class="float-right">:</strong>
                                                                        </td>
                                                                        <td class="p-1 border-0 pl-5">
                                                                            <?php echo 'GHS '.$pCountOne['amount_balance'] ?>
                                                                        </td>
                                                                    </tr>

                                                                    <!-- Authorized By -->
                                                                    <tr>
                                                                        <td class="clearfix p-1 border-0">
                                                                            <strong class="float-left">Authorized
                                                                                By</strong>
                                                                            <strong class="float-right">:</strong>
                                                                        </td>
                                                                        <td class="p-1 border-0 pl-5">
                                                                            <?php echo $pCountOne['receptionist'] ?>
                                                                        </td>
                                                                    </tr>

                                                                    <!-- Date and Time -->
                                                                    <tr>
                                                                        <td class="clearfix p-1 border-0">
                                                                            <strong
                                                                                    class="float-left">Timestamp</strong>
                                                                            <strong class="float-right">:</strong>
                                                                        </td>
                                                                        <td class="p-1 border-0 pl-5">
                                                                            <?php echo $pCountOne['date_paid'].' '.$pCountOne['time_paid'] ?>
                                                                        </td>
                                                                    </tr>

                                                                </tbody>
                                                            </table>
                                                        </div>

                                                        <?php endif; ?>

                                                        <?php
                                                                        //if pcount is card
                                                                        if ($pCountOne['method'] === 'Card' ):
                                                                    ?>

                                                        <!-- Payment Details Card -->
                                                        <div class="h-fit text_sm w-75 mx-auto">

                                                            <table class="table text_sm">
                                                                <tbody>
                                                                    <!-- Payment Method -->
                                                                    <tr>
                                                                        <td class="clearfix text_sm p-1 border-0">
                                                                            <strong class="float-left">Payment
                                                                                Method</strong>
                                                                            <strong class="float-right">:</strong>
                                                                        </td>
                                                                        <td class="p-1 text_sm border-0 pl-5">
                                                                            <?php echo $pCountOne['method'] ?>
                                                                        </td>
                                                                    </tr>

                                                                    <!-- Card Type -->
                                                                    <tr>
                                                                        <td class="clearfix p-1 border-0">
                                                                            <strong class="float-left">Card
                                                                                Type</strong>
                                                                            <strong class="float-right">:</strong>
                                                                        </td>
                                                                        <td class="p-1 border-0 pl-5">
                                                                            <?php echo $pCountOne['card_type'] ?>
                                                                        </td>
                                                                    </tr>

                                                                    <!-- Card number -->
                                                                    <tr>
                                                                        <td class="clearfix p-1 border-0">
                                                                            <strong class="float-left">Card
                                                                                Number</strong>
                                                                            <strong class="float-right">:</strong>
                                                                        </td>
                                                                        <td class="p-1 border-0 pl-5">
                                                                            <?php echo $pCountOne['card_number'] ?>
                                                                        </td>
                                                                    </tr>

                                                                    <!-- Amount Owed -->
                                                                    <tr>
                                                                        <td class="clearfix p-1 border-0">
                                                                            <strong class="float-left">Amount
                                                                                Owed</strong>
                                                                            <strong class="float-right">:</strong>
                                                                        </td>
                                                                        <td class="p-1 border-0 pl-5">
                                                                            <?php echo $pCountOne['amount_owed'] ?>
                                                                        </td>
                                                                    </tr>

                                                                    <!-- Amount Paid -->
                                                                    <tr>
                                                                        <td class="clearfix p-1 border-0">
                                                                            <strong class="float-left">Amount
                                                                                Paid</strong>
                                                                            <strong class="float-right">:</strong>
                                                                        </td>
                                                                        <td class="p-1 border-0 pl-5">
                                                                            <?php echo $pCountOne['amount_paid'] ?>
                                                                        </td>
                                                                    </tr>

                                                                    <!-- Amount Balance -->
                                                                    <tr>
                                                                        <td class="clearfix p-1 border-0">
                                                                            <strong class="float-left">Amount
                                                                                Balance</strong>
                                                                            <strong class="float-right">:</strong>
                                                                        </td>
                                                                        <td class="p-1 border-0 pl-5">
                                                                            <?php echo $pCountOne['amount_balance'] ?>
                                                                        </td>
                                                                    </tr>

                                                                    <!-- Authorized -->
                                                                    <tr>
                                                                        <td class="clearfix p-1 border-0">
                                                                            <strong class="float-left">Authorized
                                                                                By</strong>
                                                                            <strong class="float-right">:</strong>
                                                                        </td>
                                                                        <td class="p-1 border-0 pl-5">
                                                                            <?php echo $pCountOne['receptionist'] ?>
                                                                        </td>
                                                                    </tr>

                                                                    <!-- Time Stamp -->
                                                                    <tr>
                                                                        <td class="clearfix p-1 border-0">
                                                                            <strong
                                                                                    class="float-left">Timestamp</strong>
                                                                            <strong class="float-right">:</strong>
                                                                        </td>
                                                                        <td class="p-1 border-0 pl-5">
                                                                            <?php echo $pCountOne['date_paid'].' '.$pCountOne['time_paid'] ?>
                                                                        </td>
                                                                    </tr>


                                                                </tbody>
                                                            </table>

                                                        </div>

                                                        <?php endif; ?>

                                                        <?php
                                                                        //if pcount is card
                                                                        if ($pCountOne['method'] === 'Cash' ):
                                                                    ?>

                                                        <!-- Payment Details Cash -->
                                                        <div class="h-fit text_sm w-75 mx-auto">

                                                            <table class="table text_sm">
                                                                <tbody>
                                                                    <!-- Payment Method -->
                                                                    <tr>
                                                                        <td class="clearfix p-1 border-0">
                                                                            <strong class="float-left">Payment
                                                                                Method</strong>
                                                                            <strong class="float-right">:</strong>
                                                                        </td>
                                                                        <td class="p-1 border-0 pl-5">
                                                                            <?php echo $pCountOne['method'] ?>
                                                                        </td>
                                                                    </tr>

                                                                    <!-- Card Type -->
                                                                    <tr>
                                                                        <td class="clearfix p-1 border-0">
                                                                            <strong class="float-left">Payment
                                                                                By</strong>
                                                                            <strong class="float-right">:</strong>
                                                                        </td>
                                                                        <td class="p-1 border-0 pl-5">
                                                                            <?php echo $pCountOne['customer'] ?>
                                                                        </td>
                                                                    </tr>

                                                                    <!-- Amount Owed -->
                                                                    <tr>
                                                                        <td class="clearfix p-1 border-0">
                                                                            <strong class="float-left">Amount
                                                                                Owed</strong>
                                                                            <strong class="float-right">:</strong>
                                                                        </td>
                                                                        <td class="p-1 border-0 pl-5">
                                                                            <?php echo $pCountOne['amount_owed'] ?>
                                                                        </td>
                                                                    </tr>

                                                                    <!-- Amount Paid -->
                                                                    <tr>
                                                                        <td class="clearfix p-1 border-0">
                                                                            <strong class="float-left">Amount
                                                                                Paid</strong>
                                                                            <strong class="float-right">:</strong>
                                                                        </td>
                                                                        <td class="p-1 border-0 pl-5">
                                                                            <?php echo $pCountOne['amount_paid'] ?>
                                                                        </td>
                                                                    </tr>

                                                                    <!-- Amount Balance -->
                                                                    <tr>
                                                                        <td class="clearfix p-1 border-0">
                                                                            <strong class="float-left">Amount
                                                                                Balance</strong>
                                                                            <strong class="float-right">:</strong>
                                                                        </td>
                                                                        <td class="p-1 border-0 pl-5">
                                                                            <?php echo $pCountOne['amount_balance'] ?>
                                                                        </td>
                                                                    </tr>

                                                                    <!-- Authorized -->
                                                                    <tr>
                                                                        <td class="clearfix p-1 border-0">
                                                                            <strong class="float-left">Authorized
                                                                                By</strong>
                                                                            <strong class="float-right">:</strong>
                                                                        </td>
                                                                        <td class="p-1 border-0 pl-5">
                                                                            <?php echo $pCountOne['receptionist'] ?>
                                                                        </td>
                                                                    </tr>

                                                                    <!-- Time Stamp -->
                                                                    <tr>
                                                                        <td class="clearfix p-1 border-0">
                                                                            <strong
                                                                                    class="float-left">Timestamp</strong>
                                                                            <strong class="float-right">:</strong>
                                                                        </td>
                                                                        <td class="p-1 border-0 pl-5">
                                                                            <?php echo $pCountOne['date_paid'].' '.$pCountOne['time_paid'] ?>
                                                                        </td>
                                                                    </tr>


                                                                </tbody>
                                                            </table>

                                                        </div>

                                                        <?php endif; ?>

                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                        <?php endif; ?>

                                        <?php if ($subPaymentsCount > 1): ?>
                                        <button data-toggle="modal"
                                                data-target="#pCountTwo"
                                                class="w-25 ml-2 mr-2 btn h-50 btn-cprimary cust_shadow bold text-magento">Payment
                                            Count 2</button>

                                        <?php
                                                        //payment count two query
                                                        $pCountTwoSql = "SELECT * FROM `payment` where `master` = ? AND `p_count` = ? LIMIT 1";
                                                        $pCountTwoStmt = $pdo->prepare($pCountTwoSql);
                                                        $pCountTwoStmt->execute([$record_id , 2]);
                                                        $pCountTwo = $pCountTwoStmt->fetch(PDO::FETCH_ASSOC);

                                                    ?>

                                        <!-- Payment Count 2 Modal -->
                                        <div class="modal fade"
                                             id="pCountTwo">
                                            <div class="modal-dialog">
                                                <div class="modal-content border-0">

                                                    <div class="modal-header bg-csecondary">
                                                        <strong class="modal-title">Payment Count Two</strong>
                                                        <button class="close"
                                                                data-dismiss="modal">&times;</button>
                                                    </div>

                                                    <div class="modal-body p-3 text_sm">

                                                        <div class="w-100 h-fit d-flex flex-wrap justify-content-end">
                                                            <button onclick="popupwindow('extra_func.php?pmt_inv&pid=<?php echo $pCountTwo['id'] ?>', 'User Access Level', 800, 620)" class="btn btn-sm btn-cprimary">Invoice</button>
                                                        </div>

                                                        <?php
                                                                        //if pcount one is momo payment
                                                                        if ($pCountTwo['method'] === 'Mobile Money'):
                                                                    ?>



                                                        <!-- Payment Details Mobile Money -->
                                                        <div class="h-fit text_sm w-75 mx-auto">
                                                            <table class="table text_sm">
                                                                <tbody>
                                                                    <!-- Payment Method -->
                                                                    <tr>
                                                                        <td class="clearfix p-1 border-0">
                                                                            <strong class="float-left">Payment
                                                                                Method</strong>
                                                                            <strong class="float-right">:</strong>
                                                                        </td>
                                                                        <td class="p-1 border-0 pl-5">
                                                                            <?php echo $pCountTwo['method'] ?>
                                                                        </td>
                                                                    </tr>

                                                                    <!-- Carrier -->
                                                                    <tr>
                                                                        <td class="clearfix p-1 border-0">
                                                                            <strong class="float-left">Mobile
                                                                                Carrier</strong>
                                                                            <strong class="float-right">:</strong>
                                                                        </td>
                                                                        <td class="p-1 border-0 pl-5">
                                                                            <?php echo $pCountTwo['momo_carrier'] ?>
                                                                        </td>
                                                                    </tr>

                                                                    <!-- Mobile Number -->
                                                                    <tr>
                                                                        <td class="clearfix p-1 border-0">
                                                                            <strong class="float-left">Mobile
                                                                                Number</strong>
                                                                            <strong class="float-right">:</strong>
                                                                        </td>
                                                                        <td class="p-1 border-0 pl-5">
                                                                            <?php echo $pCountTwo['momo_number'] ?>
                                                                        </td>
                                                                    </tr>

                                                                    <!-- Transaction ID -->
                                                                    <tr>
                                                                        <td class="clearfix p-1 border-0">
                                                                            <strong class="float-left">Transaction
                                                                                ID</strong>
                                                                            <strong class="float-right">:</strong>
                                                                        </td>
                                                                        <td class="p-1 border-0 pl-5">
                                                                            <?php echo $pCountTwo['momo_trans_id'] ?>
                                                                        </td>
                                                                    </tr>

                                                                    <!-- Sender Name -->
                                                                    <tr>
                                                                        <td class="clearfix p-1 border-0">
                                                                            <strong class="float-left">Sender's
                                                                                Name</strong>
                                                                            <strong class="float-right">:</strong>
                                                                        </td>
                                                                        <td class="p-1 border-0 pl-5">
                                                                            <?php echo $pCountTwo['momo_sender'] ?>
                                                                        </td>
                                                                    </tr>

                                                                    <!-- Amount Owed -->
                                                                    <tr>
                                                                        <td class="clearfix p-1 border-0">
                                                                            <strong class="float-left">Amount
                                                                                Owed</strong>
                                                                            <strong class="float-right">:</strong>
                                                                        </td>
                                                                        <td class="p-1 border-0 pl-5">
                                                                            <?php echo 'GHS '. $pCountTwo['amount_owed'] ?>
                                                                        </td>
                                                                    </tr>

                                                                    <!-- Amount Paid -->
                                                                    <tr>
                                                                        <td class="clearfix p-1 border-0">
                                                                            <strong class="float-left">Amount
                                                                                Paid</strong>
                                                                            <strong class="float-right">:</strong>
                                                                        </td>
                                                                        <td class="p-1 border-0 pl-5">
                                                                            <?php echo 'GHS '.$pCountTwo['amount_paid'] ?>
                                                                        </td>
                                                                    </tr>

                                                                    <!-- Amount Balance -->
                                                                    <tr>
                                                                        <td class="clearfix p-1 border-0">
                                                                            <strong class="float-left">Amount
                                                                                Balance</strong>
                                                                            <strong class="float-right">:</strong>
                                                                        </td>
                                                                        <td class="p-1 border-0 pl-5">
                                                                            <?php echo 'GHS '.$pCountTwo['amount_balance'] ?>
                                                                        </td>
                                                                    </tr>

                                                                    <!-- Authorized By -->
                                                                    <tr>
                                                                        <td class="clearfix p-1 border-0">
                                                                            <strong class="float-left">Authorized
                                                                                By</strong>
                                                                            <strong class="float-right">:</strong>
                                                                        </td>
                                                                        <td class="p-1 border-0 pl-5">
                                                                            <?php echo $pCountTwo['receptionist'] ?>
                                                                        </td>
                                                                    </tr>

                                                                    <!-- Date and Time -->
                                                                    <tr>
                                                                        <td class="clearfix p-1 border-0">
                                                                            <strong
                                                                                    class="float-left">Timestamp</strong>
                                                                            <strong class="float-right">:</strong>
                                                                        </td>
                                                                        <td class="p-1 border-0 pl-5">
                                                                            <?php echo $pCountTwo['date_paid'].' '.$pCountTwo['time_paid'] ?>
                                                                        </td>
                                                                    </tr>

                                                                </tbody>
                                                            </table>
                                                        </div>

                                                        <?php endif; ?>

                                                        <?php
                                                                    //if pcount is card
                                                                    if ($pCountTwo['method'] === 'Card' ):
                                                                ?>

                                                        <!-- Payment Details Card -->
                                                        <div class="h-fit text_sm w-75 mx-auto">

                                                            <table class="table text_sm">
                                                                <tbody>
                                                                    <!-- Payment Method -->
                                                                    <tr>
                                                                        <td class="clearfix p-1 border-0">
                                                                            <strong class="float-left">Payment
                                                                                Method</strong>
                                                                            <strong class="float-right">:</strong>
                                                                        </td>
                                                                        <td class="p-1 border-0 pl-5">
                                                                            <?php echo $pCountTwo['method'] ?>
                                                                        </td>
                                                                    </tr>

                                                                    <!-- Card Type -->
                                                                    <tr>
                                                                        <td class="clearfix p-1 border-0">
                                                                            <strong class="float-left">Card
                                                                                Type</strong>
                                                                            <strong class="float-right">:</strong>
                                                                        </td>
                                                                        <td class="p-1 border-0 pl-5">
                                                                            <?php echo $pCountTwo['card_type'] ?>
                                                                        </td>
                                                                    </tr>

                                                                    <!-- Card number -->
                                                                    <tr>
                                                                        <td class="clearfix p-1 border-0">
                                                                            <strong class="float-left">Card
                                                                                Number</strong>
                                                                            <strong class="float-right">:</strong>
                                                                        </td>
                                                                        <td class="p-1 border-0 pl-5">
                                                                            <?php echo $pCountTwo['card_number'] ?>
                                                                        </td>
                                                                    </tr>

                                                                    <!-- Amount Owed -->
                                                                    <tr>
                                                                        <td class="clearfix p-1 border-0">
                                                                            <strong class="float-left">Amount
                                                                                Owed</strong>
                                                                            <strong class="float-right">:</strong>
                                                                        </td>
                                                                        <td class="p-1 border-0 pl-5">
                                                                            <?php echo $pCountTwo['amount_owed'] ?>
                                                                        </td>
                                                                    </tr>

                                                                    <!-- Amount Paid -->
                                                                    <tr>
                                                                        <td class="clearfix p-1 border-0">
                                                                            <strong class="float-left">Amount
                                                                                Paid</strong>
                                                                            <strong class="float-right">:</strong>
                                                                        </td>
                                                                        <td class="p-1 border-0 pl-5">
                                                                            <?php echo $pCountTwo['amount_paid'] ?>
                                                                        </td>
                                                                    </tr>

                                                                    <!-- Amount Balance -->
                                                                    <tr>
                                                                        <td class="clearfix p-1 border-0">
                                                                            <strong class="float-left">Amount
                                                                                Balance</strong>
                                                                            <strong class="float-right">:</strong>
                                                                        </td>
                                                                        <td class="p-1 border-0 pl-5">
                                                                            <?php echo $pCountTwo['amount_balance'] ?>
                                                                        </td>
                                                                    </tr>

                                                                    <!-- Authorized -->
                                                                    <tr>
                                                                        <td class="clearfix p-1 border-0">
                                                                            <strong class="float-left">Authorized
                                                                                By</strong>
                                                                            <strong class="float-right">:</strong>
                                                                        </td>
                                                                        <td class="p-1 border-0 pl-5">
                                                                            <?php echo $pCountTwo['receptionist'] ?>
                                                                        </td>
                                                                    </tr>

                                                                    <!-- Time Stamp -->
                                                                    <tr>
                                                                        <td class="clearfix p-1 border-0">
                                                                            <strong
                                                                                    class="float-left">Timestamp</strong>
                                                                            <strong class="float-right">:</strong>
                                                                        </td>
                                                                        <td class="p-1 border-0 pl-5">
                                                                            <?php echo $pCountTwo['date_paid'].' '.$pCountTwo['time_paid'] ?>
                                                                        </td>
                                                                    </tr>


                                                                </tbody>
                                                            </table>

                                                        </div>

                                                        <?php endif; ?>


                                                        <?php
                                                                    //if pcount is card
                                                                    if ($pCountTwo['method'] === 'Cash' ):
                                                                ?>

                                                        <!-- Payment Details Cash -->
                                                        <div class="h-fit text_sm w-75 mx-auto">

                                                            <table class="table text_sm">
                                                                <tbody>
                                                                    <!-- Payment Method -->
                                                                    <tr>
                                                                        <td class="clearfix p-1 border-0">
                                                                            <strong class="float-left">Payment
                                                                                Method</strong>
                                                                            <strong class="float-right">:</strong>
                                                                        </td>
                                                                        <td class="p-1 border-0 pl-5">
                                                                            <?php echo $pCountTwo['method'] ?>
                                                                        </td>
                                                                    </tr>

                                                                    <!-- Card Type -->
                                                                    <tr>
                                                                        <td class="clearfix p-1 border-0">
                                                                            <strong class="float-left">Payment
                                                                                By</strong>
                                                                            <strong class="float-right">:</strong>
                                                                        </td>
                                                                        <td class="p-1 border-0 pl-5">
                                                                            <?php echo $pCountTwo['customer'] ?>
                                                                        </td>
                                                                    </tr>

                                                                    <!-- Amount Owed -->
                                                                    <tr>
                                                                        <td class="clearfix p-1 border-0">
                                                                            <strong class="float-left">Amount
                                                                                Owed</strong>
                                                                            <strong class="float-right">:</strong>
                                                                        </td>
                                                                        <td class="p-1 border-0 pl-5">
                                                                            <?php echo $pCountTwo['amount_owed'] ?>
                                                                        </td>
                                                                    </tr>

                                                                    <!-- Amount Paid -->
                                                                    <tr>
                                                                        <td class="clearfix p-1 border-0">
                                                                            <strong class="float-left">Amount
                                                                                Paid</strong>
                                                                            <strong class="float-right">:</strong>
                                                                        </td>
                                                                        <td class="p-1 border-0 pl-5">
                                                                            <?php echo $pCountTwo['amount_paid'] ?>
                                                                        </td>
                                                                    </tr>

                                                                    <!-- Amount Balance -->
                                                                    <tr>
                                                                        <td class="clearfix p-1 border-0">
                                                                            <strong class="float-left">Amount
                                                                                Balance</strong>
                                                                            <strong class="float-right">:</strong>
                                                                        </td>
                                                                        <td class="p-1 border-0 pl-5">
                                                                            <?php echo $pCountTwo['amount_balance'] ?>
                                                                        </td>
                                                                    </tr>

                                                                    <!-- Authorized -->
                                                                    <tr>
                                                                        <td class="clearfix p-1 border-0">
                                                                            <strong class="float-left">Authorized
                                                                                By</strong>
                                                                            <strong class="float-right">:</strong>
                                                                        </td>
                                                                        <td class="p-1 border-0 pl-5">
                                                                            <?php echo $pCountTwo['receptionist'] ?>
                                                                        </td>
                                                                    </tr>

                                                                    <!-- Time Stamp -->
                                                                    <tr>
                                                                        <td class="clearfix p-1 border-0">
                                                                            <strong
                                                                                    class="float-left">Timestamp</strong>
                                                                            <strong class="float-right">:</strong>
                                                                        </td>
                                                                        <td class="p-1 border-0 pl-5">
                                                                            <?php echo $pCountTwo['date_paid'].' '.$pCountTwo['time_paid'] ?>
                                                                        </td>
                                                                    </tr>


                                                                </tbody>
                                                            </table>

                                                        </div>

                                                        <?php endif; ?>


                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <?php endif; ?>

                                    </div>

                                </div>
                            </div>
                        </div>

                        <?php endif; ?>

                    </article>
                    <?php endif; ?>

                    <?php #### REFUND ####?>
                    <?php if ($activity === 'Refund'): ?>

                    <?php
                            ############REFUND QUERY
                            $refund_sql= "SELECT * FROM `refund`";
                            $refund_stmt = $pdo->prepare($refund_sql);
                            $refund_stmt->execute();
                            $refund_count = $refund_stmt->rowCount();
                        ?>
                    <!--Refund-->
                    <article class="pl-3 pr-3 o-hide">
                        <header class="d-flex p-0 flex-wrap w-100 align-content-end justify-content-between">
                            <form method="get"
                                  action="../config/proc/inside_nav.process.php"
                                  class="h-70 o-hide w-25 clearfix">
                                <!--Select-->
                                <div class="w-65 h-100 float-left bg-dark">
                                    <input type="hidden"
                                           value="reports"
                                           name="page">
                                    <select name="activity"
                                            class="form-control-sm border-0 w-100 rounded-0 bg-dark text-light">
                                        <option <?php if ($activity === 'Live Income'){echo 'selected';}?>
                                                value="Live Income">Live Income</option>
                                        <option <?php if ($activity === 'Booking'){echo 'selected';}?>
                                                value="Booking">Booking</option>
                                        <option <?php if ($activity === 'Payment'){echo 'selected';}?>
                                                value="Payment">Payment</option>
                                        <option <?php if ($activity === 'Refund'){echo 'selected';}?>
                                                value="Refund">Refund</option>
                                        <option <?php if ($activity === 'Check In'){echo 'selected';}?>
                                                value="Check In">Check In</option>
                                        <option <?php if ($activity === 'Check Out'){echo 'selected';}?>
                                                value="Check Out">Check Out</option>
                                        <option <?php if ($activity === 'Invoice'){echo 'selected';}?>
                                                value="Invoice">Invoice</option>
                                    </select>
                                </div>
                                <!--Button-->
                                <div class="w-25 float-right bg-danger text_sm text-center o-hide h-100">
                                    <button class="btn btn-sm btn-magento w-100 bold h-100">LOAD</button>
                                </div>
                            </form>

                            <?php if ($refund_count > 0): ?>
                            <div class="input-group input-group-sm w-50">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><img src="../assets/icos/general/delete.png"
                                             alt=""
                                             class="img-fluid"></span>
                                </div>


                                <input type="text"
                                       autocomplete="off"
                                       class="w-75 inside_search text-dark pl-2"
                                       id="<?php echo $activity ?>Search"
                                       placeholder="Search String">

                            </div>
                            <?php endif; ?>
                        </header>



                        <article class="d-flex flex-wrap align-content-center justify-content-center o-hide">
                            <!-- NO REFUND -->
                            <?php if ($refund_count < 1) :?>
                                <div class="bg-clight d-flex flex-wrap align-content-center justify-content-center w-100 h-95">
                                    <p class="enc">No Refund Yet</p>
                                </div>
                            <?php endif; ?>

                            <!-- REFUND TABLE -->
                            <?php if ($refund_count > 0): ?>

                            <div class="w-100 h-95 bg-clight text-dark">

                                <table class="table border-0 table-hover">
                                    <thead>
                                        <tr class="c_tr_head">
                                            <th class="p-2 c_th">Bill</th>
                                            <th class="p-2 c_th">Amount</th>
                                            <th class="p-2 c_th">Receptionist</th>
                                            <th class="p-2 c_th">Date</th>
                                        </tr>
                                    </thead>

                                    <tbody id="<?php echo $activity ?>Table">

                                        <?php while ($refund = $refund_stmt->fetch(PDO::FETCH_ASSOC)): ?>
                                        <?php $bill_number = $refund['bill_number']; ?>
                                        <tr data-toggle="modal"
                                            data-target="#refundModal<?php echo $refund['bill_number'] ?>"
                                            class="border-bottom pointer">
                                            <td class="p-2 c_td_xsm">
                                                <?php echo $refund['bill_number'] ?>
                                            </td>
                                            <td class="c_td_xsm p-2">
                                                <span class="text-danger"><?php echo '- '. $_SESSION['currency']. ' ' . $refund['amount_refund'] ?></span>
                                            </td>
                                            <td class="c_td_xsm p-2">
                                                <?php echo $refund['receptionist'] ?>
                                            </td>
                                            <td class="c_td_xsm p-2">
                                                <?php echo $refund['date'] ?>
                                            </td>
                                        </tr>

                                        <!-- REFUND MODAL -->
                                        <div class="modal fade"
                                             id="refundModal<?php echo $refund['bill_number'] ?>">
                                            <div class="modal-dialog">
                                                <div class="modal-content border-0">

                                                    <div class="modal-header bg-danger">
                                                        <strong class="modal-title text-light">Refund Details</strong>
                                                        <button class="close"
                                                                data-dismiss="modal">&times;</button>
                                                    </div>

                                                    <div class="modal-body p-3">
                                                        <div class="text_sm p-1 rounded border mb-4">
                                                            <div
                                                                 class="w-100 text-light p-1 rounded-top bg-ligh-danger">
                                                                <strong>Reason</strong>
                                                            </div>
                                                            <p class="w-100">
                                                                <?php echo $refund['reason'] ?>
                                                            </p>
                                                        </div>

                                                        <!-- CUSTOMER AND FACILITY -->
                                                        <div class="w-100 clearfix">
                                                            <p class="float-left">

                                                                <strong>Bill : </strong><span
                                                                      onclick="location.href='../config/proc/inside_nav.process.php?reports_view=View Record&record_id=<?php echo $bill_number ?>&redir=Booking'"
                                                                      class="text-primary pointer"><?php echo $refund['bill_number'] ?></span>
                                                            </p>
                                                            <p class="float-right text-right">
                                                                <?php echo $refund['customer'] ?>
                                                            </p>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                        <?php endwhile; ?>

                                    </tbody>
                                </table>

                            </div>

                            <?php endif; ?>

                        </article>
                    </article>

                    <?php endif; ?>

                    <?php if ($activity === 'CheckIn'): ?>

                        <!--Check In-->
                        <article class="pl-3 pr-3 o-hide">

                            <header class="d-flex p-0 flex-wrap w-100 align-content-end justify-content-between">
                                <form method="get"
                                      action="../config/proc/inside_nav.process.php"
                                      class="h-70 o-hide w-25 clearfix">
                                    <!--Select-->
                                    <div class="w-65 h-100 float-left bg-dark">
                                        <input type="hidden"
                                               value="reports"
                                               name="page">
                                        <select name="activity"
                                                class="form-control-sm border-0 w-100 rounded-0 bg-dark text-light">
                                            <option <?php if ($activity === 'Live Income'){echo 'selected';}?>
                                            value="Live Income">Live Income</option>
                                            <option <?php if ($activity === 'Booking'){echo 'selected';}?>
                                            value="Booking">Booking</option>
                                            <option <?php if ($activity === 'Payment'){echo 'selected';}?>
                                            value="Payment">Payment</option>
                                            <option <?php if ($activity === 'Refund'){echo 'selected';}?>
                                            value="Refund">Refund</option>
                                            <option <?php if ($activity === 'CheckIn'){echo 'selected';}?>
                                            value="Check In">Check In</option>
                                            <option <?php if ($activity === 'Check Out'){echo 'selected';}?>
                                            value="Check Out">Check Out</option>
                                            <option <?php if ($activity === 'Invoice'){echo 'selected';}?>
                                            value="Invoice">Invoice</option>
                                        </select>
                                    </div>
                                    <!--Button-->
                                    <div class="w-25 float-right bg-danger text_sm text-center o-hide h-100">
                                        <button class="btn btn-sm btn-magento w-100 bold h-100">LOAD</button>
                                    </div>
                                </form>

                                <?php if ($checkin_count > 0): ?>
                                <div class="input-group input-group-sm w-50">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><img src="../assets/icos/general/delete.png"
                                                                            alt=""
                                                                            class="img-fluid"></span>
                                    </div>


                                    <input type="text"
                                           autocomplete="off"
                                           class="w-75 inside_search text-dark pl-2"
                                           id="<?php echo $activity ?>Search"
                                           placeholder="Search String">

                                </div>
                                <?php endif; ?>
                            </header>

                            <?php if ($checkin_count < 1) :?>

                            <div class="w-100 h-100 d-flex flex-wrap align-content-center justify-content-center">
                                <div class="bg-clight d-flex flex-wrap align-content-center justify-content-center w-100 h-95">
                                    <p class="enc">No Checkin Yet</p>
                                </div>
                            </div>

                            <?php endif; ?>

                            <?php if ($checkin_count > 0) :?>



                            <article class="d-flex flex-wrap align-content-center justify-content-center o-hide">

                                <div class="w-100 h-95 bg-clight text-dark">
                                    <table class="table border-0 table-hover">
                                        <thead>

                                            <tr class="c_tr_head">
                                                <th class="p-2 c_th w-25">Facility</th>
                                                <th class="p-2 c_th w-25">Customer</th>
                                                <th class="p-2 c_th w-25">Receptionist</th>
                                                <th class="p-2 c_th w-25 text-right">Date</th>
                                            </tr>

                                        </thead>

                                        <tbody id="<?php echo $activity ?>Table">

                                            <?php while ($checkIn = $checkin_stmt->fetch(PDO::FETCH_ASSOC)): ?>
                                            <?php

                                                $booking_sql = "SELECT * FROM `bookings` where `id` = ?";
                                                $booking_stmt = $pdo->prepare($booking_sql);
                                                $booking_stmt->execute([ $checkIn['booking'] ]);
                                                $booking = $booking_stmt->fetch(PDO::FETCH_ASSOC);

                                                $fac = $booking['facility'];
                                                $fac_category = fetchFunc("facilities" , "`id` = $fac", $pdo)['facCat'];
                                                $charges_type = fetchFunc("facCat" , "`id` = $fac_category", $pdo)['charges_type'];
                                            ?>


                                            <tr data-toggle="modal"
                                                data-target="#checkInModal<?php echo $checkIn['id'] ?>"
                                                class="border-bottom pointer">

                                                <td class="p-2 c_td_xsm w-25">
                                                    <?php
                                                        $fac = $booking['facility'];
                                                        echo fetchFunc("facilities" , "`id` = $fac", $pdo)['name'];
                                                    ?>
                                                </td>
                                                <td class="c_td_xsm p-2 w-25">
                                                    <?php echo $booking['cust_first_name'] ?>
                                                </td>
                                                <td class="c_td_xsm p-2 w-25">
                                                    <?php echo $checkIn['receptionist'] ?>
                                                </td>
                                                <td class="p-2 c_td_xsm w-25 text-right">
                                                    <?php echo $checkIn['date_recorded'] ?>
                                                </td>

                                            </tr>

                                            <!-- CHECK IN MODAL -->
                                            <div class="modal fade"
                                                 id="checkInModal<?php echo $checkIn['id'] ?>">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">

                                                        <div class="modal-header bg-csecondary">
                                                            <strong class="modal-title">Check In Details</strong>
                                                            <button class="close"
                                                                    data-dismiss="modal">&times;</button>
                                                        </div>

                                                        <div class="modal-body p-3">
                                                            <div class="w-100 d-flex flex-wrap align-content-center justify-content-end">
                                                                <p class="badge badge-info badge-pill">
                                                                    <?php


                                                                        if ($charges_type === 'h')
                                                                        {
                                                                            echo timeDifference(date('H:s:i'),$booking['dep_time']). ' Houres Remaining';
                                                                        }
                                                                        elseif ($charges_type === 'd')
                                                                        {
                                                                            echo dateDifference(date('Y-m-d') , $booking['dep_date']) . ' Days Remaining';
                                                                        }

                                                                    ?>
                                                                </p>
                                                            </div>
                                                            <!-- ARR DEP DATE -->
                                                            <div class="w-100 clearfix mb-3">

                                                                <!-- ARR DATE -->
                                                                <div class="w-45 float-left card">
                                                                    <div
                                                                         class="w-100 rounded-top p-1 bg-cus-muted text-dark card-header">
                                                                        Arrival
                                                                    </div>
                                                                    <div class="w-100 p-1 card-body">
                                                                        <p class="p-0 m-0 text_sm">
                                                                            <?php echo $booking['arri_date'] ?></p>
                                                                        <p class="m-0 p-0 text_sm text-info">
                                                                            <?php
                                                                                if ($charges_type === 'h')
                                                                                {
                                                                                    echo $booking['arr_time'];
                                                                                }
                                                                            ?>
                                                                        </p>

                                                                    </div>
                                                                </div>

                                                                <!-- DEP DATE -->
                                                                <div class="w-45 float-right card">
                                                                    <div
                                                                         class="w-100 rounded-top p-1 bg-cus-muted text-dark card-header">
                                                                        Depature
                                                                    </div>
                                                                    <div class="w-100 p-1 card-body">
                                                                        <p class="p-0 m-0 text_sm"><?php echo $booking['dep_date'] ?></p>
                                                                        <p class="m-0 p-0 text_sm text-info">
                                                                            <?php
                                                                                if ($charges_type === 'h')
                                                                                {
                                                                                    echo $booking['dep_time'];
                                                                                }
                                                                            ?>
                                                                        </p>

                                                                    </div>
                                                                </div>

                                                            </div>

                                                            <!-- Payment Status and Room Number -->
                                                            <div class="w-100 clearfix mb-3">

                                                                <!-- Payment -->
                                                                <div class="w-45 card float-left">
                                                                    <div
                                                                         class="w-100 rounded-top p-1 bg-cus-muted text-dark card-header">
                                                                        Payment
                                                                    </div>
                                                                    <div class="w-100 p-1 card-body">
                                                                        <p class="p-0 m-0 text_sm">
                                                                            <?php
                                                                                        $payment_calc = "SELECT SUM(amount_paid) , id from payment where booking = ?";
                                                                                        $payment_calc_stmt = $pdo->prepare($payment_calc);
                                                                                        $payment_calc_stmt->execute([ $checkIn['booking'] ]);
                                                                                        $calculated_payment = $payment_calc_stmt->fetch(PDO::FETCH_ASSOC);
                                                                                    ?>
                                                                            <?php if ( $calculated_payment['SUM(amount_paid)'] === $booking['cost'] ): ?>
                                                                            Full
                                                                            <?php endif; ?>

                                                                            <?php if ( $calculated_payment['SUM(amount_paid)'] < $booking['cost'] ): ?>
                                                                            Not Fully Paid ( <?php echo $_SESSION['currency'] . ' ' . $booking['cost'] -  $calculated_payment['SUM(amount_paid)'] ?> Remaining)
                                                                            <?php endif; ?>
                                                                        </p>

                                                                    </div>
                                                                </div>

                                                                <!-- Room Number -->
                                                                <div class="w-45 float-right card">
                                                                    <div
                                                                         class="w-100 rounded-top p-1 bg-cus-muted text-dark card-header">
                                                                        Facility Number
                                                                    </div>
                                                                    <div class="w-100 p-1 card-body">
                                                                        <p class="p-0 m-0 text_sm">
                                                                            <?php echo $booking['fac_number'] ?>
                                                                        </p>
                                                                    </div>
                                                                </div>

                                                            </div>

                                                            <!-- BOOKING ID AND INVOICE BUTTON -->
                                                            <div
                                                                 class="d-flex flex-wrap w-75 mx-auto mt-5 justify-content-between">

                                                                <button onclick="location.href='../config/proc/inside_nav.process.php?reports_view=View Record&record_id=<?php echo $booking['id'] ?>&redir=Booking'"
                                                                        class="btn text_sm btn-sm btn-cprimary">
                                                                    Booking
                                                                </button>

                                                                <?php
                                                                                $payment_detail_sql = "SELECT * FROM `payment` where `booking` = ? and `level` = ? ";
                                                                                $payment_detail_stmt = $pdo->prepare($payment_detail_sql);
                                                                                $payment_detail_stmt->execute( [$checkIn['booking'] , 'Primary'] );
                                                                                $payment_detail = $payment_detail_stmt->fetch(PDO::FETCH_ASSOC);
                                                                                $payment_id = $payment_detail['id'];
                                                                            ?>
                                                                <button onclick="location.href='../config/proc/inside_nav.process.php?reports_view=View Record&record_id=<?php echo $payment_id ?>&redir=Payment'"
                                                                        class="btn text_sm btn-sm btn-cprimary">
                                                                    Payment
                                                                </button>

                                                                <button class="btn text_sm btn-sm btn-cprimary">
                                                                    Invoice
                                                                </button>
                                                            </div>

                                                        </div>

                                                    </div>
                                                </div>
                                            </div>

                                            <?php endwhile; ?>

                                        </tbody>

                                    </table>

                                </div>

                            </article>

                            <?php endif; ?>

                        </article>

                    <?php endif; ?>

                    <?php if ($activity === 'CheckOut'): ?>

                    <?php
                            $checkout_sql = "SELECT * FROM `check_out`";
                            $checkout_stmt = $pdo->prepare($checkout_sql);
                            $checkout_stmt->execute();
                            $checkout_count = $checkout_stmt->rowCount();
                        ?>


                    <!--Check Out-->
                    <article class="pl-3 pr-3 o-hide">

                        <?php if ($checkout_count < 1) :?>

                        <div class="bg-clight d-flex flex-wrap align-content-center justify-content-center w-100 h-95">
                            <p class="enc">No Check Yet</p>
                        </div>

                        <?php endif; ?>

                        <?php if ($checkout_count > 0) :?>

                        <header class="d-flex p-0 flex-wrap w-100 align-content-end justify-content-between">
                            <form method="get"
                                  action="../config/proc/inside_nav.process.php"
                                  class="h-70 o-hide w-25 clearfix">
                                <!--Select-->
                                <div class="w-65 h-100 float-left bg-dark">
                                    <input type="hidden"
                                           value="reports"
                                           name="page">
                                    <select name="activity"
                                            class="form-control-sm border-0 w-100 rounded-0 bg-dark text-light">
                                        <option <?php if ($activity === 'Live Income'){echo 'selected';}?>
                                                value="Live Income">Live Income</option>
                                        <option <?php if ($activity === 'Booking'){echo 'selected';}?>
                                                value="Booking">Booking</option>
                                        <option <?php if ($activity === 'Payment'){echo 'selected';}?>
                                                value="Payment">Payment</option>
                                        <option <?php if ($activity === 'Refund'){echo 'selected';}?>
                                                value="Refund">Refund</option>
                                        <option <?php if ($activity === 'Check In'){echo 'selected';}?>
                                                value="Check In">Check In</option>
                                        <option <?php if ($activity === 'Check Out'){echo 'selected';}?>
                                                value="Check Out">Check Out</option>
                                        <option <?php if ($activity === 'Invoice'){echo 'selected';}?>
                                                value="Invoice">Invoice</option>
                                    </select>
                                </div>
                                <!--Button-->
                                <div class="w-25 float-right bg-danger text_sm text-center o-hide h-100">
                                    <button class="btn btn-sm btn-magento w-100 bold h-100">LOAD</button>
                                </div>
                            </form>

                            <?php if (1 > 0): ?>
                            <div class="input-group input-group-sm w-50">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><img src="../assets/icos/general/delete.png"
                                             alt=""
                                             class="img-fluid"></span>
                                </div>


                                <input type="text"
                                       autocomplete="off"
                                       class="w-75 inside_search text-dark pl-2"
                                       id="<?php echo $activity ?>Search"
                                       placeholder="Search String">

                            </div>
                            <?php endif; ?>
                        </header>

                        <article class="d-flex flex-wrap align-content-center justify-content-center o-hide">

                            <div class="w-100 h-95 bg-clight text-dark">
                                <table class="table border-0 table-hover">
                                    <thead>
                                        <tr class="c_tr_head">
                                            <th class="p-2 c_th w-25">Facility</th>
                                            <th class="p-2 c_th w-25">Customer</th>
                                            <th class="p-2 c_th w-25">Receptionist</th>
                                            <th class="p-2 c_th w-25 text-right">Date</th>
                                        </tr>
                                    </thead>

                                    <tbody id="<?php echo $activity ?>Table">

                                        <?php while ($checkOut = $checkout_stmt->fetch(PDO::FETCH_ASSOC)): ?>
                                        <?php
                                            $booking_sql = "SELECT * FROM `bookings` where `id` = ?";
                                            $booking_stmt = $pdo->prepare( $booking_sql) ;
                                            $booking_stmt->execute( [ $checkOut['booking'] ] );
                                            $booking = $booking_stmt->fetch(PDO::FETCH_ASSOC);
                                            $stay_duration = dateDifference ($booking['dep_date'] , $checkOut['date_recorded']);
                                        ?>

                                        <tr data-toggle="modal"
                                            data-target="#checkInModal<?php echo $checkOut['id'] ?>"
                                            class="border-bottom <?php if ($stay_duration < 0) {echo 'bg-ligh-danger';} elseif ($stay_duration > 0){echo 'light-bg-warning';} ?> pointer">
                                            <td class="p-2 c_td_xsm w-25">
                                                <?php

                                                    $fac = $booking['facility'];
                                                    echo fetchFunc (
                                                        'facilities', "`id`=$fac", $pdo
                                                    )['name'];

                                                ?>
                                            </td>
                                            <td class="c_td_xsm p-2 w-25">
                                                <?php echo $booking['cust_first_name'].' '.$booking['cust_last_name'] ?>
                                            </td>
                                            <td class="c_td_xsm p-2 w-25">
                                                <?php echo $checkOut['receptionist'] ?>
                                            </td>
                                            <td class="p-2 c_td_xsm w-25 text-right">
                                                <?php

                                                    echo $checkOut['date_recorded'];


                                                ?>

                                            </td>
                                        </tr>

                                        <!-- CHECK OUT MODAL -->
                                        <div class="modal fade"
                                             id="checkInModal<?php echo $checkOut['id'] ?>">
                                            <div class="modal-dialog">
                                                <div class="modal-content">

                                                    <div class="modal-header bg-csecondary">
                                                        <strong class="modal-title">Check In Details</strong>
                                                        <button class="close"
                                                                data-dismiss="modal">&times;</button>
                                                    </div>

                                                    <div class="modal-body p-3">

                                                        <div class="w-100 mb-3 d-flex flex-wrap align-content-center justify-content-end">
                                                            <?php
                                                                if ($stay_duration < 0)
                                                                {
                                                                    echo "<span class='badge badge-pill bg-ligh-danger'>".$stay_duration."</span>";
                                                                }
                                                                elseif ($stay_duration > 0)
                                                                {
                                                                    echo "<span class='badge badge-pill light-bg-warning'>Checked out ".$stay_duration." days before estimated checkout date</span>";
                                                                }
                                                            ?>
                                                        </div>

                                                        <!-- ARR DEP DATE -->
                                                        <div class="w-100 clearfix mb-3">

                                                            <!-- ARR DATE -->
                                                            <div class="w-45 float-left card">
                                                                <div
                                                                     class="w-100 rounded-top p-1 bg-cus-muted text-dark card-header">
                                                                    Arrival
                                                                </div>
                                                                <div class="w-100 p-1 card-body">
                                                                    <p class="p-0 m-0 text_sm">
                                                                        <?php echo $booking['arri_date'] ?></p>
                                                                </div>
                                                            </div>

                                                            <!-- DEP DATE -->
                                                            <div class="w-45 float-right card">
                                                                <div
                                                                     class="w-100 rounded-top p-1 bg-cus-muted text-dark card-header">
                                                                    Depature
                                                                </div>
                                                                <div class="w-100 p-1 card-body">
                                                                    <p class="p-0 m-0 text_sm">
                                                                        <?php echo $booking['dep_date'] ?></p>
                                                                </div>
                                                            </div>

                                                        </div>

                                                        <!-- Payment Status and Room Number -->
                                                        <div class="w-100 clearfix mb-3">

                                                            <!-- Payment -->
                                                            <div class="w-45 card float-left">
                                                                <div
                                                                     class="w-100 rounded-top p-1 bg-cus-muted text-dark card-header">
                                                                    Payment
                                                                </div>
                                                                <div class="w-100 p-1 card-body">
                                                                    <p class="p-0 m-0 text_sm">
                                                                        <?php
                                                                                        $payment_calc = "SELECT SUM(amount_paid) , id from payment where booking = ?";
                                                                                        $payment_calc_stmt = $pdo->prepare($payment_calc);
                                                                                        $payment_calc_stmt->execute([ $checkOut['booking'] ]);
                                                                                        $calculated_payment = $payment_calc_stmt->fetch(PDO::FETCH_ASSOC);
                                                                                    ?>
                                                                        <?php if ( $calculated_payment['SUM(amount_paid)'] === $booking['cost'] ): ?>
                                                                        Full
                                                                        <?php endif; ?>

                                                                        <?php if ( $calculated_payment['SUM(amount_paid)'] < $booking['cost'] ): ?>
                                                                        Not Fully Paid
                                                                        <?php endif; ?>
                                                                    </p>

                                                                </div>
                                                            </div>

                                                            <!-- Room Number -->
                                                            <div class="w-45 float-right card">
                                                                <div
                                                                     class="w-100 rounded-top p-1 bg-cus-muted text-dark card-header">
                                                                    Facility Number
                                                                </div>
                                                                <div class="w-100 p-1 card-body">
                                                                    <p class="p-0 m-0 text_sm">
                                                                        <?php echo $booking['fac_number'] ?>
                                                                    </p>
                                                                </div>
                                                            </div>

                                                        </div>

                                                        <!-- BOOKING ID AND INVOICE BUTTON -->
                                                        <div
                                                             class="d-flex flex-wrap w-75 mx-auto mt-5 justify-content-between">

                                                            <button onclick="location.href='../config/proc/inside_nav.process.php?reports_view=View Record&record_id=<?php echo $booking['id'] ?>&redir=Booking'"
                                                                    class="btn text_sm btn-sm btn-cprimary">
                                                                Booking
                                                            </button>

                                                            <?php
                                                                            $payment_detail_sql = "SELECT * FROM `payment` where `booking` = ? and `level` = ? ";
                                                                            $payment_detail_stmt = $pdo->prepare($payment_detail_sql);
                                                                            $payment_detail_stmt->execute( [$checkOut['booking'] , 'Primary'] );
                                                                            $payment_detail = $payment_detail_stmt->fetch(PDO::FETCH_ASSOC);
                                                                            $payment_id = $payment_detail['id'];
                                                                        ?>
                                                            <button onclick="location.href='../config/proc/inside_nav.process.php?reports_view=View Record&record_id=<?php echo $payment_id ?>&redir=Payment'"
                                                                    class="btn text_sm btn-sm btn-cprimary">
                                                                Payment
                                                            </button>

                                                            <button class="btn text_sm btn-sm btn-cprimary">
                                                                Invoice
                                                            </button>
                                                        </div>

                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                        <?php endwhile; ?>

                                    </tbody>

                                </table>

                            </div>

                        </article>

                        <?php endif; ?>

                    </article>

                    <?php endif; ?>






    </div>

    </article>

    </section>

    </div>




    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="../js/jquery-3.2.1.slim.min.js"
            integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
            crossorigin="anonymous"></script>
    <script src="../js/popper.min.js"
            integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
            crossorigin="anonymous"></script>
    <script src="../js/bootstrap.min.js"
            integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
            crossorigin="anonymous"></script>

    <script>
        $(document).ready(function () {
            $('[data-toggle="tooltip"]').tooltip();
        });

        $(document).ready(function () {
            $("#<?php echo $activity?>Search").on("keyup", function () {
                var value = $(this).val().toLowerCase();
                $("#<?php echo $activity ?>Table tr").filter(function () {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });

        function popupwindow(url, title, w, h) {
            var left = (screen.width / 2) - (w / 2);
            var top = (screen.height / 2) - (h / 2);
            return window.open(url, title, 'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width=' + w + ', height=' + h + ', top=' + top + ', left=' + left);
        }
    </script>
</body>

</html>