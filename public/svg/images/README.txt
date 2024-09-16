composer self-update //kalo perlu
composer create-project laravel/laravel example-app
composer require laravel/ui
composer require livewire/livewire
php artisan ui:auth (yes)
php artisan make:seeder SeederName
php artisan migrate --seed
npm i -D bootstrap @popperjs/core sass | install bs5
resources->sass->app.scss | @import 'bootstrap/scss/bootstrap';
	 ->js->app.js | import * as bootstrap from 'bootstrap';
php artisan livewire:layout
php artisan make:livewire Home
php artisan make:model Member -m
php artisan make:migration create_add_