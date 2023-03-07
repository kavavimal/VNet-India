<div class="col-md-6 mt-4 featured-sub-cat-block" data-id="{{$id}}" id="sub-cat-block-{{$id}}">
    <div class="card">
        <div class="card-body">
            <h4 class="mb-3 sub-cat-title">{{$name}}</h4>
            <div class="sub-category-items-wrap">
                @if(count($items) > 0)
                    @foreach ($items as $cat)
                        @include('pages.plan.featuredSubCat.catItemCheckbox', ['id' => $cat->id, 'name' => $cat->name])
                    @endforeach
                @endif
            </div>
            <div class="text-right">
                <button type="button" class="btn btn-primary sub-cat-block-additembutton">
                    <i class="nav-icon i-add"></i> Add
                </button>
            </div>
        </div>
    </div>
</div>