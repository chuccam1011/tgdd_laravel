<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminImgProductRequest;
use App\Models\ImgProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImgProductController extends Controller
{
    public function create()
    {
        return view('admin.product.create-img');
    }

    /**
     * @param Request $request ImgProduct[]
     */
    public function summitUpload(Request $request)
    {
        if ($request->file('img')) {
            foreach ($request->file('img') as $imgFile) {
                $fileName = time() . $imgFile->getClientOriginalName();
                Storage::disk('public')->putFileAs('img/',
                    $imgFile,
                    $fileName);

                if (!is_null($fileName)) {
                    $img = new ImgProduct();
                    $img->img = $fileName;
                    $img->save();
                }
            }
            return redirect()->route('view-product-image')->with('success', 'Success! image uploaded');

        }
        return back()->with("failed", "Alert! image not uploaded");
    }

    /**
     * @param Request $request Product ID
     */
    public function upLoadImage(Request $request)
    {
        return view('admin.product.create-img');
    }

    public function view(Request $request)
    {
        $images = ImgProduct::query();


        $images->latest('id');
        $images = $images->paginate();
        return view('admin.product.view-img', compact('images'));
    }


    public function submitEdit()
    {
    }

    public function edit()
    {
        return view('admin.product.edit-img');
    }

    public function delete(Request $request)
    {
        $image = ImgProduct::find($request->id);
        $image->delete();
        Storage::delete('public/logo/' . $image->img);
        return redirect()->route('view-product-image');
    }
}
