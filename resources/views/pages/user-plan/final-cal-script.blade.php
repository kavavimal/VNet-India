<script>
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
    $(document).on('keyup', "#service_type_discount", function () {
        refreshTaxationTablefinalcal();
    });
</script>