<h1 align="center">
  <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="224px"/><br/>
  Guestbook
</h1>
<p align="center">Guestbook is a simple project for Guestbook Management App</p>

<p align="center"><a href="https://github.com/dibaliqaja/guest-book/releases" target="_blank"><img src="https://img.shields.io/badge/version-v0.0.1-red?style=for-the-badge&logo=none" alt="system version" /></a>&nbsp;<a href="https://pkg.go.dev/github.com/create-go-app/cli/v3?tab=doc" target="_blank"><img src="https://img.shields.io/badge/Laravel-8.75.0-fb503b?style=for-the-badge&logo=laravel" alt="laravel version" /></a>&nbsp;<img src="https://img.shields.io/badge/license-mit-red?style=for-the-badge&logo=none" alt="license" /></p>

### Features
- Admin Panel
  - Login
  - Logout
  - List table Guestbook
  - Add Guest Book
  - Edit Guest Book
  - Delete Guest Book
- Frontpage
  - Show List Guest Book
  - Add Guest Book with input:
    - First Name and Last Name
    - Organization
    - Address
    - Province
    - City

### ⚙️ Requirements
- PHP >= 7.2.5
- BCMath PHP Extension
- Ctype PHP Extension
- Fileinfo PHP extension
- JSON PHP Extension
- Mbstring PHP Extension
- OpenSSL PHP Extension
- PDO PHP Extension
- Tokenizer PHP Extension
- XML PHP Extension

### ⚡️ Installation
1. Clone GitHub repo for this project locally
```bash
$ git clone https://github.com/dibaliqaja/guest-book.git
```
2. Change directory in project which already clone
```bash
$ cd guest-book
```
3. Install Composer dependencies
```bash
$ composer install
```
4. Install NPM dependencies
```bash
$ npm install
```
5. Create a copy of your .env file
```bash
$ cp .env.example .env
```
6. Generate an app encryption key
```bash
$ php artisan key:generate
```
7. Create an empty database for our application

8. In the .env file, add database information to allow Laravel to connect to the database
```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE={database-name}
DB_USERNAME={username-database}
DB_PASSWORD={password-database}
```
9. Migrate the database
```bash
$ php artisan migrate
```
10. Seed the database
```bash
$ php artisan db:seed
```
11. Running project
```bash
$ npm run dev
```
```bash
$ php artisan serve
```

### Admin Credential in Seeder
> Email : admin@email.com <br>
> Pass : password

## Screenshoots
![image](https://imgur.com/I8lYyYY.png)
![image](https://imgur.com/jr1unC7.png)
![image](https://imgur.com/HNlPJFZ.png)
![image](https://imgur.com/UgAjNM7.png)

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
