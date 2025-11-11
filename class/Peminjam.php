<?php 
require_once 'config/db.php';

class Peminjam {
    private $db;

    public function __construct(){
        $this->db = (new Database()) ->conn;
    }

    //untuk mengambil id dari tabel peminja
    public function getPeminjamId($Id){
    $stmt = $this->db->prepare("SELECT * FROM peminjam WHERE id_peminjam = ?");
     $stmt->execute([$Id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    
    //untuk menampilkan semua data pada tabel peminjam
    public function tampilkanPeminjam(){
        $stmt = $this->db->query("SELECT * FROM peminjam");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    //untuk mengupdate data peminjam
    public function updatePeminjam($id, $nama, $no_hp, $alamat){
        $stmt = $this->db->prepare("UPDATE peminjam SET nama = ?, no_hp = ?, alamat =? 
        WHERE id_peminjam = ?");
        return $stmt->execute([$nama, $no_hp, $alamat, $id]);
    }

    //untuk menambahkan data pada tabel peminjam
    public function tambahPeminjam($nama, $no_hp, $alamat){
        $stmt = $this->db->prepare("INSERT INTO peminjam (nama, no_hp, alamat) VALUES (?, ?, ?)");
        return $stmt->execute([$nama, $no_hp, $alamat]);
    }

    //untuk menghapus data pada tabel peminjam
    public function hapusPeminjam($id){
        $stmt = $this->db->prepare("DELETE FROM peminjam WHERE id_peminjam = ?");
        return $stmt->execute([$id]);
    }
}
?>