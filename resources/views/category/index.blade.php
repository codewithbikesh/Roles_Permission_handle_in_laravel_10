<x-app-web-layout>
    <x-slot name="title">
        Categories
    </x-slot>
   <div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Categories
                        <a href="{{ url('categories/create') }}" class="btn btn-primary float-end">Add Category</a>
                    </h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Is_Active</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as  $category)
                            <tr>
                            <td>{{ $category->id }}</td>
                            <td>{{ $category->name }}</td>
                            <td>{{ $category->description }}</td>
                            <td style="color: {{ $category->is_active == 1 ? 'green' : 'red' }};  background-color: {{ $category->is_active == 1 ? 'lightgreen' : 'lightcoral' }};" >{{ $category->is_active == 1 ? 'active' : 'inactive' }}</td>
                            <td>
                                <a href="{{ url('categories/'.$category->id.'/edit') }}" class="btn btn-success mx-2">Edit</a>
                                <a href="{{ url('categories/'.$category->id.'/delete') }}" class="btn btn-danger mx-2" onclick=" return confirm('Are you sure you want to delte this item?')">Delete</a>
                            </td>
                         </tr>
                         @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
   </div>
</x-app-web-layout>