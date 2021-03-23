<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RamController extends Controller
{
    public function create()
    {
        return view('admin.product.create');
    }
    public function submitCreate()
    {
        return view('admin.product.create');
    }

    public function view()
    {
        return view('admin.attrtibute.brand.index');
    }
    public function submitEdit()
    {
        return view('admin.product.view');
    }
    public function delete()
    {
        return view('admin.product.view');
    }

}
