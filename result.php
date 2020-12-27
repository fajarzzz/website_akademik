<?php
session_start();
if (!isset($_SESSION['is_login'])) {
   header('location:login.php');
}
include "component/header.php";
include "db/connect.php";
$db = new Database();

if (isset($_GET['kode_mk'])) {
   $kode = $_GET['kode_mk'];
   $delete = $db->setQuery("DELETE FROM kontrak_kuliah WHERE kode_mk='$kode'");
}
?>

<div class="profile d-flex justify-content-center">
   <div class="card col-lg-6 col-md-8 col-sm-8 col-xs-11">
      <div class="card-body " style="overflow:hidden">
         <h4 class="card-title text-center pt-3">Your Course</h4>
         <table class="pt-4 table table-striped table-inverse table-responsive w-100">
            <thead class="thead-inverse">
               <tr>
                  <th>No</th>
                  <th>Kode</th>
                  <th>Mata Kuliah</th>
                  <th>SKS</th>
                  <th>Semester</th>
                  <th>Dosen Pengampu</th>
                  <th></th>
               </tr>
            </thead>
            <tbody>
               <?php
               $no = 1;
               $nim = $_SESSION['nim'];
               $query = $db->setQuery("SELECT matkul.*, dosen.*  FROM mata_kuliah matkul INNER JOIN dosen dosen ON matkul.nid=dosen.nid INNER JOIN  kontrak_kuliah kontrak ON matkul.kode_mk=kontrak.kode_mk WHERE kontrak.nim=$nim");
               while ($data = $query->fetch_array()) { ?>
                  <tr>
                     <td><?= $no ?></td>
                     <td><?= $data['kode_mk'] ?></td>
                     <td><?= $data['nama_mk'] ?></td>
                     <td><?= $data['sks'] ?></td>
                     <td><?= $data['semester'] ?></td>
                     <td><?= $data['nama_dosen'] ?></td>
                     <td><a href="result.php?kode_mk=<?= $data['kode_mk'] ?>" class="btn-sm btn-danger"><i class="fa fa-times-circle" aria-hidden="true"></i></a></td>
                  </tr>

               <?php
                  $no++;
               }
               ?>
            </tbody>
         </table>
      </div>
   </div>
</div>

<?php
include "component/footer.php";
?>