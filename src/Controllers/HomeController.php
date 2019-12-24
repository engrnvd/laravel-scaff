<?php

namespace Naveed\Scaff\Controllers;

use Illuminate\Http\Request;
use Naveed\Scaff\Helpers\MigrationGenerator;
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

        $response = [];

        $response[] = ['title' => 'Migration'] + (new MigrationGenerator($table))->generate();
        // model
        // controller
        // views

        return $response;
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
