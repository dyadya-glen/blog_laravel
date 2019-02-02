<?php

namespace App\Http\Controllers;

//use App\Custom\Helper;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        $date = getRusDate('2018-06-25 00:00:00', 'd %MONTH% Y');

        $helpSingle = resolve('MyHelpSingle');
        $word = $helpSingle->inflection(224, 'статья', 'статьи', 'статей');
        $date2 = $helpSingle->getRusDate('2016-03-15 00:00:00', 'd %MONTH% Y', 'g');

        $helpBind = resolve('MyHelpBind');
        $word2 = $helpBind->inflection(211, 'пост', 'поста', 'постов');
        return view('layouts.primary',[
            'page' => 'pages.main',
            'title' => 'Главная',
            'date' => $date,
            'date2' => $date2,
            'word' => $word,
            'word2' => $word2
        ]);
    }
}
