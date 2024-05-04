<?php
include "config/batasan.php";

if($_SESSION['level'] == 1 )
{

}
else
{
    echo "<script>
        alert('Anda Tidak diijinkan');
        document.location.href = 'index.php';
        </script>";
        exit;
}


 if(isset($_POST['tambah']))
 {
    if(create_akun($_POST) > 0)
    {
        
        echo "<script>
        swal('Good job!', 'Data Berhasil Disimpan!', 'success');
        setTimeout(function(){

            window.location.href = 'index.php?p=akunmodal';
         
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
 elseif(isset($_POST['ubah']))
 {
    if(isset($_POST['password']))
    {
        if(ubah_akun_password($_POST) > 0)
            {
                
                echo "<script>
                swal('Good job!', 'Data Berhasil Dirubah!', 'success');
                setTimeout(function(){

                    window.location.href = 'index.php?p=akunmodal';
                
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
    else
    {
        if(ubah_akun($_POST) > 0)
            {
                
                echo "<script>
                swal('Good job!', 'Data Berhasil Dirubah!', 'success');
                setTimeout(function(){

                    window.location.href = 'index.php?p=akunmodal';
                
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
}

    



 
?>


<?php
// Check if form is submitted
if(isset($_POST['delete'])){
    // Process delete operation
    $id = $_POST['idakun']; // Assuming id is passed via POST method
    $nama = $_POST['nama'];
    // Here you can put your delete operation
    // For example, you can execute a SQL DELETE query

    // Display success message using SweetAlert
    echo "<script>
                swal({
                    title: 'Hapus Data ($nama)!',
                    text: 'Apakah Anda Yakin Hapus Data Ini ',
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#DD6B55',
                    confirmButtonText: 'Ya, Hapus Ini!',
                    cancelButtonText: 'Tidak, Batalkan!',
                    closeOnConfirm: false,
                    closeOnCancel: false
                },
                function(isConfirm){
                    if (isConfirm) {
                        
                        window.location = 'index.php?p=hapus_akun&id=$id';
                        
                    } else {

                    swal('Cancelled', 'Data Anda Tidak Terhapus', 'error');
                    }
                });
          </script>";
}
?>




<!-- Breadcrumb -->
<nav aria-label="breadcrumb" class="main-breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <!-- <li class="breadcrumb-item"><a href="javascript:void(0)">Siswa</a></li> -->
              <li class="breadcrumb-item active" aria-current="page">Data Akun</li>
            </ol>
          </nav>
          <!-- /Breadcrumb -->


<div class = "col-md-12" style = "text-align:right;" > <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modaltambahakun"> <i class="fa-solid fa-user-plus"></i> Tambah Akun</button></div>

<div class="shadow-none p-2 mt-2 bg-secondary text-light rounded">Data Akun</div>
    <div class="table-responsive shadow p-3 mb-5 bg-body rounded">
    
    <table id="tabelakun" class="table table-hover">
            <thead>
            <tr >
            <th scope="col">No</th>
            <th scope="col">Nama</th>
            <th scope="col">Username</th>
            <th scope="col">Email</th>
            <th scope="col">Password</th>
            <th scope="col">Level</th>
            <th scope="col" style = "text-align:center; width:25%;">Aksi</th>
            
            </tr>
        </thead>
        <tbody>
        <?php 
            //query data barang
            $data_akun = select("SELECT * FROM akun");
            $no = 1;
        ?>
       <?php foreach($data_akun as $akun): ?>
                    <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $akun['nama']; ?></td>
                    <td><?php echo $akun['username']; ?></td>
                    <td><?php echo $akun['email']; ?></td>
                    <td><?php echo substr($akun['password'],0,10); ?> ...</td>
                    <td><?php echo level($akun['level']); ?></td>
                   
                    <td align="center">
                    <form method="post" action="">
                        
                         <button type="button" id="ubah3" name="ubah3" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#modalubahakun"
                         data-idakun="<?php echo  $akun['idakun']; ?>"
                         data-nama = "<?php echo $akun['nama']; ?>"
                         data-username = "<?php echo $akun['username']; ?>"
                         
                         data-email = "<?php echo $akun['email']; ?>"
                         data-level = "<?php echo $akun['level']; ?>"

                         ><i class="fa-solid fa-pen-to-square" style="color: #ffffff;"></i> Edit</button>
                        
                     <!-- Assuming id of the item to be deleted is 1 -->
                     <input type="hidden" name="idakun" value="<?php echo $akun['idakun']; ?>">
                     <input type="hidden" name="nama" value="<?php echo $akun['nama']; ?>">
                         <button type="submit" name="delete" class="btn btn-danger"><i class="fa-solid fa-trash" style="color: #ffffff;"></i> Hapus</button>
                     </form>
                </td>
                </tr>
         
        <?php endforeach; ?>
       
            
            
        </tbody>
    </table>
    </div>

<!-- Modal Tambah -->
<div class="modal fade" id="modaltambahakun" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-primary text-white">
        <h1 class="modal-title fs-5 " id="exampleModalLabel">Tambah Data Akun</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="" method = "post" class="row g-3 p-1  needs-validation" novalidate>
      <div class="modal-body">
        
                    
                <div class="col-md-12 p-1 position-relative">
                    <label for="validationTooltip01" class="form-label">Nama Akun</label>
                    <input type="text" name = "nama" class="form-control" id="validationTooltip01" placeholder = "Masukkan nama" required>
                    <div class="invalid-tooltip">
                    Masukkan Akun
                    </div>
                </div>
                <div class="col-md-12 p-1 position-relative">
                    <label for="validationTooltip02" class="form-label">Username</label>
                    <input type="text" name = "username" class="form-control" id="validationTooltip02" placeholder = "Masukkan Username" required>
                    <div class="invalid-tooltip">
                    Masukkan Username
                    </div>
                </div>
                <div class="col-md-12 p-1 position-relative">
                    <label for="validationTooltip02" class="form-label">Password</label>
                    <input type="password" name = "password" class="form-control" id="validationTooltip03" placeholder = "Masukkan Password" required>
                    <div class="invalid-tooltip">
                    Masukkan Password
                    </div>
                </div>
                <div class="col-md-12 p-1 position-relative">
                    <label for="validationTooltip02" class="form-label">Email</label>
                    <input type="email" name = "email" class="form-control" id="validationTooltip04" placeholder = "Masukkan Email" required>
                    <div class="invalid-tooltip">
                    Cek Kembali Email
                    </div>
                </div>

                <div class="col-md-12 p-1 position-relative">
                    <label for="validationTooltip02" class="form-label">Level</label>
                    <select name="level" class="form-select" aria-label="Default select example" id="validationTooltip05" required>
                        <option value="" >Pilih Level</option>
                        <option value="1">Admin</option>
                        <option value="2">Operator Siswa</option>
                        <option value="3">Operator Barang</option>
                        
                    </select>
                    <div class="invalid-tooltip">
                    Pilih Level Akun
                    </div>
                </div>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
        <button type="submit" name = "tambah" class="btn btn-primary">Simpan</button>
      </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal Edit -->
<div class="modal fade" id="modalubahakun" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-primary text-white">
        <h1 class="modal-title fs-5 " id="exampleModalLabel">Ubah Data Akun</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="" method = "post" class="row g-3 p-1  needs-validation" novalidate>
      <div class="modal-body">
        
                    
                <div class="col-md-12 p-1 position-relative">
                    <label for="validationTooltip01" class="form-label">Nama Akun</label>
                    <input type="hidden" name = "idakun" class="form-control" id="idakun" required>
                    <input type="text" name = "nama" class="form-control" id="nama" placeholder = "Masukkan nama" required>
                    <div class="invalid-tooltip">
                    Masukkan Akun
                    </div>
                </div>
                <div class="col-md-12 p-1 position-relative">
                    <label for="validationTooltip02" class="form-label">Username</label>
                    <input type="text" name = "username" class="form-control" id="username" placeholder = "Masukkan Username" required>
                    <div class="invalid-tooltip">
                    Masukkan Username
                    </div>
                </div>
                <div class="col-md-12 p-1 position-relative">
                    <label for="validationTooltip02" class="form-label">Password <span style = "color:red;">(Kosongkan Jika Tidak dirubah)</span></label>
                    <input type="password" name = "password" class="form-control" id="password" placeholder = "Masukkan Password">
                    <div class="invalid-tooltip">
                    Masukkan Password
                    </div>
                </div>
                <div class="col-md-12 p-1 position-relative">
                    <label for="validationTooltip02" class="form-label">Email</label>
                    <input type="email" name = "email" class="form-control" id="email" placeholder = "Masukkan Email" required>
                    <div class="invalid-tooltip">
                    Cek Kembali Email
                    </div>
                </div>

                <div class="col-md-12 p-1 position-relative">
                    <label for="validationTooltip02" class="form-label">Level</label>
                    <select name="level" class="form-select" aria-label="Default select example" id="level" required>
                        <option value="" >Pilih Level</option>
                        <option value="1">Admin</option>
                        <option value="2">Operator Siswa</option>
                        <option value="3">Operator Barang</option>
                        
                    </select>
                    <div class="invalid-tooltip">
                    Pilih Level Akun
                    </div>
                </div>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
        <button type="submit" name = "ubah" class="btn btn-primary">Simpan</button>
      </div>
      </form>
    </div>
  </div>
</div>

    <script>
       new DataTable('#tabelakun');

    </script>

<script type ="text/javascript">
$(document).on("click", "#ubah3", function()
  {
    let idakun = $(this).data('idakun');
    let nama = $(this).data('nama');
    let username = $(this).data('username');
    
    let email = $(this).data('email');
    let level = $(this).data('level');
    
  
    $("#idakun").val(idakun);
    $("#nama").val(nama);
    $("#username").val(username);
    
    $("#email").val(email);
    $("#level").val(level);
   
   
  }
)
    
</script>