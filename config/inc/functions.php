<?php
    require 'session.php';
    require 'db.php';

    function checkPermission(array $permission)
    {
        $access_granted = 0;
        foreach ($permission as $key => $value)
        {
            if ($_SESSION[$value] === true)
            {
                $access_granted ++;
            }

            if ($access_granted > 0)
            {
                return true;
            }
            else
            {
                return false;
            }
        }
    }


    ##FUNCTION TO COUNT NUMBER OF ROWS
    function rowsOf($table , $condition = 'none' , $connection)
    {
        if ($condition === 'none')
        {
            $rcSql = "SELECT * FROM $table";

        }
        else
        {
            $rcSql = "SELECT * FROM `$table` WHERE $condition";
        }
        $rcStmt = $connection->prepare($rcSql);
        $rcStmt->execute();
        return $rcStmt->rowCount();
    }

    ##fetch from table
    function fetchFunc($table , $condition, $connection)
    {
        if($condition === "none")
        {
            $sql = "SELECT * FROM $table LIMIT 1";
        }
        else
        {
            $sql = "SELECT * FROM `$table` WHERE $condition LIMIT 1";
        }
        $stmt = $connection->prepare($sql);
        $stmt->execute();
        return $result = $stmt->fetch(PDO::FETCH_ASSOC);
    }

    ##column sum
    function getSumOfColumn($table , $column , $condition , $connection)
    {
        if ($connection === 'none')
        {
            $sql = "select SUM($column) from $table WHERE $condition";
        }
        else
        {
            $sql = "SELECT SUM($column) from `$table`";
        }
        $stmt  = $connection->prepare($sql);
        $stmt->execute();
        $stmt_res = $stmt->fetch(PDO::FETCH_ASSOC);
        return $stmt_res['SUM('.$column.')'];
    }

    ##CHECK IF RECORD EXIST
    function ifRecordExist($table , $column , $record , $connection)
    {
        $ifRecordExistsql = "SELECT * FROM `$table` WHERE `$column` = $record";
        $ifRecordExiststmt = $connection->prepare($ifRecordExistsql);
        $ifRecordExiststmt->execute();

        if ($ifRecordExiststmt->rowCount() > 0)
        {
            return true;
        }
        else
        {
            return false;
        }

    }



    ##SET SESSION INFO
    function info($info)
    {
        $_SESSION['info'] = $info;
    }

    ##insert into database
    function insertIntoDatabase($table , $culumns , $values , $connection)
    {
        $sql = "INSERT INTO `$table` ($culumns) VALUES ($values)";
        $stmt = $connection->prepare($sql);
        if ($stmt->execute())
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    ##update_record
    function updateRecord ($table , $set , $condition , $conn)
    {
        if ($condition === 'none')
        {
            $updateSql = "UPDATE `$table` $set";
        }
        else
        {
            $updateSql = "UPDATE `$table` $set WHERE $condition";
        }
        $updateStmt = $conn->prepare($updateSql);
        if($updateStmt->execute())
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    ##get next function
    function nextPrevious($table , $condition , $conn)
    {
        $sql = "SELECT * FROM `$table` WHERE $condition LIMIT 1";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        if ($stmt->rowCount() > 0)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    ##is condition true
    function isConditionTrue ($table , $column , $condition , $tcolumn , $connection)
    {
        $sql = "SELECT `$column` FROM $table WHERE $condition";
        $stmt = $connection->prepare($sql);
        $stmt->execute();
        $stmt_result = $stmt->fetch(PDO::FETCH_ASSOC);
        $result = $stmt_result[$tcolumn];
        return $result;
    }

    ## delete row
    function deleteRow($table , $condition , $connection)
    {
        $sql = "DELETE FROM $table WHERE $condition";
        $stmt = $connection->prepare($sql);
        if ($stmt->execute())
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    ##mavigate url
    function gb($to)
    {
        header("Location:".$_SERVER['HTTP_REFERER']);
    }
    function redirect($url)
    {
        header("Location:".$url);
    }

    ##check user task
    function task($username,$conn)
    {
        $sql = "SELECT * FROM `user_task` WHERE `user` = ? AND `task_status` = '1' LIMIT 1";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$username]);
        return $task_res = $stmt->fetch(PDO::FETCH_ASSOC);
//         $task_res['task'];
    }

    ##password validate
    function validateKey($user_id , $key , $connection)
    {
        $sql = "SELECT `password` FROM `users` WHERE `id` = $user_id";
        $stmt = $connection->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $hashed_password = $result['password'];
        if (password_verify($key, $hashed_password))
        {
            return true;
        }
        else
        {
            return false;
        }
    }


    function done()
    {
        echo "OK";
    }

    function reload()
    {
        echo '<script>location.reload()</script>';
    }


//echo  $count = rowsOf('users' , "`username` = 'root'" ,$pdo);
