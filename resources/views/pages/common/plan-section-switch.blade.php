<label class="switch switch-primary mr-3">
    <span>Enable/Disable</span>
    <?php $checked='checked'; ?>
    <input
        data-id={{isset($switch_rec_id) ? $switch_rec_id : ''}} 
        class="section_show_status" 
        type="checkbox" 
        name="{{$switch_name}}" 
        id="{{$switch_id}}" 
        value="1" 
        @if($status == 1){{$checked}}@endif
        />
    <span class="slider"></span>
</label>