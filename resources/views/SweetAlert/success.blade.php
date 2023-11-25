




@if(Session::has('success'))
<script>
    swal({
        title: "Congratulation!",
        text: "{!! Session::get('success') !!}",
        icon: "success",
        button: "ok",
        width: 400, // Set the width of the SweetAlert popup in pixels
        timer: 3000, // Set the time (in milliseconds) before the SweetAlert is automatically closed
    });
</script>
@endif