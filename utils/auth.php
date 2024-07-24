<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
function isLogin() {
    if($_SESSION['username'] !== '') {
        return true;
    } 
    return false;
}
