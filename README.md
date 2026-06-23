## SIAKAD - Sistem Informasi Akademik Sederhana

Aplikasi web berbasis Laravel untuk mengelola data akademik sederhana.

## Link Hosting
https://tubes-siakad-ifb2024-5520124035-adzraa-production.up.railway.app

## Deskripsi
Aplikasi SIAKAD (Sistem Informasi Akademik) sederhana yang dibangun menggunakan Laravel 12. Aplikasi ini mensimulasikan sistem akademik dengan fitur manajemen data dosen, mahasiswa, mata kuliah, jadwal, dan KRS.

## Identitas
- Nama  : Adzraa Tri Nasyiah Putri
- NPM   :5520124035
- Kelas : IF B

## Fitur Utama
- Login & Logout dengan 2 role (Admin & Mahasiswa)
- CRUD Data Dosen
- CRUD Data Mahasiswa
- CRUD Data Mata Kuliah
- CRUD Data Jadwal Perkuliahan
- Pengambilan & Drop KRS
- Export KRS ke PDF
- Pencarian & Filter data
- Dashboard Statistik
- Dark Mode
- Edit Profil dengan foto

## Penjelasan Halaman

### Admin
Dashboard        : Untuk menampilkan statistik                     total dosen, mahasiswa, mata kuliah, dan jadwal 
Data Dosen       : CRUD data dosen 
Data Mahasiswa   : CRUD data mahasiswa beserta akun login 
Data Mata Kuliah : CRUD data mata kuliah 
Data Jadwal      : CRUD jadwal perkuliahan 
Edit Profil      : Mengubah nama, email, password, dan foto profil 

### Mahasiswa
Dashboard         : Menampilkan total SKS dan mata kuliah yang diambil 
KRS Saya          : Melihat dan drop mata kuliah yang diambil 
Ambil Mata Kuliah : Mengambil mata kuliah baru 
Jadwal            : Melihat jadwal perkuliahan 
Export PDF        : Mengunduh KRS dalam format PDF 
Edit Profil       : Mengubah nama, email, password, dan foto profil 

## Teknologi
- Laravel 12
- PHP 8.2
- MySQL (MariaDB)
- Bootstrap 5
- Font Awesome

## Cara Install
1. Clone repository
git clone https://github.com/[username]/[repo-name].git
2. Install dependencies
composer install
npm install && npm run build
3. Copy `.env.example` ke `.env` dan sesuaikan konfigurasi database
4. Generate key
php artisan key:generate
5. Migrate & seed database
php artisan migrate --seed
6. Jalankan aplikasi
php artisan serve

##  Akun Default
Admin
Email    : admin@siakad.com
Password : password
Mahasiswa
Email    : adzratri2@gmail.com
Password : 12092022

## Screenshots
Tersedia di folder `/screenshots`
