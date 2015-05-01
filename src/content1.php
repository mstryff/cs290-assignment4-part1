<?php
    session_start();
    
    /*
        Session destroy code borrowed from the Sessions lecture
        If action => logout is passed in a GET request, the following code
        will set the $_SESSION array to null, then destroy the session,
        and finally return the user to the login page.
    */
    if(isset($_GET['action']) && $_GET['action'] == 'logout')
    {
        $_SESSION = array();
        session_destroy();
        header("Location: login.php", true);
        die();
    }
    if(!isset($_SESSION['username']))  //If there is no saved session data, set new session username
    {
        if(isset($_POST['username']) && !is_null($_POST['username']) && !empty($_POST['username']))
        {
            $_SESSION['username'] = $_POST['username'];
            $_SESSION['loggedIn'] = true;
        }
        else
        {
            echo "A username must be entered. Click <a href='login.php'>here</a> to return to the login screen.<br/>";
        }
    }

    if(isset($_SESSION['username']))
    {
        if(!isset($_SESSION['visits']))
        {
            $_SESSION['visits'] = 0;
        }

        echo "Hi $_SESSION[username], you have visited this page $_SESSION[visits] times.<br/>";
        echo "Click <a href='content1.php?action=logout'>here</a> to logout.<br/>";
        //This link activates the above code which destroys the session.
        $_SESSION['visits']++;
        
        echo "Click <a href='content2.php'>here</a> to go to content page 2.<br/>";
    }
?>