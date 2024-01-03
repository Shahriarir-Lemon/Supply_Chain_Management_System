<script>
        // Function to handle the click event on the link
        function handleClick(event) {
            // Prevent the default link behavior (preventing the page from reloading)
            event.preventDefault();

            // AJAX request to change the page content
            $.ajax({
                type: 'POST',
                url: '/ajax-example/change-page',
                dataType: 'json',
                success: function(response) {
                    // Update the dynamic content with the new content
                    $('#dynamic-content').html(response.content);
                },
                error: function(error) {
                    console.log(error);
                }
            });
        }

        // Attach the click event to the link
        $(document).ready(function() {
            $('#changePageLink').on('click', handleClick);
        });
    </script>