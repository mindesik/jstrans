# JSTrans

[![Latest Stable Version](https://poser.pugx.org/misterpaladin/jstrans/v/stable)](https://packagist.org/packages/misterpaladin/jstrans) [![Total Downloads](https://poser.pugx.org/misterpaladin/jstrans/downloads)](https://packagist.org/packages/misterpaladin/jstrans) [![Latest Unstable Version](https://poser.pugx.org/misterpaladin/jstrans/v/unstable)](https://packagist.org/packages/misterpaladin/jstrans) [![License](https://poser.pugx.org/misterpaladin/jstrans/license)](https://packagist.org/packages/misterpaladin/jstrans)

Use Laravel translations in javascript

## Installation

Install package:

```
$ composer require misterpaladin/jstrans
```

Add `JSTransServiceProvider` to your `config/app.php`:

```php
<?php

// ...

'providers' => [
    MisterPaladin\JSTrans\JSTransServiceProvider::class,
],
```

Publish config:

```
$ php artisan vendor:publish --tag=jstrans
```

## Usage

Edit `config/jstrans.php`, add translations you wish to use in javascript:

```php
return [
    'validation',
];
```

Include this script in your views before your javascript files:

```html
<script src="/js/jstrans.js" type="text/javascript"></script>
```

And use it in your javascript like Laravel's `trans()` function:

```javascript
var validation = jstrans('validation'); // Will return whole 'validation.php' array
var accepted = jstrans('validation.accepted'); // Will return 'The :attribute must be accepted.'
var bar = jstrans('validation.foo.bar'); // Will return 'validation.foo.bar'
```

## Custom values

You may specify additional values to overwrite localization files:

```php
@jstrans([
    'validation' => 'new value',
])

@jstrans([
    'foo' => trans('bar'),
    'fooo' => 'baaar',
])
```

```javascript
var validation = jstrans('validation'); // Will return whole 'new value', instead of 'validation.php' array
```