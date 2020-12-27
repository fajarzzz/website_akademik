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
   $nim = $_SESSION['nim'];
   $insert = $db->setQuery("INSERT INTO kontrak_kuliah (nim, kode_mk) VALUES ('$nim', '$kode')");
}
?>
<div class="profile d-flex justify-content-center">
   <div class="card col-md-8 col-sm-8 col-xs-12">
      <div class="card-body " style="overflow:hidden">
         <h4 class="card-title text-center pt-3">Course Available</h4>
         <table class="pt-4 table table-striped table-inverse table-responsive w-100">
            <thead class="thead-inverse">
               <tr>
                  <th>Kode</th>
                  <th>Mata Kuliah</th>
                  <th>SKS</th>
                  <th>Dosen Pengampu</th>
                  <th>Keahlian</th>
                  <th></th>
               </tr>
            </thead>
            <tbody>
               <?php
               $nim = $_SESSION['nim'];
               $query = $db->setQuery("SELECT matkul.*, dosen.*  FROM mata_kuliah matkul INNER JOIN dosen dosen ON matkul.nid=dosen.nid LEFT JOIN  kontrak_kuliah kontrak ON matkul.kode_mk=kontrak.kode_mk AND kontrak.nim=$nim WHERE kontrak.kode_mk IS NULL");
               while ($data = $query->fetch_array()) { ?>
                  <tr>
                     <td><?= $data['kode_mk'] ?></td>
                     <td><?= $data['nama_mk'] ?></td>
                     <td><?= $data['sks'] ?></td>
                     <td><?= $data['nama_dosen'] ?></td>
                     <td><?= $data['keahlian'] ?></td>
                     <td><a href="index.php?kode_mk=<?= $data['kode_mk'] ?>" class="btn-sm btn-success"><i class="fa fa-plus-circle" aria-hidden="true"></i></a></td>
                  </tr>

               <?php
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