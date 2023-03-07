<tbody>
    @foreach($plan as $key => $list)
        <tr>
            <td>{{$list->id}}</td>
            <td>{{$list->plan_name}}</td>
            <td>{{isset($list->submenu) ? $list->submenu->submenu_name : ''}}</td>                                   
            <td>
                <button type="button" class="btn btn-sm btn-primary" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="_dot _inline-dot"></span>
                    <span class="_dot _inline-dot"></span>
                    <span class="_dot _inline-dot"></span>
                </button>
                <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 34px, 0px);">
                @can('plan-edit')
                    <a class="dropdown-item" href="{{route('plan-edit',$list->id)}}"><i class="nav-icon i-Pen-2 font-weight-bold" aria-hidden="true"> </i> Edit</a>
                @endcan                                        
                @can('plan-delete')
                    <a class="dropdown-item" href="{{route('plan-delete',$list->id)}}"><i class="nav-icon i-Close-Window font-weight-bold" aria-hidden="true"> </i> Delete</a>
                @endcan
                </div>
            </td>
        </tr>
    @endforeach
</tbody>