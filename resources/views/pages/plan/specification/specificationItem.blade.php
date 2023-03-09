<div class="form-check" id="spec-{{$spec->id}}">
    <input
        class="form-check-input"
        type="checkbox"
        value="{{$spec->id}}"
        name="specification[]"
        id="specification-{{$spec->id}}"
        @if($specificationsSelected != ''){{in_array($spec->id,$specificationsSelected) ? 'checked="checked"' : ''}}@endif
        />
    <label class="form-check-label mr-4 mb-2" for="specification-{{$spec->id}}">{{$spec->spec_name}}</label> 
    <button type="button" class="btn btn-outline-primary btn-sm edit-item mr-1" data-id="{{$spec->id}}" data-name="{{$spec->spec_name}}" data-toggle="modal" title="Edit"><i class="nav-icon i-pen-4"></i></button>
    <button type="button" class="btn btn-outline-primary btn-sm delete-item" data-id="{{$spec->id}}" data-name="{{$spec->spec_name}}" data-toggle="modal" title="Delete"><i class="nav-icon i-remove"></i></button>
    @include('pages.common.plan-records-switch-small', array(
        "section" => 'specification',
        "switch_id_rec" => $spec->id,
        "switch_name"=> "specification_{{$spec->id}}", 
        "switch_id" => "specification_{{$spec->id}}", 
        "status" => $spec->show_status))
</div>