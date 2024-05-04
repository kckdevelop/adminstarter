<?php
function jenkel($jenkel)
{ 
  if($jenkel == 'L')
  { 
    $jk = 'Laki - Laki';
    return $jk;
  }
  else
  {
    $jk = 'Perempuan';
    return $jk;
  }
}
function level($level)
{ 
  if($level == '1')
  { 
    $levelbaru = 'Admin';
    return $levelbaru;
  }
  if($level == '2')
  { 
    $levelbaru = 'Operator Siswa';
    return $levelbaru;
  }
  if($level == '3')
  { 
    $levelbaru = 'Operator Barang';
    return $levelbaru;
  }
  else
  {
    $levelbaru = '0';
    return $levelbaru;
  }
}
function rupiah($angka) {
    $hasil = 'Rp ' . number_format($angka, 2, ",", ".");
    return $hasil;
}
function tglindo($tanggal)
{
    $tglbaru = date("d-m-Y | H:i:s", strtotime($tanggal));
    return $tglbaru;
}
function select($query)
{
    global $koneksi;
    $result = mysqli_query($koneksi,$query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result))
    {
        $rows[] = $row;
    }
    return $result;
}
function selectubah($query)
{
    global $koneksi;
    $result = mysqli_query($koneksi,$query);
    
    $row = mysqli_fetch_assoc($result);
    
    return $row;
}
function create_barang($post){
  global $koneksi;

  $nama = $post['nama'];
  $jumlah = $post['jumlah'];
  $harga = $post['harga'];

  //query tambah barang
  $query = "INSERT INTO barang VALUES (null,'$nama','$jumlah','$harga',CURRENT_TIMESTAMP())";
  mysqli_query($koneksi, $query);
  return mysqli_affected_rows($koneksi);
}

function update_barang($post)
{
  global $koneksi;
  $idbarang = $post['idbarang'];
  $nama = $post['nama'];
  $jumlah = $post['jumlah'];
  $harga = $post['harga'];

  $query2 = "UPDATE barang SET nama = '$nama', jumlah = '$jumlah', harga = '$harga'
  WHERE idbarang = '$idbarang'
  ";
  mysqli_query($koneksi, $query2);
  return mysqli_affected_rows($koneksi);

}

function create_siswa($post){
  global $koneksi;

  $nis = $post['nis'];
  $nama = $post['nama'];
  $jenkel = $post['jenkel'];
  $alamat = $post['alamat'];
  $tanggal = $post['tanggallahir'];
  $foto = uploadfoto();

  //query tambah barang
  $query = "INSERT INTO siswa VALUES ('$nis','$nama','$jenkel','$alamat','$tanggal','$foto')";
  mysqli_query($koneksi, $query);
  return mysqli_affected_rows($koneksi);
}

function uploadfoto(){
  $namaFile   = $_FILES['foto']['name'];
    $ukuranFile = $_FILES['foto']['size'];
    $error      = $_FILES['foto']['error'];
    $tmpName    = $_FILES['foto']['tmp_name'];

    // check file yang diupload
    $extensifileValid = ['jpg', 'jpeg', 'png'];
    $extensifile      = explode('.', $namaFile);
    $extensifile      = strtolower(end($extensifile));

    // check format/extensi file
    if (!in_array($extensifile, $extensifileValid)) {

        // pesan gagal
        echo "<script>
                alert('Format File Tidak Valid');
                window.history.back();
              </script>";
        die();
    }

    // check ukuran file 20 mb
    if ($ukuranFile > 20048000) {

        // pesan gagal
        echo "<script>
                alert('Ukuran File Max 2 MB');
                window.history.back();
              </script>";
        die();
    }

    // generate nama file baru
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $extensifile;

    // pindahkan ke folder local 
    move_uploaded_file($tmpName, 'assets/foto/' . $namaFileBaru);
    return $namaFileBaru;

}


function ubahfoto(){
  global $koneksi;
  $namaFile   = $_FILES['foto']['name'];
    $ukuranFile = $_FILES['foto']['size'];
    $error      = $_FILES['foto']['error'];
    $tmpName    = $_FILES['foto']['tmp_name'];

    // check file yang diupload
    $extensifileValid = ['jpg', 'jpeg', 'png'];
    $extensifile      = explode('.', $namaFile);
    $extensifile      = strtolower(end($extensifile));

    // check format/extensi file
    if (!in_array($extensifile, $extensifileValid)) {

        // pesan gagal
        echo "<script>
                alert('Format File Tidak Valid');
                window.history.back();
              </script>";
        die();
    }

    // check ukuran file 20 mb
    if ($ukuranFile > 20048000) {

        // pesan gagal
        echo "<script>
                alert('Ukuran File Max 2 MB');
                window.history.back();
              </script>";
        die();
    }

    // generate nama file baru
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $extensifile;

    // pindahkan ke folder local 
    move_uploaded_file($tmpName, 'assets/foto/' . $namaFileBaru);

    
    return $namaFileBaru;

}


function detailsiswa($query)
{
    global $koneksi;
    $result = mysqli_query($koneksi,$query);
    
    $row = mysqli_fetch_assoc($result);
    
    return $row;
}
function update_siswa($post)
{
  global $koneksi;
  $nis = $post['nis'];
  $namasiswa = $post['namasiswa'];
  $jenkel= $post['jenkel'];
  $alamat = $post['alamat'];
  $tanggal_lahir = $post['tanggal_lahir'];

  $query2 = "UPDATE siswa SET namasiswa = '$namasiswa', jk = '$jenkel', alamat = '$alamat', tanggal_lahir = '$tanggal_lahir'
  WHERE nis = '$nis'
  ";
  mysqli_query($koneksi, $query2);
  return mysqli_affected_rows($koneksi);

}

function create_akun($post){
  global $koneksi;

  $nama = $post['nama'];
  $username = $post['username'];
  $password_awal = $post['password'];
  $email = $post['email'];
  $level = $post['level'];
  $password = password_hash($password_awal, PASSWORD_DEFAULT);

  //query tambah barang
  $query = "INSERT INTO akun VALUES (null,'$nama','$username','$email','$password','$level')";
  mysqli_query($koneksi, $query);
  return mysqli_affected_rows($koneksi);
}

function ubah_akun_password($post)
{
  global $koneksi;
  $idakun = $post['idakun'];
  $nama = $post['nama'];
  $password_awal = $post['password'];
  $username = $post['username'];
  $email = $post['email'];
  $level = $post['level'];
  $password = password_hash($password_awal, PASSWORD_DEFAULT);

  $query2 = "UPDATE akun SET nama = '$nama', username = '$username', email = '$email',password = '$password', level = '$level'
  WHERE idakun = '$idakun'
  ";
  mysqli_query($koneksi, $query2);
  return mysqli_affected_rows($koneksi);

}
function ubah_akun($post)
{
  global $koneksi;
  $idakun = $post['idakun'];
  $nama = $post['nama'];

  $username = $post['username'];
  $email = $post['email'];
  $level = $post['level'];


  $query2 = "UPDATE akun SET nama = '$nama', username = '$username', email = '$email', level = '$level'
  WHERE idakun = '$idakun'
  ";
  mysqli_query($koneksi, $query2);
  return mysqli_affected_rows($koneksi);

}

?>