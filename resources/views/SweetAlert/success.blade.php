    
   
   
   

   @if (Session::has('success1'))
   <script>
       setTimeout(function() {
           toastr.options = {
               "progressBar": true,
               "closeButton": true,
               "backgroundColor": "#4CAF50",
               "positionClass": "toast-top-center toast-margin", // Add custom class
           };
           toastr.success("{{ Session::get('success1') }}");
       }, 1000); // Adjust the delay as needed
   </script>
@endif
