@extends('backend.master')

@section('content')
<div class="row d-flex justify-content-center">
 
<!-- Create Post Form -->
<div class="col-sm-12 col-xl-6 px-4 mt-4 margin-bottom-md">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if (session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="fa fa-exclamation-circle me-2"></i>Brand Added Successfully.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <div class="bg-secondary rounded h-100 p-4">
        <h5 class="mb-4">Add New Brand</h5>
        <form action="{{ url('/brand/store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="exampleInputCategory" class="form-label">Category Name</label>
                <select class="form-select" name="category_id" aria-label="Default select example">
                    <option selected>Select Category Name</option>
                    @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                  </select>
                <label for="exampleInputCategory" class="form-label">Brand Name</label>
                <input type="text" name="name" class="form-control" id="exampleInputCategory"
                aria-describedby="categoryHelp">
            </div>
            <button type="submit" class="btn btn-primary">Add Brand</button>
        </form>
    </div>
</div>
</div>

@endsection

