<?php

namespace App\Http\Controllers\Project_controllers;

require_once __DIR__ . '/../../../../resources/traits/trait_for_title.php';

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project_models\ComicsModel as ComicsModel;
use Title_Trait;

class ComicsController extends Controller
{
    use     Title_Trait;

    private function check_and_set_img_url($url) : string
    {
        $no_img_url = "https://cdn.vectorstock.com/i/preview-1x/82/99/no-image-available-like-missing-picture-vector-43938299.jpg";
        if (filter_var($url, FILTER_VALIDATE_URL))
            if (@getimagesize($url))
                return $url;
        return $no_img_url;
    }

    private function data_validator(Request $request) : Request
    {
        $result = $request;
        $result->validate(
            [
                'title'     =>  'required|max:100|unique:comics_table',
                'price'     =>  'required|between:0.10,99.99|decimal:2',
                'series'    =>  'max:50',
                'sale_date' =>  'required|date',
                'type'      =>  'required|max:50'
            ],
            [
                'title.required'        =>  'DC COMICS needs the field ":attribute" (required)',
                'title.max'             =>  'The text (:attribute) entered is too long (max 100 chars)',
                'title.unique'          =>  'This :attribute already exists!',
                'price.required'        =>  'DC COMICS needs the field ":attribute" (required)',
                'price.between'         =>  'The :attribute entered is out of range [0.10...99.99]!',
                'price.decimal'         =>  'The :attribute must be "decimal" (XX.XX)',
                'series.max'            =>  'The text (:attribute) entered is too long (max 50 chars)',
                'sale_date.required'    =>  'DC COMICS needs the field ":attribute" (required)',
                'sale_date.date'        =>  'The :attribute must be a valid date (DD,MM,YYYY)',
                'type.required'         =>  'DC COMICS needs the field ":attribute" (required)',
                'type.max'              =>  'The text (:attribute) entered is too long (max 50 chars)',
            ]
        );
        return $result;
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
        $new_title = $this->format_title($request->input('title'));
        $request->merge(['title' => $new_title]);
        $request = $this->data_validator($request);
        $form_data = $request->all();
        $form_data['thumb_url'] = $this->check_and_set_img_url($form_data['thumb_url']);
        $new_record = new ComicsModel();
        $new_record->fill($form_data);
        $new_record->save();
        return redirect()->route('comics.index');
    }

    public  function edit(ComicsModel $comic)
    {
        return view('pages.crud_edit', compact('comic'));
    }

    public  function update(Request $request, ComicsModel $comic)
    {
        $new_title = $this->format_title($request->input('title'));
        $request->merge(['title' => $new_title]);
        $request = $this->data_validator($request);
        $form_data = $request->all();
        $form_data['thumb_url'] = $this->check_and_set_img_url($form_data['thumb_url']);
        $comic->update($form_data);
        return redirect()->route('comics.index');
    }

    public  function destroy(ComicsModel $comic)
    {
        $comic->delete();
        return redirect()->route('comics.index');
    }
}
