<?php

namespace App\Http\Controllers;

use App\Http\Requests\serviceCreateRequest;
use App\Http\Requests\serviceUpdateRequest;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class servicesCtrl extends Controller
{
    public function create()
    {

        return view('admin.services.create');
    }

    public function store(serviceCreateRequest $request)
    {
//        title ,	icone	, body
        Service::create([
            'title' => $request->title,
            'icone' => $request->icone,
            'body' => $request->body,
        ]);
        Session::flash('done', 'Service Was Created');
        return redirect()->route('admin.service.index');
    }
//
    public function index()
    {
        $services = Service::get();
        return view('admin.services.index', compact('services'));
    }
//
    public function delete(Request $request)
    {
        $service= Service::find($request->id);
        if($service)
        {
            $service->delete();
            Session::flash('done', 'Skill Was Deleted');
            return back();
        }
        return back()->withErrors(['Service not found']);
    }
//
    public function edit($id)
    {
        $service = Service::find($id);
        return view('admin.services.edit', compact('service'));
    }
//
    public function update(serviceUpdateRequest $request)
    {
        $service = Service::find($request->id);

        $service->update([
            'title' => $request->title,
            'icone' => $request->icone,
            'body' => $request->body,
        ]);
        Session::flash('done', 'Service Was Updated');
        return redirect(route('admin.service.index'));
    }
}
