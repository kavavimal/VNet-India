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

    function updatePlanSectionShowStatus(section, newStatus, id = '', cb = null) {
        $.ajax({
            url: "{{route('plansection-status-store')}}",
            type: "POST",
            data: {
                "_token": "{{ csrf_token() }}",
                id: id,
                section_name: section,
                status: newStatus ? 1 : 0,
            },
            dataType: 'json',
            success: function(response) {                
                if (response.success) {
                    if (cb && cb != null) {
                        cb(response);
                    }
                } else if (response.error) {
                }
            }
        });
    }
    
    $(document).on('change', '.section_show_status', function () {
        let checkbox = $(this);
        let id = $(this).attr('data-id');
        let section_name = $(this).attr('name');
        let new_status = $(this).is(":checked");
        updatePlanSectionShowStatus(section_name, new_status, id, (response) => {
            $(checkbox).attr('data-id', response.data.id);
        });
    });
    
    function updatePlanSectionRecordShowStatus(section, newStatus, id = '', cb = null) {
        $.ajax({
            url: "{{route('plansection-record-status-store')}}",
            type: "POST",
            data: {
                "_token": "{{ csrf_token() }}",
                id: id,
                section_name: section,
                status: newStatus ? 1 : 0,
            },
            dataType: 'json',
            success: function(response) {                
                if (response.success) {
                    if (cb && cb != null) {
                        cb(response);
                    }
                } else if (response.error) {
                }
            }
        });
    }
    $(document).on('change', '.section_record_show_status', function () {
        let checkbox = $(this);
        let id = $(this).attr('data-id');
        let section_table = $(this).attr('data-section');
        let section_name = $(this).attr('name');
        let new_status = $(this).is(":checked");
        updatePlanSectionRecordShowStatus(section_table, new_status, id, (response) => {
            $(checkbox).attr('data-id', response.data.id);
        });
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

    $(".erp-plan-submit").submit(function(e) {
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
        // let taxation = [];
        // $("input:checkbox[name='taxation[]']:checked").each(function(){
        //     taxation.push($(this).val());
        // })
        // taxation = taxation.join(',')
        let taxation = $("[name='taxation']").val();

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
                taxation: taxation,
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
    function refreshTotalPrice () {
        var price_plan = 0;
        $('input[name="plan_pricing_check_box[]"]:checked').each(function() {
            price_plan += parseInt($(this).parent().siblings('.total_price').text());
        });
        var server_plan = 0;
        $('input[name="serverlocations[]"]:checked').each(function() {
            server_plan += parseInt($(this).parent().siblings('.server_price').text());
        });        
        var service_type_price = parseInt($("#service_type_price").val());
        var total = price_plan + service_type_price + server_plan;
        $("#servive_type_total").val(total);
        $(".first_year_info .default_amount").text(total);
        $("#billing_amount").val(total);

        // Final amount after tax
        var discount = parseInt($("#service_type_discount").val());
        var final_total_remove = total * discount / 100;
        var final_total = total - final_total_remove;

        $('#after_tax_servive_type_total').val(final_total)
    }
    $(document).on('change','#service_type_price', function(){
        refreshTotalPrice();
    })
    $(document).on('keydown','#service_type_price', function(){
        refreshTotalPrice();
    })
    $(document).on('change', "input[name='serverlocations[]'],input[name='plan_pricing_check_box[]']", function() {        
        refreshTotalPrice();
    });

    $(document).ready(function(){
        initCollapsible();
        refreshTotalPrice();
    });
</script>