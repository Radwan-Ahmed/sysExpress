<?php


namespace App\Http\Controllers;

use App\Models\Product; // make sure this model exists
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // fetch products (adjust query to your needs)
        $products = Product::orderBy('created_at', 'desc')->get();

        // pass to view
        return view('home', compact('products'));


    }

}
