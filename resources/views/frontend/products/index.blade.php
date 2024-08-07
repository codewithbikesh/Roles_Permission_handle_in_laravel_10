<x-app-web-layout>
<x-slot name="title">
 Products
</x-slot>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                {{-- header of card  --}}
                <div class="card-header">
                    <h4>Products
                        <a href="{{ url('products/create') }}" class="btn btn-primary float-end">Add Product</a>
                    </h4>
                </div>
                  {{-- header of card  --}}

                  {{-- body of card  --}}
                  <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Slug</th>
                                <th>Description</th>
                                <th>Price</th>
                                <th>Stock</th>
                                <th>Is Active</th>
                                <th>Images</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                          @foreach ($products as $product)
                          <tr>
                            <td>{{ $product->id }}</td>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->slug }}</td>
                            <td>{{ $product->description }}</td>
                            <td>{{ $product->price }}</td>
                            <td>{{ $product->stock }}</td>
                            <td style="background-color: {{ $product->is_active == 1 ? 'lightgreen' : 'lightcoral'}}; color:{{ $product->is_active == 1 ? 'green' : 'red' }}; ">{{ $product->is_active == 1 ? 'active' : 'inactive' }}</td>
                            <td><a href="{{ url('products/'.$product->id.'/upload') }}" class="btn btn-info">Add / View Images</a></td>
                            <td>
                                <a href="{{ url('products/'.$product->id.'/edit') }}" class="btn btn-primary">Edit</a>
                                <a href="{{url('products/'.$product->id.'/delete')}}" class="btn btn-danger" onclick="confirm('Are you sure you want to delete this item ?');">Delete</a>
                            </td>
                        </tr>
                          @endforeach
                        </tbody>
                    </table>
                  </div>
                  {{-- body of card  --}}
            </div>
        </div>
    </div>
</div>
</x-app-web-layout>