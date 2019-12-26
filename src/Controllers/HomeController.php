<?php

namespace Naveed\Scaff\Controllers;

use Illuminate\Http\Request;
use Naveed\Scaff\Generators\ControllerGenerator;
use Naveed\Scaff\Generators\MigrationGenerator;
use Naveed\Scaff\Generators\ModelGenerator;
use Naveed\Scaff\Generators\RoutesGenerator;
use Naveed\Scaff\Helpers\Table;

class HomeController extends Controller
{
    public function generateCrud(Request $request)
    {
        $this->validate($request, [
            'tableName' => 'required',
            'fields.*.name' => 'required',
            'fields.*.type' => 'required',
        ]);

        $table = new Table($request->all());
        (new MigrationGenerator($table))->generate();
        (new ModelGenerator($table))->generate();
        (new ControllerGenerator($table))->generate();
        (new RoutesGenerator($table))->generate();
        // views
        // routes

        return "Generated";
    }

    public function index()
    {
        return $this->view('index', [
            "vuePages" => \File::glob(__DIR__ . "/../views/pages/*-page.blade.php"),
            "vueSharedFiles" => \File::files(__DIR__ . "/../views/vue-shared"),
            "fieldTypes" => require(__DIR__ . "/../config/field-types.php"),
        ]);
    }

}
