<?php

namespace Naveed\Scaff\Tests;

use Naveed\Scaff\Helpers\Table;
use PHPUnit\Framework\TestCase;

class TableTest extends TestCase
{
    public $tableName = 'my_expenses';

    public function testStudly()
    {
        $table = new Table(['tableName' => $this->tableName]);
        echo $table->studly();
        echo $table->studly(true);
        $this->assertEquals('MyExpenses', $table->studly());
    }

    public function testCamel()
    {
        $table = new Table(['tableName' => $this->tableName]);
        echo $table->camel();
        echo $table->camel(true);
        $this->assertEquals('myExpenses', $table->camel());
    }

    public function testSpaced()
    {
        $table = new Table(['tableName' => $this->tableName]);
        echo $table->spaced();
        echo $table->spaced(true);
        $this->assertEquals('my expenses', $table->spaced());
    }

    public function testTitle()
    {
        $table = new Table(['tableName' => $this->tableName]);
        echo $table->title();
        echo $table->title(true);
        $this->assertEquals('My Expenses', $table->title());
    }

    public function testSlug()
    {
        $table = new Table(['tableName' => $this->tableName]);
        echo $table->slug();
        echo $table->slug(true);
        $this->assertEquals('my-expenses', $table->slug());
    }
}
