<?php
include "config/batasan.php";
?>
<?php
//ambil data id barang
$id_barang = $_GET['id'];

$barang = selectubah("SELECT * FROM barang WHERE idbarang = $id_barang");

 if(isset($_POST['ubah']))
 {
    if(update_barang($_POST) > 0)
    {
        
        echo "<script>
        swal('Good job!', 'Data Berhasil Diubah!', 'success');
        setTimeout(function(){

            window.location.href = 'index.php?p=databarang';
         
         }, 1500);
        
        </script>";
    }
    else
    {
        echo "<script>
        swal('OPPSSSSSS...!', 'Tidak ada Perubahan!', 'error');
        setTimeout(function(){

            window.history.back();
         
         }, 1500);
       
        
        </script>";
    }
 }
?>

<!-- Breadcrumb -->
<nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item"><a href="index.php?p=databarang">Data Barang</a></li>
              <li class="breadcrumb-item active" aria-current="page">Ubah Barang</li>
            </ol>
          </nav>
          <!-- /Breadcrumb -->


<div class="shadow-none p-2 mt-2 bg-secondary text-light rounded">Ubah Data Barang</div>
<div class = "shadow p-3 mb-5 bg-body rounded">
<form action="" method = "post" class="row g-3 m-4 needs-validation" novalidate>
    <input type="hidden" name = "idbarang" value = "<?php echo $barang['idbarang']; ?>" >
  <div class="col-md-12 position-relative">
    <label for="validationTooltip01" class="form-label">Nama Barang</label>
    <input type="text" name = "nama" class="form-control" value = "<?php echo $barang['nama']; ?>" id="validationTooltip01" placeholder = "Masukkan Nama Barang" required>
    <div class="invalid-tooltip">
      Masukkan Nama Barang
    </div>
  </div>
  
  <div class="col-md-4 position-relative">
    <label for="validationTooltip03" class="form-label">Jumlah Barang</label>
    <input type="number" name = "jumlah" class="form-control" id="validationTooltip03" value = "<?php echo $barang['jumlah']; ?>"  placeholder = "Masukkan Jumlah Barang" required>
    <div class="invalid-tooltip">
        Masukkan Jumlah Barang
    </div>
  </div>
  <div class="col-md-4 position-relative">
 
    
  <label for="validationTooltip03" class="form-label">Harga Barang</label>
  <div class="input-group has-validation">
  <span class="input-group-text" id="inputGroupPrepend">Rp. </span>
  <input type="number" name = "harga" class="form-control" id="validationTooltip04" value = "<?php echo $barang['harga']; ?>"  placeholder = "Masukkan Harga Barang" required>
  <div class="invalid-tooltip">
      Masukkan Harga Barang
    </div>
</div>
    
  </div>

  <div class="col-md-4 position-relative">
    <label for="validationTooltip05" class="form-label">Tanggal</label>
    <input type="text" class="form-control" id="validationTooltip05" aria-label="readonly input example" readonly value = "<?php echo $barang['tanggal']; ?>">
    <div class="invalid-tooltip">
      Masukkan Tanggal Barang Masuk
    </div>
  </div>
  <div class="col-12" style = "text-align:right;">
  <a href = "index.php?p=databarang">
  <button class="btn btn-secondary " type="button">Kembali</button></a>
    <button class="btn btn-success"  name = "ubah" type="submit" value = "ubah">Simpan</button>
  </div>
</form>
</div>
