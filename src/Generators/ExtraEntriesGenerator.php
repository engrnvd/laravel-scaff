<?php

namespace Naveed\Scaff\Generators;

use Illuminate\Support\Arr;

class ExtraEntriesGenerator extends Generator
{
    /**
     * @var string
     * Template file / stub to generate the content
     * For this particular generator, the $templateFile is dynamic
     * as shown in $this->generate() because
     * the generator generates multiple views
     */
    protected $templateFile = "variable";

    /**
     * @return string
     * Where to store the generated content
     */
    protected function getFilePath()
    {
        return "";
    }

    public function generate()
    {
        $result = [];
        $entries = config('naveed-scaff.extra-entries');
        foreach ($entries as $entry) {
            $this->templateFile = Arr::get($entry, 'template');
            $file = Arr::get($entry, 'filename');
            $identifier = Arr::get($entry, 'identifier');
            $directory = dirname($file);
            if (!file_exists($directory)) {
                mkdir($directory, 777, true);
            }
            $content = (string)$this->getContent();
            $existingContent = file_get_contents($file);

            if (strpos($existingContent, $content) === false && strpos($existingContent, $identifier) !== false) {
                $content = $content . "\n" . $identifier;
                $existingContent = str_replace($identifier, $content, $existingContent);
                file_put_contents($file, $existingContent);
            }

            $result[] = [
                'file' => $file,
                'content' => (string)$content,
            ];
        }

        return $result;
    }
}
