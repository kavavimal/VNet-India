<div class="card">
    <div class="card-body">
        <h4 class="mb-3 d-inline-block">Specification</h4>
        <div class="float-right">            
            @include('pages.common.plan-section-switch', array(
                "switch_id_rec" => $plan,
                "switch_name"=> 'show_specification_status', "switch_id" => "show_specification_status", "status" => $plan_sections_statuses['section_specification']))
        </div>
        <div class="specification_list_wrap">
        <!-- <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="host_website">
            <label class="form-check-label" for="host_website">Host Website</label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="database">
            <label class="form-check-label" for="database">Databases</label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="bandwidth">
            <label class="form-check-label" for="bandwidth">Bandwidth</label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="cpanel">
            <label class="form-check-label" for="cpanel">cPanel</label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="one_click_install">
            <label class="form-check-label" for="one_click_install">One Click Install + 1 cPanel</label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="ssl">
            <label class="form-check-label" for="ssl">SSL</label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="antivirus_proctection">
            <label class="form-check-label" for="antivirus_proctection">Antivirus Protection</label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="24_7_365_support">
            <label class="form-check-label" for="24_7_365_support">24*7*365 Support</label>
        </div> -->
        
        @if(count($specifications) > 0)
            @foreach ($specifications as $spec)
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
                </div>
            @endforeach
        @endif
        </div>
        <div class="text-right">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-sm">
            <i class="nav-icon i-add"></i> Add
        </button>
        </div>
    </div>
</div>