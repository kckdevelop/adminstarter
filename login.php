
<?php

include "config/koneksi.php";
include "config/controller.php";

//cek data session login
if(isset($_SESSION['nama']))
{
  echo "<script>
        alert('Anda Sudah Login');
        document.location.href = 'index.php';
        </script>";
        exit;
}
else
{

}




if(isset($_POST['login']))
{
    $username = mysqli_real_escape_string($koneksi,$_POST['username']);
    $password = mysqli_real_escape_string($koneksi,$_POST['password']);

   

    $query = mysqli_query($koneksi, "SELECT * FROM akun where username = '$username'");


    $cek = mysqli_num_rows($query);

    if($cek == 1)
    {
        $hasil = mysqli_fetch_assoc($query);
        if(password_verify($password,$hasil['password']))
        {
            $_SESSION['login'] = true;
            $_SESSION['idakun'] = $hasil['idakun'];
            $_SESSION['nama'] = $hasil['nama'];
            $_SESSION['level'] = $hasil['level'];
            header("Location:index.php");
            exit;
        }
        else
        {
            $error = "salah";
        }
       
    }
   else
   {
    $error = "salah";
   }
    
}
else
{
   
}
?>






<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/2.0.5/css/dataTables.bootstrap5.css">

    <!-- datatables -->
    <!-- plugin datatables -->
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.datatables.net/2.0.5/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/2.0.5/js/dataTables.bootstrap5.js"></script>

<!-- plugin fontawesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

</head>

<style>
        body{
            background-image: url(assets/img/bg.jpg);
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            background-attachment: fixed;
            height: 100%;
        }

</style>


<body>

  <main>
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">



              <div class="card mb-3">

                <div class="card-body">


                <div class="d-flex justify-content-center py-2">
                
                  <img src="assets/img/logo.png" width="120px" height = "120px" alt=""><br>
                  
                
                </div><!-- End Logo -->
                    <?php if (isset($error)) :?>
                    <div class = "alert alert-danger text-center">
                        Username / Password Salah
                    </div>
                    <?php endif; ?>
                  <div class="pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Halaman Login</h5>
                    <p class="text-center small">Masukkan Username dan Password</p>
                  </div>

                  <form action = "" method = "post" class="row g-3 needs-validation" novalidate>

                  
                    <div class="col-12">
                      <label for="yourUsername" class="form-label">Username</label>
                      <div class="input-group has-validation">
                        
                        <input type="text" name="username" class="form-control" id="yourUsername" required>
                        <div class="invalid-feedback">Please enter your username.</div>
                      </div>
                    </div>

                    <div class="col-12">
                      <label for="yourPassword" class="form-label">Password</label>
                      <input type="password" name="password" class="form-control" id="yourPassword" required>
                      <div class="invalid-feedback">Please enter your password!</div>
                    </div>

                    
                    <div class="col-12">
                      <button class="btn btn-primary w-100" name = "login" value = "login" type="submit">Login</button>
                    </div>
                    
                  </form>

                </div>
              </div>

              <div class="credits">
                
                Designed by Nurohman <br>
                &copy UP SMK 2024
              </div>

            </div>
          </div>
        </div>

      </section>

    </div>
  </main><!-- End #main -->

  

</body>

</html>