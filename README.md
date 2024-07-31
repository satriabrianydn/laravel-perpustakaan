<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 2000 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[WebReinvent](https://webreinvent.com/)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Jump24](https://jump24.co.uk)**
- **[Redberry](https://redberry.international/laravel/)**
- **[Active Logic](https://activelogic.com)**
- **[byte5](https://byte5.de)**
- **[OP.GG](https://op.gg)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

## Cara Untuk Menjalankan Project Ini
1. Cloning project dengan mengetikkan perintah dibawah ini
```
$ git clone https://github.com/satriabrianydn/laravel-perpustakaan
```
2. Masuk ke direktori project
```
$ cd laravel-perpustakaan
```
3. Duplikat file .env.example menjadi .env (bisa dilakukan secara manual) atau mengetik perintah dibawah ini
```
$ cp .env.example .env
```
5. Jalankan perintah dibawah ini untuk menginstall dependencies
```
$ composer install
```
4. Jika sudah, jalankan perintah berikut untuk generate app key
```
$ php artisan key:generate
```
5. Setting nama database dibagian ```DB_DATABASE=``` dalam file .env menggunakan text editor (terserah memakai vs code ataupun text editor seperti sublime/notepad++
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=
```
6. Start Webserver (Bisa menggunakan XAMPP/Laragon)
7. Jalankan perintah migrate untuk mengisi table dalam database beserta dummy datanya
```
$ php artisan migrate --seed
```
Atau bisa juga tanpa memasukkan dummy data kedalam table
```
$ php artisan migrate
```
8. Kemudian jalankan perintah dibawah untuk membuat symlink dari folder storage agar dapat terlink ke folder public
```
$ php artisan storage:link
```
9. Download file Default Avatar dari link dibawah ini kemudian paste ke folder ```public/storage/avatar``` (Jika belum ada folder avatar bisa dibuat secara manual)
```
https://drive.google.com/file/d/15dyodlKak2tM-xqNZsi4nnw5q-grJGW1/view?usp=sharing
```
10. Download file No Image Available dari link dibawah ini kemudian paste ke folder ```public/storage/covers``` (Jika belum ada folder covers bisa dibuat secara manual)
```
https://drive.google.com/file/d/159-LuvvpjGDPGJol6IkhkS-hubLA_RpB/view?usp=sharing
```
11. Setelah semua selesai dilakukan, jalankan server dengan mengetik perintah
```
$ php artisan serve
```

## Default Login Credentials

```
Administrator
Email: admin@gmail.com
Password: 12345678

Petugas
Email: petugas@gmail.com
Password: 12345678

Mahasiswa
Email: mahasiswa@gmail.com
Password: 12345678
```

## PROGRESS PROJECT
- Halaman Utama: ?
- Kategori: ?
- Auth (Login, Register, Logout, Permission): 100%
- Dashboard:
	- Update Profil User: 100%
	- Update Profil Admin: 100%
	- Update Profil Petugas: 100%
	- CRUD Buku: 70% (Kurang Edit/Update)
	- CRUD Kategori: 70% (Kurang Edit/Update)
	- CRUD Petugas: 100% (Fitur Admin)
	- CRUD Mahasiswa: 100% (Fitur Admin/Petugas)
	- Transaksi: 0% (Fitur Admin/Petugas)
	- Transaksi User: 0%
