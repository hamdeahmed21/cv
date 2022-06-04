<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use App\Models\Portfolio_Category;
use Illuminate\Http\Request;

class portfolioController extends Controller
{
    public function index() {
        $portfolio = portfolio::get();
        return view('admin.portfolio.index',compact('portfolio'));
    }

    public function create() {
        $portfolioCategories = Portfolio_Category::get();
        return view('admin.portfolio.create',compact('portfolioCategories'));
    }

    public function store(Request $request) {

        $PortfolioName = time() .$request->file('image')->getClientOriginalName();
        $PortfolioPath = 'portfolio';
        $request->file('image')->move($PortfolioPath, $PortfolioName);

        portfolio::create([
            'title' => $request->title,
            'image' => $PortfolioName,
            'tags' => $request->title,
            'portfolio_category_id' => $request->portfolio_category_id,
        ]);
        return redirect()->route('admin.portfolio.index');
    }
    public function edit($id) {

        $portfolioList = portfolio::find($id);
        $portfolioCategories = Portfolio_Category::get();
        return view('admin.portfolio.edit',compact('portfolioCategories','portfolioList'));
    }
    public function update(Request $request) {

        if($request->hasFile('image'))
        {
            $PortfolioName = time() .$request->file('image')->getClientOriginalName();
            $PortfolioPath = 'portfolio';
            $request->file('image')->move($PortfolioPath, $PortfolioName);
        }

        $portfolio = portfolio::find($request->id);
        $portfolio->update([
            'title' => $request->title,
            'image' => (isset($PortfolioName))? $PortfolioName : $portfolio->image,
            'tags' => $request->tags,
            'portfolio_category_id' => $request->portfolio_category_id
        ]);

        return redirect()->route('admin.portfolio.index');
    }
}
