<x-app-web-layout>
    <x-slot name="title">
        Upload Product Images
    </x-slot>
    
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    {{-- header of card  --}}
                    <div class="card-header">
                        <h4>Upload Product Images
                            <a href="{{ url('products') }}" class="btn btn-primary float-end">Back</a>
                        </h4>
                    </div>
                      {{-- header of card  --}}
    
                      {{-- body of card  --}}
                      <div class="card-body">
                       @if(session('status'))
                           <div class="alert alert-success">
                            {{ session('status') }}
                           </div>
                       @endif
                        <h5>Product Name: {{ $product->name }}</h5>
                        <hr>
                        @if($errors->any())
                        <ul class="alert alert-warning">
                          @foreach ($errors->all() as $error)
                           <li>{{ $error }}</li>    
                          @endforeach
                        </ul>
                        @endif
                        <form action="{{ url('products/'.$product->id.'/upload') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                           <div class="mb-3">
                            <label for="">Upload Images (Max:20 images only)</label>
                            <input type="file" name="images[]" multiple class="form-control" />
                           </div>
                           <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Upload</button>
                           </div>
                        </form>

                      </div>
                      {{-- body of card  --}}
                </div>
            </div>
            <div class="col-md-12 mt-4">
                @foreach ($productImage  as $prodImg)
                    <img src="{{ asset($prodImg->image) }}" style="width:100px; height:100px;" class="border p-2 m-3" alt="">
                    <a href="{{ url('product-image/'.$prodImg->id.'/delete') }}" onclick="return confirm('Are you sure you want to delete this item?')">Delete</a>
                @endforeach
            </div>
        </div>
    </div>
    </x-app-web-layout>