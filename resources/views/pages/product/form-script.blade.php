<script>
    $(document).on("click", ".erp-product-form", function() {
        $(".erp-product-submit").submit();
        $("#preloader").show();
    });

    $(".erp-product-submit").submit(function(e) {
        e.preventDefault();

        var submit_url = $(this).attr("data-url");
        var data_id = $(this).attr("data-id");
        var data_name = $(this).attr("data-name");       
        var data_description = $(this).attr("data-description");

        $.ajax({
            url: submit_url,
            type: "POST",
            data: {
                "_token": "{{ csrf_token() }}",
                id: $('#prod_id').val(),
                name: $('#productName').val(),
                cat_id: $('#menu_category').val(),
                desc: $('#productDesc').val(),               
            },
            dataType: 'json',
            success: function(response) {
                console.log("response",response);
                if (response.success) {
                    $('.error').text('');
                    // toastr.info(response.success, response.title);
                    if ($(`.cat-id[name=${data_id}`).val() == 0) {
                        var url = window.location.href;
                        location.href = url.replace('new', response.data.id);
                    } else {
                        location.reload();
                    }
                } else if (response.error) {
                    $("#preloader").hide();
                    response.error['name'] ? $('#name_error').text(response.error['name']) : $('#name_error').text('');
                    response.error['cat_id'] ? $('#cat_error').text(response.error['cat_id']) : $('#cat_error').text('');
                }
            }
        });
    });
</script>