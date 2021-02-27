<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Books extends Model
{
    use HasFactory;
    protected $fillable = [
        'book_name', 'writer'
    ];
    public function users(){

        return $this->belongsTo(User::class);

    }
}
