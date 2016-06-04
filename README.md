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
<?php

return [
    'validation',
];
```

Include this blade directive in your blade template before your javascript files:

```html
@jstrans
```

And use it in your javascript like Laravel's `trans()` function:

```javascript
var foo = jstrans('validation'); // Will print whole `validation.php` array
```

Additional you can specify multiple custom values and overwrite localization files:

```
@jstrans([
    'validation' => 'new value',
])

@jstrans([
    'foo' => trans('bar'),
    'fooo' => 'baaar',
])
```