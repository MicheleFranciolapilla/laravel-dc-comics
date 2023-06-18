<?php

namespace App\Http\Controllers\Project_controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project_models\ComicsModel as ComicsModel;

class ComicsController extends Controller
{
    private function check_and_set_img_url($url) : string
    {
        $no_img_url = "https://cdn.vectorstock.com/i/preview-1x/82/99/no-image-available-like-missing-picture-vector-43938299.jpg";
        if (filter_var($url, FILTER_VALIDATE_URL))
            if (@getimagesize($url))
                return $url;
        return $no_img_url;
    }

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
        $form_data['thumb_url'] = $this->check_and_set_img_url($form_data['thumb_url']);
        // $mid = date('Y-m-d', strtotime($form_data['sale_date']));
        // $form_data['sale_date'] = $mid;
        $new_record = new ComicsModel();
        $new_record->fill($form_data);
        $new_record->save();
        return redirect()->route('comics.index');
    }

    public  function edit(ComicsModel $comic)
    {
        // $single_item = ComicsModel::findOrFail($id);
        return view('pages.crud_edit', compact('comic'));
    }

    public  function update(Request $request, ComicsModel $comic)
    {
        $form_data = $request->all();
        $form_data['thumb_url'] = $this->check_and_set_img_url($form_data['thumb_url']);
        // dd($single_item);
        $comic->update($form_data);
        return redirect()->route('comics.index');
    }
}
