<?php
$title = 'Čats';
    require 'header.php';
?>
    <div id="content_area">
        <p id="content">
            Čats:</p>
            <?php
            require 'include/dbh.inc.php';
            echo mysqli_error($conn);
            $messagequery = mysqli_query($conn, 'select mid,username,message,mtime,adminb from messages,users where messages.uid = users.idusers;');
            echo mysqli_error($conn);
            while($row = mysqli_fetch_assoc($messagequery))
            {

                echo '['.$row['mtime'].'] ';
                if ($row['adminb']==1)
                    echo '(ADMIN)';
                else
                    echo '(USER)';

                echo $row['username'].': ';
                echo $row['message'].'</br>';
            }

            echo
            '
            <form action="include/post.inc.php" method = "post">
                <input type="text" name="message" placeholder="Jūsu ziņa">
                <button type="submit" name="chat-submit">Rakstit</button>
            </form>
            ';
            if (isset($_SESSION['posterror']))
            {
               echo '<p id="error">';
                            echo $_SESSION['posterror'];
                unset($_SESSION['posterror']);
                echo '</p>';
                }
                ?>

    </div>




<?php
    require 'footer.php'
?>