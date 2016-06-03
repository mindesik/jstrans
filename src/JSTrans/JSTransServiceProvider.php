<?php

namespace MisterPaladin\JSTrans;

use Illuminate\Support\ServiceProvider;
use Blade;

class JSTransServiceProvider extends ServiceProvider
{
    public function boot()
    {
        if (! $this->app->routesAreCached()) {
            require __DIR__ . '/../routes.php';
        }
    }
    
    public function register()
    {
        Blade::directive('jstrans', function ($expression) {
            return '<?php
                $exp = ' . $expression . ';
                foreach ($exp as $key => $value) {
                    echo "<input type=\"hidden\" disabled=\"disabled\" name=\"jstrans-$key\" value=\"$value\" />";
                }
            ?>';
        });
    }
}
