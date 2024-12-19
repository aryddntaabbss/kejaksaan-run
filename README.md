---

# Web Pendaftaran Event

Aplikasi **Web Pendaftaran Event** adalah platform berbasis web yang memungkinkan pengguna untuk mendaftar dan mengelola event secara online. Sistem ini dibuat untuk mempermudah penyelenggara event dalam menerima pendaftaran peserta serta mengelola data event secara efektif.

## Fitur Utama
- **Pendaftaran Event**: Pengguna dapat mendaftar untuk mengikuti event yang tersedia.
- **Manajemen Event**: Admin dapat menambah, mengubah, dan menghapus event yang akan diselenggarakan.
- **Tampilan Responsif**: Didesain untuk dapat digunakan dengan nyaman di perangkat desktop maupun mobile.

## Teknologi yang Digunakan
- **Backend**: Laravel
- **Frontend**: Tailwind
- **Database**: MySQL

## Prasyarat
Sebelum menjalankan aplikasi ini, pastikan Anda telah menginstal:
- PHP >= 8.0
- Composer
- MySQL
- Node.js (untuk pengelolaan frontend assets)
- Server Apache

## Instalasi

1. **Clone repository ini**
    ```bash
    git clone https://github.com/aryddntaabbss/kejaksaan-run.git
    cd kejaksaan-run
    ```

2. **Instalasi dependensi PHP dengan Composer**
    ```bash
    composer install
    ```

3. **Instalasi dependensi frontend dengan npm**
    ```bash
    npm install
    ```

4. **Membuat file `.env`**
    Salin file `.env.example` menjadi `.env` dan sesuaikan konfigurasi database, email, dan pengaturan lainnya.
    ```bash
    cp .env.example .env
    ```

5. **Generate key aplikasi**
    ```bash
    php artisan key:generate
    ```

6. **Migrasi database**
    ```bash
    php artisan migrate
    ```

7. **Jalankan server pengembangan**
    ```bash
    php artisan serve
    ```

    Aplikasi akan tersedia di `http://localhost:8000`.

## Struktur Direktori
```
├── app/                 # Kode sumber aplikasi
├── bootstrap/            # File bootstrap untuk aplikasi
├── config/               # Konfigurasi aplikasi
├── database/             # Migrasi dan seeding database
├── public/               # Aset publik seperti gambar, CSS, dan JS
├── resources/            # Views dan file frontend
├── routes/               # Definisi rute aplikasi
├── storage/              # Penyimpanan file upload dan cache
├── tests/                # Unit dan integrasi testing
├── .env                  # Pengaturan lingkungan aplikasi
├── composer.json         # Dependensi PHP
└── package.json          # Dependensi frontend
```

## Penggunaan

1. **Mendaftar Event**:
    - Pengguna dapat memilih event yang diinginkan dan mengisi form pendaftaran.
    - Setelah mengisi form, pengguna akan menerima email konfirmasi.

2. **Manajemen Event (Admin)**:
    - Admin dapat login menggunakan kredensial admin dan mengelola daftar event.
    - Admin dapat menambah, mengedit, atau menghapus event yang tersedia.

## Pengujian

Untuk menjalankan unit tests, gunakan perintah berikut:
```bash
php artisan test
```

## Kontribusi

Jika Anda ingin berkontribusi dalam pengembangan aplikasi ini, Anda dapat:
1. Fork repository ini.
2. Buat cabang baru (`git checkout -b fitur-baru`).
3. Lakukan perubahan dan commit (`git commit -am 'Menambahkan fitur baru'`).
4. Push ke cabang (`git push origin fitur-baru`).
5. Kirim pull request.

## Lisensi
Aplikasi ini menggunakan lisensi [MIT](LICENSE).

---