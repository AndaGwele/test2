<?php


// Set timeout limit in seconds (e.g.,  900 = 15 minutes)
$timeout = 900;

if (isset($_SESSION['last_activity'])) {
    $duration = time() - $_SESSION['last_activity'];
    if ($duration > $timeout) {
        session_unset();
        session_destroy();
        header("Location: ../../SignUPloIN.html"); // Redirect to login page
        exit();
    }
}

// Update last activity timestamp
$_SESSION['last_activity'] = time();
?>