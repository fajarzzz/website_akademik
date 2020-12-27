<?php
session_start();
if (isset($_SESSION['is_login'])) {
   header('location:index.php');
}
if (isset($_GET['message'])) {
   $message = $_GET['message'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="assets/css/bootstrap.min.css">
   <link rel="stylesheet" href="assets/css/login-style.css">
   <title>Login</title>
   <link rel="preconnect" href="https://fonts.gstatic.com">
   <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;400;500&display=swap" rel="stylesheet">

</head>

<body>
   <div class="sidenav">
      <div class="login-main-text">
         <i class="fas fa-graduation-cap" style="font-size:250px"></i>
         <h2>Student <br><b>Login</b> Page</h2>
         <p>Login with your account to access functionality of this website.</p>
      </div>
   </div>
   <div class="main">
      <div class="col-md-12">
         <img id="mit" src="https://ci.mit.edu/sites/default/files/images/photo-video-detail_0.png" alt="">
      </div>
      <div class="col-md-6 col-sm-12">
         <div class="login-form">
            <form action="db/dbLogin.php" method="POST">
               <p style="color:<?php if (strpos($message, 'Gagal') !== false) {
                                    echo 'red';
                                 } else {
                                    echo 'green';
                                 } ?>"><?php if (isset($message)) echo $message; ?></p>
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
               <div class="checkbox pt-2">
                  <label>
                     <input type="checkbox" value="remember-me" name="remember"> <span style="font-size: 14px;">Remember me</span>
                  </label>
               </div>
               <div class="my-3">
                  <button type="submit" class="btn btn-blue" name="login">Login</button>
                  <a href="register.php" class="btn btn-secondary">Register</a>
               </div>
            </form>
         </div>
      </div>
   </div>
   <script src="assets/js/bootstrap.min.js"></script>
   <script src="https://kit.fontawesome.com/3555968637.js" crossorigin="anonymous"></script>
   <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
   <script src="assets/js/bootstrap-show-password.js"></script>
</body>

</html>