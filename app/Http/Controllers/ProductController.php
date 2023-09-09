<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    //show add product page
    public function index()
    {
        $category = Category::all();
        return view('admin.add_product', compact('category'));
    }

    public function  addNewProduct(Request $r)
    {
        if ($r->hasFile('product_photo')) {
            $img = $r->file('product_photo')->getClientOriginalName();
            $r->file('product_photo')->storeAs('product_img', $img, 'admin');
        }
        $r->validate([
            'product_name' => ['required'],
            'product_price' => 'required',
            'product_photo' => 'required',
            'product_category' => 'required',
        ]);
        Product::create([
            'product_name' => $r->product_name,
            'product_price' => $r->product_price,
            'product_photo' => $img,
            'category_id' => $r->product_category,
        ]);

        return redirect()->back()->with('success-add-product', 'Successfully Added Product');
    }


    public function editProduct($id)
    {
        $category = Category::all();
        $product = Product::findOrFail($id);
        return view('admin.update_product', compact('product', 'category'));
    }


    public function updateProduct($id, Request $r)
    {
        $oldImg = Product::findOrFail($id)->product_photo;
        if ($r->hasFile('product_photo')) {
            $img = $r->file('product_photo')->getClientOriginalName();
            $r->file('product_photo')->storeAs('product_img', $img, 'admin');
            Storage::disk('admin')->delete('product_img/' . $oldImg);
        } else {
            $img = $oldImg;
        }
        $r->validate([
            'product_name' => ['required'],
            'product_price' => 'required',
            'product_category' => 'required',
        ]);
        Product::where('id', $id)->update([
            'product_name' => $r->product_name,
            'product_price' => $r->product_price,
            'product_photo' => $img,
            'category_id' => $r->product_category,
        ]);

        return redirect()->route('admin.showProducts')->with('success-update-product', 'Successfully Updated Product');
    }
    public function deleteProduct($id)
    {
        $data = Product::findOrFail($id);
        $img = $data->product_photo;
        Storage::disk('admin')->delete('product_img/' . $img);
        $data::where('id', $id)->delete();
        return redirect()->back()->with('success-delete-product', 'Successfully Deleted Product');
    }
}
