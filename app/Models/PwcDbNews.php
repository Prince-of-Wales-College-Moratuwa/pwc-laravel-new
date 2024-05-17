<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PwcDbNews extends Model
{
    use HasFactory;

    // Define the table name
    protected $table = 'pwc_db_news';

    // Define the fillable attributes
    protected $fillable = [
        'title',
        'slug',
        'excerpt',
        'photo',
        'content',
        'category',
        'author',
        'date',
        'schoolPride',
        // Add more attributes as needed
    ];
}
