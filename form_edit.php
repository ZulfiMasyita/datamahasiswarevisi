<?php 
include('library.php');
$lib = new Library(); //membuat object $lib menggunakan class library
if(isset($_GET['kd_mahasiswa'])){ //mengecek saat file ini diakses, jika iya maka akan menjalankan line 5-6, jika tidak maka akan Kembali ke index.php
    $kd_mahasiswa = $_GET['kd_mahasiswa']; //menangkap isi dari kd_mahasiswa dan menyimpannya
    $data_mahasiswa = $lib->get_by_id($kd_mahasiswa); // telah mendapatkan data siswa yang diinginkan dan simpan di $data_siswa
}
else
{
    header('Location: index.php');
}

if(isset($_POST['tombol_update'])){
    $kd_mahasiswa = $_POST['kd_mahasiswa'];
    $nama_mahasiswa = $_POST['nama_mahasiswa'];
    $kelas_mahasiswa = $_POST['kelas_mahasiswa'];
    $alamat_mahasiswa = $_POST['alamat_mahasiswa']; 
    $status_update = $lib->update($kd_mahasiswa,$nama_mahasiswa,$kelas_mahasiswa,$alamat_mahasiswa);
    if($status_update)
    {
        header('Location:index.php');
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
                <h3>Update Data Mahasiswa</h3>
            </div>
            <div class="card-body">
            <form method="post" action="">
                <input type="hidden" name="kd_mahasiswa" value="<?php echo $data_mahasiswa['kd_mahasiswa']; ?>"/> 
                <div class="form-group row">
                    <label for="nama_mahasiswa" class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-10">
                    <input type="text" name="nama_mahasiswa" class="form-control" id="nama_mahasiswa" value="<?php echo $data_mahasiswa['nama_mahasiswa']; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="kelas_mahasiswa" class="col-sm-2 col-form-label">Kelas</label>
                    <div class="col-sm-10">
                    <input type="text" value="<?php echo $data_mahasiswa['kelas_mahasiswa']; ?>" name="kelas_mahasiswa" class="form-control" id="kelas_mahasiswa">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="alamat_mahasiswa" class="col-sm-2 col-form-label">Alamat</label> 
                    <div class="col-sm-10">
                    <textarea class="form-control" name="alamat_mahasiswa" id="alamat_mahasiswa"><?php echo $data_mahasiswa['alamat_mahasiswa']; ?></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="alamat_mahasiswa" class="col-sm-2 col-form-label"></label>
                    <div class="col-sm-10">
                    <input type="submit" name="tombol_update" class="tombol_add" value="Update">
                    </div>
                </div>
            </form>
            </div>
        </div>
    </div>
    </body>
</html>