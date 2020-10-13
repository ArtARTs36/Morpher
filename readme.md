### Morpher API [Only Russian]

---

Library for working with API http://morpher.ru/ws3/

---

### Installation

`composer require artarts36/morpher`

---

### Usage

1. Simple

```php
use ArtARTs36\Morpher\Client;
use ArtARTs36\Morpher\Morpher;

$morpher = new Morpher(new Client(new \GuzzleHttp\Client()));

var_dump($morpher->declineNoun('Человек')->accusative());
var_dump($morpher->declineAdjective('Приветливый')->male());
var_dump($morpher->declineDate('2020-10-13')->prepositional()));
var_dump($morpher->declineDate(new DateTime())->dative());
```

2. Binding in Laravel

in bootstrap/app.php

```php
$app->singleton(\ArtARTs36\Morpher\Contracts\Client::class, function () {
    return new ArtARTs36\Morpher\Client(new \GuzzleHttp\Client());
});

$app->singleton(\ArtARTs36\Morpher\Contracts\Morpher::class, function () use ($app) {
    return new ArtARTs36\Morpher\Morpher($app->get(\ArtARTs36\Morpher\Contracts\Client::class));
});
```
