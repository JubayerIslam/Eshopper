<div class="sidebar pe-4 pb-3">
    <nav class="navbar bg-secondary navbar-dark">
        <a href="index.html" class="navbar-brand mx-4 mb-3">
            <h3 class="text-primary"><i class="fa fa-user-edit me-2"></i>Admin Panel</h3>
        </a>
        <div class="d-flex align-items-center ms-4 mb-4">
            <div class="position-relative">
                <img class="rounded-circle" src="{{ asset('backend/') }}/img/user.jpg" alt="" style="width: 40px; height: 40px;" />
                <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
            </div>
            <div class="ms-3">
                <h6 class="mb-0">Jhon Doe</h6>
                <span>Admin</span>
            </div>
        </div>
        <div class="navbar-nav w-100">
            <a href="{{ url('/admin/dashboard') }}" class="nav-item nav-link active"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>

            <div class="nav-item dropdown">
                <a href="#" class="nav-item nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fas fa-file-alt me-2"></i>Category</a>
                <div class="dropdown-menu menu-category bg-transparent border-0">
                    <a href="{{ url('/category/addCategory') }}" class="nav-item nav-link dropdown-item"><i class="fas fa-arrow-right me-2"></i>Add Category</a>
                    <a href="{{ url('/category/manageCategory') }}" class="nav-item nav-link dropdown-item"><i class="fas fa-arrow-right me-2"></i>Manage Category</a>
                </div>
            </div>
            <div class="nav-item dropdown">
                <a href="#" class="nav-item nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="far fa-compass me-2"></i>Brand</a>
                <div class="dropdown-menu bg-transparent border-0">
                    <a href="{{ url('/brand/addBrand') }}" class="nav-item nav-link dropdown-item"><i class="fas fa-arrow-right me-2"></i>Add Brand</a>
                    <a href="{{ url('/brand/manageBrand') }}" class="nav-item nav-link dropdown-item"><i class="fas fa-arrow-right me-2"></i>Manage Brand</a>
                </div>
            </div>
            <div class="nav-item dropdown">
                <a href="#" class="nav-item nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="far fa-compass me-2"></i>Product</a>
                <div class="dropdown-menu bg-transparent border-0">
                    <a href="{{ url('/product/addProduct') }}" class="nav-item nav-link dropdown-item"><i class="fas fa-arrow-right me-2"></i>Add Product</a>
                    <a href="{{ url('/manage/product') }}" class="nav-item nav-link dropdown-item"><i class="fas fa-arrow-right me-2"></i>Manage Product</a>
                </div>
            </div>
            <a href="widget.html" class="nav-item nav-link"><i class="fa fa-th me-2"></i>Setting</a>
        </div>
    </nav>
</div>

<a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>

@section('script')
    <script>
    /* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function myFunction() {
  document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}
    </script>
@endsection
