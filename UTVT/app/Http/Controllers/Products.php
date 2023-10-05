<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Products extends Controller
{
    public function Index () {
        return view('AWOS/products/index');
    }
}
