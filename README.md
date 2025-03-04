![Banner](https://banners.beyondco.de/iSAMS%20API.png?theme=dark&packageManager=composer+require&packageName=spkm%2Fisams-api&pattern=architect&style=style_2&description=&md=1&showWatermark=1&fontSize=100px&images=https%3A%2F%2Flaravel.com%2Fimg%2Flogomark.min.svg)

See the [iSAMS documentation](https://developerdemo.isams.cloud/Main/swagger/ui/index) for a list of available endpoints.

## Installation and usage
This package requires PHP 8.3 & Laravel 11.0 or higher. See the `tests/` folder for documentation.

### Basic Installation
You can install this package via composer using:
```
composer require spkm/isams-api
```

### Usage

```php
use spkm\IsamsApi\IsamsConnector;use spkm\IsamsApi\Requests\Students\GetStudentsRequest;

$connector = new IsamsConnector($clientId, $clientSecret, $baseUrl);
$request = new GetStudentsRequest();
$paginator = $connector->paginate($request);

foreach ($paginator as $response) {
    $response->json();
}
```

### Security

If you discover any security related issues, please email hello@spkmitchell.co.uk instead of using the issue tracker.

## Credits

- [Simon Mitchell](https://github.com/spkm)
- [Fred Bradley](https://github.com/fredbradley)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
