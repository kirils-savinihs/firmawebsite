<?php
session_start();
if (isset($_POST['chat-submit'])) {
    require 'dbh.inc.php';
    $message = $_POST['message'];
    if (empty($message)) {
        header("Location: ../messageboard.php?error=emptyfields");
        $_SESSION['posterror']='Kļuda: nav ziņas!';
        exit();
    }
    else if(!isset($_SESSION['username']))
    {
        header("Location: ../messageboard.php?error=notloggedin");
        $_SESSION['posterror']='Kļuda: nav ielogots!';
        exit();
    }
    else {

        $sql = "insert into messages(uid,message) values ('".$_SESSION['userId']."','".$message."')";
        mysqli_query($conn,$sql);
        header("Location: ../messageboard.php?post=success".$_SESSION['userId'].$_SESSION['username']);

        exit();
    }

}