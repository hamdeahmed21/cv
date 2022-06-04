<?php

namespace App\Http\Controllers;

use App\Http\Requests\SkillCreateRequest;
use App\Http\Requests\UpdateSkillRequest;
use App\Models\Skill;
use App\Models\SkillCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SkillsController extends Controller
{
    public function create()
    {
        $skillCategories = SkillCategory::get();
        return view('admin.skills.create', compact('skillCategories'));
    }

    public function store(SkillCreateRequest $request)
    {
        Skill::create([
            'name' => $request->name,
            'number' => $request->number,
            'skill_category_id' => $request->skill_category_id,
        ]);
        Session::flash('done', 'Skill Was Created');
        return redirect()->route('admin.skill.index');
    }

    public function index()
    {
        $skills = Skill::with('category')->get();
        return view('admin.skills.index', compact('skills'));
    }

    public function delete(Request $request)
    {
        $skill= Skill::find($request->id);
        if($skill)
        {
            $skill->delete();
            Session::flash('done', 'Skill Was Deleted');
            return back();
        }
        return back()->withErrors(['Skill not found']);
    }

    public function edit($id)
    {
        $skill = Skill::find($id);
        $skillCategories = SkillCategory::get();
        return view('admin.skills.edit', compact('skill', 'skillCategories'));
    }

    public function update(UpdateSkillRequest $request)
    {
        $skill = Skill::find($request->id);

        $skill->update([
            'name' => $request->name,
            'number' => $request->number,
            'skill_category_id' => $request->skill_category_id,
        ]);
        Session::flash('done', 'Skill Was Updated');
        return redirect(route('admin.skill.index'));
    }
}
