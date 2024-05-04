<?php
include "config/batasan.php";
//cek level user 
if($_SESSION['level'] == 1 or $_SESSION['level'] == 2)
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
?>
<?php
// Check if form is submitted
if(isset($_POST['delete'])){
    // Process delete operation
    $id = $_POST['nis']; // Assuming id is passed via POST method
    $namasiswa = $_POST['namasiswa'];
    // Here you can put your delete operation
    // For example, you can execute a SQL DELETE query

    // Display success message using SweetAlert
    echo "<script>
                swal({
                    title: 'Hapus Data ($namasiswa)!',
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
                        
                        window.location = 'index.php?p=hapus_siswa&id=$id';
                        
                    } else {

                    swal('Cancelled', 'Data Anda Tidak Terhapus', 'error');
                    }
                });
          </script>";
}
?>


<!-- Breadcrumb -->
<nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="index.html">Home</a></li>
              <!-- <li class="breadcrumb-item"><a href="javascript:void(0)">Siswa</a></li> -->
              <li class="breadcrumb-item active" aria-current="page">Detail Siswa</li>
            </ol>
          </nav>
          <!-- /Breadcrumb -->


<div class = "col-md-12" style = "text-align:right;"><a href="index.php?p=tambahsiswa">  <button type="button" class="btn btn-primary"> <i class="fa-solid fa-user-plus"></i> Tambah Siswa</button></a></div>

<div class="shadow-none p-2 mt-2 bg-secondary text-light rounded">Data Siswa UP SMK</div>
    <div class="table-responsive shadow p-3 mb-5 bg-body rounded">
    
    <table id="tabelsiswa" class="table table-hover">
            <thead>
            <tr >
            <th scope="col">No</th>
            <th scope="col">NIS</th>
            <th scope="col">Nama Siswa</th>
            <th scope="col">Jenis Kelamin</th>
            <th scope="col">Alamat</th>
            <th scope="col">Tanggal Lahir</th>
            <th scope="col" style = "text-align:center; width:25%;">Aksi</th>
            
            </tr>
        </thead>
        <tbody>
        <?php 
            //query data barang
            $data_siswa = select("SELECT * FROM siswa");
            $no = 1;
        ?>
       <?php foreach($data_siswa as $siswa): ?>
                    <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $siswa['nis']; ?></td>
                    <td><?php echo $siswa['namasiswa']; ?></td>
                    <td><?php echo jenkel($siswa['jk']); ?></td>
                    <td><?php echo $siswa['alamat']; ?></td>
                    <td><?php echo date("d-m-Y", strtotime($siswa['tanggal_lahir'])); ?></td>
                    <td align="center">
                    <form method="post" action="">
                        <a href = "index.php?p=detailsiswa&id=<?php echo $siswa['nis']; ?>">
                         <button type="button" name="ubah3" class="btn btn-warning"><i class="fa-solid fa-eye" style="color: #ffffff;"></i> Detail</button>
                        </a>
                       
                     <!-- Assuming id of the item to be deleted is 1 -->
                     <input type="hidden" name="nis" value="<?php echo $siswa['nis']; ?>">
                     <input type="hidden" name="namasiswa" value="<?php echo $siswa['namasiswa']; ?>">
                         <button type="submit" name="delete" class="btn btn-danger"><i class="fa-solid fa-trash" style="color: #ffffff;"></i> Hapus</button>
                     </form>
                </td>
                </tr>
         
        <?php endforeach; ?>
       
            
            
        </tbody>
    </table>
    </div>
    <script>
       new DataTable('#tabelsiswa');
    </script>