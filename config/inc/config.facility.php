<?php 
    require 'session.php';
    require 'db.php';
    require 'functions.php';

    //set session catigory main view
    if (!isset($_SESSION['fac_cat_main_view']))
    {
        $_SESSION['fac_cat_main_view'] = 'view';
    }

    //get session to display
    if(!isset($_SESSION['cat_standing']))
    {
        $sql = "SELECT * FROM `facCat` LIMIT 1";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $catCount = $stmt->rowCount();

        if ($catCount > 0)
        {
            $cat_res = $stmt->fetch(PDO::FETCH_ASSOC);
            $_SESSION['cat_standing'] = $cat_res['id'];
        }
    }

    //session ranges
    if (!isset($_SESSION['facRange']) || $_SESSION['facRange'] < 1)
    {
        $_SESSION['facRange'] = 3;
    }

    $cpsql = "SELECT * FROM `facCat` LIMIT 1";
    $cpstmt = $pdo->prepare($cpsql);
    $cpstmt->execute();
    $cpcatCount = $cpstmt->rowCount();

    //cat details
    if(isset($_SESSION['cat_standing']))
    {
        $cat_sql = "SELECT * FROM `facCat` WHERE `id` = ?";
        $cat_stmt = $pdo->prepare($cat_sql);
        $cat_stmt->execute([$_SESSION['cat_standing']]);
        $cat_standing = $cat_stmt->fetch(PDO::FETCH_ASSOC);


        //get next
        $next_sql = "SELECT * FROM `facCat` WHERE `id` > ? LIMIT 1";
        $next_stmt = $pdo->prepare($next_sql);
        $next_stmt->execute([$_SESSION['cat_standing']]);
        $next_count = $next_stmt->rowCount();

        //get previous
        $prev_sql = "SELECT * FROM `facCat` WHERE `id` < ? LIMIT 1";
        $prev_stmt = $pdo->prepare($prev_sql);
        $prev_stmt->execute([$_SESSION['cat_standing']]);
        $prev_count = $prev_stmt->rowCount();

        //get facilities
        $cat_fac_sql = "SELECT * FROM `facilities` WHERE `facCat` = ? LIMIT ?";
        $cat_fac_stmt = $pdo->prepare($cat_fac_sql);
        $cat_fac_stmt->execute([$_SESSION['cat_standing'], $_SESSION['facRange']]);
        $cat_fac_count = $cat_fac_stmt->rowCount();

        $facCount = rowsOf('facilities','none',$pdo);
        $catCount = rowsOf('facCat' , 'none' , $pdo);

    }




?>