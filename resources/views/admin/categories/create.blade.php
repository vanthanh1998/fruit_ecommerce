@extends('admin.layouts.app')

@section('title', 'Create Category')

@section('contents')
    <h1 class="mb-0">Add Category</h1>
    <hr />
    <form action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row mb-3">
            <div class="col">
                <input type="text" name="name" class="form-control form-control-user @error('name')is-invalid @enderror" id="exampleInputName" placeholder="Name">
                @error('name')
                <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <div class="col">
                <input type="text" name="slug" class="form-control form-control-user @error('slug')is-invalid @enderror" id="exampleInputName" placeholder="Slug">
                @error('slug')
                <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="row">
            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
@endsection
