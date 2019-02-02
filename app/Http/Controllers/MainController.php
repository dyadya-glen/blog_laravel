<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        $date = getRusDate('2016-03-15 00:00:00', 'd %MONTH% Y');

        return view('layouts.primary',[
            'page' => 'pages.main',
            'title' => 'Главная',
            'date' => $date
        ]);
    }
}
