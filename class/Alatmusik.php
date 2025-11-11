<?php 
require_once 'config/db.php';

class Alatmusik {
    private $db;

    public function __construct(){
        $this->db = (new Database()) ->conn;
    }

    //fungsi untuk mengambil id dari alat musik
    public function getAlatId($id) {
    $stmt = $this->db->prepare("SELECT * FROM alat_musik WHERE id_alat = ?");
    $stmt->execute([$id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

    //untuk menampilkan semua data pada tabel alat musik
    public function tampilkanAlat(){
        $stmt = $this->db->query("SELECT * FROM alat_musik");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    //untuk update data tabel alat
    public function updateAlat($id, $merk, $jenis, $stok){
        $stmt = $this->db->prepare("UPDATE alat_musik SET merk = ?, jenis = ?, stok =? 
        WHERE id_alat = ?");
        return $stmt->execute([$merk, $jenis, $stok, $id]);
    }

    //untuk menambhakn data pada tabel alat 
    public function tambahAlat($merk, $jenis, $stok){
        $stmt = $this->db->prepare("INSERT INTO alat_musik (merk, jenis, stok) VALUES (?, ?, ?)");
        return $stmt->execute([$merk, $jenis, $stok]);
    }

    //untuk menghapus data pada tabel alat
    public function hapusAlat($id){
        $stmt = $this->db->prepare("DELETE FROM alat_musik WHERE id_alat = ?");
        return $stmt->execute([$id]);
    }
}
?>