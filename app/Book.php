<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Book extends Model
{
    protected $fillable = [
        'name',
        'title',
        'isbn',
        'author',
        'quantity_available',
        'status'
    ];
    use SoftDeletes;
}
