<?php

namespace Marianvlad\NovaEnvCard\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Route;

class Environment extends Controller
{
    public function get(Request $request)
    {
        return file_get_contents(base_path('.env'));
    }

    public function post(Request $request)
    {
        file_put_contents(base_path('.env'), $request->value);
    }
}
