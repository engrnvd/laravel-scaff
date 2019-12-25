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
        $migrationDir = database_path('migrations');
        $fileName = "create_{$this->table->name}_table.php";
        $migrationFiles = \File::glob($migrationDir . '/*.php');

        foreach ($migrationFiles as $migrationFile) {
            if (strpos($migrationFile, $fileName) !== false) {
                return $migrationFile;
            }
        }
        return $migrationDir . '/' . date('Y_m_d_His_') . $fileName;
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
