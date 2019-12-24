<?php


namespace Naveed\Scaff\Helpers;


class MigrationGenerator
{
    public $table;

    public function __construct(Table $table)
    {
        $this->table = $table;
    }

    public function generate()
    {
        $file = $this->getFullPath();
        $content = $this->getContent();
        @file_put_contents($file, $content);
        return [
            'file' => $file,
            'content' => (string)$content,
        ];
    }

    private function getContent()
    {
        return view(config('naveed-scaff.templates') . '.migration', [
            'table' => $this->table,
        ]);
    }

    private function getFullPath()
    {
        return database_path('migrations') . '/' . $this->getFileName();
    }

    private function getFileName()
    {
        return date('Y_m_d_His') . "_create_{$this->table->name}_table.php";
    }

}
