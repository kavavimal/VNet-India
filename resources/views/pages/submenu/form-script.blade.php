<script>
    $(document).on("click", ".erp-submenu-form", function() {
        $(".erp-submenu-submit").submit();
        $("#preloader").show();
    });

    $(".erp-submenu-submit").submit(function(e) {        
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
                id: $('#submemu_id').val(),
                name: $('#submenuName').val(),
                cat_id: $('#menu_category').val(),
                desc: $('#submenuDesc').val(),               
            },
            dataType: 'json',
            success: function(response) {
                console.log("response",response);
                if (response.success) {
                    $('.error').text('');
                    // toastr.info(response.success, response.title);
                    if ($('#submemu_id').val() == 0) {
                        var url = window.location.href;
                        var page = url.replace(/\/edit\/new$/, "/")                        
                        location.href = page;                       
                    } else {
                        location.reload();
                    }
                } else if (response.error) {
                    $("#preloader").hide();
                    response.error['name'] ? $('#name_error').text(response.error['name']) : $('#name_error').text('');
                    response.error['desc'] ? $('#desc_error').text(response.error['desc']) : $('#desc_error').text('');
                    response.error['cat_id'] ? $('#cat_error').text(response.error['cat_id']) : $('#cat_error').text('');
                }
            }
        });
    });
</script>