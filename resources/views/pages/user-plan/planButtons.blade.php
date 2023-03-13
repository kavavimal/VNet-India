<a href="{{route('user-plan-index')}}" class="btn btn-outline-primary ml-2 float-right">
    Cancel
</a>
<div class="btn-group dropdown float-right mb-3">
    <button type="button" class="btn btn-outline-primary erp-user-plan-form">
        Save
    </button>
</div>
@if($plan)
<a href="{{route('preview-user-plan-byId', $plan->id)}}" class="btn btn-outline-primary mr-2 float-right erp-user-preview" target="_blank">
    Preview
</a>
@endif
@if($plan)
<a href="{{route('user-plan-export-pdf', $plan->id)}}" class="btn btn-outline-primary mr-2 float-right" target="_blank">
    Export to PDF
</a>
@endif