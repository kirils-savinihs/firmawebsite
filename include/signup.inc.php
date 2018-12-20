<?php
session_start();
if (isset($_POST['signup-submit'])) {
    require 'dbh.inc.php';

    $username = $_POST['uid'];
    $pwd = $_POST['pwd'];
    $rpwd = $_POST['pwd-repeat'];

    if (empty($username) || empty($pwd) || empty($rpwd)) {
        header("Location: ../signup.php?error=emptyfields&uid=" . $username);
        $_SESSION['signuperror']='Lietotaja vards vai parole tukša!';
        exit();
    }
    elseif (!preg_match("/^[a-zA-Z0-9]*$/", username)) {
        header("Location: ../signup.php?error=invalidusername&uid=" . $username);
        $_SESSION['signuperror']='Lietotaja vards nav pareizs!';
        exit();
    } elseif ($pwd != $rpwd) {
        header("Location: ../signup.php?error=passwordcheck&&uid=" . $username);
        $_SESSION['signuperror']='Paroles nav vienadas!';
        exit();
    } else {
        $sql = "SELECT username from users where username=?";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../signup.php?error=sqlerror23");
            $_SESSION['signuperror']='SQL Kļuda!';
            exit();
        } else {
            mysqli_stmt_bind_param($stmt, "s", $username);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $resultcheck = mysqli_stmt_num_rows($stmt);
            if (resultcheck > 0) {
                header("Location: ../signup.php?error=usertaken");
                $_SESSION['signuperror']='Lietotajvards aizņemts!';
                exit;
            } else {
                $sql = "INSERT INTO users (idusers,username,password,adminb) VALUES (null,?,?,false)";
                $stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    header("Location: ../signup.php?error=sqlerror37");
                    $_SESSION['signuperror']='SQL Kļuda!';
                    exit();
                }
                else
                {
                    $hashedpwd=password_hash($pwd, PASSWORD_DEFAULT);

                    mysqli_stmt_bind_param($stmt, "ss", $username,$hashedpwd);
                    mysqli_stmt_execute($stmt);
                    session_start();
                    $_SESSION['signupsuccess']=true;
                    header("Location: ../signup.php?signup=success");
                    exit();

                }

            }

        }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}
else
{
    header("Location: ../signup.php");
    exit();
}


