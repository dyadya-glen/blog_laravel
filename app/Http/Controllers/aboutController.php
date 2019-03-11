<?php

namespace App\Http\Controllers;

class aboutController extends Controller
{
    public function showPage()
    {
        return view('layouts.primary',[
            'page' => 'pages.about',
            'title' => 'Обо мне'
            ]);
    }
}
