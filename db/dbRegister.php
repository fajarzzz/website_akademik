<?php
   include "connect.php";
   $database = new database();
   if (isset($_POST['register'])) {
      $username = $_POST['username'];
      $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
      if ($database->register($username, $password, $_POST['nim'], $_POST['nama'], $_POST['jKelamin'], $_POST['alamat'], $_POST['angkatan'])) {
         header('location:../login.php?message=Akun Berhasil Didaftarkan!');
      }else{
         echo "error : " . mysqli_error($conn);
      }
   }
?>