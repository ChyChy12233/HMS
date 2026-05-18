<?php
// includes/auth.php
// Existing login.php sets $_SESSION['user'] and $_SESSION['role'].
// Guard: redirect to login page if not authenticated.
if (session_status() === PHP_SESSION_NONE) session_start();
if (!isset($_SESSION['user'])) {
    header('Location: /nhom1_QuanLyKhachSan/index.php');
    exit;
}
