<script>
    $(document).on("click", ".erp-user-plan-form", function() {
        $("#preloader").show();
        $(".erp-user-plan-submit").submit();
    });

    $(document).on('change', "input[name='negotiation_status']", function() {        
        if($(this).is(':checked')){
            $(this).val('0');
        }
        else if($(this).not(':checked')){           
            $(this).val('1');
        }
    });

    $(document).on('change', '.section_show_status', function () {
        console.log('change', $(this).is(":checked"));
        
    });


    function initCollapsible() {
        let tablewrap = $('.table_wrap');
        let table = $('.table_wrap table');
        if ($(table).hasClass('collapsible')){
            $(table).addClass('collapsed');
            $(table).find('tbody').addClass('d-none');
        }
    }
    
    $(document).on('click', ".expand_collapse_table", function(e) {
        e.preventDefault();
        let table = $(this).closest('.table_wrap').find('table');
        if($(table).hasClass('collapsed')){
            $(table).removeClass('collapsed');
            $(table).find('tbody').removeClass('d-none');
            $(this).text('Collapse Table');
        } else {
            $(table).addClass('collapsed');
            $(table).find('tbody').addClass('d-none');
            $(this).text('Expand Table');

        }
    })

    $(".erp-user-plan-submit").submit(function(e) {
        e.preventDefault();

        var submit_url = $(this).attr("data-url");
        var data_id = $('#plan_id').val();
        // negotiation
        var negotiation_min = $('#negotiation_min').val();
        var negotiation_max = $('#negotiation_max').val();                
        var negotiation_status = $('#negotiation_status').val();

        // service type
        var service_type_type = $("input[name='service_type_type']:checked").val()
        var service_type_price = $('#service_type_price').val();
        var servive_type_currency = $('#servive_type_currency').val();
        var service_type_renewal_price = $('#service_type_renewal_price').val();
        var service_type_discount = $('#service_type_discount').val();


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

        let planPricing = [];
        $("input:checkbox[name='plan_pricing_check_box[]']:checked").each(function(){
            planPricing.push($(this).val());
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
                planPricing: planPricing.join(','),
                taxation: taxation.join(','),
                specification: specification.join(','),
                featuredCategory: featuredCategory.join(','),
                featuredSubCategory: featuredSubCategory.join(','),
                negotiation_min: negotiation_min,
                negotiation_max: negotiation_max,
                negotiation_status: negotiation_status,
                service_type_type: service_type_type,
                service_type_price: service_type_price,
                servive_type_currency: servive_type_currency,
                service_type_renewal_price: service_type_renewal_price,
                service_type_discount: service_type_discount,
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
    $(document).ready(function(){
        initCollapsible();
        var price_plan = 0;
        $('input[name="plan_pricing_check_box[]"]:checked').each(function() {
            price_plan += parseInt($(this).parent().siblings('.total_price').text());
        });
        var service_type_price = parseInt($("#service_type_price").val());
        var total = price_plan + service_type_price;
        // var discount = parseInt($("#service_type_discount").val());
        // var final_total_remove = total * discount / 100;
        // var fianl_total = total - final_total_remove;
        $("#servive_type_total").val(total);
        $(".first_year_info .default_amount").text(total);
        $("#billing_amount").val(total);
    });
</script>