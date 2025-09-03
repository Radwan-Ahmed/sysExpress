<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::all();
        return view('services.index', compact('services'));
    }

    public function show($slug)
    {
        $service = Service::where('slug', $slug)->firstOrFail();
        return view('services.show', compact('service'));
    }

        public function solarsys()
    {
        return view('services.solarsys');
    }

    public function agrosys()
    {
        return view('services.agrosys');
    }

    public function gspv()
    {
        return view('services.gspv');
    }

    public function express()
    {
        return view('services.express');
    }

    public function insys()
    {
        return view('services.insys');
    }
}
