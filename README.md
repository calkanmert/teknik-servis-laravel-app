# Proje Hakkında

PHP Laravel ve Mysql kullanarak geliştirdiğim teknik servis scripti.

[DEMO](http://104.248.29.52/)

## Özellikler
- Yönetim Paneli
- Müşteri oluşturma / düzenleme / silme
- Cihaz oluşturma / silme
- Müşteri bilgileri ile oluşturulan cihazlar hakkında bilgi alma

## Kurulum
```bash
git clone https://github.com/calkanmert/teknik-servis-laravel-app.git
```
```bash
cd teknik-servis-laravel-app
```
```bash
cp .env.example .env
```
```bash
composer install
```
```bash
php artisan key:generate
```
```bash
php artisan migrate --seed
```

## License
[MIT](https://choosealicense.com/licenses/mit/)

## Screenshots
![image info](https://i.hizliresim.com/t8ic2z1.jpg)

![image info](https://i.hizliresim.com/rjqxnso.jpg)
