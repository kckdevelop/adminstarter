<?php
/**
 * Menampilkan format rupiah dengan PHP.
 *
 */

include "config/koneksi.php";
include "config/controller.php";

//pembatasan akses
if(!isset($_SESSION['login']))
{
  echo "<script>
        alert('Silahkan Login dulu kak');
        document.location.href = 'login.php';
        </script>";
        exit;
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


    <title>Unit Produksi SMK Muhammadiyah 1 Bantul</title>
  </head>
  <body>
  <main class="container">
    <?php include "layout/header.php"; ?>





  <div class="p-3 bg-body rounded shadow-sm">
    <?php include "switch.php"; ?>
  </div>

  

<?php include "layout/footer.php" ?>


</main>

  </body>
</html>