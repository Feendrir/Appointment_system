# Appointment_system

Sistem Appointment ini adalah aplikasi berbasis web untuk membantu pengelolaan jadwal periksa, data pasien, dokter, serta berbagai fitur lain yang berkaitan dengan sistem rumah sakit.

---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

## **Fitur Utama**
- Login sebagai Dokter atau Pasien.
- Registrasi pasien baru dengan nomor rekam medis otomatis.
- Kelola jadwal periksa dokter dan daftar poli.
- Tambah, edit, dan hapus data pasien, dokter, dan jadwal.
- Dashboard admin untuk pengelolaan data.

## **Persyaratan Sistem**
- Web Server: Apache atau Nginx.
- PHP: Versi 8.0 atau lebih baru.
- Database: MySQL.
- Composer: Untuk instalasi dependensi PHP.
- Git: Untuk pengelolaan repository.
  
---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

## **Instalasi dan Konfigurasi**

### **1. Clone Repository**
1. Clone proyek ini dari GitHub ke direktori lokal Anda:

   git clone https://github.com/Feendrir/Appointment_system.git
   cd Appointment_system


### **2. Persiapan Database**
1. Buat database baru di MySQL dengan nama:
   h_appointment_system

2. Import file database yang ada di folder /database/h_appointment_system.sql:
   - Gunakan phpMyAdmin:
     - Login ke phpMyAdmin.
     - Pilih database h_appointment_system.
     - Klik tab Import, pilih file database/h_appointment_system.sql, lalu klik Go.
   - Atau gunakan Command Line:
     - mysql -u [username] -p h_appointment_system < database/h_appointment_system.sql


### **3. Konfigurasi Environment**
1. Duplikat file env menjadi .env :
   cp env .env
2. Edit file .env dan sesuaikan konfigurasi database Anda:
   - database.default.hostname = localhost
   - database.default.database = h_appointment_system
   - database.default.username = root
   - database.default.password = [kosongkan jika tidak ada password]
   - database.default.DBDriver = MySQLi


### **4. Instal Dependensi**
1. Pastikan Anda memiliki Composer terinstal. Jalankan perintah berikut untuk menginstal dependensi:
   composer install


### **5. Jalankan Aplikasi**
1. Gunakan perintah berikut untuk menjalankan aplikasi:
   php spark serve
   Aplikasi akan berjalan di: http://localhost:8080
 

---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------


## **Struktur Folder**
- /app                      Berisi controller, model, dan view aplikasi.
- /public	                  Folder publik untuk akses CSS, JS, dan gambar.
- /database	                File SQL untuk setup database.
- /writable	                Cache dan log aplikasi.


## **Login Akun Default**
1. Admin:
   - Username: admin
   - Password: admin123

 2. Dokter:
    - Username dan password: Sesuai data tabel dokter.

4. Pasien:
   - Username dan password: Sesuai data tabel pasien.


## **Panduan Penggunaan**
1. Admin dapat mengelola data dokter, pasien, poli, dan jadwal periksa melalui dashboard.
2. Dokter dapat login untuk melihat dan mengelola jadwal periksa mereka.
3. Pasien dapat login untuk melihat riwayat periksa dan informasi poli.


## **Catatan**
- Pastikan semua file di folder /public/ dapat diakses oleh web server.
- Gunakan folder /writable/ untuk menyimpan cache dan log dengan izin writable (chmod 777 jika diperlukan).

--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

