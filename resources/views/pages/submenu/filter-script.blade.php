<script>
    $(document).on("change", ".filter-submenu-submit #filtery_by_menu", function() {
        var val = $(this).val();
        var url = "{{ route('getByMenuId', ":id") }}";
        url = url.replace(':id', val);
        $.ajax({
            url: url,
            type: "GET",
            dataType: 'json',
            success: function(response) {
                if(response.html){
                    $('#sub_menu_table tbody').replaceWith(response.html)
                }
            }
        });
    });
    
    $(document).on("change", ".filter-plan-submit #filtery_by_menu", function() {
        var val = $(this).val();
        var url = "{{ url('/submenu/getByMenuId/:id/:type') }}";
        url = url.replace(':id', val);
        url = url.replace(':type', 'select');
        $.ajax({
            url: url,
            type: "GET",
            dataType: 'json',
            success: function(response) {
                if(response.html){
                    $('.filter-plan-submit #filtery_by_submenu').html('');
                    $('.filter-plan-submit #filtery_by_submenu').html(response.html);
                    // getFilteredPlans();
                }
            }
        });
    });

    $(document).on("click", "#apply_plan_filter", function() {
        getFilteredPlans();
    });

    function getFilteredPlans () {
        var val = $('.filter-plan-submit #filtery_by_submenu').val();
        var url = "{{ route('plan-getByCategoryId',":id") }}";
        url = url.replace(':id', val);
        $.ajax({
            url: url,
            type: "GET",
            dataType: 'json',
            success: function(response) {
                if(response.html){
                    $('#plan_table tbody').replaceWith(response.html)
                }
            }
        });
    }
</script>