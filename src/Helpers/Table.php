<?php

namespace Naveed\Scaff\Helpers;

use Illuminate\Support\Arr;
use Illuminate\Support\Str;

class Table
{
    public $name;
    public $idField;
    public $timestamps;
    /**
     * @var TableField[]
     */
    public $fields = [];
    private $nameSingular;

    public function __construct($data)
    {
        $this->name = Arr::get($data, 'tableName');
        $this->nameSingular = Str::singular($this->name);
        $this->idField = Arr::get($data, 'idField');
        $this->timestamps = Arr::get($data, 'timestamps');
        $this->makeFields(Arr::get($data, 'fields', []));
    }

    private function makeFields($fields)
    {
        foreach ($fields as $field) {
            $this->fields[] = new TableField($field);
        }
    }

    public function studly($singular = false)
    {
        $name = $singular ? $this->nameSingular : $this->name;
        return Str::studly($name);
    }

    public function camel($singular = false)
    {
        $name = $singular ? $this->nameSingular : $this->name;
        return Str::camel($name);
    }

    public function spaced($singular = false)
    {
        $name = $singular ? $this->nameSingular : $this->name;
        return str_replace("_", " ", $name);
    }

    public function title($singular = false)
    {
        return ucwords($this->spaced($singular));
    }

    public function slug($singular = false)
    {
        return Str::slug($this->spaced($singular));
    }

}
