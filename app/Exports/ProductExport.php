<?php

namespace App\Exports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ProductExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        // return Product::all();
        $products =  Product::latest()->get();
        return $products;
    }

    public function headings(): array
    {
        return [
            'ID Produk',
            'ID Merek',
            'ID Kategori',
            'ID Sub Kategori',
            'ID Sub-Sub Kategori',
            'Nama Produk',
            'Slug Produk',
            'Kode Produk',
            'Kuantitas',
            'Berat',
            'Warna',
            'Tag',
            'Ukuran',
            'Harga',
            'Diskon',
            'Deskripsi Pendek',
            'Deskripsi Panjang',
            'Thumbnail',
            'Produk Promo',
            'Produk Baru',
            'Koleksi Baru',
            'Best Seller',
            'Status Produk',
            'Create',
            'Update',
        ];
    }
}
