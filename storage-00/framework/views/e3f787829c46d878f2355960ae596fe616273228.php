<div class="modal fade" id="my-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle-2" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle-2">Contact Form</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function(){
        $('.my-select').each(function(){
            var data_key = $(this).data('my_select2');
            $(this).select2({
                data: xui.select2[data_key],
            });
        });

        $('.erp-modal-button').click(function() {
            var url = $(this).attr('data-url');
            var submit_url = $(this).attr('data-submit-url');
            var entity = $(this).attr('data-entity');
            var entity_id = $(`input[name="${entity}"]`).val();
            var is_new = $(this).attr('data-is-new');
            var select_id = (is_new == "1") ? -1 : $(this).closest(".erp-select2").find('.my-select').val();
            var select_name = $(this).attr('data-name');

            $.ajax({
                url: url,
                type: 'GET',
                data: {entity_id,select_id},
                dataType: 'json',
                success: function(data) {
                    $('#my-modal .modal-body').html(data.modal);
                    $("#my-modal").attr("data-submit-url",submit_url);
                    $("#my-modal").attr("data-name",select_name);
                    $("#my-modal").attr("data-is-new",is_new);
                    $("#my-modal").attr("data-id",entity_id);
                    $('#my-modal').modal('toggle');
                }
            });
        });

        // form submit
        $(document).on("click","#my-modal button.submit-btn", function(e) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            e.preventDefault();
            var data = $(this).closest('form').serialize() + "&id=" + $("#my-modal").attr("data-id");

            $('#my-modal modal-body').html('');
            $('#my-modal').modal('hide');
            var submit_url = $("#my-modal").attr("data-submit-url");

            $.ajax({
                url: submit_url,
                type: 'POST',
                data: data,
                dataType: 'json',
                success: function(data) {
                    var data_name = $("#my-modal").attr("data-name");
                    var select$ = $(`.my-select[name="${data_name}"]`);
                    var data_key = select$.attr("data-my_select2");
                    var is_new = $("#my-modal").attr("data-is-new");
                    if(is_new == "0"){
                        $.each(xui.select2[data_key], function( key, val ) {
                            if(val.id == data.select.id){
                                 val.text = data.select.text;
                            }
                        });
                    }else{
                        xui.select2[data_key].push(data.select);
                    }
                    select$.select2('destroy');
                    select$.html('');
                    select$.select2({
                        data: xui.select2[data_key],
                    });
                    select$.val(data.select.id);
                    select$.trigger('change');
                }
            });
        });

        var count = 0;
        $(document).on("click", "#addContact", function(){
            count++;
            var $html = `<div class="card ul-card__v-space">
                            <div class="card-header header-elements-inline">
                                <h6 class="card-title ul-collapse__icon--size ul-collapse__right-icon mb-0">
                                    <a data-toggle="collapse" class="text-default" href="#accordion-item-icon-right-1-`+count+`">New Contact</a>
                                </h6>
                            </div>
                        </div>
                        <div class="erp-contact collapse" id="accordion-item-icon-right-1-`+count+`" data-parent="#accordionRightIcon">
                            <div class="card-body">
                                <input type="hidden" class="erp-contact-id" name="cid" value="0" />
                                <div class="row">
                                    <div class="col-md-3 form-group">
                                        <label for="customerName">Title</label>
                                        <input type="text" class="form-control erp-title" name="title" />
                                    </div>
                                    <div class="col-md-3 form-group">
                                        <label for="orderDate">First Name</label>
                                        <input type="text" class="form-control erp-fname" name="fname" />
                                    </div>
                                    <div class="col-md-3 form-group">
                                        <label for="orderDate">Last Name</label>
                                        <input type="text" class="form-control erp-lname" name="lname">
                                    </div>
                                    <div class="col-md-3 form-group">
                                        <label for="orderDate">Is Type</label>
                                        <select class="form-control erp-istype" name="istype">
                                            <option value="0">Person</option>
                                            <option value="1">Company</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3 form-group">
                                        <label for="orderDate">Email</label>
                                        <input type="text" class="form-control erp-email" name="email">
                                    </div>
                                    <div class="col-md-3 form-group">
                                        <label for="orderDate">Phone 1</label>
                                        <input type="text" class="form-control erp-phone1" name="phone1">
                                    </div>
                                    <div class="col-md-3 form-group">
                                        <label for="orderDate">Phone 2</label>
                                        <input type="text" class="form-control erp-phone2" name="phone2">
                                    </div>
                                    <div class="col-md-3 form-group">
                                        <label for="orderDate">Fax</label>
                                        <input type="text" class="form-control erp-fax" name="fax">
                                    </div>
                                    <div class="col-md-3 form-group">
                                        <label for="orderDate">Address</label>
                                        <input type="text" class="form-control erp-address" name="address">
                                    </div>
                                    <div class="col-md-3 form-group">
                                        <label for="orderDate">City</label>
                                        <input type="text" class="form-control erp-city" name="city" value="<?= $data['city'] ?? '' ?>">
                                    </div>
                                    <div class="col-md-3 form-group">
                                        <label for="orderDate">Postal Code</label>
                                        <input type="text" class="form-control erp-postal_code" name="postal_code" value="<?= $data['postal_code'] ?? '' ?>">
                                    </div>
                                    <div class="col-md-3 form-group">
                                        <label for="orderDate">country</label>
                                        <input type="text" class="form-control erp-country" name="country" value="<?= $data['country'] ?? '' ?>">
                                    </div>
                                </div>
                            </div>
                        </div>`;
            $(".erp-contact-card").append($html);
        });

        $(document).on("click", ".erp-contact-form", function(){
            $(".erp-contact-submit").submit();
        });

        $(".erp-contact-submit").submit(function (e){
            e.preventDefault();
            var contactArray = [];
            var submit_url = $(this).attr("data-url");
            var data_id = $(this).attr("data-id");
            var data_name = $(this).attr("data-name");
            var data_code = $(this).attr("data-code");

            $(".erp-contact").each(function(){
                var $div = $(this);
                var contactid = $div.find(".erp-contact-id").val();
                var title = $div.find(".erp-title").val();
                var fname = $div.find(".erp-fname").val();
                var lname = $div.find(".erp-lname").val();
                var istype = $div.find(".erp-istype").val();
                var email = $div.find(".erp-email").val();
                var phone1 = $div.find(".erp-phone1").val();
                var phone2 = $div.find(".erp-phone2").val();
                var fax = $div.find(".erp-fax").val();
                var address = $div.find(".erp-address").val();
                var city = $div.find(".erp-city").val();
                var postal_code = $div.find(".erp-postal_code").val();
                var country = $div.find(".erp-country").val();
                contactArray.push({contactid,title,fname,lname,istype,email,phone1,phone2,fax,address,city,postal_code,country});
            });

            $.ajax({
                url: submit_url,
                type:"POST",
                data:{
                    "_token": "<?php echo e(csrf_token()); ?>",
                    id: $(`.erp-id[name="${data_id}"]`).val(),
                    name: $(`.erp-name[name="${data_name}"]`).val(),
                    code: $(`.erp-code[name="${data_code}"]`).val(),
                    contactArray: contactArray,
                },
                dataType: 'json',
                success:function(response){
                    if(response.success){
                        $('#erp-name-error').text('');
                        toastr.info(response.success, response.title);
                        window.setTimeout(function(){
                            if($(`.erp-id[name=${data_id}`).val() == 0){
                                var url = window.location.href;
                                location.href = url.replace('new',response.data.id);
                            }else{
                                location.reload();
                            }
                        },3000)
                    }
                    else if(response.error){
                        $('#erp-name-error').text(response.error[0]);
                    }
                    
                }
            });
        });

        // $(document).on('click', '#deleteContact', function(){
        //     $(".erp-contact-card").parents('div').remove();
        // });

        $(document).on("click", ".erp-user-form", function(){
            $(".erp-user-submit").submit();
        });

        $(".erp-user-submit").submit(function (e){
            e.preventDefault();

            var submit_url = $(this).attr("data-url");
            var data_id = $(this).attr("data-id");
            var data_name = $(this).attr("data-name");
            var data_email = $(this).attr("data-email");
            var data_pass = $(this).attr("data-pass");
            console.log();
            $.ajax({
                url: submit_url,
                type:"POST",
                data:{
                    "_token": "<?php echo e(csrf_token()); ?>",
                    id: $('#erp-id').val(),
                    fname: $('#fname').val(),
                    lname: $('#lname').val(),
                    email: $('#email').val(),
                    roles: $('#roles').val(),
                    password: $('#password').val(),
                    confirm_password: $('#confirm_password').val(),
                    status: $('input[name="status"]:checked').val()
                },
                dataType: 'json',
                success:function(response){
                    if(response.success){
                        $('.error').text('');
                        toastr.info(response.success, response.title);
                        window.setTimeout(function(){
                            if($(`.erp-id[name=${data_id}`).val() == 0){
                                var url = window.location.href;
                                location.href = url.replace('new',response.data.id);
                            }else{
                                location.reload();
                            }
                        },3000)
                    }
                    else if(response.error){
                        response.error['fname'] ? $('#fname_error').text(response.error['fname']) : $('#fname_error').text('');
                        response.error['lname'] ? $('#lname_error').text(response.error['lname']) : $('#lname_error').text('');
                        response.error['email'] ? $('#email_error').text(response.error['email']) : $('#email_error').text('');
                        response.error['roles'] ? $('#roles_error').text(response.error['roles']) : $('#roles_error').text('');
                        response.error['password'] ? $('#password_error').text(response.error['password']) : $('#password_error').text('');
                        response.error['confirm_password'] ? $('#confirm_password_error').text(response.error['confirm_password']) : $('#confirm_password_error').text('');
                    }
                    
                }
            });
        });

        $(document).on("click", ".profile_settings_form", function(){
            $(".profile_settings_submit").submit();
        });

        $(".profile_settings_submit").submit(function (e){
            e.preventDefault();
            var submit_url = $(this).attr("data-url");
            var data_id = $(this).attr("data-id");
            var data_name = $(this).attr("data-name");
            var data_email = $(this).attr("data-email");
            var data_pass = $(this).attr("data-pass");
            console.log();
            $.ajax({
                url: submit_url,
                type:"POST",
                data:{
                    "_token": "<?php echo e(csrf_token()); ?>",
                    id: $('#erp-id').val(),
                    fname: $('#fname').val(),
                    lname: $('#lname').val()
                },
                dataType: 'json',
                success:function(response){
                    if(response.success){
                        $('.error').text('');
                        toastr.info(response.success, response.title);
                        window.setTimeout(function(){
                            if($(`.erp-id[name=${data_id}`).val() == 0){
                                var url = window.location.href;
                                location.href = url.replace('new',response.data.id);
                            }else{
                                location.reload();
                            }
                        },3000)
                    }
                    else if(response.error){
                        response.error['fname'] ? $('#fname_error').text(response.error['fname']) : $('#fname_error').text('');
                        response.error['lname'] ? $('#lname_error').text(response.error['lname']) : $('#lname_error').text('');
                        // response.error['password'] ? $('#password_error').text(response.error['password']) : $('#password_error').text('');
                        // response.error['confirm_password'] ? $('#confirm_password_error').text(response.error['confirm_password']) : $('#confirm_password_error').text('');
                    }
                    
                }
            });
        });

    });

</script>
<?php /**PATH C:\xampp\htdocs\erp\resources\views/pages/common/modal-script.blade.php ENDPATH**/ ?>