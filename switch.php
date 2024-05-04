<?php
//ambil data p
@$page = addslashes($_GET['p']);

//percabangan
if(!empty($page))
{
    if($page == "databarang")
        {
            include "databarang.php";
        }
    elseif($page == "datasiswa")
        {
            include "datasiswa.php";
        }
    elseif($page =='tambah_barang')
    {
        include "tambah_barang.php";
    }
    elseif($page =='ubah_barang')
    {
        include "ubah_barang.php";
    }
    elseif($page =='hapus_barang')
    {
        include "hapus_barang.php";
    }
    elseif($page =='tambahsiswa')
    {
        include "tambahsiswa.php";
    }
    elseif($page =='detailsiswa')
    {
        include "detailsiswa.php";
    }
    elseif($page =='hapus_siswa')
    {
        include "hapus_siswa.php";
    }

    //menu akun
    elseif($page =='akunmodal')
    {
        include "akunmodal.php";
    }
    elseif($page =='hapus_akun')
    {
        include "hapusakun.php";
    }

    else
        {
            include "awal.php";
        }
}

else
{
    include "awal.php";
}
?>