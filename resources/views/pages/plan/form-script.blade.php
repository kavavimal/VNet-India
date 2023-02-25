<script>
    $(document).on("click", ".erp-plan-form", function() {
        $("#preloader").show();
        $(".erp-plan-submit").submit();
    });

    $(".erp-plan-submit").submit(function(e) {
        e.preventDefault();

        var submit_url = $(this).attr("data-url");
        var data_id = $('#plan_id').val();

        $.ajax({
            url: submit_url,
            type: "POST",
            data: {
                "_token": "{{ csrf_token() }}",
                id: $('#plan_id').val(),
                product_id: $('#product_id').val(),
                planName: $('#planName').val()                
            },
            dataType: 'json',
            success: function(response) {                
                if (response.success) {
                    $('.error').text('');                    
                    if ($('#plan_id').val() == 0) {                        
                        var url = window.location.href;
                        location.href = url.replace('new', response.data.id);
                    } else {
                        location.reload();
                    }
                } else if (response.error) {
                    $("#preloader").hide();
                    response.error['planName'] ? $('#plan_name_error').text(response.error['planName']) : $('#plan_name_error').text('');
                    response.error['product_id'] ? $('#product_id_error').text(response.error['product_id']) : $('#product_id_error').text('');
                }
            }
        });
    });   
</script>