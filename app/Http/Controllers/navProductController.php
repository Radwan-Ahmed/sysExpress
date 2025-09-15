<?php


namespace App\Http\Controllers;

use App\Models\Product; // make sure this model exists
use Illuminate\Http\Request;

class navProductController extends Controller
{
    public function index()
    {
        // fetch products (adjust query to your needs)
        $products = Product::paginate(6);

        // pass to view
        return view('navProduct', compact('products'));


    }

}
