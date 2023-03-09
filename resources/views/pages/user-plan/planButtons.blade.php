<a href="{{route('user-plan-index')}}" class="btn btn-outline-primary ml-2 float-right">
    Cancel
</a>
<div class="btn-group dropdown float-right mb-3">
    <button type="submit" class="btn btn-outline-primary erp-user-plan-form">
        Save
    </button>
</div>
<a href="{{route('preview-user-plan-byId', $plan->id)}}" class="btn btn-outline-primary mr-2 float-right">
    Preview
</a>
