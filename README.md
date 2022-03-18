# OpenAPI HttpFoundation Testing – a Laravel Example

This repository demonstrates how to use the [OpenAPI HttpFoundation Testing](https://github.com/osteel/openapi-httpfoundation-testing) package in a Laravel project.

It uses [L5 Swagger](https://github.com/DarkaOnLine/L5-Swagger) to expose an OpenAPI-based documentation through [Swagger UI](https://swagger.io/tools/swagger-ui/).

Please refer to [this blog post](https://tech.osteel.me/posts/openapi-backed-api-testing-in-php-projects-a-laravel-example "OpenAPI-backed API testing in PHP projects – a Laravel example") for a detailed explanation.

## Instal

Clone the repository:

```bash
$ git clone git@github.com:osteel/openapi-httpfoundation-testing-laravel-example.git
```

Instal the project's dependencies from the root folder:

```bash
$ composer install
```

## Usage

Start the PHP development server using Laravel's Artisan command:

```bash
$ php artisan serve
```

Swagger UI should now be available at [localhost:8000/api/documentation](http://localhost:8000/api/documentation) (you might need to replace `api-docs.json` with `api-docs.yaml` in the "explore" bar at the top, so it loads the [YAML definition](https://github.com/osteel/openapi-httpfoundation-testing-laravel-example/blob/main/storage/api-docs/api-docs.yaml) instead of the JSON one, that we haven't provided).

There is an [example test](https://github.com/osteel/openapi-httpfoundation-testing-laravel-example/blob/main/tests/ExampleTest.php) which you can run:

```bash
$ ./vendor/bin/phpunit tests/Feature
```

This test queries the `/api/test` endpoint and validates the response against the provided YAML OpenAPI definition.

Now alter that endpoint's behaviour by changing its route in `routes/api.php` for this one:

```php
Route::get('/test', function (Request $request) {
    return response()->json(['baz' => 'bar']);
});
```

Run the test again – it should now fail because the response contains a `baz` key where `foo` is expected, as per the OpenAPI definition.
