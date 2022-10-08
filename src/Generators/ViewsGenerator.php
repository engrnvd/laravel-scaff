<?php

namespace Naveed\Scaff\Generators;

use Naveed\Scaff\Helpers\TableField;

class ViewsGenerator extends Generator
{
    /**
     * @var string
     * Template file / stub to generate the content
     * For this particular generator, the $templateFile is dynamic
     * as shown in $this->generate() because
     * the generator generates multiple views
     */
    protected $templateFile = "variable";

    public function getEditableType(TableField $field)
    {
        if ($field->type === 'enum' || preg_match('/_id$/', $field->name)) {
            return 'select';
        }

        if (preg_match('/date/', $field->name) || preg_match('/date/', $field->type)) {
            return 'date';
        }

        if ($field->type === 'text') {
            return 'textarea';
        }

        return 'text';
    }

    /**
     * @return string
     * Where to store the generated content
     */
    protected function getFilePath()
    {
        $directory = config('naveed-scaff.views-directory');
        $extension = config('naveed-scaff.views')[$this->templateFile];
        return $directory . "{$this->table->slug()}/{$this->templateFile}.{$extension}";
    }

    public function generate()
    {
        $result = [];
        $views = config('naveed-scaff.views');
        foreach ($views as $view => $extension) {
            $this->templateFile = $view;
            $result[] = parent::generate();
        }

        return $result;
    }
}
