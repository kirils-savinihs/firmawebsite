<?php
session_start();
if (isset($_POST['login-submit']))
{
    require 'dbh.inc.php';

    $uid = $_POST['username'];
    $password = $_POST['pwd'];

    if (empty ($uid)|| empty($password))
    {
        header("Location: ../index.php?error=emptyfields");
        $_SESSION['error']='Lietotaja vards vai parole tukša!';
        exit();
    }
    else
    {
        $sql="SELECT * FROM users where username=?;";
        $stmt=mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt,$sql))
        {
            header("Location: ../index.php?error=sqlerror20");
            $_SESSION['error']='SQL Kļuda!';
            exit();
        }
        else
        {
            mysqli_stmt_bind_param($stmt,"s",$uid);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if($row = mysqli_fetch_assoc($result))
            {
                $pwdcheck=password_verify($password, $row['password']);
                if(!$pwdcheck)
                {
                    header("Location: ../index.php?error=wrongpassword");
                    $_SESSION['error']='Nepareiza parole';
                    exit();
                }
                else
                {
                    $_SESSION['userId'] = $row['idusers'];
                    $_SESSION['username'] = $row['username'];
                    $_SESSION['admin']=$row['adminb'];

                    header("Location: ../index.php?login=success");
                    exit();
                }

            }
            else
            {
                header("Location: ../index.php?error=nouser");
                $_SESSION['error']="Lietotaja neeksiste";
                exit();
            }


        }


    }



}
else{
    header("Location: ../index.phg");
    exit();
}

