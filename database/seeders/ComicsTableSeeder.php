<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Project_models\ComicsModel as ComicsModel;

class ComicsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $comics_db = config('Project_data.comics');
        foreach($comics_db as $comics_record)
        {
            $new_record = new ComicsModel();
            $new_record->title = $comics_record['title'];
            $new_record->description = $comics_record['description'];
            $new_record->thumb_url = $comics_record['thumb'];
            $new_record->price = $comics_record['price'];
            $new_record->series = $comics_record['series'];
            $new_record->sale_date = $comics_record['sale_date'];
            $new_record->type = $comics_record['type'];
            $new_record->artists = implode("///", $comics_record['artists']);
            $new_record->writers = implode("///", $comics_record['writers']);
            $new_record->save();
        }
    }
}
