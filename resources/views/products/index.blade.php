@extends('master')

@section('konten')

    
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <a href="{{ route('products.create') }}" class="btn btn-md btn-success mb-3">TAMBAH Products</a>
                        <a href="{{ route('product.export') }}" class="btn btn-md btn-success mb-3">Export Products</a>
                        <table class="table table-bordered">
                            <thead>
                              <tr>
                                <th scope="col">Code</th>
                                <th scope="col">Name</th>
                                <th scope="col">Detail</th>
                                <th scope="col">#</th>
                              </tr>
                            </thead>
                            <tbody>
                              @forelse ($products as $product)

<?php
$code = $product->id;

switch (strlen($code)) {
case '1':
    $code = '000'. $product->id;
break;
case '2':
    $code = '00'. $product->id;
break;
case '3':
    $code = '0'. $product->id;
break;
default:
    $code = $product->id;
}
?>

                                <tr>
                                    <td>{{ 'SSI/'. $product->created_at->format('dmY') .'/'. $code }}</td>
                                    <td>{{ $product->name }}</td>
                                    <td>{!! $product->detail !!}</td>
                                    <td class="text-center">
                                        <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('products.destroy', $product->id) }}" method="POST">
                                            <a href="{{ route('products.edit', $product->id) }}" class="btn btn-sm btn-primary">EDIT</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                        </form>
                                    </td>
                                </tr>
                              @empty
                                  <div class="alert alert-danger">
                                      Data Post belum Tersedia.
                                  </div>
                              @endforelse
                            </tbody>
                          </table>  
                          {{ $products->links() }}
                    </div>
                </div>


    <script>
        //message with toastr
        @if(session()->has('success'))
        
            toastr.success('{{ session('success') }}', 'BERHASIL!'); 

        @elseif(session()->has('error'))

            toastr.error('{{ session('error') }}', 'GAGAL!'); 
            
        @endif
    </script>
@endsection
