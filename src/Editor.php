<?php

namespace Jxlwqq\JsonEditor;

use Encore\Admin\Form\Field;

class Editor extends Field
{
    protected $view = 'laravel-admin-json-editor::editor';

    protected static $css = [
        'vendor/laravel-admin-ext/json-editor/jsoneditor-6.2.1/dist/jsoneditor.min.css',
    ];

    protected static $js = [
        'vendor/laravel-admin-ext/json-editor/jsoneditor-6.2.1/dist/jsoneditor.min.js',
    ];

    public function render()
    {
        $json = old($this->column, $this->value());

        if (empty($json)) {
            $json = '{}';
        }

        if (!is_string($json)) {
            $json = json_encode($json);
        } else {
            $json = json_encode(json_decode($json));   //兼容json里有类似</p>格式，首次初始化显示会丢失的问题
        }
        $this->value = $json;

        $options = json_encode(config('admin.extensions.json-editor.config'));

        if (empty($options)) {
            $options = "{}";
        }

        $this->script = <<<EOT
// create the editor
var container = document.getElementById("{$this->id}");
var options = {$options};
window['editor_{$this->id}'] = new JSONEditor(container, options);

// set json
var json = {$json};
window['editor_{$this->id}'].set(json);

// get json
$('button[type="submit"]').click(function() {
var json = window['editor_{$this->id}'].get()
$('input[id={$this->id}_input]').val(JSON.stringify(json))
});
EOT;

        return parent::render();
    }
}
