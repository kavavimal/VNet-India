<tbody>
    @foreach($submenu as $key => $list)
    <tr>
        <td>{{$list->id}}</td>
        <td>{{$list->submenu_name}}</td>
        <td>{{$list->category->name}}</td>
        <td>
            <button type="button" class="btn btn-sm btn-primary" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="_dot _inline-dot"></span>
                <span class="_dot _inline-dot"></span>
                <span class="_dot _inline-dot"></span>
            </button>
            <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 34px, 0px);">
                @can('submenu-edit')
                <a class="dropdown-item" href="{{route('submenu-edit',$list->id)}}"><i class="nav-icon i-Pen-2 font-weight-bold" aria-hidden="true"> </i> Edit</a>
                @endcan                                        
                @can('submenu-delete')
                <a class="dropdown-item" href="{{route('submenu-delete',$list->id)}}"><i class="nav-icon i-Close-Window font-weight-bold" aria-hidden="true"> </i> Delete</a>
                @endcan
                <a class="dropdown-item" href="{{route('specification-edit',$list->id)}}"><i class="nav-icon i-Add font-weight-bold" aria-hidden="true"> </i> Add Configuration</a>
            </div>
        </td>
    </tr>
@endforeach
</tbody>