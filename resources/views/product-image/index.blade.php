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
                        <form action="{{ url('products/'.$product->id.'/store') }}" method="POST" enctype="multipart/form-data">
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
                @foreach ($productImage as $prodImg)
                    <div style="display: inline-block; margin: 10px; text-align: center;">
                        <img src="{{ asset($prodImg->image) }}" 
                             style="width: 100px; height: 100px; border: 1px solid #ddd; border-radius: 5px;" 
                             alt="{{ $prodImg->name }}" 
                             class="border p-2">
                        <div style="margin-top: 5px;">
                            <a href="{{ url('product-image/'.$prodImg->id.'/delete') }}" 
                               onclick="return confirm('Are you sure you want to delete this item?')" 
                               style="display: inline-block; padding: 5px 10px; font-size: 12px; color: #fff; background-color: #d9534f; border: none; border-radius: 3px; text-decoration: none; font-weight: bold;">
                               Delete
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
            
            
        </div>
    </div>
    </x-app-web-layout>