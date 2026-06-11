# 🚀 **PPDB Online – SMK ICB Cinta Teknika**

<div align="center">
  <img src="https://img.shields.io/github/actions/workflow/status/Bluestar-developer/ppdb/laravel.yml?style=for-the-badge&logo=github&label=Build" alt="Build Status" />
  <img src="https://img.shields.io/github/license/Bluestar-developer/ppdb?style=for-the-badge&logo=opensourceinitiative" alt="License" />
  <img src="https://img.shields.io/github/v/release/Bluestar-developer/ppdb?style=for-the-badge&logo=github" alt="Release" />
  <img src="https://img.shields.io/badge/Laravel-12-red?style=for-the-badge&logo=laravel" alt="Laravel" />
  <img src="https://img.shields.io/badge/PHP-8.2-777BB4?style=for-the-badge&logo=php" alt="PHP" />
  <img src="https://img.shields.io/badge/Tailwind%20CSS-3.4-06B6D4?style=for-the-badge&logo=tailwindcss" alt="Tailwind" />
  <img src="https://img.shields.io/badge/Midtrans-Payment-0060FF?style=for-the-badge&logo=visa" alt="Midtrans" />
</div>

---

## 👋 Halo!

Selamat datang di **PPDB Online** – aplikasi web yang bikin proses pendaftaran siswa di SMK ICB Cinta Teknika jadi simpel, cepat, dan modern. Kita pakai Laravel 12 di backend, Tailwind CSS untuk styling, dan Midtrans buat pembayaran. Bayangin aja kayak *Netflix* buat masuk sekolah, tapi versi edukasi.

> **⚠️ Penting:** Project ini **hanya untuk keperluan edukasi / internal**. **Jangan jual, distribusikan untuk profit, atau pakai dalam produk komersial** tanpa izin eksplisit dari pembuatnya.

---

## ✨ Apa yang Keren?

### Fitur Siswa
- **Registrasi multi‑step** dengan validasi real‑time.
- **Upload dokumen** (foto, KK, rapor, dll) sekaligus.
- **Pembayaran online** via Midtrans (QRIS, VA, e‑wallet).
- **Dashboard siswa**: lihat status, jadwal, pengumuman, dan galeri.
- **Notifikasi real‑time** untuk status pendaftaran.
- **Search & filter** jurusan.
- **Animasi 3D Tilt** pada kartu jurusan.
- **Scroll Reveal & Float Animation** untuk tampilan dinamis.
- **Gradient Shine** efek pada elemen UI.
- **Responsive design** dengan grid bento‑box.
- **Pengumuman ticker** dengan animasi.

### Fitur Admin
- **Admin panel**: CRUD lengkap untuk jurusan, pengumuman, jadwal, galeri, dan verifikasi berkas.
- **Manajemen kuota** per jurusan.
- **Ekspor laporan** ke Excel / PDF.
- **Setting tema & konfigurasi** (logo, warna, kontak, dll).
- **Pengelolaan pengguna** (admin & siswa).
- **Monitoring pembayaran** via Midtrans.
- **Pengaturan notifikasi** sistem.
- **Audit log** aktivitas admin.

---

## 🛠️ Teknologi

| Frontend | Backend | Database & Tools |
|----------|---------|------------------|
| Tailwind CSS, Alpine.js, Blade, Font Awesome, Chart.js | Laravel 12, PHP 8.2, Laravel Breeze, Composer | MySQL / MariaDB, Git, GitHub Actions |

---

## 📦 Instalasi & Setup

```bash
# 1️⃣ Clone repo
git clone https://github.com/Bluestar-developer/ppdb.git
cd ppdb

# 2️⃣ Install dependensi PHP
composer install

# 3️⃣ Install assets frontend
npm install

# 4️⃣ Siapkan environment
cp .env.example .env
php artisan key:generate
```

Edit file **`.env`** sesuaikan DB dan kredensial Midtrans:

```ini
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=ppdb_db
DB_USERNAME=root
DB_PASSWORD=your_password

MIDTRANS_SERVER_KEY=SB-Mid-server-xxxx
MIDTRANS_CLIENT_KEY=SB-Mid-client-xxxx
MIDTRANS_IS_PRODUCTION=false
```

```bash
# 5️⃣ Jalankan migrasi & seed data contoh
php artisan migrate --seed

# 6️⃣ Bangun assets (atau jalankan dev server)
npm run dev   # development
# npm run build # production

# 7️⃣ Link storage untuk upload
php artisan storage:link

# 8️⃣ Mulai aplikasi
php artisan serve
```

Buka **http://127.0.0.1:8000** di browser.

---

## 👥 Akun Demo

| Peran | Email / NIK | Password |
|-------|-------------|----------|
| **Admin** | `admin@smkicbcinteknika.sch.id` | `password123` |
| **Siswa** | NIK: `1234567890123456` | `password123` |

> *Pastikan sudah menjalankan seeder dulu ya.*

---

## 📂 Ringkasan Database

- `users` – akun admin & siswa.
- `registrations` – data pendaftar.
- `jurusan` – jurusan dengan kuota & flag aktif.
- `pengumuman` – pengumuman sekolah.
- `jadwal_ppdb` – jadwal PPDB.
- `galeri` – foto‑foto kegiatan.
- `payments` – log transaksi Midtrans.
- `verifikasi_berkas` – riwayat verifikasi dokumen.
- `pengaturan` – konfigurasi situs (tema, kontak, dll).

---

## 🧪 Testing

```bash
php artisan test
```

---

## 🤝 Kontribusi

1. Fork repo ini.
2. Buat branch fitur: `git checkout -b fitur-aku`.
3. Commit perubahan dengan pesan jelas.
4. Push dan buat Pull Request.
5. Tunggu review – kami suka kode bersih & terdokumentasi!

---

## 📄 Lisensi

Distribusi di bawah **MIT License**. Lihat file [LICENSE](https://github.com/BlueDev/ppdb/blob/main/LICENSE) untuk detail.

---

## 📞 Kontak & Sosial

<div align="center">
  <a href="https://github.com/BlueDev"><img src="https://img.shields.io/badge/GitHub-BlueDev-181717?style=flat-square&logo=github" alt="GitHub" /></a>
  <a href="mailto:starblue3355@gmail.com"><img src="https://img.shields.io/badge/Email-starblue3355%40gmail.com-D14836?style=flat-square&logo=gmail" alt="Email" /></a>
  <a href="https://www.linkedin.com/in/bluedev"><img src="https://img.shields.io/badge/LinkedIn-BlueDev-0077B5?style=flat-square&logo=linkedin" alt="LinkedIn" /></a>
  <a href="https://www.instagram.com/bluedev"><img src="https://img.shields.io/badge/Instagram-bluedev-E4405F?style=flat-square&logo=instagram" alt="Instagram" /></a>
</div>

---

<div align="center">
  <p>Made with ❤️ by <strong><a href="https://github.com/BlueDev">Blue Dev</a></strong></p>
</div>
