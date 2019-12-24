<?php

namespace Naveed\Scaff\Helpers;

class TableField
{
    public $name;
    public $type;
    public $length;
    public $default;
    public $required;
    public $index;
    public $unique;

    public function __construct($data)
    {
        foreach ($data as $key => $value) {
            $this->$key = $value;
        }
    }

    public function getMigrationLine()
    {
        $line = "\$table->{$this->type}('{$this->name}')";
        if ($this->default) $line .= "->default('{$this->default}')";
        if (!$this->required) $line .= "->nullable()";
        $line .= ";";
        return $line;
    }
}
