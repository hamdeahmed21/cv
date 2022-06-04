<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProfileCtrl extends Controller
{
    public function edit()
    {
        $profile = Profile::first();
        return view('admin.profile.edit', compact('profile'));
    }

    public function update(Request $request)
    {
//            'title','body','year','type'

        $profile = Profile::first();
        $profile->update([
            'title' => $request->title,
            'body' => $request->body,
            'year' => $request->year,
            'type' => $request->type,

        ]);
        Session::flash('profile', 'profile Was Updated');
        return back();
    }
}
