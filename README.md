# 📌 Ticketing Projeck (Laravel 11 & Brezze)

## Pendahuluan

Berikut merupakan projek ticketing berbasis laravel 11 dan brezze, di sini kita akan benar benar mulai dari 0 (penginstalan dan lain lain)

## Fitur

-   Sistem Login & Register
-   Admin & User
-   Sistem Ticket Dan CRUD
-   Menu Profile
-   Logout

## Persyaratan

-   PHP 8.2 Atau lebih
-   Composer
-   Node.js & NPM
-   MySQL/PostgreSQL
-   GitBash (Opsional)

## Instalasi

1. Lakukan Penginstalan Laravel Dan Brezze :

-   composer create-project laravel/laravel:^11.0 "nama projekmu" //Install Laravel 11
    jika laravel sudah terinstal, pastikan masuk ke projek mu (cd "nama projek") lalu lakukan penginstalan Brezze
-   composer require laravel/breeze --dev
-   php artisan breeze:install : - Which Breeze stack would you like to install? (Pilih Blade) - Would you like dark mode support? (yes/no) (Pilih No) - Which testing framework do you prefer? (Pilih PHPUnit)

2. Lakukan penginstalan NPM :

-   npm install, jika sudah jalankan npm run dev

## Konfigurasi Database & Table:

1.  .env :

-   DB_CONNECTION=mysql(atau lainnya)
    DB_DATABASE=(nama database)
    DB_USERNAME=(username mu)
    DB_PASSWORD=(sandi mu)

2. Table (Migration Di Laravel) :

-   m_user :
    return new class extends Migration
    {

          public function up(): void
          {
              Schema::create('m_user', function (Blueprint $table) {
                  $table->id();
                  $table->string('name');
                  $table->string('photo', 100)->nullable();
                  $table->string('bio')->nullable();
                  $table->string('m_role')->default('user');
                  $table->string('email')->unique();
                  $table->timestamp('email_verified_at')->nullable();
                  $table->string('password');
                  $table->rememberToken();
                  $table->timestamps();
              });

              Schema::create('password_reset_tokens', function (Blueprint $table) {
                  $table->string('email')->primary();
                  $table->string('token');
                  $table->timestamp('created_at')->nullable();
              });

              Schema::create('sessions', function (Blueprint $table) {
                  $table->string('id')->primary();
                  $table->foreignId('user_id')->nullable()->index();
                  $table->string('ip_address', 45)->nullable();
                  $table->text('user_agent')->nullable();
                  $table->longText('payload');
                  $table->integer('last_activity')->index();
              });
          }

          public function down(): void
          {
              Schema::dropIfExists('m_user');
              Schema::dropIfExists('password_reset_tokens');
              Schema::dropIfExists('sessions');
          }

    };

-   m_category :
    return new class extends Migration
    {

        public function up()
        {
            Schema::create('m_category', function (Blueprint $table) {
                $table->id();
                $table->string('category_name', 100);
                $table->boolean('status')->default(1);
                $table->timestamps();
            });
        }

        public function down()
        {
            Schema::dropIfExists('m_category');
        }

    };

-   m_ticket :
    return new class extends Migration
    {

        public function up()
        {
            Schema::create('m_ticket', function (Blueprint $table) {
                $table->id();
                $table->string('group_name', 255);
                $table->unsignedBigInteger('category_id');
                $table->string('status', 50)->default('Pending');
                $table->text('details');
                $table->unsignedBigInteger('handled_by')->nullable();
                $table->string('sender', 200);
                $table->timestamps();

                $table->foreign('category_id')->references('id')->on('m_category')->onDelete('cascade');
                $table->foreign('handled_by')->references('id')->on('users')->onDelete('set null');
            });
        }

        public function down()
        {
            Schema::dropIfExists('m_ticket');
        }

    };

Lalu jalankan Command "php artisan migrate"

## Penyusuaian
1. 
