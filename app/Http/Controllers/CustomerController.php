<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Product;



class CustomerController extends Controller
{


    public function index()
    {
        $customers = Customer::paginate(12);
        return view('customers.index', compact('customers'));
    }



    public function edit($id)
    {
        $customer = Customer::findOrFail($id);
        return view('customers.edit', compact('customer'));
    }

    public function destroy($id)
    {
        $customer = Customer::findOrFail($id);
        $customer->delete();
        return redirect()->route('customers.index')->with('success', 'Customer deleted successfully.');
    }
}
