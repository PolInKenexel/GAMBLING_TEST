<?php

namespace App\Models;

//use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lore extends Model
{
    protected $table = 'lore';

    protected $fillable = [
        'name',
        'lore_desc',
        'img',
        'age'
    ];
}
