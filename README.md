# TP9DPBO2425C1

## 🤝 Janji
Saya Nadhif Arva Anargya dengan NIM 2404336 mengerjakan Tugas Praktikum 9 dalam mata kuliah Desain Pemrograman Berbasis Objek untuk keberkahanNya maka saya tidak melakukan kecurangan seperti yang telah dispesifikasikan. Aamiin.

---

## 📌 Deskripsi Program
Project ini merupakan implementasi arsitektur **Model–View–Presenter (MVP)** menggunakan bahasa PHP.
Project mencakup:

- CRUD data **Pembalap**
- CRUD data **Sponsor**
- Pemisahan kode menjadi *Model*, *View*, dan *Presenter*
- Penggunaan *Interface* sebagai kontrak antar komponen
- Template HTML untuk tampilan data dan form
- Router sederhana melalui `index.php`

---

## 🧱 Arsitektur Program (MVP)

Project ini menggunakan pola **Model–View–Presenter**, dengan pembagian:

### **1. Model**
Berisi seluruh logika data dan koneksi database.

- `DB.php`  
  Mengelola koneksi PDO dan eksekusi query.
- `TabelPembalap.php` / `TabelSponsor.php`  
  Mengimplementasikan CRUD.
- `Pembalap.php` / `Sponsor.php`  
  Class entity (object data).
- `KontrakModel*.php`  
  Interface untuk memastikan konsistensi method Model.

### **2. View**
Bertanggung jawab menampilkan data ke pengguna.

- Mengambil template HTML dari folder `/template`
- Mengisi tabel dan form menggunakan data dari Presenter
- Tidak berkomunikasi langsung dengan database

### **3. Presenter**
Penghubung antara View dan Model.

- Mengambil data dari Model
- Mengirim data ke View
- Menangani input GET/POST untuk CRUD
- Melakukan prefill data untuk form EDIT

### **4. Template**
File HTML murni untuk tampilan:

- `skin.html` dan `skinSponsor.html` → tampilan list  
- `form.html` dan `formSponsor.html` → form input

---
## 🛢️ Desain Database

### 1. pembalap
| Nama Kolom     | Tipe Data    | Keterangan                  |
| -------------- | ------------ | --------------------------- |
| `id`           | INT (PK, AI) | Primary key, auto increment |
| `nama`         | VARCHAR(255) | Nama pembalap               |
| `tim`          | VARCHAR(255) | Nama tim balap              |
| `negara`       | VARCHAR(255) | Negara asal                 |
| `poinMusim`    | INT          | Total poin musim            |
| `jumlahMenang` | INT          | Jumlah kemenangan           |

### 2. sponsor
| Nama Kolom     | Tipe Data    | Keterangan                        |
| -------------- | ------------ | --------------------------------- |
| `id`           | INT (PK, AI) | Primary key, auto increment       |
| `nama_sponsor` | VARCHAR(255) | Nama perusahaan sponsor           |
| `kategori`     | VARCHAR(100) | Jenis sponsor (minuman, otomotif) |

---

## 📜 Alur Program (Flow)

1. `index.php` membaca parameter `menu` untuk menentukan modul yang aktif  
2. Presenter dipanggil berdasarkan menu:
   - PresenterPembalap
   - PresenterSponsor
3. Jika ada parameter `screen`, maka:
   - `add` → tampilkan form kosong
   - `edit` → tampilkan form dengan data prefill
4. Jika ada POST:
   - Menjalankan method CRUD pada Presenter
   - Presenter memanggil Model
   - Setelah operasi selesai → redirect kembali ke list
5. View merender template HTML dan menampilkan data

---

## 📸 Dokumentasi