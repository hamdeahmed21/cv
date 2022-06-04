<?php

namespace App\Http\Controllers;

use App\Http\Requests\SkillCategoryRequest;
use App\Http\Requests\UpdateSkullCategoryRequest;
use App\Models\SkillCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SkillCategoryController extends Controller
{
    public function create()
    {
        return view('admin.skillCategory.create');
    }

    public function store(SkillCategoryRequest $request)
    {
        SkillCategory::create([
            'name' => $request->name
        ]);
        return redirect()->route('admin.skill.category.index');
    }

    public function index()
    {
        $skillsCategories = SkillCategory::get();
        return view('admin.skillCategory.index', compact('skillsCategories'));
    }

    public function delete(Request $request)
    {
        $skillCategory = SkillCategory::find($request->id);
        if($skillCategory)
        {
            $skillCategory->delete();
            Session::flash('done', 'Skill Category Was Deleted');
            return back();
        }
        return back()->withErrors(['SkillCategory not found']);
    }

    public function edit($id)
    {
        $skillCategory = skillCategory::find($id);
        return view('admin.skillCategory.edit', compact('skillCategory'));
    }

    public function update(UpdateSkullCategoryRequest $request)
    {
        $skillCategory = SkillCategory::find($request->id);

        $skillCategory->update([
            'name' => $request->name
        ]);
        Session::flash('done', 'Skill Category Was Updated');
        return redirect(route('admin.skill.category.index'));
    }
}
