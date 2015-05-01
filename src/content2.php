<?php
    session_start();
    if(isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] === true)
    {
        echo "Click <a href='content1.php'>here</a> to go back to content 1.<br/>";
    }
    else
    {
        header("Location: login.php", true);
    }
?>