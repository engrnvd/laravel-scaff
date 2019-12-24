<?php

namespace Naveed\Scaff\Traits;

use Illuminate\Support\Str;

trait HasNameVariations
{
    public $name;
    public $nameSingular;

    public function studly($singular = false)
    {
        $name = $singular ? $this->nameSingular : $this->name;
        return Str::studly($name);
    }

    public function camel($singular = false)
    {
        $name = $singular ? $this->nameSingular : $this->name;
        return Str::camel($name);
    }

    public function spaced($singular = false)
    {
        $name = $singular ? $this->nameSingular : $this->name;
        return str_replace("_", " ", $name);
    }

    public function title($singular = false)
    {
        return ucwords($this->spaced($singular));
    }

    public function slug($singular = false)
    {
        return Str::slug($this->spaced($singular));
    }
}
