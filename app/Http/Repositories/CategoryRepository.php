<?php

namespace App\Http\Repositories;

use App\Models\Category;
use App\Models\MyCategory;
use App\Services\CreateSlug;
use App\Services\UploadImage;
use App\Services\CreateQrcode;
use Illuminate\Support\Facades\Auth;
use App\Http\Interfaces\CategoryInterface;

class CategoryRepository implements CategoryInterface
{
    protected $model;
    public function __construct(Category $model)
    {
        
        $this->model = $model;
        
    }

    public function getAllCategories()
    {
        return $this->model
            ->oldest('name')
            ->get();
    }

    public function getAllManagerCategories() 
    {
        return $this->model->where('manager_email', Auth::user()->email)
        ->orWhere('made_by_id', Auth::user()->id)
        ->latest()
        ->get();
    }

    public function getAllWebCategories()
    {
        return $this->model->web()->latest()->get();
    }

    public function getAllWebScheduledCategories()
    {
        return $this->model->scheduledWeb()->latest()->get();
    }

    public function getAllGenderCategories()
    {
        return $this->model->scheduledWeb()->gender()->latest()->get();
    }

    public function getAllAgeCategories()
    {
        return $this->model->scheduledWeb()->age()->latest()->get();
    }

    public function getCategoryById($id)
    {
        return $this->model->where('id', $id)->first();
    }

    public function getCategoryBySlug($slug)
    {
        return $this->model->where('slug', $slug)->first();
    }

    public function createCategory($request)
    {
        
        return $this->model->create([
            'name' => $request->name,
            
        ]);
    }

    public function deleteCategory($id)
    {
        
        $category = $this->getCategoryById($id);

        $category->delete();

    }

    public function updateCategory($request, $id)
    {
        $category = $this->getCategoryById($id);
       
        $category->update([
            'name' => $request->name,
            
        ]); 
    }

    
}
