<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;
use Illuminate\Support\Facades\Auth;

date_default_timezone_set('Asia/Jakarta');

class CategoryController extends Controller
{
    // Index kategori
    public function index(Request $request){
        if(Request('search')){
            $kategori = Kategori::where('nama_kategori', 'like', '%' . $request->search . '%')->get();
        }else{
            $kategori = Kategori::all();
        }

        $user = Auth::user()->picture;

        return view('admin.master.kategori.category', compact('kategori', 'user'));
    }

    // Store kategori
    public function store(Request $request){
        Kategori::create([
            'nama_kategori' => $request->nama_kategori,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        return redirect('/categories')->with('success', 'Add category success!');
    }

    // Update kategori
    public function update(Request $request, $id){
        $kategori = Kategori::find($id);

        $kategori->nama_kategori = $request->nama_kategori;
        $kategori->updated_at = date('Y-m-d H:i:s');

        $kategori->save();

        return redirect('/categories')->with('success', 'Edit category success!');
    }

    // Delete user
    public function destroy($id){
        $kategori = Kategori::find($id);

        $kategori->delete();

        return redirect('/categories')->with('success', 'Delete category success!');
    }
}
