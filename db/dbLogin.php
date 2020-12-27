<?php
   session_start();
   include "connect.php";
   $database = new database();

   if (isset($_POST['login'])) {
      if (isset($_SESSION['is_login'])) {
         header('location:../index.php');
      } else if (isset($_COOKIE['username'])) {
         $database->relogin($_COOKIE['username']);
         header('location:../index.php');
      } else {
         $username = $_POST['username'];
         $password = $_POST['password'];
         
         if (isset($_POST['remember'])) {
            $remember = TRUE;
         } else {
            $remember = FALSE;
         }
         
         if ($database->login($username, $password, $remember)) {
            header('location:../index.php');
         } else {
            // echo $username . " ". $password;
            header('location:../login.php?message=Login Gagal! Coba lagi atau Register jika belum memiliki akun');
         }
      }
   }
?>
