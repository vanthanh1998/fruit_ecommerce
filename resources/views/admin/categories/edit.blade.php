@extends('admin.layouts.app')

@section('title', 'Edit Category')

@section('contents')
    <h1 class="mb-0">Edit Category</h1>
    <hr />
    <form action="{{ route('categories.update', $category->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">Name</label>
                <input type="text" name="name" class="form-control form-control-user @error('name')is-invalid @enderror" value="{{ $category->name }}" placeholder="Name">
                @error('name')
                <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">Slug</label>
                <input type="text" name="slug" class="form-control form-control-user @error('slug')is-invalid @enderror" value="{{ $category->slug }}" placeholder="Slug">
                @error('slug')
                <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="row">
            <div class="d-grid">
                <button class="btn btn-warning">Update</button>
            </div>
        </div>
    </form>
@endsection
