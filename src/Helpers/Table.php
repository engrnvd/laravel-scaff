<?php

namespace Naveed\Scaff\Helpers;

use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Naveed\Scaff\Traits\HasNameVariations;

class Table
{
    use HasNameVariations;

    public $name;
    public $nameSingular;
    public $idField;
    public $timestamps;
    /**
     * @var TableField[]
     */
    public $fields = [];

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


}
