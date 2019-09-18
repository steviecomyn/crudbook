<?php
    // Get current session.
    session_start();
    // Unset the session variables.
    session_unset();
    // Destroy the session.
    session_destroy();
    // redirect back to home.
    header("location: index.php");
?>