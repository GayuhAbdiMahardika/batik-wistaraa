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
        $validated = $request->validated();
        $validated['password'] = bcrypt($validated['password']);
        DataUser::create($validated);
        return redirect()->route('datauser.index')->with('success', 'User berhasil ditambahkan');
    }

    public function edit($id)
    {
        $datauser = DataUser::findOrFail($id);
        return view('datauser.edit', compact('datauser'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'nullable|string|min:8',
            'role' => 'required|string',
        ]);

        $datauser = DataUser::findOrFail($id);
        $datauser->name = $request->name;
        $datauser->email = $request->email;
        if ($request->filled('password')) {
            $datauser->password = bcrypt($request->password);
        }
        $datauser->role = $request->role;
        $datauser->save();

        return redirect()->route('datauser.index')->with('success', 'User berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $datauser = DataUser::findOrFail($id);
        $datauser->delete();
        return redirect()->route('datauser.index')->with('success', 'User berhasil dihapus');
    }
}
