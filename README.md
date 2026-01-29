# Leo
Laravel-based SPA for servers orchestration.

## Stack
- Laravel 12
- Vue 3
- Vite
- Tailwind
- Laravel Sanctum
- Docker
- Blade Components
- Ziggy (for frontend routing)
- Schad Vue
- Laravel Sanctum
- Axios

## Installation
- pull repo
- run `docker-compose up -d --build`
- run `composer install`
- run `cp .env.example .env`
- edit `.env`
- run `php artisan key:generate`
- run `php artisan migrate`
- run `php artisan db:seed`
- run `php artisan storage:link`
- check permissions for `storage | public | bootstrap/cache`
- run `npm install`
- run `npm run dev`

### notice
run throught
npm run dev -- --host 0.0.0.0 --port 5173

