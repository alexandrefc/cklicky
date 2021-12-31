<?php

namespace App\Http\Interfaces;

interface CategoryInterface
{
    public function getAllCategories();

    public function getAllWebCategories();

    public function getAllManagerCategories();

    public function getAllWebScheduledCategories();

    public function getAllGenderCategories();

    public function getAllAgeCategories();
    
    public function getCategoryById($id);

    public function getCategoryBySlug($slug);

    public function createCategory($request);

    public function deleteCategory($slug);

    public function updateCategory($request, $slug);

    

    
    
}