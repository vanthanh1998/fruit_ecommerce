@extends('admin.layouts.app')

@section('title', 'Show Category')

@section('contents')
    <h1 class="mb-0">Detail Category</h1>
    <hr />
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Name</label>
            <input type="text" name="title" class="form-control" value="{{ $category->name }}" readonly>
        </div>
    </div>
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Slug</label>
            <input type="text" name="product_code" class="form-control" value="{{ $category->slug }}" readonly>
        </div>
    </div>
@endsection
