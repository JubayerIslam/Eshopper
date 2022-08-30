@extends('backend.master') @section('content')
<div class="row d-flex justify-content-center">
    <!-- Create Post Form -->
    <div class="col-sm-12 col-xl-8 px-4 mt-4 margin-bottom-md">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fa fa-exclamation-circle me-2"></i>Product Added Successfully!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        <div class="bg-secondary rounded p-4">
            <h4 class="mb-4">Add New Product</h4>
            <form action="{{ url('/product/store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <div class="form-group">
                        <label for="productName" class="form-label">Product Name</label>
                        <input type="text" name="name" class="form-control" id="productName" aria-describedby="productHelp" />
                    </div>

                    <div class="form-group">
                        <label for="exampleInputCategory" class="form-label">Category Name</label>
                        <select class="form-select" name="category_id" aria-label="Default select example">
                            <option selected>Select Category Name</option>
                            @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="brandName" class="form-label">Brand Name</label>
                        <select class="form-select" name="brand_id" aria-label="Default select example">
                            <option selected>Select Brand Name</option>
                            @foreach ($brands as $brand)
                            <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="quantity" class="form-label">Price</label>
                        <input type="number" name="price" class="form-control" id="quantity" aria-describedby="quantityHelp" />
                    </div>

                    <div class="form-group">
                        <label for="quantity" class="form-label">Quantity</label>
                        <input type="number" name="qty" class="form-control" id="quantity" aria-describedby="quantityHelp" />
                    </div>

                    <div class="form-group">
                        <label for="sku" class="form-label">SKU</label>
                        <input type="text" name="sku" class="form-control" id="sku" aria-describedby="skuHelp" />
                    </div>

                    <div class="form-group">
                        <label for="exampleInputCategory" class="form-label">Short Description</label>
                        <textarea name="shortDescription" id="" class="form-control" cols="78" rows="5"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputCategory" class="form-label">Long Description</label>
                        <textarea class="ckeditor form-control" name="longDescription"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputCategory" class="form-label">Image</label>
                        <input type="file" name="image" class="form-control" id="exampleInputCategory" aria-describedby="categoryHelp" />
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Add Product</button>
            </form>
        </div>
    </div>
</div>

@endsection
