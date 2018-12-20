<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html charset=UTF-8">
    <title><?php echo $title ?></title>
    <link rel="stylesheet" type="text/css" href="Styles/Stylesheet.css">
</head>
<body>
<?php

session_start();

?>
<div id="wrapper">
    <div id="banner">
    </div>
    <nav id="nav">
        <ul id="navlist">
            <li><a href="index.php">Sākums</a></li>
            <li><a href="polls.php">Aptauja</a></li>
            <li><a href="gallery.php">Video</a></li>
            <li><a href="messageboard.php">Čats</a></li>
        </ul>
    </nav>
    <div id="content_wrapper">
        <div id="sidebar">
            <p id="loginp">Lietotajs</p>
            <div>
                <?php

                if (isset($_SESSION['username'])) {
                    if ($_SESSION['admin']==1)
                    {
                        $utype='Administrators';
                    }
                    else
                        $utype='Nav Administrators';
                    echo 'Ielogots kā ' . $_SESSION['username'].'</br>('.$utype.')';
                    echo '
                    </br>
                    <form action="include/logout.inc.php" method = "post">
                        <button type="submit" name="logout-submit">Iziet</button>
                    </form>';
                } else {
                    echo 'Jūs nēesat ielogoti';
                    echo
                    '
                    <form action="include/login.inc.php" method="post">
                        <input type="text" name="username" placeholder="Lietotaja vards"></br>
                        <input type="password" name="pwd" placeholder="Parole"></br>
                        <button type="submit" name="login-submit">Ieiet</button></br>
                    </form>
                    <a href="signup.php">Registreties</a>                    
                    ';
                }
                echo '<p id="error">';
                if (isset($_SESSION['error']))
                {echo '</br>'.$_SESSION['error'];
                unset($_SESSION['error']);
                }
                echo '</p>';

                ?>
            </div>
        </div>