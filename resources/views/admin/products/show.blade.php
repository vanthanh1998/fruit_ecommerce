@extends('admin.layouts.app')

@section('title', 'Show Product')

@section('contents')
    <h1 class="mb-0">Detail Product</h1>
    <hr />
    <div class="row mb-3">
        <div class="col">
            <label class="form-label">Category name</label>
            <input type="text" name="name" class="form-control" value="{{ $product->category->name }}" readonly>
        </div>
    </div>
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Name</label>
            <input type="text" name="name" class="form-control" value="{{ $product->name }}" readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">Price</label>
            <input type="text" name="price" class="form-control" value="{{ $product->price }}" readonly>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col">
            <label class="form-label">Image</label><br>
            <img style="width: 50px; height: 50px;" src="{{ asset('admin/img/products') .'/'. $product->image }}">
        </div>
    </div>
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Description</label>
            <textarea class="form-control" name="description" readonly>{{ $product->description }}</textarea>
        </div>
    </div>
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Created At</label>
            <input type="text" name="created_at" class="form-control" value="{{ $product->created_at }}" readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">Updated At</label>
            <input type="text" name="updated_at" class="form-control" value="{{ $product->updated_at }}" readonly>
        </div>
    </div>
@endsection
