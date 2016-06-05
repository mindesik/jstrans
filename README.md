# JSTrans

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

Edit `config/jstrans.php`, add some translations to load:

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
var foo = jstrans('validation'); // Will return whole 'validation.php' array
var bar = jstrans('validation.accepted'); // Will return 'The :attribute must be accepted.'
var baz = jstrans('validation.foo.bar'); // Will return 'validation.foo.bar'
```

## Custom values

Additional you may specify custom values and overwrite localization files:

```php
@jstrans([
    'validation' => 'new value',
])

@jstrans([
    'foo' => trans('bar'),
    'fooo' => 'baaar',
])
```