<?php

namespace Naveed\Scaff\Helpers;

use Illuminate\Support\Str;
use Naveed\Scaff\Traits\HasNameVariations;

class TableField
{
    use HasNameVariations;

    public $name;
    public $nameSingular;
    public $type;
    public $length;
    public $default;
    public $required;
    public $index;
    public $unique;
    public $enumValues;

    public function __construct($data)
    {
        foreach ($data as $key => $value) {
            $this->$key = $value;
        }

        $this->nameSingular = Str::singular($this->name);
    }

    public function isForeignKey()
    {
        return preg_match('/_id$/', $this->name);
    }

    public function getForeignUrl()
    {
        return Str::plural(str_replace('_id', '', $this->name));
    }
}
