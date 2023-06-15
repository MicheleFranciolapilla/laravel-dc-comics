<?php

namespace App\Models\Project_models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ComicsModel extends Model
{
    use HasFactory;

    protected   $table = 'comics_table';

    protected   $fillable =
    [
        'title',
        'description',
        'thumb_url',
        'price',
        'series',
        'sale_date',
        'type'
        // 'artists',
        // 'writers'
    ];
}
