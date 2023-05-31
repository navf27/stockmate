<?php

namespace App\Imports;

use App\Models\Barang;
use Maatwebsite\Excel\Concerns\ToModel;

class ProductImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Barang([
            // Import
            'id_kategori' => $row[1],
            'nama_barang' => $row[2],
            'harga' => $row[3],
            'stok' => $row[4],
        ]);
    }
}
