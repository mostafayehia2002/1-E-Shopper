<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //
    public function  index(){
        return view('admin.add_category');
    }
    public function  addNewCategory(Request $r){
        $r->validate([
            'category'=>['required','unique:categories,category_name'],
        ]);

        Category::create([
            'category_name'=>$r->category,
        ]);
        return  redirect()->back()->with('success-add-category','Successfully Added Category');

    }
    public function editCategory($id){
       $category=Category::findOrFail($id);
       return view('admin.update_category',compact('category'));

    }
    public function updateCategory($id,Request $r){
        $r->validate([
            'category'=>'required']
        );

          Category::where('id',$id)->update([
            'category_name'=>$r->category,
        ]);
        return  redirect()->route('admin.showCategories')->with('success-update-category','Successfully Updated Category');
    }

    public function deleteCategory($id){
        Category::find($id)->delete();
        return  redirect()->route('admin.showCategories')->with('success-delete-category','Successfully Deleted Category');
    }
}
