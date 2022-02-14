# Moduł Weather

## Wymagania
- PHP 7.4.* 
- Laravel 8.x
- Postgres SQL

## Instrukcja instalacji modułu
Zainstalować Laravel 8.x
```bash
composer create-project laravel/laravel:^8.0 example-app
```
Skonfigurować plik .env w szczególności ustawienia bazy danych i klucz api open weather np.
```bash
APP_URL=http://pogoda.test

DB_CONNECTION=pgsql
DB_HOST=postgres
DB_PORT=5432
DB_DATABASE=database
DB_USERNAME=username
DB_PASSWORD=password

OPEN_WEATHER_API_KEY=
```

Dodać adresy url publicznego repozytorium do głównego pliku composer.json

```json
{
  "require": {
    "gzarow/weather": "0.1.0"
  },
  "repositories": [
    {
      "type": "git",
      "url": "https://github.com/gzarow/weather.git"
    }
  ]
}
```
Wykonać polecenie

```bash
$ composer update
```

Utworzyć strukturę bazy danych:

```bash
php artisan migrate
```

Wykonać seeda użytkowników mockowych i ich lokalizacji przez wydanie poleceń (opcjonalnie do testów):
Seedowanych jest 5 userów i ich lokalizacje.
```bash
php artisan db:seed --class=Gzarow\\Weather\\Database\\Seeders\\UsersSeeder
php artisan db:seed --class=Gzarow\\Weather\\Database\\Seeders\\UserLocalizationSeeder
```
Publikacja konfiguracji

```bash
php artisan vendor:publish --tag=config
```
Api pobierające pogodę dla usera
```bash
GET /api/weather/{user}
```
Lokalnie można testować czy działa harmonogram cron, który jest ustawiony na co 15min
```bash
php artisan schedule:work
```
Można też użyć polecenia konsolowego do aktualizacji pogody
```bash
php artisan weather:update
```