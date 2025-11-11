<?php

if(isset($_POST['tambah'])){ //jika tambah
    //ambil data inputan
    $merk = $_POST['merk']; 
    $jenis = $_POST['jenis'];
    $stok = $_POST['stok'];
    $alat->tambahAlat($merk, $jenis, $stok); //pangil fungsi tambahAlat
    header("Location: ?page=alat");
    exit;
}

if(isset($_POST['update'])){ //jika update
    //data inputan
    $id = $_POST['id_alat']; 
    $merk = $_POST['merk'];
    $jenis = $_POST['jenis'];
    $stok = $_POST['stok'];
    $alat->updateAlat($id, $merk, $jenis, $stok); //panggil fungsi updateAlat
    header("Location: ?page=alat");
    exit;
}

if(isset($_GET['hapus'])){ //jika hapus
    $id = $_GET['hapus'];
    $alat->hapusAlat($id); //hapus data dengan id tersebut
    header("Location: ?page=alat");
    exit;
}

$editAlat = null;
if(isset($_GET['edit'])){ //jika edit
    $id = $_GET['edit'];
    $editAlat = $alat->getAlatId($id); //ambil id untuk di edit
}
?>

<hr>
<h3><?= $editAlat ? 'Edit' : 'Tambah' ?> Alat Musik</h3>
<form method="POST">
    <?php if ($editAlat): ?>
        <input type="hidden" name="id_alat" value="<?= $editAlat['id_alat'] ?>">
    <?php endif; ?>

    <label>Merk:</label><br>
    <input type="text" name="merk" value="<?= $editAlat['merk'] ?? '' ?>" required><br>

    <label>Jenis:</label><br>
    <input type="text" name="jenis" value="<?= $editAlat['jenis'] ?? '' ?>" required><br>

    <label>Stok:</label><br>
    <input type="number" name="stok" value="<?= $editAlat['stok'] ?? '' ?>" required><br><br>

    <button type="submit" name="<?= $editAlat ? 'update' : 'tambah' ?>">
        <?= $editAlat ? 'Simpan' : 'Tambah' ?>
    </button>
</form>

<h3>List Alat</h3>
<table border="1">
    <tr>
        <th>ID</th>
        <th>Merk</th>
        <th>Jenis</th>
        <th>Stock</th>
        <th>Aksi</th>
    </tr>
    <?php foreach ($alat->tampilkanAlat() as $a): ?>
    <tr>
        <td><?= $a['id_alat'] ?></td>
        <td><?= $a['merk'] ?></td>
        <td><?= $a['jenis'] ?></td>
        <td><?= $a['stok'] ?></td>
        <td>
             <a href="?page=alat&edit=<?= $a['id_alat'] ?>">Edit</a> |
            <a href="?page=alat&hapus=<?= $a['id_alat'] ?>" onclick="return confirm('Yakin hapus data ini?')">Hapus</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>

