<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminRequest;
use App\Models\CamAfter;
use Illuminate\Http\Request;

class CamAfterController extends Controller
{
    public function create()
    {
        return view('admin.attrtibute.cam_after.create');
    }

    public function submitCreate(AdminRequest $request)
    {
        $camAfter = new CamAfter();
        $camAfter->name = $request->name;
        $camAfter->description = $request->description;
        $camAfter->save();
        return redirect()->route('view-cam_after');
    }

    public function view(Request $request)
    {
        $camAfter = CamAfter::query();

        $keyword = $request->input('key');
        if ($keyword) {
            $camAfter->where('name', 'like', "%{$keyword}%");
        }
        $camAfters = $camAfter->latest('id')->paginate(5);
        return view('admin.attrtibute.cam_after.index', compact('camAfters'));
    }

    public function edit(Request $request)
    {
        $camAfter = CamAfter::find($request->id);
        return view('admin.attrtibute.cam_after.edit', compact('camAfter'));
    }

    public function submitEdit(AdminRequest $request)
    {
        $camAfter = CamAfter::find($request->id);
        $camAfter->name = $request->name;
        $camAfter->description = $request->description;

        $camAfter->save();
        return redirect()->route('view-cam_after');
    }

    public function delete(Request $request)
    {
        $camAfter = CamAfter::find($request->id);
        $camAfter->delete();
        return redirect()->route('view-cam_after');
    }
}
