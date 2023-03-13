<div class="col-md-6 mt-4 featured-sub-cat-block" data-id="{{$id}}" id="sub-cat-block-{{$id}}">
    <div class="card">
        <div class="card-body">
            <h4 class="mb-3 sub-cat-title">{{$name}}</h4>
            <div class="sub-category-items-wrap">
                @if(count($items) > 0)
                    @foreach ($items as $cat)
                        @include('pages.plan.featuredSubCat.catItemCheckbox', ['id' => $cat->id, 'name' => $cat->name, 'show_status' => $cat->show_status])
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</div>