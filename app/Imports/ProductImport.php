<?php

namespace App\Imports;

use App\Models\Product;
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
        return new Product([
            'id' => $row[0],
            'brand_id' => $row[1],
            'category_id'=> $row[2],
            'subcategory_id'=> $row[3],
            'subsubcategory_id'=> $row[4],
            'product_name'=> $row[5],
            'product_slug'=> $row[6],
            'product_code'=> $row[7],
            'product_qty'=> $row[8],
            'product_weight'=> $row[9],
            'product_tags'=> $row[10],
            'product_size' => $row[11],
            'product_color' => $row[12],
            'product_price'=> $row[13],
            'product_discount' => $row[14],
            'product_short_desc'=> $row[15],
            'product_long_desc'=> $row[16],
            'product_thambnail'=> $row[17],
            'product_promo' => $row[18],
            'new_product' => $row[19],
            'new_arrival' => $row[20],
            'best_seller' => $row[21]
        ]);
    }
}
