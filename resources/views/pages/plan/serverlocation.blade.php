<div class="card">
    <div class="card-body">
        <h4 class="mb-3">Server Location</h4>
        <div class="server_location_list_wrap">
        <table class="table table-sm">
            <thead>
                <th></th>
                <th>Base Country</th>
                <th>Amount</th>
                <th>Currency</th>
                <th>Server Location Country</th>
                <th>Percentage</th>
                <th>Upgrade/ Downgrade</th>
                <th>Action</th>
            </thead>
            <tbody class="server_location_list_tbl_view">
                @if(isset($server_locations) && count($server_locations) > 0) 
                    @foreach ($server_locations as $locationItem)
                        <tr id="serverlocation-{{$locationItem->id}}">
                            <td>{{$locationItem->id}}</td>
                            <td>{{$locationItem->base_country}}</td>
                            <td>{{$locationItem->amount}}</td>
                            <td>{{$locationItem->currency}}</td>
                            <td>{{$locationItem->server_location_country}}</td>
                            <td>{{$locationItem->percentage}}</td>
                            <td>{{$locationItem->upgrade_downgrade}}</td>
                            <td>
                                <button type='button' class='btn btn-outline-primary btn-sm edit-item-serverlocation mr-1' data-id='{{$locationItem->id}}' data-name='{{$locationItem->base_country}}'  data-toggle='modal' title='Edit'><i class='nav-icon i-pen-4'></i></button>
                                <button type='button' class='btn btn-outline-primary btn-sm delete-item-serverlocation' data-id='{{$locationItem->id}}' data-name='{{$locationItem->base_country}}' data-toggle='modal' title='Delete'><i class='nav-icon i-remove'></i></button>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
        </div>
        <div class="text-right">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-md-server-location">
                <i class="nav-icon i-add"></i> Add
            </button>
        </div>
    </div>
</div>