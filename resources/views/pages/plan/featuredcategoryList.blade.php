<div class="card">
    <div class="card-body">
        <h4 class="mb-3">Featured Category</h4>
        <div class="featuredCategory_list_wrap">
            @if(count($specifications) > 0)
                @foreach ($specifications as $spec)
                    <div class="form-check" id="featured-cat-{{$spec->id}}">
                        <input class="form-check-input" type="checkbox" value="{{$spec->id}}" id="{{$spec->id}}">
                        <label class="form-check-label mr-4 mb-2" for="{{$spec->id}}">{{$spec->spec_name}}</label>
                        <button type="button" class="btn btn-outline-primary btn-sm edit-item mr-1" data-id="{{$spec->id}}" data-name="{{$spec->spec_name}}" data-toggle="modal" title="Edit"><i class="nav-icon i-pen-4"></i></button>
                        <button type="button" class="btn btn-outline-primary btn-sm delete-item" data-id="{{$spec->id}}" data-name="{{$spec->spec_name}}" data-toggle="modal" title="Delete"><i class="nav-icon i-remove"></i></button>
                    </div>
                @endforeach
            @endif
        </div>
        <div class="text-right">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-sm-featured-category">
                <i class="nav-icon i-add"></i> Add
            </button>
        </div>
    </div>
</div>