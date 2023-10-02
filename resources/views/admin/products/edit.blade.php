@extends('admin.layouts.app')

@section('title', 'Edit Product')

@section('contents')
    <h1 class="mb-0">Edit Product</h1>
    <hr />
    <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row mb-3">
            <div class="col">
                <select id="cars" name="category_id" class="form-control">
                    @foreach ($categories as $val)
                        <option value="{{ $val->id }}" {{ $product->category->name ==  $val->name ? "selected" : "" }}>{{ $val->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">Name</label>
                <input type="text" name="name" class="form-control form-control-user @error('name')is-invalid @enderror" value="{{ $product->name }}" placeholder="Name">
                @error('name')
                <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
            <div class="col mb-3">
                <label class="form-label">Price</label>
                <input type="text" name="price" class="form-control form-control-user @error('price')is-invalid @enderror" value="{{ $product->price }}" placeholder="Price">
                @error('price')
                <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <div>
                    <label class="form-label">Image</label><br>
                    <img style="width: 50px; height: 50px;" src="{{ asset('admin/img/products') .'/'. $product->image }}">
                </div>
                <input type="file" name="image" class="form-control-user @error('image')is-invalid @enderror">
                @error('image')
                <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">Description</label>
                <textarea class="form-control" name="description" placeholder="Descriptoin" >{{ $product->description }}</textarea>
            </div>
        </div>
        <div class="row">
            <div class="d-grid">
                <button class="btn btn-warning">Update</button>
            </div>
        </div>
    </form>
@endsection
