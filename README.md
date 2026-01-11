# Sistem Informasi Geografis (GIS) - MDTA & TPQ

[![PHP Version](https://img.shields.io/badge/PHP-8.1%2B-blue.svg)](https://www.php.net/)
[![CodeIgniter](https://img.shields.io/badge/CodeIgniter-4.x-orange.svg)](https://codeigniter.com/)
[![License](https://img.shields.io/badge/License-MIT-green.svg)](LICENSE)
[![MySQL](https://img.shields.io/badge/MySQL-5.7%2B-blue.svg)](https://www.mysql.com/)

Aplikasi web berbasis CodeIgniter 4 untuk sistem informasi geografis yang digunakan untuk memetakan dan mengelola data lokasi MDTA (Madrasah Diniyah Takmiliyah Awaliyah) dan TPQ (Taman Pendidikan Al-Qur'an).

## 📋 Deskripsi

Aplikasi Sistem Informasi Geografis (GIS) ini dibangun untuk memetakan dan mengelola data lokasi MDTA (Madrasah Diniyah Takmiliyah Awaliyah) dan TPQ (Taman Pendidikan Al-Qur'an). Aplikasi ini menyediakan antarmuka yang user-friendly untuk menampilkan lokasi-lokasi tersebut dalam bentuk peta interaktif dengan berbagai fitur manajemen data.

## 📋 Daftar Isi

- [Deskripsi](#-deskripsi)
- [Fitur Utama](#-fitur-utama)
- [Teknologi yang Digunakan](#-teknologi-yang-digunakan)
- [Requirements](#-requirements)
- [Instalasi](#-instalasi)
- [Cara Menjalankan](#-cara-menjalankan-aplikasi)
- [Struktur Direktori](#-struktur-direktori)
- [API Endpoints](#-api-endpoints)
- [Troubleshooting](#-troubleshooting)
- [Kontribusi](#-kontribusi)
- [License](#-license)

## ✨ Fitur Utama

### 📊 Dashboard
- Statistik total lokasi
- Statistik lokasi MDTA dan TPQ
- Peta interaktif dengan semua lokasi
- Update statistik otomatis setiap 30 detik

### 📍 Manajemen Lokasi
- **Tambah Lokasi**: Input data lokasi dengan koordinat (latitude/longitude) dan foto
- **Edit Lokasi**: Update data lokasi yang sudah ada
- **Hapus Lokasi**: Hapus data lokasi
- **Pemetaan Lokasi**: Tampilkan semua lokasi di peta
- **Pencarian Lokasi**: Fitur pencarian data lokasi

### 🗺️ Sistem Peta
- Multiple base map layers (OpenStreetMap, Stamen Toner, CartoDB Positron, OpenTopoMap)
- Marker clustering untuk performa yang lebih baik
- Custom marker icon untuk MDTA dan TPQ
- Popup informasi lokasi dengan foto
- Fitur fullscreen map

### 🔐 Autentikasi & Authorization
- Login/Register menggunakan Myth Auth
- Role-based access control (Admin & User)
- Filter untuk halaman admin
- Session management

### 👥 Manajemen User (Admin Only)
- Daftar semua user
- Kelola user dan role

## 🛠️ Teknologi yang Digunakan

- **Backend Framework**: CodeIgniter 4
- **Database**: MySQL (MariaDB)
- **Authentication**: Myth Auth
- **Frontend**: 
  - Bootstrap (SB Admin Template)
  - Leaflet.js untuk peta interaktif
  - Leaflet MarkerCluster untuk clustering marker
- **Map Services**: OpenStreetMap, Stamen Toner, CartoDB Positron, OpenTopoMap
- **PHP Version**: 8.1 atau lebih tinggi

## 📦 Requirements

- **PHP** >= 8.1
- **MySQL** >= 5.7 atau MariaDB >= 10.3
- **Composer** (untuk dependency management)
- **Web Server**: Apache/Nginx (dapat menggunakan Laragon, XAMPP, atau built-in PHP server)
- **PHP Extensions**:
  - `intl`
  - `mbstring`
  - `mysqli`
  - `json`
  - `curl` (opsional)

## 🚀 Instalasi

### 1. Clone Repository

```bash
git clone https://github.com/afifatul562/belajar-gis-dasar-ci4.git
cd belajar-gis-dasar-ci4
```

Atau download dan ekstrak file ZIP ke folder web server Anda.

### 2. Install Dependencies

```bash
composer install
```

### 3. Konfigurasi Environment

Salin file `.env` (jika belum ada):

```bash
cp env .env
```

Edit file `.env` dan sesuaikan konfigurasi:

```env
#--------------------------------------------------------------------
# ENVIRONMENT
#--------------------------------------------------------------------
CI_ENVIRONMENT = development

#--------------------------------------------------------------------
# APP
#--------------------------------------------------------------------
app.baseURL = 'http://localhost/belajar-gis-dasar-ci4/public/'

#--------------------------------------------------------------------
# DATABASE
#--------------------------------------------------------------------
database.default.hostname = localhost
database.default.database = db-webgis
database.default.username = root
database.default.password = 
database.default.DBDriver = MySQLi
database.default.port = 3306
```

### 4. Setup Database

1. Buat database baru di MySQL:

```sql
CREATE DATABASE db-webgis CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
```

2. Import struktur database (jika ada file SQL migration):

```bash
# Menggunakan phpMyAdmin atau command line
mysql -u root -p db-webgis < database.sql
```

3. Atau jalankan migration (jika tersedia):

```bash
php spark migrate
```

### 5. Konfigurasi Folder Permissions

Pastikan folder `writable` memiliki permission yang tepat:

```bash
# Linux/Mac
chmod -R 775 writable/

# Windows (jika menggunakan Laragon/XAMPP, biasanya sudah otomatis)
```

## 🎯 Cara Menjalankan Aplikasi

### Opsi 1: Menggunakan Laragon (Recommended)

1. Pastikan Laragon sudah terinstall dan berjalan
2. Pastikan Apache dan MySQL aktif (status hijau)
3. Akses aplikasi melalui browser:
   - `http://localhost/belajar-gis-dasar-ci4/public/`
   - Atau jika menggunakan virtual host: `http://belajar-gis-dasar-ci4.test`

### Opsi 2: Menggunakan CodeIgniter Built-in Server

```bash
php spark serve
```

Aplikasi akan berjalan di `http://localhost:8080`

### Opsi 3: Menggunakan XAMPP

1. Copy folder aplikasi ke `htdocs/xampp/`
2. Pastikan Apache dan MySQL aktif
3. Akses: `http://localhost/belajar-gis-dasar-ci4/public/`

## 📁 Struktur Direktori

```
belajar-gis-dasar-ci4/
├── app/
│   ├── Config/          # Konfigurasi aplikasi
│   ├── Controllers/     # Controller (Home, Lokasi, Admin, User)
│   ├── Models/          # Model database (ModelLokasi, UserModel)
│   ├── Views/           # Template view
│   │   ├── auth/        # Halaman login & register
│   │   ├── lokasi/      # Halaman manajemen lokasi
│   │   └── admin/       # Halaman admin
│   └── Database/        # Migration & Seeder
├── public/
│   ├── foto/            # Upload foto lokasi
│   ├── marker/          # Icon marker MDTA & TPQ
│   └── index.php        # Entry point aplikasi
├── system/              # Core CodeIgniter 4
├── writable/            # Folder untuk cache, logs, session, uploads
└── vendor/              # Composer dependencies
```

## 🔐 Default Login

> **Catatan**: Pastikan untuk membuat user admin pertama setelah instalasi atau import database dengan user default.

Jika menggunakan seeder atau database import, cek credentials di file seeder atau dokumentasi database.

## 🔧 Konfigurasi Database

File konfigurasi database berada di `app/Config/Database.php` atau bisa di-override melalui file `.env`:

```php
'database' => 'db-webgis',
'username' => 'root',
'password' => '',
'hostname' => 'localhost',
'port' => 3306,
```

## 📝 API Endpoints

Aplikasi menyediakan beberapa API endpoint untuk data:

- `GET /api/dashboard-stats` - Statistik dashboard (total, mdta, tpq, user)
- `GET /Home/getLocationData` - Data lokasi untuk peta (JSON)
- `GET /api/location-data` - Alternatif endpoint data lokasi

## 🐛 Troubleshooting

### Error: Database connection failed
- Pastikan MySQL/MariaDB berjalan
- Periksa kredensial database di `.env` atau `app/Config/Database.php`
- Pastikan database `db-webgis` sudah dibuat

### Error: 404 Not Found
- Pastikan mod_rewrite aktif di Apache
- Pastikan mengakses URL yang benar: `http://localhost/belajar-gis-dasar-ci4/public/`
- Cek file `.htaccess` di folder `public/`

### Error: Permission denied (writable folder)
- Berikan permission 775 pada folder `writable/`
- Pastikan web server memiliki akses write ke folder tersebut

### Peta tidak muncul
- Pastikan koneksi internet aktif (Leaflet.js menggunakan CDN)
- Cek browser console untuk error JavaScript
- Pastikan koordinat latitude/longitude valid

## 📚 Dokumentasi

- [CodeIgniter 4 Documentation](https://codeigniter.com/user_guide/)
- [Myth Auth Documentation](https://github.com/lonnieezell/myth-auth)
- [Leaflet.js Documentation](https://leafletjs.com/reference.html)

## 🤝 Kontribusi

Kontribusi sangat diterima! Silakan ikuti langkah berikut:

1. Fork repository ini
2. Buat branch fitur (`git checkout -b feature/AmazingFeature`)
3. Commit perubahan Anda (`git commit -m 'Add some AmazingFeature'`)
4. Push ke branch (`git push origin feature/AmazingFeature`)
5. Buka Pull Request

### Cara Berkontribusi

- 🐛 Melaporkan bug dengan membuat [issue](https://github.com/afifatul562/belajar-gis-dasar-ci4/issues)
- 💡 Mengusulkan fitur baru dengan membuat issue
- 📝 Meningkatkan dokumentasi
- 🔧 Fix bug dan submit pull request

Silakan baca [CONTRIBUTING.md](CONTRIBUTING.md) untuk detail lebih lanjut tentang kode etik dan proses kontribusi.

## 📄 License

Project ini menggunakan lisensi MIT. Lihat file [LICENSE](LICENSE) untuk detail lebih lanjut.

```
MIT License

Copyright (c) 2024 Afifatul Mawaddah

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.
```

## 👨‍💻 Author

**Afifatul Mawaddah** - *Initial work*

- GitHub: [@afifatul562](https://github.com/afifatul562)
- Profile: [afifatul562](https://github.com/afifatul562)

## 🙏 Acknowledgments

- [CodeIgniter](https://codeigniter.com/) - Framework PHP yang digunakan
- [Myth Auth](https://github.com/lonnieezell/myth-auth) - Authentication library
- [Leaflet.js](https://leafletjs.com/) - Library peta interaktif
- [Bootstrap](https://getbootstrap.com/) - Framework CSS
- [SB Admin Template](https://startbootstrap.com/template/sb-admin) - Admin template

## ⚠️ Catatan Penting

- Aplikasi ini dibuat untuk tujuan pembelajaran sistem informasi geografis dasar
- Pastikan untuk melakukan backup database secara berkala
- Jangan lupa untuk mengubah kredensial default sebelum deploy ke production
- File `.env` tidak boleh di-commit ke repository (sudah ada di `.gitignore`)

---

⭐ Jika project ini membantu Anda, berikan star di repository ini!

📝 **License**: MIT License - Lihat file [LICENSE](LICENSE) untuk detail lebih lanjut.
