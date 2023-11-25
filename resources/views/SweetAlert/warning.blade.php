



@if (Session::has('message'))

 <script>
    toastr.options = {
        "progressBar" : true,
        "closeButton" : true,
    }
    toastr.warning("{{ Session::get('message') }}", 'Reminder!!',{timeout:10000});
 </script>

 @endif