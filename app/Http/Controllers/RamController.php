<?php

namespace App\Http\Controllers;

use App\Models\Ram;
use Illuminate\Http\Request;

class RamController extends Controller
{
    public function create()
    {
        return view('admin.attrtibute.ram.create');
    }

    public function submitCreate(Request $request)
    {
        $ram = new Ram();
        $ram->name = $request->name;
        $ram->description = $request->description;
        $ram->save();
        return redirect()->route('view-ram');
    }

    public function view(Request $request)
    {
        $ram = Ram::query();
        $keyword = $request->input('key');
        if ($keyword) {
            $ram->where('name', 'like', "%{$keyword}%");
        }
        $rams = $ram->latest('id')->paginate(20);
        return view('admin.attrtibute.ram.index', compact('rams'));
    }

    public function edit(Request $request)
    {
        $ram = Ram::find($request->id);
        return view('admin.attrtibute.ram.edit', compact('ram'));
    }

    public function submitEdit(Request $request)
    {
        $ram = Ram::find($request->id);
        $ram->name = $request->name;
        $ram->description = $request->description;
        $ram->save();
        return redirect()->route('view-ram');
    }

    public function delete(Request $request)
    {
        $ram = Ram::find($request->id);
        $ram->delete();
        return redirect()->route('view-ram');
    }
}
