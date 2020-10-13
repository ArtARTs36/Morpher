### Morpher API [Only Russian]

---

Library for working with API http://morpher.ru/ws3/

---

### Installation

`composer require artarts36/morpher`

---

### Usage

```php
use ArtARTs36\Morpher\Client;
use ArtARTs36\Morpher\Morpher;

$morpher = new Morpher(new Client(new \GuzzleHttp\Client()));

var_dump($morpher->declineNoun('Человек')->accusative());
var_dump($morpher->declineAdjective('Приветливый')->male());
var_dump($morpher->declineDate('2020-10-13')->prepositional()));
var_dump($morpher->declineDate(new DateTime())->dative());
```
