<?php 
include('library.php'); //include file library.php
$lib = new Library(); //membuat object $lib menggunakan class library
$data_mahasiswa = $lib->show(); //membuat $data_siswa untuk menyimpan pengembalian saat mengakses method show()
 
if(isset($_GET['hapus_mahasiswa']))
{
    $kd_mahasiswa = $_GET['hapus_mahasiswa'];
    $status_hapus = $lib->delete($kd_mahasiswa);
    if($status_hapus)
    {
        header('Location: index.php');
    }
}
?>
<html>
    <head>
        <title></title>
        <link rel="stylesheet" href="">
    </head>
    <body>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h3>Data Mahasiswa</h3>
            </div>
            <div class="card-body">
                <a href="form_add.php" class="tombol_add">Tambah</a>
                <hr/>
                <table class="table" width="60%">
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Kelas</th>
                        <th>Alamat</th>
                        <th>Action</th>
                    </tr>
                    <?php 
                    $no = 1;
                    foreach($data_mahasiswa as $row) //perintah untuk mengambil data dari $data_siswa
                    {
                        echo "<tr>";
                        echo "<td>".$no."</td>";
                        echo "<td>".$row['nama_mahasiswa']."</td>";
                        echo "<td>".$row['kelas_mahasiswa']."</td>";
                        echo "<td>".$row['alamat_mahasiswa']."</td>";
                        echo "<td><a class='tombol' href='form_edit.php?kd_mahasiswa=".$row['kd_mahasiswa']."'>Update</a>
                        <a class='tombol' href='index.php?hapus_mahasiswa=".$row['kd_mahasiswa']."'>Hapus</a></td>";
                        echo "</tr>";
                        $no++;
                    }
                    ?>
                </table>
            </div>
        </div>
    </div>
    </body>
</html>
