<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminRequest;
use App\Models\Operator;
use Illuminate\Http\Request;

class OperaController extends Controller
{
    public function create()
    {
        return view('admin.attrtibute.opera.create');
    }

    public function submitCreate(AdminRequest $request)
    {
        $operator = new Operator();
        $operator->name = $request->name;
        $operator->description = $request->description;
        $operator->save();
        return redirect()->route('view-opera');
    }

    public function view(Request $request)
    {
        $operator = Operator::query();

        $keyword = $request->input('key');
        if ($keyword) {
            $operator->where('name', 'like', "%{$keyword}%");
        }
        $operators = $operator->latest('id')->paginate(5);
        return view('admin.attrtibute.opera.index', compact('operators'));
    }

    public function edit(Request $request)
    {
        $opera  = Operator::find($request->id);
        return view('admin.attrtibute.opera.edit', compact('opera'));
    }

    public function submitEdit(AdminRequest $request)
    {
        $operator = Operator::find($request->id);
        $operator->name = $request->name;
        $operator->description = $request->description;

        $operator->save();
        return redirect()->route('view-opera');
    }

    public function delete(Request $request)
    {
        $operator = Operator::find($request->id);
        $operator->delete();
        return redirect()->route('view-opera');
    }
}
