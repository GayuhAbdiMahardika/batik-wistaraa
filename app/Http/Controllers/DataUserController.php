<?php

namespace App\Http\Controllers;

use App\Models\DataUser;
use App\Http\Requests\DataUserRequest;
use Illuminate\Http\Request;

class DataUserController extends Controller
{
    public function index()
    {
        $datauser = DataUser::all();
        return view('datauser.index', compact('datauser'));
    }

    public function create()
    {
        return view('datauser.create');
    }

    public function store(DataUserRequest $request)
    {
        DataUser::create($request->validated());
        return redirect()->route('datauser.index')->with('success', 'User berhasil ditambahkan');
    }

    public function edit($id)
    {
        $datauser = DataUser::findOrFail($id);
        return view('datauser.edit', compact('datauser'));
    }

    public function update(DataUserRequest $request, $id)
    {
        $datauser = DataUser::findOrFail($id);
        $datauser->update($request->validated());
        return redirect()->route('datauser.index')->with('success', 'User berhasil diupdate');
    }

    public function destroy($id)
    {
        $datauser = DataUser::findOrFail($id);
        $datauser->delete();
        return redirect()->route('datauser.index')->with('success', 'User berhasil dihapus');
    }
}
