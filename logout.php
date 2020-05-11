<?php

// Start sessions
session_start();

// Destory the session and radirect to login.php
if (session_destroy()) {
 header('location:login.php');
}

?>