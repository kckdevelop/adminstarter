<!-- Breadcrumb -->
<?php
include "config/batasan.php";
?>
<nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <!-- <li class="breadcrumb-item"><a href="javascript:void(0)">Siswa</a></li> -->
              <!-- <li class="breadcrumb-item active" aria-current="page">Data Akun</li> -->
            </ol>
          </nav>
          <!-- /Breadcrumb -->



  <div class="accordion" id="accordionPanelsStayOpenExample">
  <div class="accordion-item">
    <h2 class="accordion-header">
      <button class="accordion-button bg-secondary text-light" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
        Hak Cipta dan Legalitas
      </button>
    </h2>
    <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show">
      <div class="accordion-body">
        Aplikasi Ini dibuat untuk keperluan diklat Pemrograman WEB di BBPPMPV MTI, aplikasi ini dibuat berdasarkan modul diklat Pemrograman WEB di BBPPMPV BMTI.
      </div>
    </div>
  </div>
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
                    
                </tr>
         
        <?php endforeach; ?>
       
            
            
        </tbody>
    </table>

    </div>
    
    <script>
       new DataTable('#tabelbarang');
    </script>
  
</div>