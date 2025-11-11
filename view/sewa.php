<?php

if(isset($_POST['tambah'])){ //jika tambah 
    //ambil inputan
    $idp = $_POST['id_peminjam'];
    $ida = $_POST['id_alat'];
    $tglpnjm = $_POST['tanggal_pinjam'];
    $tglkmbl = $_POST['tanggal_kembali'];
     $status = $_POST['status'];
    $sewa->tambahSewa($idp, $ida, $tglpnjm, $tglkmbl, $status); //panggil fungsi tambahSewa
    header("Location: ?page=sewa");
    exit;
}

if(isset($_POST['update'])){ //jika update
    //ambil inputan yang ingin di update
    $id = $_POST['id_sewa'];
    $idp = $_POST['id_peminjam'];
    $ida = $_POST['id_alat'];
    $tglpnjm = $_POST['tanggal_pinjam'];
    $tglkmbl = $_POST['tanggal_kembali'];
     $status = $_POST['status'];
    $sewa->updateSewa($id,$idp, $ida, $tglpnjm, $tglkmbl, $status); //panggil fungsi update
    header("Location: ?page=sewa");
    exit;
}

if(isset($_GET['hapus'])){ //jika hapus
    $id = $_GET['hapus'];
    $sewa->hapusSewa($id); //hapus data sewa dengan id tersebut
    header("Location: ?page=sewa");
    exit;
}

$editSewa = null;
if(isset($_GET['edit'])){ //jika edit
    $id = $_GET['edit'];
    $editSewa = $sewa->getSewaId($id); //ambil data dengan id yang ingin di edit
}
?>

<hr>

<h3><?= $editSewa ? 'Edit' : 'Tambah' ?> Data Sewa</h3>
<form method="POST">
    <?php if ($editSewa): ?>
        <input type="hidden" name="id_sewa" value="<?= $editSewa['id_sewa'] ?>">
    <?php endif; ?>

    <label>Peminjam:</label><br>
    <select name="id_peminjam" required>
        <option value="">-- Pilih Peminjam --</option>
        <?php foreach ($peminjam->tampilkanPeminjam() as $p): ?>
            <option value="<?= $p['id_peminjam'] ?>" 
                <?= isset($editSewa) && $editSewa['id_peminjam'] == $p['id_peminjam'] ? 'selected' : '' ?>>
                <?= $p['nama'] ?>
            </option>
        <?php endforeach; ?>
    </select><br>

    <label>Alat Musik:</label><br>
    <select name="id_alat" required>
        <option value="">-- Pilih Alat --</option>
        <?php foreach ($alat->tampilkanAlat() as $a): ?>
            <option value="<?= $a['id_alat'] ?>" 
                <?= isset($editSewa) && $editSewa['id_alat'] == $a['id_alat'] ? 'selected' : '' ?>>
                <?= $a['merk'] ?> (<?= $a['jenis'] ?>)
            </option>
        <?php endforeach; ?>
    </select><br>

    <label>Tanggal Pinjam:</label><br>
    <input type="date" name="tanggal_pinjam" value="<?= $editSewa['tanggal_pinjam'] ?? '' ?>" required><br>

    <label>Tanggal Kembali:</label><br>
    <input type="date" name="tanggal_kembali" value="<?= $editSewa['tanggal_kembali'] ?? '' ?>"><br>

    <label>Status:</label><br>
    <select name="status" required>
        <option value="Dipinjam" <?= isset($editSewa) && $editSewa['status'] == 'Dipinjam' ? 'selected' : '' ?>>Dipinjam</option>
        <option value="Selesai" <?= isset($editSewa) && $editSewa['status'] == 'Selesai' ? 'selected' : '' ?>>Selesai</option>
    </select><br><br>

    <button type="submit" name="<?= $editSewa ? 'update' : 'tambah' ?>">
        <?= $editSewa ? 'Simpan' : 'Tambah' ?>
    </button>
</form>

<h3>List Penyewa</h3>
<table border="1">
    <tr>
        <th>ID</th>
        <th>Nama</th>
        <th>Alat</th>
        <th>Tanggal Sewa</th>
        <th>Tanggal Kembali</th>
        <th>status</th>
        <th>Aksi</th>
    </tr>
    <?php foreach ($sewa->tampilkanSewa() as $s): ?>
    <tr>
        <td><?= $s['id_sewa'] ?></td>
        <td><?= $s['nama'] ?></td>
        <td><?= $s['merk'] ?></td>
        <td><?= $s['tanggal_pinjam'] ?></td>
        <td><?= $s['tanggal_kembali'] ?? 'Belum Kembali' ?></td>
        <td>
              <?php if ($s['status'] == 'Dipinjam'): ?>
                <span>Dipinjam</span>
            <?php else: ?>
                <span>Selesai</span>
            <?php endif; ?>
        </td>
         <td>
             <a href="?page=sewa&edit=<?= $s['id_sewa'] ?>">Edit</a> |
            <a href="?page=sewa&hapus=<?= $s['id_sewa'] ?>" onclick="return confirm('Yakin hapus data ini?')">Hapus</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>


