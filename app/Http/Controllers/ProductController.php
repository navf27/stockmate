<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\Kategori;
use App\Exports\ProductExport;
use App\imports\ProductImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Auth;

date_default_timezone_set('Asia/Jakarta');

class ProductController extends Controller
{
    // Index barang
    public function index(Request $request){
        if(Request('search')){
            $barang = Barang::join('kategoris', 'kategoris.id', '=', 'barangs.id_kategori')
                  ->select('barangs.*', 'kategoris.nama_kategori')
                  ->where('nama_barang', 'like', '%' . $request->search . '%')
                  ->get();
            $kategori = Kategori::all();
        }else{
            $barang = Barang::join('kategoris', 'kategoris.id', '=', 'barangs.id_kategori')
                  ->select('barangs.*', 'kategoris.nama_kategori')
                  ->get();
            $kategori = Kategori::all();
        }

        $user = Auth::user()->picture;

        return view('admin.master.barang.product', compact('barang', 'kategori', 'user'));
    }

    // Store barang
    public function store(Request $request){
        Barang::create([
            'id_kategori' => $request->id_kategori,
            'nama_barang' => $request->nama_barang,
            'harga' => $request->harga,
            'stok' => $request->stok,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        return redirect('/products')->with('success', 'Add product success!');
    }

    // Update product
    public function update(Request $request, $id){
        $barang = Barang::find($id);

        $barang->id_kategori = $request->id_kategori;
        $barang->nama_barang = $request->nama_barang;
        $barang->harga = $request->harga;
        $barang->stok = $request->stok;
        $barang->updated_at = date('Y-m-d H:i:s');

        $barang->save();

        return redirect('/products')->with('success', 'Edit product success!');
    }

    // Delete product
    public function destroy($id){
        $barang = Barang::find($id);

        $barang->delete();

        return redirect('/products')->with('success', 'Delete product success!');
    }

    // Export product
    public function export(){
        return Excel::download(new ProductExport, 'Products.xlsx');
    }

    // Import product
    public function import(Request $request){
        $file = $request->file('file');
        $fileName = $file->getClientOriginalName();
        $file->move('imports', $fileName);

        Excel::import(new ProductImport, public_path('/products/'.$fileName));

        return redirect('/products');
    }
}
