<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    use HasFactory;
    protected $fillable = [
        'title' ,
        'image',
        'tags',
        'portfolio_category_id'

    ];

    public function category()
    {
        return $this->belongsTo(Portfolio_Category::class, 'portfolio_category_id', 'id');
    }
}
