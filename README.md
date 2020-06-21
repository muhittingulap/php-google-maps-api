# php-google-maps-api
Google Maps apilerinin hızlı kullanılması için php ile yapılmış hızlı kullanım api class

### Projeye Ekle

```php
include("src/maps.php");

$maps= new maps();
```

### Maps Api Key Tanimalama

```php
$maps->setKey('YOUR_GOOGLE_MAPS_API_KEY');
```

### Sonuçları Almak

```php
$google_return_method='json'; // default olarak : json dur.json veya xml googledan dönecek sonuç
$api_return_method='array'; // default olarak : array dir. json veya array apiden dönecek sonuç

$maps->setApiResponseType($google_return_method,$api_return_method)->getResponse();
```

### Mesafe maps api (distancematrix)

#### `getDistance()`

iki rota arasında km ve süreyi geri dönen google maps apisi.

```phpx
  $params=array(
    "origins" => "",
    "destinations" => "",
    "departure_time" => "",
  );
    
  $return=$maps->setData($prams)->getDistance()->getResponse();   
  
  print_r($return);
```

**Parameters:**

| Parametre      | Örnek  | Açıklama |
| ------         | ------ | -------- |
| origins        | place_id:ChIJz7GHArHHyhQR_pn4LBC6SA8<br>veya<br>40.9845054,29.0559489  | lat,lng  veya place_id oalrak gödnerilebilir.      |
| destinations   | place_id:ChIJz7GHArHHyhQR_pn4LBC6SA8<br>veya<br>40.9845054,29.0559489 | lat,lng  veya place_id oalrak gödnerilebilir.      |
| departure_time | 'now' veya UNIX_TIMESTAMP int tarih saat bilgisi | eğer trafik bilgisine göre hesaplanmasını da istiyorsa  o zaman gönderilebilir zorunlu değil      |



### Yol Tarifi maps api (directions)

#### `getDirections()`


iki rota arasında yol tarifi dönen google maps apisi.


```phpx
  $params=array(
    "origin" => "",
    "destination" => "",
    "departure_time" => "",
  );
    
  $return=$maps->setData($prams)->getDirections()->getResponse();   
  
  print_r($return);
```

**Parameters:**

| Parametre      | Örnek  | Açıklama |
| ------         | ------ | -------- |
| origin        | place_id:ChIJz7GHArHHyhQR_pn4LBC6SA8<br>veya<br>40.9845054,29.0559489  | lat,lng  veya place_id oalrak gödnerilebilir.      |
| destination   | place_id:ChIJz7GHArHHyhQR_pn4LBC6SA8<br>veya<br>40.9845054,29.0559489 | lat,lng  veya place_id oalrak gödnerilebilir.      |
| departure_time | 'now' veya UNIX_TIMESTAMP int tarih saat bilgisi | eğer trafik bilgisine göre hesaplanmasını da istiyorsa  o zaman gönderilebilir zorunlu değil      |

