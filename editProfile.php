<?php
session_start();
if (!isset($_SESSION['is_login'])) {
   header('location:login.php');
}
include "component/header.php";
include "db/connect.php";
$db = new Database();

// proses update
if (isset($_POST['submit'])) {
   // tangkap data
   $nim = $_POST['nim'];
   $nama = $_POST['nama'];
   $jKelamin = $_POST['jKelamin'];
   $angkatan = $_POST['angkatan'];
   $alamat = $_POST['alamat'];

   $img = $_FILES['fupload']['name'];
   $tmp_img = $_FILES['fupload']['tmp_name'];
   $size_img = $_FILES['fupload']['size'];

   $size = 10000000; //limit 10mb
   date_default_timezone_set("Asia/Jakarta");
   $tgl = date("Ymd");

   if ($_GET['id']) {
      $id = $_GET['id'];
   }
   $query = $db->setQuery("UPDATE mahasiswa SET nim='$nim',nama_mhs='$nama',jk_mahasiswa='$jKelamin',alamat='$alamat',angkatan='$angkatan' WHERE id_user='$id'");

   if($img){
      if($size_img < $size){
         $query2 = $db->setQuery("UPDATE img SET image='$img', tgl_upload='$tgl' WHERE id_user='$id'");
         $dir = "assets/img/$img";
         move_uploaded_file($tmp_img, $dir);
   
         if ($query && $query2) {
            $db->relogin($_SESSION['username']);
            header("location:profile.php");
         }
      }else {
         header("location:editProfile.php?message=Ukuran Gambar Dibatasi 5mb saja");
      }
   }else{
      if ($query) {
         $db->relogin($_SESSION['username']);
         header("location:profile.php");
      }
   }
   
}
?>
<div class="profile d-flex justify-content-center">
   <div class="card col-md-6 col-sm-8 col-xs-10">
      <img class="card-img-top" src="holder.js/100x180/" alt="">
      <div class="card-body">
         <h4 class="card-title text-center">Edit Profile</h4>
         <form action="" method="post" enctype="multipart/form-data">
            <?php
            if (isset($_GET['id'])) {
               $id = $_GET['id'];
               // fetch hasil
               $query1 = $db->setQuery("SELECT user.id, mhs.*, img.* FROM user user INNER JOIN mahasiswa mhs ON user.id=mhs.id_user INNER JOIN img ON user.id=img.id_user WHERE user.id=$id");
               $data = $query1->fetch_array();
            ?>
               <div class="container">
                  <div class="text-center pt-3">
                     <img width="145px" src="<?= "assets/img/" . $data['image'] ?>" class="img-fluid rounded-circle" alt="profile">
                  </div>
                  <div class="form-group">
                     <label for="fupload">Change Photo</label>
                     <p style="color:red;"><?php if(isset($_GET['message'])){ echo $_GET['message'];} ?></p>
                     <input type="file" name="fupload" class="form-check" id="fpload">

                  </div>
                  <div class="form-group">
                     <label>NIM</label>
                     <input type="text" class="form-control" name="nim" value="<?= $data['nim'] ?>">
                  </div>
                  <div class="form-group">
                     <label>Name</label>
                     <input type="text" class="form-control" name="nama" value="<?= $data['nama_mhs'] ?>">
                  </div>
                  <div class="form-group">
                     <label class="d-block">Gender</label>
                     <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="jKelamin" id="jKelamin" value="M" <?php if ($data['jk_mahasiswa'] == "M") {
                                                                                                                  echo "checked";
                                                                                                               } ?>>
                        <label class="form-check-label" for="jKelamin">
                           Male
                        </label>
                     </div>
                     <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="jKelamin" id="jKelamin" value="F" <?php if ($data['jk_mahasiswa'] == "F") {
                                                                                                                  echo "checked";
                                                                                                               } ?>>
                        <label class="form-check-label" for="jKelamin">
                           Female
                        </label>
                     </div>
                  </div>
                  <div class="form-group">
                     <label>Generation</label>
                     <input type="number" class="form-control w-25" name="angkatan" value="<?= $data['angkatan'] ?>">
                  </div>
                  <div class="form-group">
                     <label for="alamat">Address</label>
                     <textarea class="form-control" name="alamat" id="alamat" rows="3"><?= $data['alamat'] ?></textarea>
                  </div>
                  <div class="d-flex my-3">
                     <a href="profile.php" class=" ml-auto btn btn-danger">Back</a>
                     <button type="submit" name="submit" class="ml-3 btn btn-warning">Finish</button>
                  </div>
               <?php
            } else {
               echo "<h5 class='text-center' style='color:red'>Data tidak ada</h5>";
            }
               ?>
               </div>
         </form>
      </div>
   </div>
</div>
<?php
include "component/footer.php";
?>