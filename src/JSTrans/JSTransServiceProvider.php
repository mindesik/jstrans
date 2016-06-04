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
        
        Blade::directive('jstrans', function ($expression) use (&$trans) {
            $trans = [];
            
            foreach (\Config::get('jstrans') as $lang) {
                $trans[$lang] = Lang::get($lang);
            }
            
            $trans = json_encode($trans);
            
            return "<?php echo '<textarea name=\"jstrans\" disabled readonly>{$trans}</textarea><script src=\"/js/jstrans.js\" type=\"text/javascript\"></script>'; ?>";
        });
        
        Blade::directive('jstransval', function ($expression) {
            return '<?php
                $exp = ' . $expression . ';
                foreach ($exp as $key => $value) {
                    echo "<input type=\"text\" disabled=\"disabled\" name=\"jstrans-$key\" value=\"$value\" />";
                }
            ?>';
        });
    }
}
