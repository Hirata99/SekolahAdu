#  SekolahAdu - Sistem Pengaduan Sarana Sekolah

## Deskripsi
Aplikasi web untuk mengelola laporan kerusakan fasilitas sekolah secara digital.

## Fitur
- ✅ User dapat membuat laporan pengaduan dengan upload foto
- ✅ Admin dapat mengelola status laporan (Pending, Proses, Selesai)
- ✅ Search & Filter laporan
- ✅ Dashboard statistik untuk admin
- ✅ Responsive design (Bootstrap 5)

## Tech Stack
- Laravel 11
- MySQL
- Bootstrap 5
- Laravel Breeze (Auth)

## Instalasi
1. Clone repository
2. `composer install`
3. `cp .env.example .env`
4. `php artisan key:generate`
5. Setup database di `.env`
6. `php artisan migrate --seed`
7. `php artisan storage:link`
8. `npm install && npm run build`
9. `php artisan serve`

## Default Login
- Admin: admin@sekolah.adu / password
- User: Register sendiri

## License
MIT