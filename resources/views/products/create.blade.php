@extends('master')

@section('konten')

                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <form action="{{ route('products.store') }}" method="POST">
                        
                            @csrf

                            <div class="form-group">
                                <label class="font-weight-bold">Name</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="Ex. John Doe">
                            
                                <!-- error message untuk name -->
                                @error('name')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Detail</label>
                                <textarea class="form-control @error('detail') is-invalid @enderror" name="detail" rows="5" placeholder="Masukkan Konten Post">{{ old('detail') }}</textarea>
                            
                                <!-- error message untuk detail -->
                                @error('detail')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-md btn-primary">SIMPAN</button>
                            <button type="reset" class="btn btn-md btn-warning">RESET</button>

                        </form> 
                    </div>
                </div>


<script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace( 'detail' );
</script>

@endsection