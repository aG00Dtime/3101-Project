<?php

// delete session data and return to index page
function logout()
{
    if ($_SERVER["REQUEST_METHOD"] == "GET" and isset($_GET['logout-user'])) {
        // remove session cookie
        if (isset($_COOKIE[session_name()])) {
            setcookie(session_name(), null, time() - 3600);
        }

        // clear $_SESSION data
        session_unset();
        // destroy the session
        session_destroy();

        header('Refresh: 0.1 ; URL = ./index.php?logout=success');

        exit;
    }
}
