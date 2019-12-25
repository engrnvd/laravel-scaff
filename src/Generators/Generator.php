<?php

namespace Naveed\Scaff\Generators;

use Naveed\Scaff\Helpers\Table;

abstract class Generator
{
    public $table;
    protected $templateFile;

    public function __construct(Table $table)
    {
        $this->table = $table;
    }

    public function generate()
    {
        $file = $this->getFilePath();
        $content = $this->getContent();
        @file_put_contents($file, $content);
        return [
            'file' => $file,
            'content' => (string)$content,
        ];
    }

    protected function getContent()
    {
        return view(config('naveed-scaff.templates') . ".{$this->templateFile}", [
            'table' => $this->table,
            'gen' => $this,
        ]);
    }

    protected function getDirectoryFromNamespace($namespace)
    {
        $directory = str_replace('App\\', '', $namespace);
        $directory = join('/', explode('\\', $directory));
        return app_path($directory);
    }

    abstract protected function getFilePath();
}
