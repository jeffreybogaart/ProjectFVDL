<?php

namespace App\Http\Controllers\Pos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Assignment;
use App\Models\Supplier;
use App\Models\Product;
use App\Models\Customer;
use App\Models\Unit;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;

class AssignmentController extends Controller
{
    public function AssignmentAll(){

        $allData = Assignment::orderBy('date', 'desc')->orderBy('id', 'desc')->get();
        return view('backend.assignment.assignment_all', compact('allData'));
    } // End method

    public function AssignmentAdd(){

        $supplier = Supplier::all();
        $unit = Unit::all();
        $category = Category::all();
        $customer = Customer::all();

        return view('backend.assignment.assignment_add', compact('supplier', 'unit', 'category', 'customer'));

    } // End method
}
