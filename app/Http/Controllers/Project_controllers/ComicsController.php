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

    public  function create()
    {
        return view('pages.crud_create');
    } 

    public  function store(Request $request)
    {
        $form_data = $request->all();
        // $mid = date('Y-m-d', strtotime($form_data['sale_date']));
        // $form_data['sale_date'] = $mid;
        $new_record = new ComicsModel();
        $new_record->fill($form_data);
        $new_record->save();
        return redirect()->route('comics.index');
    }
}
