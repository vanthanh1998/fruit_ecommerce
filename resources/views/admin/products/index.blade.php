@extends('admin.layouts.app')

@section('title', 'Home Product')

@section('contents')
    <div class="d-flex align-items-center justify-content-between">
        <h1 class="mb-0">List Product</h1>
        <a href="{{ route('products.create') }}" class="btn btn-primary">Add Product</a>
    </div>
    <hr />
    @if(Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('success') }}
        </div>
    @endif
    <table class="table table-hover">
        <thead class="table-primary">
        <tr>
            <th>#</th>
            <th>Image</th>
            <th>Name</th>
            <th>Price</th>
            <th>Description</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>+
        @if($products->count() > 0)
            @foreach($products as $product)
                <tr>
                    <td class="align-middle">{{ $loop->iteration }}</td>
                    <td class="align-middle">
                        <img style="width: 50px; height: 50px;" src="{{ asset('admin/img/products') .'/'. $product->image }}">
                    </td>
                    <td class="align-middle">{{ $product->name }}</td>
                    <td class="align-middle">{{ $product->price }}</td>
                    <td class="align-middle">{{ $product->description }}</td>
                    <td class="align-middle">
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <a href="{{ route('products.show', $product->id) }}" type="button" class="btn btn-secondary">Detail</a>
                            <a href="{{ route('products.edit', $product->id)}}" type="button" class="btn btn-warning">Edit</a>
                            <form action="{{ route('products.destroy', $product->id) }}" method="POST" type="button" class="btn btn-danger p-0" onsubmit="return confirm('Delete?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger m-0">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        @else
            <tr>
                <td class="text-center" colspan="5">Product not found</td>
            </tr>
        @endif
        </tbody>
    </table>
@endsection
