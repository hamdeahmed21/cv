<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SkillCategory extends Model
{
    use HasFactory;
    protected $fillable = ['name'];

    public static function rules()
    {
        return [
            'name' => 'required|min:3'
        ];
    }

    public function skills()
    {
        return $this->hasMany(Skill::class, 'skill_category_id', 'id');
    }
}
