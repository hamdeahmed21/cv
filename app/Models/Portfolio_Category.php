<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portfolio_Category extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'data_filer_name'];

    public function portfolios()
    {
        return $this->hasMany(portfolio::class, 'portfolio_category_id', 'id');
    }
}
