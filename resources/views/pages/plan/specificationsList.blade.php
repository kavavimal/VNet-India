<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-8 px-1 border-right">
                <h4 class="mb-3 d-inline-block">Specification</h4>
                <div class="float-right">
                    @include('pages.common.plan-section-switch', array(
                        "switch_id_rec" => $plan_sections_statuses['section_specification']->id,
                        "switch_name"=> 'section_specification', 
                        "switch_id" => "section_specification", 
                        "status" => $plan_sections_statuses['section_specification']->status))
                </div>
                <div class="specification_list_wrap">
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
                                @include('pages.common.plan-records-switch-small', array(
                                    "section" => 'specification',
                                    "switch_id_rec" => $spec->id,
                                    "switch_name"=> "specification_{{$spec->id}}", 
                                    "switch_id" => "specification_{{$spec->id}}", 
                                    "status" => $spec->show_status))
                            </div>
                        @endforeach
                    @endif
                </div>
                <div class="text-right mt-1">
                    <button type="button" class="btn btn-primary" id="add_specification_modal_button">
                        <i class="nav-icon i-add"></i> Add New
                    </button>
                </div>
            </div>
            <div class="col-sm-4 px-1">
                <label for="specification_sub_menu_select">Grab from other Sub Menu</label>
                <select class=" form-control select2" data-url="{{route('getspecificationdata')}}" id="specification_sub_menu_select" name="specification_sub_menu_select">
                    <option value="0">Select Sub Menu</option>
                    @foreach($product_list as $value)
                        @if($value->id != $plan->plan_product_id)
                        <?php $prodSelect = ''; if ($value->id == $plan->plan_product_id) {$prodSelect = 'selected';} else {$prodSelect = '';}?>
                        <option value="{{$value->id}}" {{$prodSelect}}>{{ $value->submenu_name }}</option>
                        @endif
                    @endforeach
                </select>
                <div class="second_specification_list_wrap">
                </div>
                <small class="error d-block" id="second_specification_status_label"></small>
                <button type="button" id="second_specification_button" data-url="{{route('addSpecifications')}}" class="btn btn-sm btn-primary d-none"><i class="nav-icon i-left"></i> Add Selected</button>
            </div>
        </div>
    </div>
</div>