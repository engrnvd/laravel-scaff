<?php

namespace Naveed\Scaff\Generators;

use Naveed\Scaff\Helpers\Table;
use Naveed\Scaff\Helpers\TableField;

class ModelGenerator extends Generator
{
    /**
     * @var string
     * Template file / stub to generate the content
     */
    protected $templateFile = "model";

    /**
     * @return string
     * Where to store the generated content
     */
    protected function getFilePath()
    {
        $directory = $this->getDirectoryFromNamespace(config('naveed-scaff.model-namespace'));
        return $directory . "/{$this->table->studly(true)}.php";
    }

    public function getBulkEditableFields(Table $table)
    {
        return collect($table->fields)->filter(function (TableField $field) {
            return !in_array($field->name, config('naveed-scaff.skipped-fields'));
        })->pluck('name')->all();
    }

    public function getConditionStr(TableField $field)
    {
        if (in_array($field->type, ['string', 'text', 'enum', 'date']))
            return "'{$field->name}', 'like', '%' . request('{$field->name}') . '%'";
        return "'{$field->name}', request('{$field->name}')";
    }


    public function getValidationRule(TableField $field)
    {
        // skip certain fields
        if (in_array($field->name, static::skippedFields()))
            return "";

        $rules = [];
        // required fields
        if ($field->required)
            $rules[] = "required";

        // strings
        if (in_array($field->type, ['varchar', 'text'])) {
            $rules[] = "string";
            if ($field->length) $rules[] = "max:" . $field->length;
        }

        // dates
        if (in_array($field->type, ['date', 'datetime']))
            $rules[] = "date";

        // numbers
        if (in_array($field->type, ['int', 'unsigned_int']))
            $rules [] = "integer";

        // emails
        if (preg_match("/email/", $field->name)) {
            $rules[] = "email";
        }

        if ($field->unique) {
            $rules[] = "unique:{$this->table->name},{$field->name},{\$this->{$this->table->idField}}";
        }

        // enums
        if ($field->type == 'enum')
            $rules [] = "in:" . join(",", $field->enumValues);

        return '"' . $field->name . '" => "' . join('|', $rules) . '",';
    }

    protected static function skippedFields()
    {
        return ['id', 'created_at', 'updated_at'];
    }
}
