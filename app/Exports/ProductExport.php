<?php

namespace App\Exports;

use App\Models\Barang;
use Maatwebsite\Excel\Concerns\FromCollection;

class ProductExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        // return Barang::all();
        return Barang::join('kategoris', 'kategoris.id', '=', 'barangs.id_kategori')
        ->select('barangs.*', 'kategoris.nama_kategori')
        ->get();
    }
}
