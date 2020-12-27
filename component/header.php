<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="assets/css/bootstrap.min.css">
   <link rel="stylesheet" href="assets/css/index.css">
   <link rel="stylesheet" href="assets/css/profile-style.css">
   <title>Sistem Kontrak Mata Kuliah</title>
   <link rel="preconnect" href="https://fonts.gstatic.com">
   <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;400;500&display=swap" rel="stylesheet">
   <style>
      .main-container {
         min-height: 100vh;
         /* will cover the 100% of viewport */
         overflow: hidden;
         display: block;
         position: relative;
         padding-bottom: 100px;
         /* height of footer */
      }

      html,
      body {
         height: 100%;
         position: relative;
      }
   </style>
</head>

<body>
   <div class="main-container">
      <div class="top-bar">
         <div class="container-fluid p-2">
            <div class="row">
               <div class="col-md-6 col-sm-12">
                  <h5 class="pt-2 pl-3"><i class="fas fa-edit"></i> SIKOMKU - Sistem Kontrak Mata Kuliah</h5>
               </div>
               <div class="col-md-6 col-sm-12 d-flex justify-content-end">
                  <div class="mr-3 justify-content-end">
                     <div class="nav-item dropdown">
                        <a href="#" data-toggle="dropdown" style="color:black" class="nav-link dropdown-toggle user-action"><img id="namaUser" width="35px" src="https://buddymantra.com/wp-content/uploads/2018/04/user-icon-png-pnglogocom.png" class="avatar" alt="Avatar"><?= $_SESSION['nama'] ?> <b class="ca"></b></a>
                        <div class="dropdown-menu dropdown-menu-right">
                           <a href="profile.php" class="dropdown-item"><i class="fa fa-user-o"></i> Profile</a></a>
                           <a href="index.php" class="dropdown-item"><i class="fa fa-book" aria-hidden="true"></i> Course</a></a>
                           <a href="result.php" class="dropdown-item"><i class="fa fa-th-list" aria-hidden="true"></i> Result</a></a>
                           <div class="dropdown-divider"></div>
                           <a href="logout.php" class="dropdown-item" style="color:red; font-weight:bold;"><i class="fa fa-window-close" aria-hidden="true"></i> Logout</a></a>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>