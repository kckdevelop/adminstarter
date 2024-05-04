<?php
include "config/batasan.php";
?>
<?php
 if(isset($_POST['tambah']))
 {
    if(create_siswa($_POST) > 0)
    {
        
        echo "<script>
        swal('Good job!', 'Data Berhasil Disimpan!', 'success');
        setTimeout(function(){

            window.location.href = 'index.php?p=datasiswa';
         
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
              <li class="breadcrumb-item"><a href="index.php?p=datasiswa">Siswa</a></li>
              <li class="breadcrumb-item active" aria-current="page">Tambah Siswa</li>
            </ol>
          </nav>
          <!-- /Breadcrumb -->




<div class="shadow-none p-2 mt-2 bg-secondary text-light rounded">Tambah Data Siswa</div>
<div class = "shadow p-3 mb-5 bg-body rounded">
<form action="" method = "post" class="row g-3 m-4 needs-validation" enctype = "multipart/form-data" novalidate>
  <div class="col-md-12 position-relative">
    <label for="validationTooltip01" class="form-label">NIS</label>
    <input type="number" name = "nis" class="form-control" id="validationTooltip01" placeholder = "Masukkan NIS" required>
    <div class="invalid-tooltip">
      Masukkan NIS
    </div>
  </div>

  <div class="col-md-12 position-relative">
    <label for="validationTooltip01" class="form-label">Nama Siswa</label>
    <input type="text" name = "nama" class="form-control" id="validationTooltip02" placeholder = "Masukkan Nama Siswa" required>
    <div class="invalid-tooltip">
      Masukkan Nama Siswa
    </div>
  </div>

  <div class="col-md-12 position-relative">
    <label for="validationTooltip01" class="form-label">Jenis Kelamin</label>
    <select name="jenkel" class="form-select" aria-label="Default select example" id="validationTooltip03" required>
        <option value="" >Pilih Jenis Kelamin</option>
        <option value="L">Laki - laki</option>
        <option value="P">Perempuan</option>
        
        </select>
    <div class="invalid-tooltip">
      Masukkan Jenis Kelamin
    </div>
  </div>
  <div class="col-md-12 position-relative">
    <label for="validationTooltip01" class="form-label">Alamat</label>
    <input type="text" name = "alamat" class="form-control" id="validationTooltip04" placeholder = "Masukkan Alamat" required>
    <div class="invalid-tooltip">
      Masukkan Alamat
    </div>
  </div>
  <div class="col-md-12 position-relative">
    <label for="validationTooltip01" class="form-label">Tanggal Lahir</label>
    <input type="date" name = "tanggallahir" class="form-control" id="validationTooltip05" placeholder = "Masukkan tanggal" required>
    <div class="invalid-tooltip">
      Masukkan Tanggal Lahir
    </div>
  </div>
  <div class="col-md-12 position-relative">
    <label for="validationTooltip01" class="form-label">Foto</label>
    <input type="file" name = "foto" class="form-control" id="validationTooltip06" required>
    <div class="invalid-tooltip">
      Masukkan Foto Profil
    </div>
  </div>
  
  <div class="col-12" style = "text-align:right;">
  <a href = "index.php?p=datasiswa">
  <button class="btn btn-secondary " type="button">Kembali</button></a>
    <button class="btn btn-success"  name = "tambah" type="submit" value = "tambah">Simpan</button>
  </div>
</form>
</div>
