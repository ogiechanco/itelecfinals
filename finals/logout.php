<?php
session_start();        // REQUIRED to access the session
session_unset();        // Optional: removes all session variables
session_destroy();      // Destroys the session
header("Location: login.php");
exit;
?>