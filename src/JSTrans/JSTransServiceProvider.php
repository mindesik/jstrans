<?php

namespace MisterPaladin\JSTrans;

use Illuminate\Support\ServiceProvider;
use Blade;
use Lang;
use View;

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
        $this->publishes([
            __DIR__ . '/../config.php' => config_path('jstrans.php'),
        ], 'jstrans');
        
        Blade::directive('jstrans', function ($expression) {
            return '<?php
                $exp = ' . $expression . ';
                foreach ($exp as $key => $value) {
                    echo "<input type=\"hidden\" disabled=\"disabled\" name=\"jstrans-value-for-$key\" value=\"$value\" />";
                }
            ?>';
        });
    }
}
