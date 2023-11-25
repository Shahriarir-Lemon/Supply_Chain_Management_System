@if(Session::has('error'))
    <script>
        swal({
            title: "Error!",
            html: "{!! Session::get('error') !!}",
            icon: "error",
            button: "OK",
            width: 400,
           
            customClass: {
                confirmButton: 'btn-error-color'
            }
        });
    </script>
@endif
