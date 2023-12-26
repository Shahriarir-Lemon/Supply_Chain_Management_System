@if (Session::has('error1'))
<script>
  setTimeout(function() {
    toastr.options = {
      "progressBar": true,
      "closeButton": true,
      "backgroundColor": "#FF0000", // Set your desired background color for error messages
      "positionClass": "toast-top-center",
    };
    toastr.error("{{ Session::get('error1') }}");
  }, 10000); // Adjust the delay as needed
</script>
@endif