<?php

//start session
session_start();

//if the session variable is notset, redirect to login.php
if (!isset ($_SESSION['login_username'])) {
    header('location: login.php');
} 

if ($_SESSION['login_level'] >= $pagelevel) {
    echo "";
} else {
    header('location: error.php');
}
?>