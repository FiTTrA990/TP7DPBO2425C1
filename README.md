# Janji

Saya Muhammad Fittra Novria Rizky dengan NIM 2411481 mengerjakan Tugas Praktikum 7 dalam mata kuliah Desain dan Pemrograman Berorientasi Objek untuk keberkahanNya maka saya tidak melakukan kecurangan seperti yang telah dispesifikasikan. Aamiin.

# Deskripsi

Program ini merupakan webside khursus belajar programan, program ini berfungsi sebagai CRUD untuk data rangkaian mendaftarkan diri ingin khursus Programan, Program ini menggunakan PHP dan MySQL sebagai database, untuk Frontend menggunakan HTML dan CSS.

# Fitur
1. Kursus
- Tambah Nama dan Deskripsi yang ingin diikuti, edit, dan hapus data 
- Melihat data berisi Nama, Deskripsi dan Created At (saat data tanggal dan jam berapa data di tambahkan)

2. Peserta
- Tambah Nama dan Email sebagai identitas diri, Edit dan hapus Data
- Melihat data berisi Nama, Email dan Created (saat data tanggal dan jam berapa data di tambahkan)

3. Enrollment
- Menambahkan Peserta dan Kursus yang sudah terdaftar di Kursus dan Peserta
- Melihat data berisi Peserta, Kursus yang sudah di tambahkan di Kursus dan Peserta  dan Created (saat data tanggal dan jam berapa data di tambahkan)

# Alur Program

1. Halaman Utama
Pada halaman pertama di tampilkan 3 kotak, ada Kursus, Peserta, dan Enrollment

2. Halaman Kursus
Pada halaman ini data rangkaian kursus ditampilkan user dapat menambah, mengedit, dan menghapus data
- Create/Add, untuk menambahkan data kursus apa yang ingin di tambahkan Nama(sebagai nama kursusnya), Deskripsi(sebagai bentuk Kursusnya), Created At(sebagai jam saat di tambahkan)
- Read/View, untuk melihat data data yang sudah di tambahkan oleh user bisa menampilkan Edit dan Hapus data, user memilih yang ingin di hapus dan di hapus
- Update/Edit, user bisa mengganti Namanya jika user salah menginput data data yang user inginkan
- Delete, untuk menghapus data jika user salah menginput atau tidak jadi menambahkan data tersebut

3. Halaman Peserta
Pada halaman ini sama dengan halaman Kursus ada Add, Read, Update, dan Delete. Halaman Peserta untuk menambahkan Nama dan Email yang ingin daftarkan pada kursusnya.

4. Halaman Enrollment
Pada halaman ini sama dengan halaman Kursus dan Peserta memiliki Add, Update, Read, dan Delete,
pada Halaman Enrollment menambahkan Peserta dan Kursus yang sudah tersedia di Kursus dan Peserta tersebut


# Rangkaian Database

![WhatsApp Image 2025-11-11 at 14 17 02_33e36cbc](https://github.com/user-attachments/assets/454e1074-a3a2-42ab-8b4f-546a736edc89)

1. Rangkaian Student(Peserta): Tabel ini myimpan data rangkaian peserta id dan email.
2. Rangkaian Courses(Kursus): Tabel ini menyimpan data rangkaian Kursus yaitu, Id dan Deskripsi
3. Rangkaian Enrollment(Catatan/Gabungan): Tabel ini menyimpan data rangkaian gabungan Student dan Courses memiliki Id dan couse_id

# Modularisasi

<img width="200" height="453" alt="image" src="https://github.com/user-attachments/assets/325f82b4-4683-4e04-a6be-fbbc826a0c17" />

Dari struktur folder diatas, bahwa setiap bagian aplikasi dalam folder yang berbeda, folder class berisi kelas kelas yang dihunkana mengololah data

**Penggunaan Prepared Statement dan PDO**
Aplikasi ini menggunakan PDO(Php Data Objects) utnutk mengakses databases MySQL Contoh penggunaan prepared statement pada file Enrollment.php
<img width="542" height="187" alt="image" src="https://github.com/user-attachments/assets/c40ec7cb-8555-4564-80a7-d2afadf48258" />

# Teknologi yang digunakan

- PHP: Bahasa Program yang digunakan untuk backend aplikasi ini
- MySQL: Database yang digunakan untuk menyimpan data
- HTML: Digunakana untuk membuat struktur halaman web
- CSS: Digunakan mengedit tampilan halaman web

# Dokumentasi



https://github.com/user-attachments/assets/4949f145-6899-4de0-9953-78b3e65c45c6



