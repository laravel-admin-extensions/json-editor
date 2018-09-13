# JSON Editor extension for laravel-admin

这是一个`laravel-admin`扩展，用来将 [JSON Editor](https://github.com/josdejong/jsoneditor) 集成进`laravel-admin`中。

[DEMO](http://demo.laravel-admin.org/editors/json) Login using `admin/admin`

<img src="https://user-images.githubusercontent.com/2421068/45437866-4d478200-b6e8-11e8-930b-7665ad407096.png">

## 安装

首先，安装依赖：
```bash
composer require jxlwqq/json-editor
```

然后，发布资源目录：
```bash
php artisan vendor:publish --tag=laravel-admin-json-editor
```

## 配置

在`config/admin.php`文件的`extensions`，加上属于这个扩展的一些配置
```php
'extensions' => [
    'json-editor' => [
        // 如果要关掉这个扩展，设置为false
        'enable' => true,
        'config' =>
            ['mode' => 'tree',
                'modes' => ['code', 'form', 'text', 'tree', 'view'], // allowed modes
            ],
    ]
]
```

更多配置可以到[JSON Editor](https://github.com/josdejong/jsoneditor)找到。

## 使用

在form表单中使用它：
```php
$form->json('content');
```


## License

Licensed under [The MIT License (MIT)](LICENSE).
