<?php
//ambil data id barang
$id = (int)$_GET['id'];

//query
$hapus = mysqli_query($koneksi, "DELETE FROM akun where idakun = '$id'");

if($hapus){
    echo "<script>
        swal('Good job!', 'Data Berhasil Hapus!', 'warning');
        setTimeout(function(){

            window.location.href = 'index.php?p=akunmodal';
         
         }, 2000);
        
        </script>";

}
else
{
    echo "<script>

            window.location.href = 'index.php?p=akunmodal';

        </script>";
}



?>