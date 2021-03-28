<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminBrandCreateRequest;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BrandController extends Controller
{
    public function create()
    {
        return view('admin.attrtibute.brand.create');
    }

    public function submitCreate(AdminBrandCreateRequest $request)
    {
        if ($request->file('logo')->isValid()) {
            $fileName = time() . $request->file('logo')->getClientOriginalName();
            Storage::disk('public')->putFileAs('logo/',
                $request->file('logo'),
                $fileName);

            if (!is_null($fileName)) {
                $brand = new Brand();
                $brand->name = $request->name;
                $brand->logo = $fileName;
                $brand->description = $request->description;
                $brand->save();
                return redirect()->route('view-brand')->with('success', 'Success! image uploaded');
            } else {
                return back()->with("failed", "Alert! image not uploaded");
            }
        }
        return back()->with("failed", "Alert! image not uploaded");

    }

    public function view(Request $request)
    {
        $success = $request->success;
        $brands = Brand::query();

        $brands->latest('id');
        $brands = $brands->paginate();
        return view('admin.attrtibute.brand.index', compact('brands', 'success'));
    }

    public function edit(Request $request)
    {
        $brand = Brand::find($request->id);
        return view('admin.attrtibute.brand.edit', compact('brand'));
    }

    public function submitEdit(AdminBrandCreateRequest $request)
    {
        $brand = Brand::find($request->id);
        $brand->name = $request->name;
        $brand->description = $request->description;
        if ($request->logo && $request->file('logo')->isValid()) {
            $fileName = time().'-' . $request->file('logo')->getClientOriginalName();
            Storage::disk('public')->putFileAs('logo/',
                $request->file('logo'), $fileName);
            if (!is_null($fileName)) {
                Storage::delete('public/logo/' . $brand->logo);
                $brand->logo = $fileName;
            }
        }
        $brand->save();
        return redirect()->route('view-brand');
    }

    public function delete(Request $request)
    {
        $brand = Brand::find($request->id);
        $brand->delete();
        return redirect()->route('view-brand');
    }

}
