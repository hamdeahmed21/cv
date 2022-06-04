<?php

namespace App\Http\Requests;

use App\Models\SkillCategory;
use Illuminate\Foundation\Http\FormRequest;

class UpdateSkullCategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return array_merge(SkillCategory::rules(), [
            'id' => 'required|exists:skill_categories,id'
        ]);
    }
}
