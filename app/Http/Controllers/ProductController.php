<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function create()
    {
        return view('admin.product.create');

    }

    public function submitCreate(AdminProductRequest $request)
    {
        $product = new Product();
        $product->name = $request->name;
        $product->catalog_id = $request->catalog_id;
        $product->price = $request->price;
        $product->brand_id = $request->brand_id;
        $product->operator_id = $request->operator_id;
        $product->camera_after_id = $request->camera_after_id;
        $product->camera_before_id = $request->camera_before_id;
        $product->cpu_id = $request->cpu_id;
        $product->ram_id = $request->ram_id;
        $product->memory_id = $request->memory_id;
        $product->sim_id = $request->sim_id;
        $product->pin_id = $request->pin_id;
        $product->display_id = $request->display_id;
        $product->feature = $request->feature;
        $product->title = $request->title;
        $product->time_of_launch = $request->time_of_launch;
        $product->slug = $request->slug;
        $product->type = $request->type;
        $product->rate = $request->rate;
        $product->description = $request->description;
        $product->content = $request->input('content');
    }

    public function view(Request $request)
    {
        $product = Product::query();


        $product = $product->latest('id')->paginate(20);
        return view('admin.product.view', compact('product'));
    }

    public function submitEdit()
    {
    }

    public function delete()
    {
    }
}
