<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'number', 'skill_category_id'];

    public function category()
    {
        return $this->belongsTo(SkillCategory::class, 'skill_category_id', 'id');
    }

    public static function rules()
    {
        return [
            'name' => 'required|min:3',
            'number' => 'required',
            'skill_category_id' => 'required|exists:skill_categories,id'
        ];
    }
}
