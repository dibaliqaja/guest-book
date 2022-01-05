<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Province;
use Illuminate\Http\Request;

class ProvinceCityController extends Controller
{
    /**
     * Retrieve provinces data
     *
     * @return void
     */
    public function provinces()
    {
        $data = Province::get();
        return response()->json($data);
    }

    /**
     * Retrieve cities data
     *
     */
    public function cities()
    {
        $data = City::get();
        return response()->json($data);
    }
}
