<?php

namespace Jxlwqq\JsonEditor;

use Encore\Admin\Admin;
use Encore\Admin\Form;
use Illuminate\Support\ServiceProvider;

class JsonEditorServiceProvider extends ServiceProvider
{
    /**
     * {@inheritdoc}
     */
    public function boot(JsonEditorExtension $extension)
    {
        if (! JsonEditorExtension::boot()) {
            return ;
        }

        if ($views = $extension->views()) {
            $this->loadViewsFrom($views, 'laravel-admin-json-editor');
        }

        if ($this->app->runningInConsole() && $assets = $extension->assets()) {
            $this->publishes(
                [$assets => public_path('vendor/laravel-admin-ext/json-editor')],
                'laravel-admin-json-editor'
            );
        }

        Admin::booting(function () {
            Form::extend('json', Editor::class);
        });
    }
}
