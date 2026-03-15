# 🏫 SMKN 4 Bandung — School Website

Website resmi portal siswa SMKN 4 Bandung berbasis Laravel 12.

---

## 👥 Tim Pengembang

| Nama | GitHub | Role |
|------|--------|------|
| Abiyya Hamdan Nurwandha | [@Abeyyyyyy](https://github.com/Abeyyyyyy) | Full Stack Developer |
| Khaira | [@khaira1905](https://github.com/khaira1905) | Full Stack Developer |

---

## 🛠️ Tech Stack

- **Framework** : Laravel 12
- **Styling** : Tailwind CSS v4
- **Database** : MySQL
- **Build Tool** : Vite 7

---

## 📁 Struktur Project
```
school-website/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── Admin/              # Controller Admin
│   │   │   ├── AuthController.php  # Auth Student
│   │   │   ├── DashboardController.php
│   │   │   ├── AkademikController.php
│   │   │   └── LandingController.php
│   │   └── Middleware/
│   │       └── AdminMiddleware.php
│   └── Models/
│       ├── Admin.php
│       ├── Student.php
│       ├── Pengumuman.php
│       └── Pesan.php
├── resources/views/
│   ├── admin/          # Dashboard Admin
│   ├── dashboard/      # Dashboard Student
│   ├── landing/        # Landing Page
│   └── layouts/        # Layout utama
└── routes/
    └── web.php
```

---

## ⚙️ Cara Install & Menjalankan

### Persyaratan
- PHP >= 8.2
- Composer
- Node.js >= 18
- MySQL

### Langkah Install
```bash
# 1. Clone repository
git clone https://github.com/Abeyyyyyy/school-website.git
cd school-website

# 2. Install dependencies PHP
composer install

# 3. Install dependencies Node
npm install

# 4. Setup environment
cp .env.example .env
php artisan key:generate

# 5. Konfigurasi database di .env
DB_DATABASE=school_web
DB_USERNAME=root
DB_PASSWORD=

# 6. Jalankan migration & seeder
php artisan migrate
php artisan db:seed --class=AdminSeeder
php artisan db:seed --class=PengumumanSeeder

# 7. Jalankan project
php artisan serve    # Terminal 1
npm run dev          # Terminal 2
```

---

## 🔐 Akun Default

### Admin
| Field | Value |
|-------|-------|
| URL | http://localhost:8000/admin/login |
| Email | admin@smkn4bdg.sch.id |
| Password | admin123 |

### Student
Daftar melalui http://localhost:8000/register

---

## 📄 Halaman yang Tersedia

### Landing Page (Public)
| URL | Halaman |
|-----|---------|
| `/` | Beranda |
| `/jurusan` | Jurusan |
| `/ekstrakulikuler` | Ekstrakulikuler |
| `/testimoni` | Testimoni |
| `/login` | Login Student |
| `/register` | Register Student |

### Dashboard Student (Login Required)
| URL | Halaman |
|-----|---------|
| `/dashboard` | Dashboard Utama |
| `/dashboard/akademik/kurikulum` | Kurikulum |
| `/dashboard/akademik/jadwal` | Jadwal Pelajaran |
| `/dashboard/akademik/ekstrakulikuler` | Ekstrakulikuler |
| `/dashboard/akademik/info-ujian` | Info Ujian |
| `/dashboard/akademik/mata-pelajaran` | Mata Pelajaran |
| `/dashboard/pengumuman` | Pengumuman |
| `/dashboard/kesiswaan` | Kesiswaan |
| `/dashboard/ppdb` | PPDB |
| `/dashboard/ppdb/bobot-nilai` | Kalkulator Bobot Nilai |
| `/dashboard/elearning` | E-Learning |
| `/dashboard/layanan` | Layanan |
| `/dashboard/kontak` | Kontak |
| `/dashboard/profil` | Profil |

### Admin Panel (Admin Login Required)
| URL | Halaman |
|-----|---------|
| `/admin/login` | Login Admin |
| `/admin/dashboard` | Dashboard Admin |
| `/admin/pengumuman` | Kelola Pengumuman (CRUD) |
| `/admin/pesan` | Pesan Masuk |
| `/admin/students` | Data Siswa |

---

## 🌿 Git Workflow
```bash
# Buat branch fitur baru
git checkout develop
git pull origin develop
git checkout -b feature/nama-fitur

# Setelah selesai
git add .
git commit -m "feat: deskripsi fitur"
git push origin feature/nama-fitur

# Buat Pull Request ke develop di GitHub
```

### Konvensi Commit
| Prefix | Kegunaan |
|--------|----------|
| `feat:` | Fitur baru |
| `fix:` | Perbaikan bug |
| `style:` | Perubahan tampilan |
| `refactor:` | Refactor kode |
| `docs:` | Dokumentasi |

---

## 📞 Kontak Sekolah

- 📍 Jl. Kliningan No.6, Buah Batu, Bandung
- 📞 (022) 7304179
- ✉️ info@smkn4bdg.sch.id
- 🌐 smkn4bdg.sch.id
