<?php
/**
 * Created by PhpStorm.
 * User: jxlwqq
 * Date: 2018/9/12
 * Time: 22:32
 */

namespace Jxlwqq\JsonEditor;


use Encore\Admin\Form\Field;

class Editor extends Field
{
    protected $view = 'laravel-admin-json-editor::editor';
    protected static $css = [
        'vendor/laravel-admin-ext/json-editor/jsoneditor-5.24.6/dist/jsoneditor.min.css',
    ];
    protected static $js = [
        'vendor/laravel-admin-ext/json-editor/jsoneditor-5.24.6/dist/jsoneditor.min.js',
    ];
    public function render()
    {

        $this->value;
        $this->column;
        $json = old($this->column, $this->value);
        if (empty($json)) {
            $json = json_encode([]);
        }
        $this->script = <<<EOT
// create the editor
var container = document.getElementById("{$this->id}");
var options = {};
var editor = new JSONEditor(container, options);

// set json
var json = {$json};
editor.set(json);

// get json
$('button[type="submit"]').click(function() {
var json = editor.get()
$('input[name={$this->id}]').val(JSON.stringify(json))
})
EOT;
        return parent::render();
    }
}
