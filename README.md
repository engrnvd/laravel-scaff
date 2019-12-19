```
1.
composer install naveed/scaff

2.
app/Providers/AppServiceProvider.php:

if ($this->app->environment() !== 'production') {
    $this->app->register(ScaffServiceProvider::class);
}
```
