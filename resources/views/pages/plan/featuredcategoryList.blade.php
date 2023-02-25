<div class="card">
    <div class="card-body">
        <h4 class="mb-3">Featured Category</h4>
        <div class="featuredCategory_list_wrap">
            @if(count($featuredCategory) > 0)
                @foreach ($featuredCategory as $featured_cat)
                    <div class="form-check" id="featured-cat-{{$featured_cat->id}}">
                        <input class="form-check-input" type="checkbox" value="{{$featured_cat->id}}" id="{{$featured_cat->id}}">
                        <label class="form-check-label mr-4 mb-2" for="featured-cat-{{$featured_cat->id}}">{{$featured_cat->featured_cat_name}}</label>
                        <button type="button" class="btn btn-outline-primary btn-sm edit-item mr-1" data-id="{{$featured_cat->id}}" data-name="{{$featured_cat->featured_cat_name}}" data-toggle="modal" title="Edit"><i class="nav-icon i-pen-4"></i></button>
                        <button type="button" class="btn btn-outline-primary btn-sm delete-item" data-id="{{$featured_cat->id}}" data-name="{{$featured_cat->featured_cat_name}}" data-toggle="modal" title="Delete"><i class="nav-icon i-remove"></i></button>
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