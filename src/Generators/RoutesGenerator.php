<?php

namespace Naveed\Scaff\Generators;

class RoutesGenerator extends Generator
{
    /**
     * @var string
     * Template file / stub to generate the content
     */
    protected $templateFile = "routes";

    /**
     * @return string
     * Where to store the generated content
     */
    protected function getFilePath()
    {
        $directory = dirname(config('naveed-scaff.routes-file'));
        return $directory . "/crud-routes.php";
    }

    public function generate()
    {
        $file = $this->getFilePath();
        $existingContent = file_exists($file) ? file_get_contents($file) : "<?php\n";
        $newContent = $this->getContent();
        $content = "{$existingContent}\n{$newContent}";

        file_put_contents($file, $content);

        // check if the file is already included in the main routes file
        $line = 'require_once __DIR__ . "/crud-routes.php";';
        $existingContent = file_get_contents(config('naveed-scaff.routes-file'));
        if (strpos($existingContent, $line) === false) {
            file_put_contents(config('naveed-scaff.routes-file'), "$existingContent\n\n{$line}");
        }

        return [
            'file' => $file,
            'content' => (string)$content,
        ];
    }

}
