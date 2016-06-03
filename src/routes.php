<?php

Route::get('/js/jstrans.js', function () {
    return response(file_get_contents(__DIR__ . '/js/jstrans.js'))->header('Content-Type', 'application/javascript');
});