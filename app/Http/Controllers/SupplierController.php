<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    function tampil() {
        $supplier = Supplier::get();
        return view('supplier.tampil',compact('supplier'));
        
    }

    function tambah() {
        return view ('supplier.tambah');
    }

    function submit(Request$request){
        $supplier = new Supplier();
        $supplier->nama_supplier = $request->nama_supplier;
        $supplier->kontak = $request->kontak;
        $supplier->save();

        return redirect()->route('supplier.tampil');
    }

    function edit($id){
        $supplier = Supplier::find($id);
        return view('supplier.edit', compact('supplier'));
    }

    function update(Request $request, $id){
        $supplier = Supplier::find($id);
        $supplier->nama_supplier = $request->nama_supplier;
        $supplier->kontak = $request->kontak;
        $supplier->update();

        return redirect()->route('supplier.tampil');
    }

    function delete($id){
        $supplier = Supplier::find($id);
        $supplier->delete();

        return redirect()->route('supplier.tampil');
    }
}
