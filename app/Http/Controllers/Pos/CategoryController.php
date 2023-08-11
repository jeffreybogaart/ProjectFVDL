<?php

namespace App\Http\Controllers\Pos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;

class CategoryController extends Controller
{
    public function CategoryAll() {

        $categories = Category::latest()->get();
        
        return view('backend.category.category_all', compact('categories'));

    }    // End method

    public function CategoryAdd() {

        return view('backend.category.category_add');

    }   // End method

    public function CategoryStore(Request $request) {


        Category::insert([
            'name' => $request->name,
            'created_by' => Auth::user()->id,
            'created_at' => Carbon::now(),
        ]);


        $notification = array(
            'message' => 'Categorie aangemaakt', 
            'alert-type' => 'success'
        );
    
        return redirect()->route('category.all')->with($notification);
        
    } // End method

    public function CategoryEdit($id){
        $category = Category::findOrFail($id);
        return view('backend.category.category_edit', compact('category'));


    }// End method

    public function CategoryUpdate(Request $request){
        $category_id = $request->id;
        
        Category::findOrFail($category_id)->update([
            'name' => $request->name,
            'updated_by' => Auth::user()->id,
            'updated_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Categorie bijgewerkt',
            'alert-type' => 'success'
        );

        return redirect()->route('category.all')->with($notification);


    }// End method

    public function CategoryDelete($id){

       Category::findOrFail($id)->delete();
       
       $notification = array(
        'message' => 'Categorie verwijderd',
        'alert-type' => 'success'
       );
       
       return redirect()->back()->with($notification);

    } // End method
}
