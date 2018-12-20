<?php
$title = 'Registracija';
require 'header.php'
?>


    <div id="content_area">
        <div id="signupdiv">
            <form action="include/signup.inc.php" method="post">
                <?php
                    if (isset($_SESSION['signupsuccess']))
                        echo "Signup successful";
                    unset($_SESSION['signupsuccess']);
                ?>

                <h1>Signup</h1>
                <input type="text" name="uid" placeholder="Lietotaja vards"> </br>
                <input type="password" name="pwd" placeholder="Parole"></br>
                <input type="password" name="pwd-repeat" placeholder="Parole velreiz"></br>
                <button type="submit" name="signup-submit">Registreties</button>

                <?php
                echo '<p id="error">';
                if (isset($_SESSION['signuperror']))
                    echo "</br>".$_SESSION['signuperror'];
                unset($_SESSION['signuperror']);
                echo '</p>';
                ?>
            </form>
        </div>
    </div>


<?php
require 'footer.php'
?>