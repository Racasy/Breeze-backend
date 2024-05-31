# LAI RUNNORU:

composer install, vai ja tas nestrādā composer update;
php artisan serve;

# LAI IZVEIDOTU .env
.env ģenerēšāna kkā nestrādā projektā, tādēļ dari šādi:
cp .env.example .env;
php artisan key:generate;
pēc tam, pievienot db.
