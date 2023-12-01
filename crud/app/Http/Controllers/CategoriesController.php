<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function getInfo(){
        return Category::all();
    }

    public function store(Request $request)
    {
        $category = new Category();
        $category->name = $request->name;

        $categoryByCreated = $category->save();
        if ($categoryByCreated){
            return 'client was created';
        } else {
            return "client wasn't created";
        }

    }


    public function restore(Request $request)
    {
        $id = $request -> category_id;
        $record = Category::withTrashed()->find($id);
        $record->restore();
        return 'client was restored';
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $category = Category::find($id);
        $category->name = $request->name;
        $category->update();
        return 'data was updated';
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        $category = Category::find($id);
        if ($category->delete()) {
            return 'successfully deleted';
        } else {
            return 'not deleted';
        }
    }
}
