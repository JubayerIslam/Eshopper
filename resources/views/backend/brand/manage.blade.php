@extends('backend.master')

@section('content')

<!-- Delete Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <form action="{{ url('/delete/brand') }}" method="POST">
            @csrf
        <div class="modal-header">
          <h5 class="modal-title" id="deleteModalLabel">Delete Brand</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <input type="hidden" name="brand_delete_id" id="brand_id">
         <p> Are you sure delete this Brand ?</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Delete</button>
        </div>
      </div>
    </form>
    </div>
  </div>
  <!-- Delete Modal -->

<div class="row d-flex justify-content-center">
  <div class="col-sm-12 col-xl-10 px-4 mt-4">
    @if (session()->has('success'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <i class="fa fa-exclamation-circle me-2"></i>Brand Deleted Successfully!
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
  </div>
</div>
<div class="container-fluid pt-4 px-4 margin-bottom-md">
    <div class="row g-4">
        <div class="col-sm-12 col-xl-1" ></div>
        <div class="col-sm-12 col-xl-10">
            <div class="bg-secondary rounded h-100 p-4">
                <h5 class="mb-4">Brand List</h5>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Category Name</th>
                            <th scope="col">Brand Name</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($brands as $brand)
                        <tr>
                            <td>{{ $loop->index+1 }}</td>
                            <td>{{ $brand->category->name }}</td>
                            <td>{{ $brand->name }}</td>
                            <td>
                                <a href="{{ url('edit/brand/'.$brand->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                <button type="button" class="btn btn-sm btn-danger deleteBrandBtn" value="{{ $brand->id }}">Delete</button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- Table End -->


@endsection

@section('script')
  <script>
    $(document).ready(function() {
        $('.deleteBrandBtn').click(function(e) {
            e.preventDefault();

            var brand_id = $(this).val();
            $('#brand_id').val(brand_id);
            $('#deleteModal').modal('show');
        })
    })
  </script>
@endsection