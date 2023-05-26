<?php

namespace App\Http\Controllers;

use App\Models\subCategory;

class SubcategoryController extends Controller
{
    // get subcategory
    public function show(subCategory $subCategory)
    {
        return view('subcategories.show', ['subCategory' => $subCategory]);
    }
}
