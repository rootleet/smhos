<?php
    require_once '../inc/session.php';

    if (isset($_GET['page']) && !empty($_GET['page'])) {

        $page = $_GET['page'];

        //reports navigator
        if ($_GET['page'] === 'reports') {
            //set session of current activity
            //if activity is booking
            if ($_GET['activity'] === 'Booking' || $_GET['activity'] === 'Payment' || $_GET['activity'] === 'Invoice')
            {
                $_SESSION ['reports_activity'] = $_GET['activity'];
                $_SESSION['reports_view'] = 'all';
                header ("Location:".$_SERVER['HTTP_REFERER']);
            }
            elseif($_GET['activity'] === 'Check In')
            {
                $_SESSION ['reports_activity'] = 'CheckIn';
                $_SESSION['reports_view'] = 'all';
                header ("Location:".$_SERVER['HTTP_REFERER']);
            }
            elseif ($_GET['activity'] === 'Check Out')
            {
                $_SESSION ['reports_activity'] = 'CheckOut';
                $_SESSION['reports_view'] = 'all';
                header ("Location:".$_SERVER['HTTP_REFERER']);
            }
            else
            {
                $_SESSION ['reports_activity'] = $_GET['activity'];
                header ("Location:".$_SERVER['HTTP_REFERER']);
            }

        }

        //admin tools
        if ($page === 'admin_toole')
        {
            $activity = $_GET['activity'];
            $_SESSION['t_display'] = $activity;
            back();
        }
    }

    elseif (isset($_GET['reports_view']) && !empty($_GET['reports_view']) && $_GET['record_id'] && !empty($_GET['record_id']))
    {
        $_SESSION['reports_view'] = $_GET['reports_view'];
        $_SESSION['record_id'] = $_GET['record_id'];
        //Check if redirect
        if ($_GET['redir'] && !empty($_GET['redir'])){
            $_SESSION['reports_activity'] = $_GET['redir'];
        }

        header ("Location:".$_SERVER['HTTP_REFERER']);
    }
    elseif (isset($_GET['facility_config']))
    {

        //if cat navi
        if(isset($_GET['direction']))
        {
            $direction = $_GET['direction'];
            $next = $_SESSION['cat_standing'] + 1;
            $prev = $_SESSION['cat_standing'] - 1;

            if($direction === 'Next')
            {
                $_SESSION['cat_standing'] = $next;
                header("Location:".$_SERVER['HTTP_REFERER']);
            }
            elseif($direction === 'Prev')
            {
                $_SESSION['cat_standing'] = $prev;
                header("Location:".$_SERVER['HTTP_REFERER']);
            }
        }

        //if changing
        elseif(isset($_GET['change']))
        {
            echo "hello";
            $change = $_GET['change'];
            $_SESSION['fac_cat_main_view'] = $change;
            header("Location:".$_SERVER['HTTP_REFERER']);
        }
    }
