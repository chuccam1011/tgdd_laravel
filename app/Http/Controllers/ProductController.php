<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminProductRequest;
use App\Models\Brand;
use App\Models\CamAfter;
use App\Models\CamBefor;
use App\Models\Categories;
use App\Models\Cpu;
use App\Models\Display;
use App\Models\Memory;
use App\Models\Operator;
use App\Models\Pin;
use App\Models\Product;
use App\Models\Ram;
use App\Models\Sim;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function create()
    {
        $brands = Brand::all();
        $operas = Operator::all();
        $camAfters = CamAfter::all();
        $camBefores = CamBefor::all();
        $sims = Sim::all();
        $displays = Display::all();
        $categories = Categories::all();
        $rams = Ram::all();
        $cpus = Cpu::all();
        $memorys = Memory::all();
        $pins = Pin::all();
        $products = Product::all();

        return view('admin.product.create',
            compact('products', 'brands', 'operas', 'camAfters', 'camBefores', 'sims', 'displays', 'categories', 'rams', 'cpus', 'memorys', 'pins'));

    }

    public function submitCreate(AdminProductRequest $request)
    {
        $product = new Product();
        $is_default = $request->is_default == 'on' ? 1 : 0;
        if ($is_default == 0 && !is_numeric($request->parent_id)) {
            return back()->with('parent', 'The Parent product is  required');
        }
        $product->name = $request->name;
        $product->category_id = $request->category_id;
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
        $product->slug = Str::slug($request->name);
        $product->is_default = $is_default;
        $product->qty = $request->qty;
        if (!$is_default)
            $product->parent_id = $request->parent_id;
        else $product->parent_id = 0;
        $product->description = $request->description;
        $product->content = $request->input('content');

        if ($request->thumbnail && $request->file('thumbnail')->isValid()) {
            $fileName = time() . '-' . $request->file('thumbnail')->getClientOriginalName();
            Storage::disk('public')->putFileAs('thumbnail/',
                $request->file('thumbnail'), $fileName);
            if (!is_null($fileName)) {
                $product->thumbnail = $fileName;
            }
        }
        $product->save();
        return redirect()->route('view-product');

    }

    public function view(Request $request)
    {
        $products = Product::query();

        $brands = Brand::all();
        $operas = Operator::all();
        $camAfters = CamAfter::all();
        $camBefores = CamBefor::all();
        $sims = Sim::all();
        $displays = Display::all();
        $categories = Categories::all();
        $rams = Ram::all();
        $cpus = Cpu::all();
        $memorys = Memory::all();
        $pins = Pin::all();

        $attributes = [
            'id' => 'ID', 'brand_id' => 'Brand', 'category_id' => 'Categories', 'name' => 'Name'
        ];
        $sorts = ['ASC' => 'ASC', 'DESC' => 'DESC'];


        $keyword = $request->input('key');
        if ($keyword) {
            $products->where('name', 'like', "%{$keyword}%");
        }
        if ($request->input('category_id')) {
            $products->where('category_id', '=', "{$request->input('category_id')}");
        }
        if ($request->input('brand_id')) {
            $products->where('brand_id', '=', "{$request->input('brand_id')}");
        }
        if ($request->input('is_default')) {
            $products->where('is_default', '=', 1);
        }
        if ($request->input('order_by')) {
            $products->orderBy($request->order_by, $request->sort);

        }
        $products = $products->latest('id')->paginate(5);
        return view('admin.product.view',
            compact('sorts', 'attributes', 'products', 'brands', 'operas', 'camAfters', 'camBefores', 'sims', 'displays', 'categories', 'rams', 'cpus', 'memorys', 'pins'));

    }

    public function edit(Request $request)
    {
        $product = Product::find($request->id);
        $products = Product::all();
        $brands = Brand::all();
        $operas = Operator::all();
        $camAfters = CamAfter::all();
        $camBefores = CamBefor::all();
        $sims = Sim::all();
        $displays = Display::all();
        $categories = Categories::all();
        $rams = Ram::all();
        $cpus = Cpu::all();
        $memorys = Memory::all();
        $pins = Pin::all();


        return view('admin.product.edit',
            compact('products', 'product', 'brands', 'operas', 'camAfters', 'camBefores', 'sims', 'displays', 'categories', 'rams', 'cpus', 'memorys', 'pins'));
    }

    public function submitEdit(AdminProductRequest $request)
    {
        $is_default = $request->is_default == 'on' ? 1 : 0;
        if ($is_default == 0 && !is_numeric($request->parent_id)) {
            return back()->with('parent', 'The Parent product is  required');
        }
        $product = Product::find($request->id);
        $product->name = $request->name;
        $product->category_id = $request->category_id;
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
        $product->slug = Str::slug($request->name);
        $product->is_default = $is_default;
        $product->qty = $request->qty;
        if (!$is_default)
            $product->parent_id = $request->parent_id;
        else $product->parent_id = 0;
        $product->description = $request->description;
        $product->content = $request->input('content');

        if ($request->thumbnail && $request->file('thumbnail')->isValid()) {
            $fileName = time() . '-' . $request->file('thumbnail')->getClientOriginalName();
            Storage::disk('public')->putFileAs('thumbnail/',
                $request->file('thumbnail'), $fileName);
            if (!is_null($fileName)) {
                Storage::delete('public/thumbnail/' . $product->thumbnail);
                $product->thumbnail = $fileName;
            }
        }
        $product->save();
        return redirect()->route('view-product');
    }


    public function createChild(Request $request)
    {
        $product = Product::find($request->parent_id);
        $products = Product::all();
        $brands = Brand::all();
        $operas = Operator::all();
        $camAfters = CamAfter::all();
        $camBefores = CamBefor::all();
        $sims = Sim::all();
        $displays = Display::all();
        $categories = Categories::all();
        $rams = Ram::all();
        $cpus = Cpu::all();
        $memorys = Memory::all();
        $pins = Pin::all();


        return view('admin.product.create-child',
            compact('products', 'product', 'brands', 'operas', 'camAfters', 'camBefores', 'sims', 'displays', 'categories', 'rams', 'cpus', 'memorys', 'pins'));
    }

    public function submitCreateChild(AdminProductRequest $request)
    {
        $product = new Product();
        $product->name = $request->name;
        $product->category_id = $request->category_id;
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
        $product->slug = Str::slug($request->name);
        $product->is_default = 0;
        $product->parent_id = $request->parent_id;
        $product->thumbnail = $request->thumbnail;
        $product->description = $request->description;
        $product->qty = $request->qty;
        $product->content = $request->input('content');

        $product->save();
        return redirect()->route('view-product');
    }

    public function delete(Request $request)
    {
        $product = Product::find($request->id);
        $product->delete();
        if ($product->is_default) {//chi xoa thumbnail voi nhung san pham gốc
            Storage::delete('public/thumbnail/' . $product->logo);
        }
        return redirect()->route('view-product');
    }
}
