<?php
session_start();
if(!isset($_SESSION['sUserId'])) {
    header('Location: login.php');
    exit();
}