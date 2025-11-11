<?php

if(isset($_POST['tambah'])){ //jika tambah
    //ambil inputan
    $nama = $_POST['nama'];
    $no = $_POST['no_hp'];
    $alamat = $_POST['alamat'];
    $peminjam->tambahPeminjam($nama, $no, $alamat); //panggil fungsi tambahPeminjam
    header("Location: ?page=peminjam");
    exit;
}

if(isset($_POST['update'])){ //jika update
    //ambil inputan
    $id = $_POST['id_peminjam'];
    $nama = $_POST['nama'];
    $no = $_POST['no_hp'];
    $alamat = $_POST['alamat'];
    $peminjam->updatePeminjam($id, $nama, $no, $alamat); //panggil fungsi updatePeminjam
    header("Location: ?page=peminjam");
    exit;
}

if(isset($_GET['hapus'])){ //jika hapus
    $id = $_GET['hapus'];
    $peminjam->hapusPeminjam($id); //hapus peminjam dengan id tersebut
    header("Location: ?page=peminjam");
    exit;
}

$editPeminjam = null;
if(isset($_GET['edit'])){ //jika edit
    $id = $_GET['edit'];
    $editPeminjam = $peminjam->getPeminjamId($id); //ambil data yang ingin di edit 
}
?>

<hr>
<h3><?= $editPeminjam ? 'Edit' : 'Tambah' ?> Peminjam Musik</h3>
<form method="POST">
    <?php if ($editPeminjam): ?>
        <input type="hidden" name="id_peminjam" value="<?= $editPeminjam['id_peminjam'] ?>">
    <?php endif; ?>

    <label>Nama:</label><br>
    <input type="text" name="nama" value="<?= $editPeminjam['nama'] ?? '' ?>" required><br>

    <label>No Handphone:</label><br>
    <input type="text" name="no_hp" value="<?= $editPeminjam['no_hp'] ?? '' ?>" required><br>

    <label>Alamat:</label><br>
    <input type="text" name="alamat" value="<?= $editPeminjam['alamat'] ?? '' ?>" required><br><br>

    <button type="submit" name="<?= $editPeminjam ? 'update' : 'tambah' ?>">
        <?= $editPeminjam ? 'Simpan' : 'Tambah' ?>
    </button>
</form>

<h3>Peminjam List</h3>
<table border="1">
    <tr>
        <th>ID</th>
        <th>Nama</th>
        <th>Phone</th>
        <th>Alamat</th>
        <th>Aksi</th>
    </tr>
    <?php foreach ($peminjam->tampilkanPeminjam() as $p): ?>
    <tr>
        <td><?= $p['id_peminjam'] ?></td>
        <td><?= $p['nama'] ?></td>
        <td><?= $p['no_hp'] ?></td>
        <td><?= $p['alamat'] ?></td>
        <td>
            <a href="?page=peminjam&edit=<?= $p['id_peminjam'] ?>">Edit</a> |
            <a href="?page=peminjam&hapus=<?= $p['id_peminjam'] ?>" onclick="return confirm('Yakin hapus data ini?')">Hapus</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>


