<?php

namespace App\Http\Controllers\Project_controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project_models\ComicsModel as ComicsModel;

class ComicsController extends Controller
{
    public  function index()
    {
        $comics_db = ComicsModel::All();
        return view('pages.index', compact('comics_db'));
    }
}
