## Tentang Aplikasi
Aplikasi plikasi berbasis website untuk informasi dan pendaftaran beasiswa
Dikembangkan oleh Hilmy Ahmad Haidar

## Instalasi
Clone repository ini ke folder lokal anda
```bash
git clone https://github.com/hilmyha/project-serkom.git
```
Masuk ke folder aplikasi
```bash
cd project-serkom
```
Install dependency
```bash
composer install && npm install
```
Buat file .env dari file .env.example
```bash
cp .env.example .env
```
Generate key
```bash
php artisan key:generate
```
Konfigurasi database pada file .env
```bash
DB_CONNECTION=mysql
DB_DATABASE=[nama_database]
DB_USERNAME=[username_database]
DB_PASSWORD=[password_database]
```
Migrasi database
```bash
php artisan migrate
```
Seed database
```bash
php artisan db:seed
```
Jalankan aplikasi
```bash
php artisan serve
```

## Framework 
-   `Laravel` => Framework PHP untuk backend aplikasi
-   `Tailwind CSS` => Framework CSS untuk styling aplikasi

## Tools
-   `VS Code` => Code Editor
-   `Laragon` => Local Server

## Other Library
-   `ApexChartJS` => Library dengan JavaScriptuntuk grafik
-   `JQuery` => Library JavaScript untuk manipulasi DOM
-   `Flowbite` => Library CSS untuk pendukung Tailwind CSS

## Direktori Utama "app/"
-   `Folder app`: Berisi kode aplikasi inti, termasuk model, controller, dan logika bisnis.
-   `Folder bootstrap`: Berisi file yang diperlukan untuk mem-boot aplikasi. File ini termasuk file autoload dan file konfigurasi.
-   `Folder config`: Berisi konfigurasi aplikasi, database, dan layanan lainnya. File ini juga berisi file yang menentukan konfigurasi untuk setiap lingkungan.
-   `Folder database`: Berisi migrasi database dan seeders. File ini juga berisi file konfigurasi untuk koneksi database.
-   `Folder public`: Direktori publik yang dapat diakses langsung dari web server. File-file di sini bisa diakses oleh pengguna.
-   `Folder resources`: Berisi file sumber daya seperti tampilan (views), file konfigurasi, dan asset (CSS, JavaScript).
-   `Folder routes`: Berisi definisi rute aplikasi.
-   `Folder storage`: Berisi file yang dihasilkan oleh aplikasi, seperti file log, cache, dan file-file yang diunggah.

## Direktori Tambahan

-   `File .env.example`: File contoh yang berisi variabel lingkungan aplikasi, yang harus disalin ke file .env dan disesuaikan.
-   `File .gitattributes`: File yang menentukan atribut untuk jalur proyek dalam Git.
-   `File .gitignore`: File yang menentukan file atau folder yang harus diabaikan oleh Git.
-   `File composer.json`: File yang menentukan informasi dan dependensi proyek PHP.
-   `File package.json`: File yang menentukan informasi dan dependensi proyek Node.js.
-   `File phpunit.xml`: File yang menentukan konfigurasi untuk pengujian aplikasi dengan PHPUnit.
-   `File README.md`: File ini, yang berisi penjelasan tentang proyek.
-   `File app.config.js`: File yang menentukan konfigurasi untuk aplikasi, seperti nama, versi, dll
-   `File tailwind.config.js`: File yang menentukan konfigurasi untuk Tailwind CSS.