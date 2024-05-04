<?php
include "config/batasan.php";
?>
<?php
 if(isset($_POST['tambah']))
 {
    if(create_barang($_POST) > 0)
    {
        
        echo "<script>
        swal('Good job!', 'Data Berhasil Disimpan!', 'success');
        setTimeout(function(){

            window.location.href = 'index.php?p=databarang';
         
         }, 3000);
        
        </script>";
    }
    else
    {
        echo "<script>
        swal('OPPSSSSSS...!', 'Gagal Deh!', 'error');
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
              <li class="breadcrumb-item active" aria-current="page">Tambah Barang</li>
            </ol>
          </nav>
          <!-- /Breadcrumb -->


<div class="shadow-none p-2 mt-2 bg-secondary text-light rounded">Tambah Data Barang</div>
<div class = "shadow p-3 mb-5 bg-body rounded">
<form action="" method = "post" class="row g-3 m-4 needs-validation" novalidate>
  <div class="col-md-12 position-relative">
    <label for="validationTooltip01" class="form-label">Nama Barang</label>
    <input type="text" name = "nama" class="form-control" id="validationTooltip01" placeholder = "Masukkan Nama Barang" required>
    <div class="invalid-tooltip">
      Masukkan Nama Barang
    </div>
  </div>
  
  <div class="col-md-4 position-relative">
    <label for="validationTooltip03" class="form-label">Jumlah Barang</label>
    <input type="number" name = "jumlah" class="form-control" id="validationTooltip03"  placeholder = "Masukkan Jumlah Barang" required>
    <div class="invalid-tooltip">
        Masukkan Jumlah Barang
    </div>
  </div>
  <div class="col-md-4 position-relative">
 
    
  <label for="validationTooltip03" class="form-label">Harga Barang</label>
  <div class="input-group has-validation">
  <span class="input-group-text" id="inputGroupPrepend">Rp. </span>
  <input type="number" name = "harga" class="form-control" id="validationTooltip04"  placeholder = "Masukkan Harga Barang" required>
  <div class="invalid-tooltip">
      Masukkan Harga Barang
    </div>
</div>
    
  </div>

  <div class="col-md-4 position-relative">
    <label for="validationTooltip05" class="form-label">Tanggal</label>
    <input type="text" class="form-control" id="validationTooltip05" aria-label="readonly input example" readonly value = "<?php echo date("Y-m-d | H:i:s"); ?>">
    <div class="invalid-tooltip">
      Masukkan Tanggal Barang Masuk
    </div>
  </div>
  <div class="col-12" style = "text-align:right;">
  <a href = "index.php?p=databarang">
  <button class="btn btn-secondary " type="button">Kembali</button></a>
    <button class="btn btn-success"  name = "tambah" type="submit" value = "tambah">Simpan</button>
  </div>
</form>
</div>
