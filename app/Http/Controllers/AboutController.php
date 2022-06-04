<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AboutController extends Controller
{
    public function edit()
    {
        $about = About::first();
        return view('admin.about.edit', compact('about'));
    }

    public function update(Request $request)
    {
        if($request->hasFile('image'))
        {
            $imageName = time() .$request->file('image')->getClientOriginalName();
            $imagePath = 'images';
            $request->file('image')->move($imagePath, $imageName);
        }

        if($request->hasFile('cv'))
        {
            $CVName = time() .$request->file('cv')->getClientOriginalName();
            $CvPath = 'cv';
            $request->file('cv')->move($CvPath, $CVName);
        }

        $about = About::first();
        $about->update([
            'name' => $request->name,
            'title' => $request->title,
            'from' => $request->from,
            'body' => $request->body,
            'lives_in' => $request->lives_in,
            'age' => $request->age,
            'gender' => $request->gender,
            'image' => (isset($imageName)) ? $imageName : $about->image,
            'cv' => (isset($CVName)) ? $CVName : $about->cv
        ]);
        Session::flash('done', 'About Was Updated');
        return back();
    }
}
