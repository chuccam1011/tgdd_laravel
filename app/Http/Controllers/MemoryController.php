<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MemoryController extends Controller
{
    public function create()
    {
        return view('admin.product.create');
    }

    public function view()
    {
        return view('admin.product.view');
    }
}