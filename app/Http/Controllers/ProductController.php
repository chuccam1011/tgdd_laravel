<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminProductRequest;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function create()
    {
        return view('admin.product.create');

    }

    public function submitCreate(AdminProductRequest $request)
    {

        name
        catalog_id
        price
        brand_id
        operator_id
        camera_after_id
        camera_before_id
        cpu_id
        ram_id
        memory_id
        sim_id
        pin_id
        display_id
        feature
        title
        time-of-launch
        slug
        type
        rate
        description
        content
    }

    public function view()
    {
    }

    public function submitEdit()
    {
    }

    public function delete()
    {
    }
}
