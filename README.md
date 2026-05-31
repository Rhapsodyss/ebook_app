# 📚 Light's On

> Aplikasi Web Novel & E-Book Reader yang elegan dengan tampilan klasik dan pengalaman membaca yang nyaman.

🌐 **Live Demo:** [https://lightson.zya.me/](https://lightson.zya.me/)

---

## 📖 Tentang Project

**Light's On** adalah aplikasi web untuk membaca novel dan e-book secara online. Aplikasi ini dirancang dengan estetika klasik yang memadukan nuansa buku fisik dan kemudahan akses digital. Fitur-fitur utama meliputi:

- 📚 **Koleksi Buku Dinamis** - Jelajahi ribuan judul dengan hero slider dan grid responsif
- 🔍 **Pencarian Real-time** - Cari judul buku dengan instan
- 📖 **Mode Baca** - Interface nyaman untuk membaca cerita lengkap dengan background dinamis
- 🌓 **Dark Mode** - Tema gelap untuk kenyamanan mata saat membaca
- ⚡ **Performa Optimal** - Powered by CodeIgniter 4 dengan optimasi autoloader

---

## 🛠️ Tech Stack

| Kategori | Teknologi |
|----------|-----------|
| **Backend Framework** | ![CodeIgniter](https://img.shields.io/badge/CodeIgniter-4.7-FF4329?style=flat-square&logo=codeigniter) |
| **Language** | ![PHP](https://img.shields.io/badge/PHP-8.2+-777BB4?style=flat-square&logo=php) |
| **Frontend & Styling** | ![TailwindCSS](https://img.shields.io/badge/Tailwind_CSS-38BDF8?style=flat-square&logo=tailwind-css) |
| **Testing** | ![PHPUnit](https://img.shields.io/badge/PHPUnit-10.5-777BB4?style=flat-square) |
| **CI/CD** | ![GitHub Actions](https://img.shields.io/badge/GitHub_Actions-2088FF?style=flat-square&logo=github-actions) |
| **Deployment** | ![InfinityFree](https://img.shields.io/badge/InfinityFree-Hosting-blue?style=flat-square) |

---

## 🏗️ Struktur Project

```
ebook_app/
├── app/
│   ├── Config/          # Konfigurasi aplikasi
│   └── Views/           # Template views
│       └── stories/     # Views untuk fitur baca
├── public/              # Assets publik (CSS, JS, uploads)
├── writable/            # Folder writable (logs, cache, sessions)
├── tests/               # Unit & session tests
├── vendor/              # Dependencies
├── composer.json        # PHP dependencies
└── .github/workflows/   # CI/CD deployment config
```

---

## 🚀 Getting Started

### Prerequisites

- PHP >= 8.2
- Composer
- Web Server (Apache/Nginx) atau PHP Built-in Server
- MySQL/MariaDB

### Installation

1. **Clone repository**
   ```bash
   git clone https://github.com/username/ebook_app.git
   cd ebook_app
   ```

2. **Install dependencies**
   ```bash
   composer install
   ```

3. **Konfigurasi environment**
   ```bash
   cp env .env
   # Edit file .env sesuai dengan konfigurasi server Anda
   ```

4. **Setup database**
   - Import file `ebook_db.sql` ke database MySQL Anda
   - Atur koneksi database di `app/Config/Database.php`

5. **Jalankan aplikasi**
   ```bash
   php spark serve
   ```
   
   Akses di: `http://localhost:8080`

---

## 🧪 Testing

```bash
composer test
```

---

## 📝 Dokumentasi

- 📋 **Analisis Sistem** - [`ANALISIS_SISTEM.md`](ANALISIS_SISTEM.md)
- 📙 **Dokumentasi Teknis** - [`DOKUMENTASI_TEKNIS.md`](DOKUMENTASI_TEKNIS.md)
- 📘 **Dokumentasi Umum** - [`DOKUMENTASI_UMUM.md`](DOKUMENTASI_UMUM.md)
- 📗 **Panduan Admin** - [`PANDUAN_PENGGUNAAN_ADMIN.md`](PANDUAN_PENGGUNAAN_ADMIN.md)
- ❓ **Q&A Reviewer** - [`TANYA_JAWAB_REVIEWER.md`](TANYA_JAWAB_REVIEWER.md)

---

## 🎨 Frontend Technologies

- **Tailwind CSS** - Utility-first CSS framework dengan palette "Ink" (#1A1A1A) & "Cream" (#F5F0E8)
- **Playfair Display** - Font klasik untuk kesan buku fisik
- **DM Sans** - Font sans-serif untuk keterbacaan digital
- **Vanilla JS** - Hero slider dengan transisi fade-in/fade-out

---

## 🔐 Admin Access

Untuk mengakses panel admin, silakan merujuk pada dokumentasi [`PANDUAN_PENGGUNAAN_ADMIN.md`](PANDUAN_PENGGUNAAN_ADMIN.md).

---

## 🤝 Kontribusi

1. Fork repository ini
2. Buat branch baru (`git checkout -b feature/AmazingFeature`)
3. Commit perubahan (`git commit -m 'Add some AmazingFeature'`)
4. Push ke branch (`git push origin feature/AmazingFeature`)
5. Buka Pull Request

---

## 📄 License

Project ini dilisensikan under MIT License - lihat file [LICENSE](LICENSE) untuk detail.

---

## 👨‍💻 Author

Dibuat dengan ❤️ untuk mata kuliah Praktikum Sistem Multimedia

**[Kunjungi Light's On](https://lightson.zya.me/)** untuk pengalaman membaca yang lebih nyaman.
