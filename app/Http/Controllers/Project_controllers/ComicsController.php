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
        return view('pages.crud_index', compact('comics_db'));
    }

    public  function show($id)
    {
        $single_item = ComicsModel::findOrFail($id);
        return view('pages.crud_show', compact('single_item'));
    }
}
