@if (Session::has('success2'))
<script>
    setTimeout(function() {
        toastr.options = {
            "progressBar": true,
            "closeButton": true,
            "backgroundColor": "#4CAF50",
            "positionClass": "toast-top-center toast-margin1", // Add custom class
        };
        toastr.success("{{ Session::get('success2') }}");
    }, 12000); // Adjust the delay as needed
</script>
@endif