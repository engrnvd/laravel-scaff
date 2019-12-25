<?php

namespace Naveed\Scaff\Generators;

class ControllerGenerator extends Generator
{
    /**
     * @var string
     * Template file / stub to generate the content
     */
    protected $templateFile = "controller";

    /**
     * @return string
     * Where to store the generated content
     */
    protected function getFilePath()
    {
        $directory = $this->getDirectoryFromNamespace(config('naveed-scaff.controller-namespace'));
        return $directory . "/{$this->table->studly(true)}Controller.php";
    }

}
