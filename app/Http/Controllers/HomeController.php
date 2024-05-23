<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    function index()
    {
        $product = DB::select('select * from products');
        return view('home');
    }

    public function notification()
    {
        session()->put('success', 'Item is successfully created.');

        return view('notification-check');
    }
}
