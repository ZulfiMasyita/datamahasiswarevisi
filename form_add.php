<?php 
include('library.php');
$lib = new Library(); //membuat object $lib menggunakan class library
if(isset($_POST['tombol_tambah'])){ //pengecekan apakah menggunakan perintah isset, jika tombol di klik maka menjalankan kode baris 5 – 7
    $nama_mahasiswa = $_POST['nama_mahasiswa']; //menangkap isi dari inputan nama_siswa, kelas dan alamat
    $kelas_mahasiswa = $_POST['kelas_mahasiswa'];
    $alamat_mahasiswa = $_POST['alamat_mahasiswa'];
 
    $add_status = $lib->add_data($nama_mahasiswa, $kelas_mahasiswa, $alamat_mahasiswa); //mengakses method add_data pada class library 
    if($add_status){
    header('Location: index.php');
    }
}
?>
<html>
    <head>
        <title></title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h3>Tambah Data Mahasiswa</h3>
            </div>
            <div class="card-body">
            <form method="post" action="">
                <div class="form-group row">
                    <label for="nama_mahasiswa" class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-10">
                    <input type="text" name="nama_mahasiswa" class="form-control" id="nama_mahasiswa">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="kelas_mahasiswa" class="col-sm-2 col-form-label">Kelas</label>
                    <div class="col-sm-10">
                    <input type="text" name="kelas_mahasiswa" class="form-control" id="kelas_mahasiswa">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="alamat_mahasiswa" class="col-sm-2 col-form-label">Alamat</label>
                    <div class="col-sm-10">
                    <textarea class="form-control" name="alamat_mahasiswa" id="alamat_mahasiswa"></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="alamat_mahasiswa" class="col-sm-2 col-form-label"></label>
                    <div class="col-sm-10">
                    <input type="submit" name="tombol_tambah" class="tombol_add" value="Tambah">
                    </div>
                </div>
            </form>
            </div>
        </div>
    </div>
    </body>
</html>