<div class="card">
    <div class="card-body">
        <h4 class="mb-3 d-inline-block">Specification</h4>        
        <div class="specification_list_wrap">        
        @if($specifications != '')
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
                </div>
            @endforeach
        @endif
        </div>
    </div>
</div>