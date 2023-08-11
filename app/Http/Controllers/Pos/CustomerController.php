<?php

namespace App\Http\Controllers\Pos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;

class CustomerController extends Controller
{
    public function CustomerAll() {

        $customers = Customer::latest()->get();
        
        return view('backend.customer.customer_all', compact('customers'));

    } // End

    public function CustomerAdd() {
    return view('backend.customer.customer_add');

        
    } // End

    public function CustomerStore(Request $request) {

        // $onderhoudsrapport = $request->file('onderhoudsrapport');
        // $name_gen = $onderhoudsrapport->getClientOriginalName().'.'.$onderhoudsrapport->getClientOriginalExtension();
        //       //  bestandsnaam.extensie

        // File::make($onderhoudsrapport)->save('upload/klant/'.$name_gen);
        // $save_url = 'upload/klant/'.$name_gen;

        Customer::insert([
            'name' => $request->name,
            'address' => $request->address,
            'postalcode' => $request->postalcode,
            'place' => $request->place,
            'email' => $request->email,
            'emailcp' => $request->emailcp,
            'phone' => $request->phone,
            'maintenancedate' => $request->maintenancedate,
            // 'maintenancereport' => $save_url,
            'created_by' => Auth::user()->id,
            'created_at' => Carbon::now(),



        ]);

        $notification = array(
            'message' => 'Klant aangemaakt',
            'alert-type' => 'success'
        );

        return redirect()->route('customer.all')->with($notification);

    }// End

    public function CustomerEdit($id) {

        $customer = Customer::findOrFail($id);
        return view('backend.customer.customer_edit', compact('customer'));

    } // End

    public function CustomerUpdate(Request $request){
        $customer_id = $request->id;
        // if ($request)->file('')

        Customer::findOrFail($customer_id)->update([
            'name' => $request->name,
            'address' => $request->address,
            'postalcode' => $request->postalcode,
            'place' => $request->place,
            'email' => $request->email,
            'emailcp' => $request->emailcp,
            'phone' => $request->phone,
            'maintenancedate' => $request->maintenancedate,
            // 'maintenancereport' => $save_url,
            'updated_by' => Auth::user()->id,
            'updated_at' => Carbon::now(),



        ]);

        $notification = array(
            'message' => 'Gegevens bijgewerkt',
            'alert-type' => 'success'
        );

        return redirect()->route('customer.all')->with($notification);

    }

    public function CustomerDelete($id){


        // $klant = Klant::findOrFail($id);
        // $document = $klant->onderhoudsrapport;
        // unlink($document);

        Customer::findOrFail($id)->delete();
        

        $notification = array(
            'message' => 'Klant verwijderd', 
            'alert-type' => 'error'
        );

        return redirect()->back()->with($notification);

    }

}
