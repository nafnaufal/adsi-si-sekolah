<?php
    session_start();
    session_destroy();
    header("location: ./login.html", true, 303);
    exit();
?>