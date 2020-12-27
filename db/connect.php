<?php
   class Database
   {
      protected $host = "localhost";
      protected $username = "root";
      protected $pass = "";
      protected $database = "db_akademik";
      protected $koneksi;

      function __construct()
      {
         $this->koneksi = mysqli_connect($this->host, $this->username, $this->pass, $this->database);
      }


      function register($username, $pass, $nim, $nama, $jKelamin, $alamat, $angkatan)
      {
         date_default_timezone_set("Asia/Jakarta");
         $now = date('Y/m/d', time());
         // change to date type
         $curdate = strtotime($now);
         $query1 = "INSERT INTO user VALUES ('','$username','$pass');";
         $query1 .= "INSERT INTO mahasiswa VALUES ('','$nim','$nama','$jKelamin','$alamat', '$angkatan', LAST_INSERT_ID());";
         $query1 .= "INSERT INTO img VALUES ('','default.png','$curdate',LAST_INSERT_ID())";
         $insert = mysqli_multi_query($this->koneksi, $query1);
         return $insert;
      }

      function login($username, $pass, $remember)
      {
         $query = mysqli_query($this->koneksi, "SELECT user.*, mhs.*, img.* FROM user user INNER JOIN mahasiswa mhs ON user.id=mhs.id_user INNER JOIN img ON user.id=img.id_user WHERE user.username='$username'");
         $data_user = $query->fetch_array();
         if (password_verify($pass, $data_user['pass'])) {
            if ($remember) {
               setcookie('username', $username, time() + (60 * 60 * 24 * 5), '/');
               setcookie('nama_mhs', $data_user['nama_mhs'], time() + (60 * 60 * 24 * 5), '/');
            }
            $_SESSION['username'] = $username;
            $_SESSION['id'] = $data_user['id'];
            $_SESSION['nim'] = $data_user['nim'];
            $_SESSION['nama'] = $data_user['nama_mhs'];
            $_SESSION['jKelamin'] = $data_user['jk_mahasiswa'];
            $_SESSION['alamat'] = $data_user['alamat'];
            $_SESSION['angkatan'] = $data_user['angkatan'];
            $_SESSION['img'] = $data_user['image'];
            $_SESSION['is_login'] = TRUE;
            return TRUE;
         }
      }

      function relogin($username)
      {
         $query = mysqli_query($this->koneksi, "SELECT user.*, mhs.*, img.* FROM user user INNER JOIN mahasiswa mhs ON user.id=mhs.id_user INNER JOIN img ON user.id=img.id_user WHERE user.username='$username'");
         $data_user = $query->fetch_array();
         $_SESSION['username'] = $username;
         $_SESSION['id'] = $data_user['id'];
         $_SESSION['nim'] = $data_user['nim'];
         $_SESSION['nama'] = $data_user['nama_mhs'];
         $_SESSION['jKelamin'] = $data_user['jk_mahasiswa'];
         $_SESSION['alamat'] = $data_user['alamat'];
         $_SESSION['angkatan'] = $data_user['angkatan'];
         $_SESSION['img'] = $data_user['image'];
         $_SESSION['is_login'] = TRUE;
      }

      function setQuery($query){
         $execute = mysqli_query($this->koneksi, $query);
         return $execute;
      }
   }
?>