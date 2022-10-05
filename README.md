```
1.
composer install naveed/scaff

2.
app/Providers/AppServiceProvider.php -> register():

if ($this->app->environment() === 'local') {
    $this->app->register(ScaffServiceProvider::class);
}

3.
php artisan vendor:publish --provider="Naveed\Scaff\ScaffServiceProvider"

4. Access the generator interface
<project.url>/naveed/scaff

```
