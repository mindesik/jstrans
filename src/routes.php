<?php

Route::get('/vendor/misterpaladin/jstrans/js/jstrans.js', function () {
    $trans = [];
    
    foreach (\Config::get('jstrans') as $file) {
        $trans[$file] = Lang::get($file);
    }
    
    $json = json_encode($trans);
    
    $js = sprintf(file_get_contents(__DIR__ . '/js/jstrans.js'), $json);
    
    return response($js)->header('Content-Type', 'application/javascript');
});