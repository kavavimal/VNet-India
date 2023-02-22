<script>
    /* purchase order submit form event */
    $(document).on("click", ".erp-po-edit-form", function(){
        $(".erp-form-submit").submit();
    });

    /* purchase order submit ajax event */
    $(".erp-form-submit").submit(function (e){
        e.preventDefault();
        $.ajax({
            url: "<?php echo e(url('/purchaseorder/store')); ?>",
            type:"POST",
            data:{
                "_token": "<?php echo e(csrf_token()); ?>",
                po_id: $(".erp-po_id").val(),
                po_number: $(".erp-po-number").val(),
                supplier_id: $(".erp-supplier-name").val(),
                date: $(".erp-date").val(),
                erp_date_delivery: $(".erp-date_delivery").val(),
                po_payment_type_id: $(".erp-po_payment_type_id").val(),
                po_status_id: $(".erp-po_status_id").val()
            },
            dataType: 'json',
            success:function(response){
                toastr.info(response.success, response.title);
                window.setTimeout(function(){
                    if($(".erp-po_id").val() == 0){
                        location.href = "<?php echo e(url('/purchaseorder')); ?>";
                    }else{
                        location.reload();
                    }
                },3000)
            }
        });
    });
</script>
<?php /**PATH C:\xampp\htdocs\erp\resources\views/pages/purchaseorder/script.blade.php ENDPATH**/ ?>