<?php

Route::get('/js/jstrans.js', function () {
    foreach (\Config::get('jstrans') as $lang) {
        $trans[$lang] = Lang::get($lang);
    }
    
    $json = json_encode($trans);
    
    $js = sprintf(file_get_contents(__DIR__ . '/js/jstrans.js'), $json);
    
    return response($js)->header('Content-Type', 'application/javascript');
});