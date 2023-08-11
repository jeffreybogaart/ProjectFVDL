<?php

namespace App\Http\Controllers\Pos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Unit;
use App\Models\Supplier;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;

class ProductController extends Controller
{
    public function ProductAll() {

        $product = Product::latest()->get();
        return view('backend.product.product_all', compact('product'));


    } // End method

    public function ProductAdd(){

        $supplier = Supplier::all();
        $unit = Unit::all();
        $category = Category::all();


        return view('backend.product.product_add', compact('supplier', 'unit', 'category'));
    } // End method

    public function ProductStore(Request $request){

        Product::insert([

            'name' => $request->name,
            'description' => $request->description,
            'article_no' => $request->article_no,
            'p_price' => $request->p_price,
            's_price' => $request->s_price,
            'supplier_id' => $request->supplier_id,
            'category_id' => $request->category_id,
            'unit_id' => $request->unit_id,
            'quantity' => '0',
            'created_by' => Auth::user()->id,
            'created_at' => Carbon::now(),



        ]);

        return redirect()->route('product.all');

    } // End method

    public function ProductEdit($id){

        $supplier = Supplier::all();
        $unit = Unit::all();
        $category = Category::all();
        $product = Product::findOrFail($id);

        return view('backend.product.product_edit', compact('product','supplier', 'unit', 'category'));

    } // End method

    public function ProductUpdate(Request $request){

        $product_id = $request->id;

        Product::findOrFail($product_id)->update([
            'name' => $request->name,
            'description' => $request->description,
            'article_no' => $request->article_no,
            'p_price' => $request->p_price,
            's_price' => $request->s_price,
            'supplier_id' => $request->supplier_id,
            'category_id' => $request->category_id,
            'unit_id' => $request->unit_id,
            'updated_by' => Auth::user()->id,
            'updated_at' => Carbon::now(),
        ]);

        return redirect()->route('product.all');

    } // End method

    public function ProductDelete($id){

        Product::findOrFail($id)->delete();

        return redirect()->back();

    }// End method

    
    
}
