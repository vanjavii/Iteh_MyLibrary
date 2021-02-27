<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Writers extends Model
{
    use HasFactory;
    protected $fillable = [
        'author_name', 'most_known_for', 'age', 'awards_num'
    ];
}
