<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'title', 'from', 'body', 'lives_in', 'age', 'gender', 'image', 'cv'];
}
