<?php
session_start();
if (isset($_SESSION['is_login'])) {
   header('location:index.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="assets/css/bootstrap.min.css">
   <link rel="stylesheet" href="assets/css/login-style.css">
   <title>Register</title>
   <link rel="preconnect" href="https://fonts.gstatic.com">
   <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;400;500&display=swap" rel="stylesheet">

</head>

<body>
   <div class="sidenav">
      <div class="login-main-text">
         <i class="fas fa-graduation-cap" style="font-size:250px"></i>
         <h2>Student <br><b>Register</b> Page</h2>
         <p>Register an account to access functionality of this website.</p>
      </div>
   </div>
   <div class="main">
      <div class="col-md-12 col-sm-12">
         <div class="container">
            <div class="register-form">
               <form action="db/dbRegister.php" method="POST">
                  <h4 class="text-center">Account Information</h4>
                  <div class="form-group">
                     <label>Username</label>
                     <input type="text" class="form-control" name="username" required>
                  </div>
                  <label>Password</label>
                  <div class="input-group">
                     <input type="password" name="password" id="password" class="form-control" data-toggle="password" required>
                     <div class="input-group-append">
                        <span class="input-group-text">
                           <i class="fa fa-eye-slash"></i>
                        </span>
                     </div>
                  </div>
                  <hr>
                  <h4 class="text-center">Student Information</h4>
                  <div class="form-group">
                     <label>NIM</label>
                     <input type="text" class="form-control" name="nim">
                  </div>
                  <div class="form-group">
                     <label>Name</label>
                     <input type="text" class="form-control" name="nama">
                  </div>
                  <div class="form-group">
                     <label class="d-block">Gender</label>
                     <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="jKelamin" id="jKelamin" value="M" checked>
                        <label class="form-check-label" for="jKelamin">
                           Male
                        </label>
                     </div>
                     <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="jKelamin" id="jKelamin" value="F">
                        <label class="form-check-label" for="jKelamin">
                           Female
                        </label>
                     </div>
                  </div>
                  <div class="form-group">
                     <label>Generation</label>
                     <input type="number" class="form-control w-25" name="angkatan">
                  </div>
                  <div class="form-group">
                     <label for="alamat">Address</label>
                     <textarea class="form-control" name="alamat" id="alamat" rows="3"></textarea>
                  </div>
                  <div class="d-flex my-3">
                     <a href="login.php" class=" ml-auto btn btn-secondary">Login</a>
                     <button type="submit" name="register" class="ml-3 btn btn-blue">Register</button>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
   <script src="assets/js/bootstrap.min.js"></script>
   <script src="https://kit.fontawesome.com/3555968637.js" crossorigin="anonymous"></script>
   <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
   <script src="assets/js/bootstrap-show-password.js"></script>
</body>

</html>