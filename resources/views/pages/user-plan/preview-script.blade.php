<script>
    $(document).ready(function(){
        refreshTotalPrice ();
    });
    function refreshTotalPrice () {
        var price_plan = 0;
        $('input[name="plan_pricing_check_box[]"]:checked').each(function() {
            price_plan += parseInt($(this).parent().siblings('.total_price').text());
        });
        var server_plan = 0;
        $('input[name="serverlocations[]"]:checked').each(function() {
            let serverlocationprice = parseInt($(this).parent().siblings('.server_price').text());
            server_plan += serverlocationprice > 0 ? serverlocationprice : 0
        });        
        var service_type_price = parseInt($("#service_type_price").val());
        service_type_price = parseInt(service_type_price) > 0 ? service_type_price : 0; 
        var total = price_plan + service_type_price + server_plan;
        total = parseInt(total) > 0 ? total : 0; 
        $("#servive_type_total").val(total);
        $(".first_year_info .default_amount").text(total);
        $("#billing_amount").val(total);

        // Final amount after tax
        var discount = parseInt($("#service_type_discount").val());
        var final_total_remove = total * discount / 100;
        var final_total = total - final_total_remove;

        $('#after_tax_servive_type_total').val(final_total)
    }
    
    function refreshTaxationTablefinalcal() {                
        let taxPer = $('#service_type_discount').val();
        // let taxPer = $('#taxation').is(':selected').attr('data-tax');
        let billing_cycle = [];
        $('.final_cal_billing_list_wrap').find('table tbody').empty();
        let billing_table_body = $('.billing_price_table');
        let first_billing_amount = $(billing_table_body).find('.first_year_info .default_amount').html();
        let first_itemTax = parseFloat(first_billing_amount) * taxPer / 100;
        let first_finalAmount =  parseFloat(first_billing_amount) - parseFloat(first_itemTax);
        let firstitem = `<tr class="first_year_info">
                <td>1 Year</td>
                <td class="tax_default_amount">`+first_billing_amount+`</td>
                <td>`+first_itemTax+`</td>
                <td>`+first_finalAmount+`</td>
            </tr>`;

        $('.final_cal_billing_list_wrap').find('table tbody').append(firstitem);
        $("input:checkbox[name='billing_cycle[]']:checked").each(function(){
            let selectedid = $(this).val();
            let selectedName = $(this).attr('data-name');
            let selectedAmount = $(this).attr('data-amount');
            billing_cycle.push($(this).val());

            let itemTax = selectedAmount * taxPer / 100;
            let finalAmount =  parseFloat(selectedAmount) - parseFloat(itemTax);
            let item = `<tr id="taxation-billingPrice-`+selectedid+`">
            <td>`+selectedName+` Years</td>
            <td>`+selectedAmount+`</td>    
            <td>`+itemTax+`</td>
            <td>`+finalAmount+`</td>
            </tr>`
            $('.final_cal_billing_list_wrap').find('table tbody').append(item);
        })
    }
    $(document).ready(function(){
        refreshTaxationTablefinalcal();
    });



    function refreshTaxationTableRows() {
        let tax = $('#taxation').val();
        let taxPer = $('#taxation').find(':selected').attr('data-tax');

        let billing_cycle = [];
        $('.taxation_billing_list_wrap').find('table tbody').empty();
        let billing_table_body = $('.billing_price_table');
        let first_billing_amount = $(billing_table_body).find('.first_year_info .default_amount').html();
        let first_itemTax = parseFloat(first_billing_amount) * taxPer / 100;
        let first_finalAmount =  parseFloat(first_billing_amount) - parseFloat(first_itemTax);
        let firstitem = `<tr class="first_year_info">
                <td>1 Year</td>
                <td class="tax_default_amount">`+first_billing_amount+`</td>
                <td>`+first_itemTax+`</td>
                <td>`+first_finalAmount+`</td>
            </tr>`;
        $('.taxation_billing_list_wrap').find('table tbody').append(firstitem);
            
        $("input:checkbox[name='billing_cycle[]']:checked").each(function(){
            let selectedid = $(this).val();
            let selectedName = $(this).attr('data-name');
            let selectedAmount = $(this).attr('data-amount');
            billing_cycle.push($(this).val());

            let itemTax = selectedAmount * taxPer / 100;
            let finalAmount =  parseFloat(selectedAmount) + parseFloat(itemTax);
            let item = `<tr id="taxation-billingPrice-`+selectedid+`">
            <td>`+selectedName+`Years </td>
            <td>`+selectedAmount+`</td>    
            <td>`+itemTax+`</td>
            <td>`+finalAmount+`</td>
            </tr>`
            $('.taxation_billing_list_wrap').find('table tbody').append(item);
        })
    }
    $(document).ready(function(){
        refreshTaxationTableRows();
    });    
</script>