# TP7DPBO2425C1
## JANJI
Saya Shidqi Rasyad Firjatulah dengan NIM 2408156 mengerjakan TP5 pada mata kuliah DPBO untuk keberkahannya saya menyatakan bahwa saya tidak melakukan kecurangan sebagaimana yang dispesifikasikan.


---

## Tema Website
Tema website yang saya buat adalah Sistem Manajajemen Penyewaan Alat Musik. Website ini berfungsi untuk membantu proses pencatatan, pengelolaan, dan pemaantauan data penyewaan alat musik. Pengguna dapat menambah, melihat, mengedit/mengupdate, dan menghapus data yang ada pada Sistem Manajamene Penyewaan Alat Musik.

## Penjelasan Database
#### Tabel Alat Musik
Tabel ini berfungsi untuk menyimpan alat alat musik untuk disewakan, memiliki 4 atribut yaitu:
- ```Id_alat``` (id unik alat musik)
- ```Merk``` (merk alat musik)
- ```Jenis``` (keyboard, gitar, drum, dll)
- ```stok``` (jumlah stok yang tersisa)
#### Tabel Peminjam 
Tabel ini berfungsi untuk menyimpan data penyewa alat musik, memiliki 4 atribut yaitu:
- ```id_peminjam```(id unik peminjam)
- ```nama``` (nama peminjam)
- ```no_hp``` (nomor handphone peminjam)
- ```alamat``` (alamat peminjam
#### Tabel Sewa 
Tabel ini berfungsi untuk menyimpan data sewa, memiliki 6 atribut:
- ```Id_sewa``` (id unik sewa)
- ```id_peminjam``` (foreign key dari tabel peminjam)
- ```id_alat``` (foreign key dari tabel alat_musik)
- ```tanggal_pinjam``` (tanggal mulai sewa)
- ```tanggal_kembali``` (tanggal pengembalian)
- ```status``` (status sewa, contoh dipinjam atau selesai)

## Alur 
1. User membuka website -> tampilan halaman utama (index.php)
2. user bisa memilih menu "alat musik", "peminjam", dan "data sewa"
3. di halaman menu tersebut user bisa:
   - tambah data
   - edit/update data
   - hapus data
   - meliha semua data yang ada

# Dokumentasi

https://github.com/user-attachments/assets/26d5ca05-25e0-4194-b667-ce48672f6a12







