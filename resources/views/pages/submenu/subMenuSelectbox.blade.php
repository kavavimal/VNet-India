<option value="0">All</option>
@foreach($submenu as $value)
    <option value="{{$value->id}}" >{{ $value->submenu_name }}</option>
@endforeach