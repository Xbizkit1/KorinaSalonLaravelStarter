# Korina Beauty Salon — Laravel starter

This is a 50% implementation of the system described in the supplied study. It includes a polished public landing page plus working foundation screens for:

- Cash and GCash transaction recording with automatic per-service commission
- Central inventory with low-stock highlighting and restocking
- Staff shift viewing, including Peak and Day Off states
- Seed data for the 12 package services listed in the document

## Finish installing Laravel

The Laravel download could not complete in this workspace during generation, so use this source folder with a fresh Laravel 12 application:

```powershell
cd C:\Users\User\Documents\Codex\2026-09-20\ca
composer create-project laravel/laravel korina-final "12.*"
Copy-Item .\korina-salon-starter\app\* .\korina-final\app\ -Recurse -Force
Copy-Item .\korina-salon-starter\database\* .\korina-final\database\ -Recurse -Force
Copy-Item .\korina-salon-starter\resources\* .\korina-final\resources\ -Recurse -Force
Copy-Item .\korina-salon-starter\routes\web.php .\korina-final\routes\web.php -Force
cd .\korina-final
Copy-Item .env.example .env
php artisan key:generate
New-Item database\database.sqlite -ItemType File
php artisan migrate:fresh --seed
php artisan serve
```

Open `http://127.0.0.1:8000` after the server starts. In `.env`, set `DB_CONNECTION=sqlite` and comment out the other `DB_*` settings if Laravel does not automatically pick up `database/database.sqlite`.

## Create a new Laravel project yourself

1. Install PHP 8.2+ and Composer, then open PowerShell in the folder where you keep projects.
2. Run `composer create-project laravel/laravel my-new-app "12.*"`.
3. Enter it with `cd my-new-app`, copy `.env.example` to `.env`, and run `php artisan key:generate`.
4. Create `database/database.sqlite`, set `DB_CONNECTION=sqlite` in `.env`, then run `php artisan migrate`.
5. Start it with `php artisan serve` and visit the address it prints (normally `http://127.0.0.1:8000`).

For new pages, add a route to `routes/web.php`, create a controller with `php artisan make:controller NameController`, and add a Blade page under `resources/views`.

## Remaining work

Authentication/role protection, schedule creation/editing, service CRUD, product consumption per service, owner approval workflow, reports, validation tests, and deployment are intentionally left for the next 50%.
