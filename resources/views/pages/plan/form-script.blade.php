<script>
    $(document).on("click", ".erp-plan-form", function() {
        $("#preloader").show();
        $(".erp-plan-submit").submit();
    });

    $(document).on('change', "input[name='negotiation_status']", function() {        
        if($(this).is(':checked')){
            $(this).val('0');
        }
        else if($(this).not(':checked')){           
            $(this).val('1');
        }
    });        

    $(".erp-plan-submit").submit(function(e) {
        e.preventDefault();

        var submit_url = $(this).attr("data-url");
        var data_id = $('#plan_id').val();
        var negotiation_min = $('#negotiation_min').val();
        var negotiation_max = $('#negotiation_max').val();                
        var negotiation_status = $('#negotiation_status').val();
        let billing_cycle = [];
        $("input:checkbox[name='billing_cycle[]']:checked").each(function(){
            billing_cycle.push($(this).val());
        })
        let taxation = [];
        $("input:checkbox[name='taxation[]']:checked").each(function(){
            taxation.push($(this).val());
        })
        let specification = [];
        $("input:checkbox[name='specification[]']:checked").each(function(){
            specification.push($(this).val());
        });
        let featuredCategory = [];
        $("input:checkbox[name='featuredCategory[]']:checked").each(function(){
            featuredCategory.push($(this).val());
        });
        let featuredSubCategory = [];
        $("input:checkbox[name='featuredSubCategory[]']:checked").each(function(){
            featuredSubCategory.push($(this).val());
        });
        $.ajax({
            url: submit_url,
            type: "POST",
            data: {
                "_token": "{{ csrf_token() }}",
                id: $('#plan_id').val(),
                product_id: $('#product_id').val(),
                planName: $('#planName').val(),
                billing_cycle: billing_cycle.join(','),
                taxation: taxation.join(','),
                specification: specification.join(','),
                featuredCategory: featuredCategory.join(','),
                featuredSubCategory: featuredSubCategory.join(','),
                negotiation_min: negotiation_min,
                negotiation_max: negotiation_max,
                negotiation_status: negotiation_status,
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