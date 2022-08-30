    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('frontend/') }}/lib/easing/easing.min.js"></script>
    <script src="{{ asset('frontend/') }}/lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="{{ asset('frontend/') }}/mail/jqBootstrapValidation.min.js"></script>
    <script src="{{ asset('frontend/') }}/mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('frontend/') }}/js/main.js"></script>

     <!-- Scripts -->
     <script src="{{ asset('js/app.js') }}" defer></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

<script>
@if(Session::has('message'))
toastr.options =
{
  "closeButton" : true,
  "progressBar" : true
}
      toastr.success("{{ session('message') }}");
@endif

@if(Session::has('error'))
toastr.options =
{
  "closeButton" : true,
  "progressBar" : true
}
      toastr.error("{{ session('error') }}");
@endif

@if(Session::has('info'))
toastr.options =
{
  "closeButton" : true,
  "progressBar" : true
}
      toastr.info("{{ session('info') }}");
@endif

@if(Session::has('warning'))
toastr.options =
{
  "closeButton" : true,
  "progressBar" : true
}
      toastr.warning("{{ session('warning') }}");
@endif
</script>