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
        if (!file_exists($file)) {
            file_put_contents($file, "<?php\n");
        }
        $newContent = $this->getContent() . "\n";
        $content = $this->upsertContent($newContent, $file);

        // check if the file is already included in the main routes file
        $line = 'require_once __DIR__ . "/crud-routes.php";';
        $this->upsertContent($line, config('naveed-scaff.routes-file'));

        return [
            'file' => $file,
            'content' => (string)$content,
        ];
    }

}
