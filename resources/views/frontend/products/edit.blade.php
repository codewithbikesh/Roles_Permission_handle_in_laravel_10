<x-app-web-layout>
    <x-slot:title>
    Product Edit
    </x-slot>
    <div class="container">
        <form action="{{ url('products/'.$product->id.'/edit') }}" method="POST">
            @csrf
            @method('PUT')
        <div class="row justify-content-center">
            <div class="col-md-6 my-5">
                {{-- @if($errors->any())
                <div>
                   <ul class="alert alert-danger p-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                   </ul>
                </div>
                @endif --}}

                @if(session('status'))
                <div class="alert alert-success">{{ session('status')}}</div>
                @endif
                <div class="card">
                    <div class="card-header">
                        <h4>Edit Product
                            <a href="{{ url('products') }}" class="btn btn-primary float-end">Back</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="">Product Name</label>
                            <input type="text" name="name" value="{{ $product->name }}" class="form-control" >
                            @error('name') <span class="text-danger">{{ $message }}</span>@enderror
                        </div>
        
                        <div class="mb-3">
                            <label for="">Product Description</label>
                            <textarea name="description" value="{{ $product->description }}" class="form-control" rows="3">{{ $product->description }}</textarea>
                            @error('description') <span class="text-danger">{{ $message }}</span>@enderror
                        </div>
        
                        <div class="mb-3">
                            <label for="">Product Price</label>
                            <input type="text" value="{{ $product->price }}" name="price" class="form-control" >
                            @error('price') <span class="text-danger">{{ $message }}</span>@enderror
                        </div>
        
                        <div class="mb-3">
                            <label for="">Product Stock</label>
                            <input type="text" value="{{ $product->stock }}" name="stock" class="form-control" >
                            @error('stock') <span class="text-danger">{{ $message }}</span>@enderror
                        </div>
        
                        <div class="mb-3">
                            <label for="">Is Active</label>
                            <input type="checkbox"  {{ $product->is_active == 1 ? 'checked' : '' }} name="is_active">
                            @error('is_active') <span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                        <div class="col-md-12 my-2">
                            <button type="submit" class="btn btn-primary float-end">update</button>
                        </div>
                    </div>
                </div>
            </div> 
        </div>
    </form>
    </div>
</x-app-web-layout>