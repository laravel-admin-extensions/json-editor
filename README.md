# JSON Editor extension for laravel-admin

This is a `laravel-admin` extension that integrates [JSON Editor](https://github.com/josdejong/jsoneditor) into `laravel-admin`.

[DEMO](http://demo.laravel-admin.org/editors/json) Login using `admin/admin`

## Screenshot

<img src="https://user-images.githubusercontent.com/2421068/45437866-4d478200-b6e8-11e8-930b-7665ad407096.png">

## Installation

First, install dependencies:
```bash
composer require jxlwqq/json-editor
```

Then, publish the resource directory:
```bash
php artisan vendor:publish --tag=laravel-admin-json-editor
```

## Configuration

In the `extensions` section of the `config/admin.php` file, add some configuration that belongs to this extension.
```php
'extensions' => [
    'json-editor' => [
        // set to false if you want to disable this extension
        'enable' => true,
        'config' =>
            [
                'mode' => 'tree',
                'modes' => ['code', 'form', 'text', 'tree', 'view'], // allowed modes
            ],
    ]
]
```

More configurations can be found at [JSON Editor](https://github.com/josdejong/jsoneditor).

## Usage

Use it in the form form:
```php
$form->json('content');
```

## More resources

[Awesome Laravel-admin](https://github.com/jxlwqq/awesome-laravel-admin)

## License

Licensed under [The MIT License (MIT)] (LICENSE).
