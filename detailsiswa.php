<?php
include "config/batasan.php";
?>
<?php
//ambil data id barang
$id = $_GET['id'];

$siswa = detailsiswa("SELECT * FROM siswa WHERE nis = $id");



?>
<?php
//ambil data id barang
$nis = $_GET['id'];

$siswaubah= selectubah("SELECT * FROM siswa WHERE nis = $nis");

 if(isset($_POST['ubah3']))
 {
    if(update_siswa($_POST) > 0)
    {
        
        echo "<script>
        swal('Good job!', 'Data Berhasil Diubah!', 'success');
        setTimeout(function(){

            window.location.href = 'index.php?p=detailsiswa&id=$nis';
         
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
              <li class="breadcrumb-item"><a href="index.php?p=datasiswa">Siswa</a></li>
              <li class="breadcrumb-item active" aria-current="page">Detail Siswa</li>
            </ol>
          </nav>
          <!-- /Breadcrumb -->


<div class="row gutters-sm">
            <div class="col-md-4 mb-3">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex flex-column align-items-center text-center">
                    <img src="assets/foto/<?php echo $siswa['foto']; ?>" alt="siswa" class="rounded-circle" width="150">
                    <div class="mt-3">
                      <h4><?php echo $siswa['namasiswa']; ?></h4>
                      
                      <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalubahfoto"> Ubah Foto</button>
                    </div>
                  </div>
                </div>
              </div>
              
            </div>

            <?php
                //ambil perintah edit
                @$aksi = $_GET['aksi'];

                if($aksi == 'edit')
                {
                ?>
                
                <div class="col-md-8">
              <div class="card mb-3">
              <form action = "" method = "post">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">NIS</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <input type="text" name = "nis" class="form-control" id="validationTooltip01" value = "<?php echo $siswa['nis']; ?>" readonly required>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Nama Lengkap</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <input type="text" name = "namasiswa" class="form-control" id="validationTooltip01" value = "<?php echo $siswa['namasiswa']; ?>" required>
                    
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Jenis Kelamin</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <select name="jenkel" class="form-select" aria-label="Default select example" id="validationTooltip03" required>
                        <option value="" >Pilih Jenis Kelamin</option>
                        <option value="L" <?php if($siswa['jk'] == "L"){echo "selected";} else {} ?>>Laki - laki</option>
                        <option value="P" <?php if($siswa['jk'] == "P"){echo "selected";} else {} ?>>Perempuan</option>
                    
                    </select>
                    
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Alamat</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <input type="text" name = "alamat" class="form-control" id="validationTooltip01" value = "<?php echo $siswa['alamat']; ?>" required>
                    
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Tanggal Lahir</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <input value="<?php echo $siswa['tanggal_lahir']; ?>"
                    class="form-control" id="validationTooltip01"

                    type="date" name = "tanggal_lahir" class="form-control" id="validationTooltip01"  required>
                    
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-12">
                    <a href = "index.php?p=detailsiswa&id=<?php echo $siswa['nis']; ?>"><button type="button" name="ubah3" class="btn btn-secondary"> Batal</button></a>
                    <button type="submit" name="ubah3" class="btn btn-success"> Simpan</button>
                    </div>
                  </div>
                  </form>
                </div>
              </div>
              
                <?php
                }
                else
                {
            ?>
            <!-- Detail siswa -->
            <div class="col-md-8">
              <div class="card mb-3">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">NIS</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php echo $siswa['nis']; ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Nama Lengkap</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <?php echo $siswa['namasiswa']; ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Jenis Kelamin</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <?php echo jenkel($siswa['jk']); ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Alamat</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <?php echo $siswa['alamat']; ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Tanggal Lahir</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <?php echo date("d-m-Y", strtotime($siswa['tanggal_lahir'])); ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-12">
                    <a class="btn btn-info "  href="index.php?p=detailsiswa&aksi=edit&id=<?php echo $siswa['nis']; ?>">Edit</a>
                    </div>
                  </div>
                </div>
              </div>
            <?php
                }



            ?>





           

              



            </div>
          </div>


          <!-- Modal -->
<div class="modal fade" id="modalubahfoto" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-primary text-white">
        <h1 class="modal-title fs-5 " id="exampleModalLabel">Ubah Foto</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="" method = "post"  class="row g-3 p-1   needs-validation" enctype = "multipart/form-data" novalidate>
      <div class="modal-body">
        
                    
                <div class="col-md-12 p-1 position-relative">
                    <label for="validationTooltip01" class="form-label">Foto</label>
                    <input type="file" name = "foto" class="form-control" id="validationTooltip01" placeholder = "Masukkan foto" required>
                    <div class="invalid-tooltip">
                    Masukkan Foto
                    </div>
                </div>
                


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
        <button type="submit" name = "ubahfoto" class="btn btn-primary">Simpan</button>
      </div>
      </form>
    </div>
  </div>
</div>