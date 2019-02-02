<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function searchShow (Request $request)
    {
        $searchQuery = $request
            ->input('search');
        $numberOfResults = null;


        return view('layouts.primary',[
            'page' => 'pages.search-results',
            'title' => 'Результаты поиска',
            'searchQuery' => $searchQuery,
            'numberOfResults' => $numberOfResults
        ]);
    }
}
