<?php

namespace App\Http\Controllers\Pos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Supplier;
use Illuminate\Support\Facades\Auth;

class SupplierController extends Controller
{
    public function SupplierAll(){

        $suppliers = Supplier::latest()->get();
        
        return view('backend.supplier.supplier_all', compact('suppliers'));
    }

    public function SupplierAdd() {
        return view('backend.supplier.supplier_add');
    }

    public function SupplierStore(Request $request) {
        
        Supplier::insert([

            'name' => $request->name,
            'address' => $request->address,
            'postalcode' => $request->postalcode,
            'place' => $request->place,
            'phone' => $request->phone,
            'email' => $request->email,
            'created_by' => Auth::user()->id,
            
        ]);

        $notification = array(
            'message' => 'Leverancier aangemaakt', 
            'alert-type' => 'success'
        );

        return redirect()->route('supplier.all')->with($notification);
    } // Einde methode

    public function SupplierEdit($id) {

        $supplier = Supplier::findOrFail($id);
        return view ('backend.supplier.supplier_edit',compact('supplier'));

    }

    public function SupplierUpdate(Request $request){

        $supplier_id = $request->id;
        Supplier::findOrFail($supplier_id)->update([

            'name' => $request->name,
            'address' => $request->address,
            'postalcode' => $request->postalcode,
            'place' => $request->place,
            'phone' => $request->phone,
            'email' => $request->email,
            'updated_by' => Auth::user()->id,

        ]);

        $notification = array(
            'message' => 'Leverancier bijgewerkt', 
            'alert-type' => 'success'
        );

        return redirect()->route('supplier.all')->with($notification);
    }

        public function SupplierDelete($id){

            Supplier::findOrFail($id)->delete();

            $notification = array(
                'message' => 'Leverancier verwijderd', 
                'alert-type' => 'error'
            );
    
            return redirect()->back()->with($notification);

        }
}
