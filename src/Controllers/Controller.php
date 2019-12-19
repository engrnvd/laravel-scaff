<?php

namespace Naveed\Scaff\Controllers;

use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use ValidatesRequests;

    public function view($view, $data = [], $mergeData = [])
    {
        return view("naveed.scaff::{$view}", $data, $mergeData);
    }
}
