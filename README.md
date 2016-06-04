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

## Usage

Include code above your javascript code:

```html
<script src="/js/jstrans.js" type="text/javascript"></script>
```

Make some translation or simple values in your blade view:

```
@jstrans([
    'foo' => trans('bar'),
    'fooo' => 'baaar',
])
```

And use it in your javascript:

```javascript
var foo = jstrans('foo'); // The value will be 'bar'
var fooo = jstrans('fooo'); // The value will be 'baaar'
```