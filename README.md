## SIM Pendaftaran Pasien Rawat Jalan – Backend (Laravel 12)

Aplikasi backend dan frontend untuk pendaftaran pasien rawat jalan dengan fitur manajemen pasien dan kunjungan. Dibangun menggunakan Laravel 12, Yajra DataTables (server-side), Select2, dan Vite. Aplikasi ini dibuat dengan tujuan memenuhi mini project sebagai recruitement untuk PT Alfatih Solusindo (Astech).

### Fitur

-   **Manajemen Pasien**: tambah, edit, hapus, dan listing dengan DataTables.
-   **Manajemen Kunjungan**: pendaftaran kunjungan, detail kunjungan beserta data pasien, filter per pasien.
-   **Validasi**: server-side (Laravel) dan client-side (JavaScript).
-   **UI/UX**: CoreUI, Select2, SweetAlert, dan DataTables server-side.
-   **Database**: PostgresQL sangat direkomendasikan, SQLite (default) untuk setup yang cepat.

---

## Persyaratan

-   PHP 8.2+
-   Composer 2+
-   Node.js 18+ dan npm 9+
-   Git (opsional)

---

## Mulai Cepat

```bash
# 1) Clone proyek
git clone <repo-url>
cd sim-pendaftaran-pasien-rawat-jalan-be

# 2) Install dependency PHP & JS
composer install
npm install

# 3) Salin env & generate app key
copy .env.example .env   # Windows PowerShell
php artisan key:generate

# 4) Siapkan database SQLite
# (Laravel sudah mengarah ke database/database.sqlite)
type nul > database\database.sqlite  # Windows

# 5) Jalankan migrasi & seeder (data contoh pasien & kunjungan)
php artisan migrate --seed

# 6) Jalankan server & Vite (dua terminal) atau gunakan skrip dev
php artisan serve
npm run dev
# atau satu perintah terintegrasi (butuh npx concurrently)
composer run dev
```

Setelah berjalan, akses aplikasi di `http://127.0.0.1:8000`.

---

## Konfigurasi Environment

Contoh `.env` minimum untuk SQLite:

```env
APP_NAME="SIM Pendaftaran Pasien"
APP_ENV=local
APP_KEY=
APP_DEBUG=true
APP_URL=http://127.0.0.1:8000

LOG_CHANNEL=stack

DB_CONNECTION=sqlite
DB_DATABASE=database/database.sqlite
```

Catatan: Untuk Windows, pastikan file `database/database.sqlite` sudah dibuat.

---

## Perintah Berguna

-   Jalankan server lokal: `php artisan serve`
-   Jalankan Vite dev: `npm run dev`
-   Build aset produksi: `npm run build`
-   Migrasi database: `php artisan migrate` / `php artisan migrate:fresh --seed`
-   Jalankan test: `php artisan test`
-   Format kode (Pint): `vendor\\bin\\pint` (Windows) / `./vendor/bin/pint`

---

## Arsitektur Singkat

-   `app/Models/Patient.php`, `app/Models/Visit.php`: model utama.
-   `app/Http/Controllers/PatientController.php`, `VisitController.php`: logika fitur pasien/kunjungan.
-   `resources/views/**`: Blade views (patients, visits, layouts).
-   `routes/web.php`: routing web & endpoint DataTables.
-   `database/migrations/**`: skema tabel; `database/seeders/**`: data contoh.

---

## API (v1)

-   Base URL: `/api/v1`
-   Autentikasi: tidak ada (demo)
-   Header: `Accept: application/json`, `Content-Type: application/json` (untuk POST/PUT)

Catatan:

-   Endpoint index (`GET /patients`, `GET /visits`) mengembalikan response kompatibel DataTables (server-side processing).
-   Endpoint detail dan mutasi (`show/store/update/destroy`) mengembalikan JSON Resource standar.

### Patients

-   GET `/api/v1/patients` (mendukung parameter DataTables seperti `draw`, `start`, `length`, `search[value]`, dll.)
-   GET `/api/v1/patients/{id}`
-   POST `/api/v1/patients`
-   PUT `/api/v1/patients/{id}`
-   DELETE `/api/v1/patients/{id}`

Contoh POST:

```json
{
    "name": "Budi",
    "nik": "1234567890123456",
    "gender": "L",
    "birth_date": "1990-01-01",
    "phone": "81234567890",
    "address": "Jl. Kebon Jeruk"
}
```

### Visits

-   GET `/api/v1/visits` (opsional `patient_id` untuk filter; response DataTables berisi kolom `patient_name`)
-   GET `/api/v1/visits/{id}`
-   POST `/api/v1/visits`
-   PUT `/api/v1/visits/{id}`
-   DELETE `/api/v1/visits/{id}`
-   GET `/api/v1/patients/{patient}/visits` (riwayat kunjungan pasien; JSON ter-paginate)

---

## Catatan Implementasi

-   DataTables server-side: kolom aksi (edit/hapus), indeks baris, dan truncation kolom keluhan di index (maks 20 karakter).
-   Form pasien & kunjungan menggunakan partial yang dapat digunakan ulang (create/edit/detail readonly).
-   Validasi client-side: panjang minimal, format NIK/HP, tanggal tidak di masa depan.
-   Hapus data menggunakan SweetAlert konfirmasi (AJAX) pada listing pasien.

---

## Troubleshooting

-   Error SQLite: pastikan file `database/database.sqlite` ada dan dapat ditulis OS.
-   Aset tidak ter-load: jalankan `npm install` lalu `npm run dev`/`npm run build`.
-   Port bentrok: ubah `APP_URL` atau jalankan `php artisan serve --port=8001`.

---

## Lisensi

Proyek ini dirilis di bawah lisensi MIT.
