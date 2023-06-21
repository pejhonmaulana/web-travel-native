<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="css/owl.carousel.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    
    <!-- Style -->
    <link rel="stylesheet" href="css/style.css">

    <title>Login #2</title>
  </head>
  <body>
  

  <div class="d-lg-flex half">
    <div class="bg order-1 order-md-2" style="background-image: url('images/bg_1.jpg');"></div>
    <div class="contents order-2 order-md-1">

      <div class="container">
        <div class="row align-items-center justify-content-center">
          <div class="col-md-7">
            <h3>Register Account to <strong>Travel In</strong></h3>
            <p class="mb-4">Silahkan Melakukan Register.</p>
            <form action="aksi_register.php" method="POST">
              <div class="form-group last mb-3">
                <label for="nama">Nama</label>
                <input type="text" class="form-control" name="nama_penumpang" placeholder="your Name" id="nama">
              </div>
              <div class="form-group last mb-3">
                <label for="email">Email</label>
                <input type="text" class="form-control" name="email" placeholder="Your Email" id="email">
              </div>
              <div class="form-group last mb-3">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="pass" placeholder="Your Password">
              </div>
              <div class="form-group last mb-3">
                <label for="Alamat">Alamat</label>
                <input type="text" class="form-control" name="alamat" placeholder="Your Alamat" id="Alamat">
              </div>
              <div class="form-group last mb-3">
                <label for="notelp">No Telepon</label>
                <input type="text" class="form-control" name="no_telp" placeholder="Your phone number" id="notelp">
              </div>
              
              <div class="d-flex mb-5 align-items-center">
                <span class="ml-auto"><a href="index.php" class="forgot-pass">login</a></span> 
              </div>

              <input type="submit" value="Register" name="register" class="btn btn-block btn-primary">

            </form>
          </div>
        </div>
      </div>
    </div>

    
  </div>
    
    

    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
  </body>
</html>