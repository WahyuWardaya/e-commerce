<?php
if (session_status() === PHP_SESSION_NONE) {
  ini_set('session.cookie_lifetime', 86400);
  session_start();
}
require_once 'conn.php';

if (isset($_SESSION['username'])) {
  $username = $_SESSION['username'];
  $conn = getConnection();
} else {
  header("Location: login.php");
}
