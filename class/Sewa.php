<?php 
require_once 'config/db.php';

class Sewa {
    private $db;

    public function __construct(){
        $this->db = (new Database()) ->conn;
    }

    //untuk mengambil id pada tabel sewa
    public function getSewaId($Id){
    $stmt = $this->db->prepare("SELECT * FROM sewa WHERE id_sewa = ?");
    $stmt->execute([$Id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    //untuk menampilkan semua data pada tabel sewa
    public function tampilkanSewa(){
        $stmt = $this->db->query("SELECT sewa.*, peminjam.nama, alat_musik.merk, tanggal_pinjam, tanggal_kembali, status
        FROM sewa
        JOIN peminjam ON sewa.id_peminjam = peminjam.id_peminjam
        JOIN alat_musik ON sewa.id_alat = alat_musik.id_alat");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    //untuk mengupdate data pada tabel sewa
    public function updateSewa($id, $id_peminjam, $id_alat, $tanggal_pinjam, $tanggal_kembali, $status){
        $stmt = $this->db->prepare("UPDATE sewa SET id_peminjam = ?, id_alat = ?, tanggal_pinjam =?, tanggal_kembali=?, status=?
        WHERE id_sewa = ?");
        return $stmt->execute([$id_peminjam, $id_alat, $tanggal_pinjam, $tanggal_kembali,$status, $id]);
    }

    //untuk menambah data pada tabel sewa
    public function tambahSewa($id_peminjam, $id_alat, $tanggal_pinjam, $tanggal_kembali, $status){
        $stmt = $this->db->prepare("INSERT INTO sewa (id_peminjam, id_alat, tanggal_pinjam, tanggal_kembali, status) VALUES (?, ?, ?, ?, ?)");
        return $stmt->execute([$id_peminjam, $id_alat, $tanggal_pinjam, $tanggal_kembali, $status]);
    }

    //untuk menghapus data pada tabel sewa
    public function hapusSewa($id){
        $stmt = $this->db->prepare("DELETE FROM sewa WHERE id_sewa = ?");
        return $stmt->execute([$id]);
    }
}
?>