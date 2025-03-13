<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

---

## 🚀 Proje Hakkında

Bu proje, **Laravel tabanlı bir Çalışan ve Görev Yönetim Sistemidir**.  
Sistem, çalışanları ve onların görevlerini yönetmek için geliştirilmiştir.

Başlıca **özellikler şunlardır**:

- **Çalışan Yönetimi**
    - Çalışan ekleme, düzenleme ve listeleme.
    - Çalışan bilgilerini güncelleme.
- **Görev Yönetimi**
    - Görev oluşturma, güncelleme ve silme.
    - Bir çalışana görev atama.
    - Görev durumunu güncelleme (`pending`, `in_progress`, `completed`).
- **Görev ve Çalışan İlişkisi**
    - Belirli bir çalışana ait görevleri listeleme.
    - Görev ile çalışan ilişkisini görüntüleme.

---

## ⚙️ Gereksinimler

Bu projeyi çalıştırmak için aşağıdaki araçlara ihtiyacınız var:

- **PHP** >= 8.1
- **Composer** >= 2.0
- **PostgreSQL** >= 12

---

## 🔧 Kurulum

### 1️⃣ Depoyu Klonlayın

```bash
git clone https://github.com/kullaniciadi/gorev-yonetim-sistemi.git
cd gorev-yonetim-sistemi
```

### 2️⃣ Bağımlılıkları yükleyin.

```bash
composer install
```

### 3️⃣ Çevresel Değişkenleri Ayarlayın

```bash
cp .env.example .env
```

```bash
DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=dogan_burda_case_db
DB_USERNAME=postgres
DB_PASSWORD=admin
```

### 4️⃣ Uygulama Anahtarını Oluşturun

```bash
php artisan key:generate
```

### 5️⃣ Veritabanını Migrasyon ve Seed ile Kurun

```bash
php artisan migrate --seed
```


## 📌 API Endpoint'leri

Bu sistem, **RESTful API olarak çalışan** bir görev yönetim uygulamasıdır.

| **Metod**  | **Endpoint**                        | **Açıklama**                     |
|------------|-------------------------------------|----------------------------------|
| **GET**    | `/api/employees`                   | Tüm çalışanları listele         |
| **GET**    | `/api/employees/{id}`              | Belirli çalışanı getir          |
| **GET**    | `/api/employees/{id}/tasks`        | Çalışana ait görevleri getir    |
| **POST**   | `/api/employees`                   | Yeni çalışan ekle               |
| **GET**    | `/api/tasks`                       | Tüm görevleri listele           |
| **GET**    | `/api/tasks/{id}`                  | Belirli görevi getir            |
| **POST**   | `/api/tasks`                       | Yeni görev oluştur              |
| **PUT**    | `/api/tasks/{id}`                  | Görevi güncelle                 |
| **PATCH**  | `/api/tasks/{id}/status`           | Sadece görev durumunu güncelle  |

