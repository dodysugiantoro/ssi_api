<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;

use App\Exports\UsersExport;
// use App\Imports\UsersImport;
use Maatwebsite\Excel\Facades\Excel;

class ProductController extends Controller
{
    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        //get products
        $products = Product::latest()->paginate(5);

        //render view with products
        return view('products.index', compact('products'));
    }

        /**
     * create
     *
     * @return void
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * store
     *
     * @param Request $request
     * @return void
     */
    public function store(Request $request)
    {
        //validate form
        $this->validate($request, [
            'name'     => 'required|min:5',
            'detail'   => 'required|min:10'
        ]);

        //create Product
        Product::create([
            'name'     => $request->name,
            'detail'   => $request->detail
        ]);

        //redirect to index
        return redirect()->route('products.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

        /**
     * edit
     *
     * @param  mixed $product
     * @return void
     */
    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }
    
    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $product
     * @return void
     */
    public function update(Request $request, Product $product)
    {
        //validate form
        $this->validate($request, [
            'name'     => 'required|min:5',
            'detail'   => 'required|min:10'
        ]);

        $product->update([
            'name'     => $request->name,
            'detail'   => $request->detail
        ]);

        //redirect to index
        return redirect()->route('products.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    /**
     * destroy
     *
     * @param  mixed $product
     * @return void
     */
    public function destroy(Product $product)
    {
        //delete product
        $product->delete();

        //redirect to index
        return redirect()->route('products.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function export() 
    {
        return Excel::download(new \App\Exports\ProductsExport, 'products.xlsx');
    }


}
