<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Interfaces\CategoryInterface;
use App\Http\Requests\ValidateCreateCategory;
use App\Http\Requests\ValidateUpdateCategory;

class CategoryController extends Controller
{

    protected $categoryInterface;
    public function __construct(CategoryInterface $categoryInterface)
    {
        $this->middleware('auth');
        $this->categoryInterface = $categoryInterface;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Gate::allows('admin_only', auth()->user())){
            $categories = $this->categoryInterface->getAllCategories();

            return view('cms.categories', compact('categories'));
        } else {
            return redirect('/loyalties')->dangerBanner('Only Admin is allowed !');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ValidateCreateCategory $request)
    {
        $this->categoryInterface->createCategory($request);

        return back()->banner('Category has been created successfully !');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ValidateUpdateCategory $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        if(Gate::allows('admin_only', auth()->user())){
            $this->categoryInterface->deleteCategory($id);

            $request->session()->flash('flash.banner', 'Category has been deleted successfully !');
            $request->session()->flash('flash.bannerStyle', 'success');

            return redirect('/categories/create');
        
        } else {
            return redirect('/loyalties')->dangerBanner('Only Admin is allowed !');
        }
    }
}
