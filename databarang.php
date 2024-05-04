<?php
include "config/batasan.php";

//cek level user 
if($_SESSION['level'] == 1 or $_SESSION['level'] == 3)
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
    $id = $_POST['idbarang']; // Assuming id is passed via POST method
    $namabarang = $_POST['nama_barang'];
    // Here you can put your delete operation
    // For example, you can execute a SQL DELETE query

    // Display success message using SweetAlert
    echo "<script>
                swal({
                    title: 'Hapus Data ($namabarang)!',
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
                        
                        window.location = 'index.php?p=hapus_barang&id=$id';
                        
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
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <!-- <li class="breadcrumb-item"><a href="javascript:void(0)">Siswa</a></li> -->
              <li class="breadcrumb-item active" aria-current="page">Data Barang</li>
            </ol>
          </nav>
          <!-- /Breadcrumb -->

<div class = "col-md-12" style = "text-align:right;"><a href="index.php?p=tambah_barang"><button type="button" class="btn btn-primary"> <i class="fa-solid fa-plus"></i> Tambah Data</button></a></div>


<div class="shadow-none p-2 mt-2 bg-secondary text-light rounded">Data Barang UP SMK</div>
    <div class="table-responsive shadow p-3 mb-5 bg-body rounded">
    <table id="tabelbarang" class="table datatable table-hover">
            <thead>
            <tr >
            <th scope="col">No</th>
            <th scope="col">Kode barang</th>
            <th scope="col">Nama Barang</th>
            <th scope="col">Jumlah Barang</th>
            <th scope="col">Harga Barang</th>
            <th scope="col">Tanggal | Jam</th>
            <th scope="col" style = "text-align:center; width:20%;">Aksi</th>
            
            </tr>
        </thead>
        <tbody>
        <?php 
            //query data barang
            $data_barang = select("SELECT * FROM barang");
            $no = 1;
        ?>
       <?php foreach($data_barang as $data): ?>
                    <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $data['idbarang']; ?></td>
                    <td><?php echo $data['nama']; ?></td>
                    <td><?php echo $data['jumlah']; ?></td>
                    <td><?php echo rupiah($data['harga']); ?></td>
                    <td><?php echo tglindo($data['tanggal']); ?></td>
                    <td align="center">
                    

                    <form method="post" action="">
                         
                        <a href = "index.php?p=ubah_barang&id=<?php echo $data['idbarang']; ?>"> 
                        
                        <button type="button" name="ubah2" class="btn btn-info"><i class="fa-solid fa-pen-to-square" style="color: #ffffff;"></i> Ubah</button></a>
                    <!-- Assuming id of the item to be deleted is 1 -->
                    <input type="hidden" name="idbarang" value="<?php echo $data['idbarang']; ?>">
                    <input type="hidden" name="nama_barang" value="<?php echo $data['nama']; ?>">
                        <button type="submit" name="delete" class="btn btn-danger"><i class="fa-solid fa-trash" style="color: #ffffff;"></i> Hapus</button>
                    </form>

                </td>
                </tr>
         
        <?php endforeach; ?>
       
            
            
        </tbody>
    </table>

    </div>
    
    <script>
       new DataTable('#tabelbarang');
    </script>