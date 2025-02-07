# 🎟️ Ticketing Project (Laravel 11 & Breeze)

## 📌 Pendahuluan

Proyek ini merupakan sistem ticketing berbasis Laravel 11 dengan autentikasi menggunakan Breeze.

## ✨ Fitur

-   🔐 Sistem Login & Register
-   👥 Role Admin & User
-   🎫 Sistem Ticket dengan CRUD
-   🔍 Fitur Search pada Ticket
-   👤 Menu Profile
-   🚪 Logout

## ⚙️ Persyaratan

-   🖥️ PHP 8.2 atau lebih
-   🎼 Composer
-   🌍 Node.js & NPM
-   🛢️ MySQL/PostgreSQL
-   🖥️ GitBash

## 📥 Instalasi

```bash
git clone https://github.com/envythe1st/Ticketing.git
cd Ticketing
npm install && npm run dev
```

## 🔧 Konfigurasi

1. Ubah file `.env` sesuai dengan pengaturan Anda, 
   - Contoh:
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=db_ticketing
   DB_USERNAME=root
   DB_PASSWORD=
2. Pada database/migration terdapat contoh tabel untuk kalian, kalian bisa jalankan perintah berikut untuk migrasi database:

```bash
php artisan migrate
php artisan db:seed
```

## 🎨 Tampilan Web

### 🔑 Tampilan Login

![Tampilan Login](public/image/login.png)

### 📝 Tampilan Register

![Tampilan Register](public/image/register.png)

### 🏠 Tampilan Dashboard

![Tampilan Dashboard](public/image/dashboard.png)

### 🎟️ Tampilan Ticketing

![Tampilan Ticketing](public/image/Ticketing.png)

### ➕ Tampilan Create Ticket

![Tampilan Create Ticket](public/image/create_ticket.png)

### ✏️ Tampilan Edit Ticket

![Tampilan Edit Ticket](public/image/edit_ticket.png)

### 👤 Tampilan Profile

![Tampilan Profile](public/image/profile.png)

### 🖊️ Tampilan Edit Profile

![Tampilan Edit Profile](public/image/edit_profile.png)

### ⚙️ Tampilan Setting

![Tampilan Setting](public/image/setting.png)
