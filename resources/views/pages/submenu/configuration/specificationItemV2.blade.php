<div class="form-check selectedSpecification" data-name="{{$spec->spec_name}}" id="spec-{{$spec->id}}">
    <input
        class="form-check-input"
        type="checkbox"
        value="{{$spec->id}}"
        name="specification[]"
        id="specification-{{$spec->id}}"
        <?php /* ?> @if($specificationsSelected != ''){{in_array($spec->id,$specificationsSelected) ? 'checked="checked"' : ''}}@endif <?php */ ?>
        />
    <label class="form-check-label mr-4 mb-2" for="specification-{{$spec->id}}">{{$spec->spec_name}}</label> 
</div>