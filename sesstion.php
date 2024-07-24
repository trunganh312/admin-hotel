<?php
// Tệp cấu hình session
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
