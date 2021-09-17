<?php
class Library 
{
    public function __construct() //perintah untuk terkoneksi dengan database
    {
        $host = "localhost"; //$host digunakan untuk menyimpan alamat server database
        $dbname = "db_mahasiswa"; //$dbname digunakan untuk menyimpan db_mahasiswa
        $username = "root"; // $username digunakan untuk menyimpan username
        $password = ""; //menggunakan PDO untuk melakukan koneksi ke database, disertai parameter sebelumnya
        $this->db = new PDO("mysql:host={$host};dbname={$dbname}", $username, $password);
    }
    public function add_data($nama_mahasiswa, $kelas_mahasiswa, $alamat_mahasiswa)
    {
        $data = $this->db->prepare('INSERT INTO tb_mahasiswa1 (nama_mahasiswa,kelas_mahasiswa,alamat_mahasiswa) VALUES (?, ?, ?)'); //membuat query insert, jumlah tanda tanya disamakan dengan kolom isi.
        
        $data->bindParam(1, $nama_mahasiswa); //variable penampung
        $data->bindParam(2, $kelas_mahasiswa); //mengisikan nilai pada tanda tanya tersebut menggunakan bindPram
        $data->bindParam(3, $alamat_mahasiswa);
 
        $data->execute(); //query untuk menjalankan perintah line 16-18.
        return $data->rowCount();
    }
    public function show()
    {
        $query = $this->db->prepare("SELECT * FROM tb_mahasiswa1");
        $query->execute(); // menjalankan perintah query
        $data = $query->fetchAll(); //$query->fetchAll() untuk hasil querynya dan masuk ke database
        return $data;
    }
 
    public function get_by_id($kd_mahasiswa){ //fungsi ini digunakan untuk menampilkan data siswa sesuai kd_mahasiswa yang akan direturn ke form_edit.php
        $query = $this->db->prepare("SELECT * FROM tb_mahasiswa1 where kd_mahasiswa=?");
        $query->bindParam(1, $kd_mahasiswa);
        $query->execute();
        return $query->fetch();
    }
 
    public function update($kd_mahasiswa,$nama_mahasiswa,$kelas_mahasiswa,$alamat_mahasiswa){
        $query = $this->db->prepare('UPDATE tb_mahasiswa1 set nama_mahasiswa=?,kelas_mahasiswa=?,alamat_mahasiswa=? where kd_mahasiswa=?');
        
        $query->bindParam(1, $nama_mahasiswa);
        $query->bindParam(2, $kelas_mahasiswa);
        $query->bindParam(3, $alamat_mahasiswa);
        $query->bindParam(4, $kd_mahasiswa);
 
        $query->execute();
        return $query->rowCount();
    }
 
    public function delete($kd_mahasiswa)
    {
        $query = $this->db->prepare("DELETE FROM tb_mahasiswa1 where kd_mahasiswa=?");
 
        $query->bindParam(1, $kd_mahasiswa);
 
        $query->execute();
        return $query->rowCount();
    }

    public function __destruct() //menggunakan destruct pada akhir untuk menampilkan kalimat pada echo
    {
        echo "Pastikan Kembali Data yang Anda Input Benar";
    }
 
}

class mahasiswa extends Library {
    public function message() {
      echo "Hallo Mahasiswa Universitas Sebelas Maret";
    }
  }
  $mahasiswa = new mahasiswa("mahasiswa", "UNS");
  $mahasiswa->message();
  $mahasiswa->show();

?>
