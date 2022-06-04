<?php

namespace App\Http\Controllers;

use App\Models\Portfolio_Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class portfolioCategoryController extends Controller
{
    public function index()
    {
        $portfolioCategories = Portfolio_Category::get();
        return view('admin.portfolioCategory.index', compact('portfolioCategories'));
    }
    public function create()
    {
        return view('admin.portfolioCategory.create');
    }

    public function store(Request $request)
    {
        Portfolio_Category::create([
            'name' => $request->name,
            'data_filer_name' => $request->data_filter_name
        ]);
        return redirect()->route('admin.portfolio.category.index');
    }

    public function delete(Request $request)
    {
        $portfolioCategory = Portfolio_Category::find($request->id);
        if($portfolioCategory)
        {
            $portfolioCategory->delete();
            Session::flash('done', 'portfolioCategory  Was Deleted');
            return back();
        }
        return back()->withErrors(['portfolioCategory not found']);
    }

    public function edit($id)
    {
        $portfolioCategory = Portfolio_Category::find($id);
        return view('admin.portfolioCategory.edit', compact('portfolioCategory'));
    }

    public function update(Request $request)
    {
        $portfolioCategory = Portfolio_Category::find($request->id);

        $portfolioCategory->update([
            'name' => $request->name,
            'data_filer_name' => $request->data_filter_name
        ]);
        Session::flash('done', 'portfolioCategory Was Updated');
        return redirect(route('admin.portfolio.category.index'));
    }
}
