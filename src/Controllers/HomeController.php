<?php

namespace Naveed\Scaff\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return $this->view('index', [
            "vuePages" => \File::glob(__DIR__ . "/../views/pages/*-page.blade.php"),
            "vueSharedFiles" => \File::files(__DIR__ . "/../views/vue-shared"),
            "fieldTypes" => require(__DIR__ . "/../config/field-types.php"),
        ]);
    }

    public function generateCrud(Request $request)
    {
        $this->validate($request, [
            'tableName' => 'required',
            'fields.*.name' => 'required',
            'fields.*.type' => 'required',
        ]);
        try {
        } catch (\Exception $e) {
            return response()->json($e->getMessage(), 422);
        }
    }
}
