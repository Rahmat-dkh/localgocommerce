# 🍛 Sini Jajan - Marketplace Kuliner Nusantara 🇮🇩
|
<p align="center">
  <strong>Menghubungkan Kelezatan Autentik Indonesia ke Meja Makan Anda</strong>
</p>

<p align="center">
  <img src="https://img.shields.io/badge/Laravel-10.x-FF2D20?style=for-the-badge&logo=laravel&logoColor=white" alt="Laravel">
  <img src="https://img.shields.io/badge/Livewire-3.x-FB70A9?style=for-the-badge&logo=livewire&logoColor=white" alt="Livewire">
  <img src="https://img.shields.io/badge/Tailwind_CSS-3.x-38B2AC?style=for-the-badge&logo=tailwind-css&logoColor=white" alt="Tailwind">
  <img src="https://img.shields.io/badge/MySQL-00758F?style=for-the-badge&logo=mysql&logoColor=white" alt="MySQL">
</p>

---

## 🌟 Tentang Sini Jajan

**Sini Jajan** adalah platform e-commerce modern yang dirancang khusus untuk melestarikan dan memperkenalkan kekayaan kuliner Nusantara. Kami berfokus pada produk makanan khas daerah yang telah dikurasi dengan cermat, memastikan kualitas rasa yang autentik dapat dimakan oleh masyarakat luas kapan saja dan di mana saja.

Dengan tagline *"Melestarikan Rasa Nusantara"*, Sini Jajan hadir bukan hanya sebagai tempat jual beli, tapi sebagai jembatan bagi para pelaku UMKM kuliner di seluruh Indonesia untuk menjangkau pasar nasional secara digital.

---

## 🚀 Fitur Unggulan

### 🛍️ Pengalaman Belanja Modern
- **Pencarian Cerdas**: Temukan kudapan favorit berdasarkan brand, produk, atau daerah asal.
- **Multivendor/Multi-tenant**: Produk dikirim langsung dari daerah asal produsen agar tetap *fresh*.
- **Real-time Cart & Wishlist**: Pengalaman belanja yang mulus menggunakan teknologi Livewire.

### 🤖 Intelligent Features
- **Smart Chat Assistant**: Bot asisten virtual yang siap membantu menjawab pertanyaan seputar produk, stok, dan pengiriman secara instan.
- **Direct WhatsApp Checkout**: Hubungkan pembeli langsung dengan penjual melalui pesan personal untuk transaksi yang lebih akrab.

### 🔐 Keamanan & Kemudahan
- **Payment Gateway**: Integrasi pembayaran aman melalui **Midtrans** (Bank Transfer, E-Wallet, QRIS).
- **Sistem Tracking**: Pantau status pesanan mulai dari proses hingga pengiriman.
- **Autentikasi Aman**: Login standar dan integrasi **Google Login** untuk kemudahan akses.

### 📊 Manajemen Bisnis (Admin & Vendor)
- **Dashboard Admin**: Kendali penuh atas kategori, produk, pesanan, dan verifikasi tenant.
- **Dashboard Tenant**: Ruang khusus bagi pengusaha kuliner untuk mengelola stok, profil toko, dan penarikan dana (payout).

---

## 🛠️ Arsitektur Teknologi

Aplikasi ini dibangun dengan *cutting-edge technology stack*:

- **Framework**: [Laravel 10](https://laravel.com) (Robust & Scalable)
- **Frontend Interactivity**: [Livewire 3](https://livewire.laravel.com) (Fullstack Reactivity)
- **Styling**: [Tailwind CSS](https://tailwindcss.com) (Modern & Responsive UI)
- **Database**: MySQL (Reliable Data Management)
- **Asset Bundling**: Vite (Fastest Development Experience)

---

## 📦 Panduan Instalasi

Ingin menjalankan Sini Jajan di server lokal Anda? Ikuti panduan ini:

### 1. Persyaratan Sistem
- PHP >= 8.1
- Composer
- Node.js & NPM
- MySQL Database

### 2. Langkah-langkah
```bash
# Clone repository
git clone https://github.com/Rahmat-dkh/localgocommerce.git
cd localgocommerce

# Instal dependensi PHP
composer install

# Instal dependensi JavaScript & CSS
npm install

# Setup environment
cp .env.example .env
# Jangan lupa sesuaikan pengaturan DB_DATABASE, DB_USERNAME, dan DB_PASSWORD di .env

# Generate Key
php artisan key:generate

# Jalankan migrasi dan seeder
php artisan migrate --seed

# Compiling assets
npm run dev
```

Jalankan server pengembangan:
```bash
php artisan serve
```
Akses di `http://127.0.0.1:8000`

---

## 📧 Kontak & Dukungan

Jika Anda memiliki pertanyaan, saran, atau ingin bekerjasama sebagai tenant:

- **Email**: sinijajan@gmail.com
- **Lokasi**: Purworejo, Jawa Tengah, Indonesia

---

<p align="center">
  Dibuat dengan ❤️ untuk UMKM Indonesia oleh <strong>Sini Jajan Team</strong>
</p>
