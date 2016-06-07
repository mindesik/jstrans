# JSTrans

[![Latest Stable Version](https://poser.pugx.org/misterpaladin/jstrans/v/stable)](https://packagist.org/packages/misterpaladin/jstrans) [![Total Downloads](https://poser.pugx.org/misterpaladin/jstrans/downloads)](https://packagist.org/packages/misterpaladin/jstrans) [![Latest Unstable Version](https://poser.pugx.org/misterpaladin/jstrans/v/unstable)](https://packagist.org/packages/misterpaladin/jstrans) [![License](https://poser.pugx.org/misterpaladin/jstrans/license)](https://packagist.org/packages/misterpaladin/jstrans)

Использование локализаций Laravel в javascript

Other languages:
- [English](../master/README.md)

## Установка

Установить пакет:

```
$ composer require misterpaladin/jstrans
```

Добавить `JSTransServiceProvider` в `config/app.php`:

```php
'providers' => [
    MisterPaladin\JSTrans\JSTransServiceProvider::class,
],
```

Опубликовать конфиг:

```
$ php artisan vendor:publish --tag=jstrans
```

## Использование

Отредактировать `config/jstrans.php`, добавить локализации которые вы хотите использовать в javascript:

```php
return [
    'validation',
];
```

Подключите этот кусок кода ДО ваших javascript файлов:

```html
<script src="/js/jstrans.js" type="text/javascript"></script>
```

Используйте функцию `trans()` в javascript как в Laravel:

```javascript
var validation = jstrans('validation'); // Вернет весь массив из 'validation.php'
var accepted = jstrans('validation.accepted'); // Вернет 'The :attribute must be accepted.'
var bar = jstrans('validation.foo.bar'); // Вернет 'validation.foo.bar'
```

## Пользовательские значения

Так же можно перезаписать значения локализаций:

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
var validation = jstrans('validation'); // Вернет 'new value', вместо массива из 'validation.php'
```