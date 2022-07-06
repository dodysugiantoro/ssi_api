<?php

namespace App\Exports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

use Illuminate\Support\Facades\DB;

class ProductsExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        // return Product::all();
        // return Product::select("id", "name")->get();
        
        // $products =
        //     DB::select(
        //         DB::raw("
        //           select id, CONCAT('SSI/', LPAD(DAY(created_at), 2, '0'), LPAD(MONTH(created_at), 2, '0'), YEAR(created_at), '/', LPAD(id, 4, '0')) as code, name from products;
        //         ")
        //     );

        $products = DB::table('products')
             ->select(DB::raw("id, CONCAT('SSI/', LPAD(DAY(created_at), 2, '0'), LPAD(MONTH(created_at), 2, '0'), YEAR(created_at), '/', LPAD(id, 4, '0')) as code, name"))
             ->get();

        return $products;
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function headings(): array
    {
        return ["ID", "CODE", "Name"];
    }
}
