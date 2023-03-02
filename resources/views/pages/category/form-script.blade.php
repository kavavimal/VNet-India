<script>
    $(document).on("click", ".erp-category-form", function() {
        $(".erp-category-submit").submit();
        $("#preloader").show();
    });

    $(".erp-category-submit").submit(function(e) {
        e.preventDefault();

        var submit_url = $(this).attr("data-url");
        var data_id = $(this).attr("data-id");
        var data_name = $(this).attr("data-name");
        var parent_id = $(this).attr("parent_id");
        var data_description = $(this).attr("data-description");

        $.ajax({
            url: submit_url,
            type: "POST",
            data: {
                "_token": "{{ csrf_token() }}",
                id: $('#cat-id').val(),
                name: $('#name').val(),
                parent_id: $('#parent_id').val(),
                description: $('#description').val(),
                status: $('input[name="status"]:checked').val()
            },
            dataType: 'json',
            success: function(response) {
                if (response.success) {
                    $('.error').text('');
                    // toastr.info(response.success, response.title);
                    if ($('#cat-id').val() == 0) {
                        var url = window.location.href;
                        var page = url.replace(/\/edit\/new$/, "/")                        
                        location.href = page;
                    } else {
                        location.reload();
                    }
                } else if (response.error) {
                    $("#preloader").hide();
                    response.error['name'] ? $('#name_error').text(response.error['name']) : $('#name_error').text('');
                    response.error['description'] ? $('#description_error').text(response.error['description']) : $('#description_error').text('');
                    response.error['parent_id'] ? $('#parent_id_error').text(response.error['parent_id']) : $('#parent_id_error').text('');
                    response.error['status'] ? $('#status_error').text(response.error['status']) : $('#status_error').text('');
                }
            }
        });
    });
</script>