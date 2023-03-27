<?php
        session_start();
        // Destroy session
        if (session_destroy()) {
                // Redirecting to home page
                header("Location: home.html");
        }
?>