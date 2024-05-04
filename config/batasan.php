<?php
/**
 * Menampilkan format rupiah dengan PHP.
 *
 */

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
