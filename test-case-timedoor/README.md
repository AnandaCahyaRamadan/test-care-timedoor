# 🧪 Test Case

Project ini merupakan hasil pengerjaan **test case** menggunakan framework **Laravel**.

---

## 📋 Requirement

Sebelum menjalankan project ini, pastikan sudah menginstal:

- **PHP** >= 8.2
- **Composer**
- **MySQL** atau **MariaDB**
- **Git**

---

## ⚙️ Langkah Instalasi

Ikuti langkah-langkah berikut untuk menjalankan project secara lokal:

### 1. Clone Repository

```bash
git clone https://github.com/AnandaCahyaRamadan/test-care-timedoor.git
```

### 2. Masuk ke Direktori

```bash
cd test-case-timedoor
```

### 3. Install Dependency

```bash
composer update
```

### 4. Salin .env example dan sesuaikan

```bash
cp .env.example .env
```

```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=test_timedoor
DB_USERNAME=root
DB_PASSWORD=
```

### 5. Lakukan key generate

```bash
php artisan key:generate
```

### 6.Buat database (sesuaikan dengan yang di .env)

```bash
misal test_timedoor
```

### 7.Jalankan Migrasi dan Seeder

```bash
php artisan migrate:fresh --seed
```

### 7.Jalankan Server

```bash
php artisan serve
```
