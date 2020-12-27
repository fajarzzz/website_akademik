<?php
session_start();
if (!isset($_SESSION['is_login'])) {
   header('location:login.php');
}
include "component/header.php";
include "db/connect.php";

?>

<div class="profile container">
   <div class="card text-center">
      <div class="card-body">
         <div class="row">
            <div class="col-md-12 pt-3">
               <img width="145px" src="<?= "assets/img/" . $_SESSION['img'] ?>" class="img-fluid rounded-circle" alt="profile">
            </div>
            <div class="col-md-12 p-3">
               <h3><?= $_SESSION['nama'] ?></h3>
               <h4><?= $_SESSION['nim'] ?></h4>
               <h5 class="font-weight-lighter">Angkatan <?= $_SESSION['angkatan'] ?></h5>
               <hr>
               <p><?= $_SESSION['alamat'] ?></p>
            </div>
         </div>
         <a href="editProfile.php?id=<?= $_SESSION['id'] ?>" class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i> Edit</a>
         <a href="savePhoto.php?image=<?= $_SESSION['img'] ?>" class="btn btn-success"><i class="fa fa-download" aria-hidden="true"></i></i> Save Photo Profile</a>
      </div>
   </div>
</div>

<?php
include "component/footer.php";
?>