<?php
   include "db/connect.php";

   $path = "assets/img/" . $_GET['image'];
   // buka file
   if ($fd = fopen($path, "r")) {
      // cek size file
      $fsize = filesize($path);

      // ambil info file
      $path_parts = pathinfo($path);

      // lowercase untuk ekstensi file
      $ext = strtolower($path_parts["extension"]);

      // kondisi sesuai ekstensi file
      switch ($ext) {
         case 'pdf':
            header("Content-type: application/pdf");
            // using attachment
            header("Content-Disposition: attachment; filename=\"". $path_parts["basename"] ."\"");
            break;
         // tambah header lain untuk  jenis content-type selain pdf 
         default:
            header("Content-type: application/octet-stream");
            header("Content-Disposition: filename=\"". $path_parts["basename"] ."\"");
            break;
      }
      // ukuran file
      header("Content-length: $fsize");
      
      // read data per byte
      while (!feof($fd)) {
         $buffer = fread($fd, 2048);
         echo $buffer;
      }
   }
   fclose($fd);
   exit;
?>