<?php

namespace Naveed\Scaff\Generators;

use Naveed\Scaff\Helpers\TableField;

class MigrationGenerator extends Generator
{
    /**
     * @var string
     * Template file / stub to generate the content
     */
    protected $templateFile = "migration";

    /**
     * @return string
     * Where to store the generated content
     */
    protected function getFilePath()
    {
        return database_path('migrations') . '/' . date('Y_m_d_His_') . "create_{$this->table->name}_table.php";
    }

    /**
     * @param TableField $field
     * @return string
     */
    public function getMigrationLine(TableField $field)
    {
        $line = "\$table->{$field->type}('{$field->name}')";
        if ($field->default) $line .= "->default('{$field->default}')";
        if (!$field->required) $line .= "->nullable()";
        $line .= ";";
        return $line;
    }
}
