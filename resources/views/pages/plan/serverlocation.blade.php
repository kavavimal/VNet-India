<div class="card">
    <div class="card-body table_wrap">
        <h4 class="mb-3 d-inline-block">Server Location</h4>
        <div class="float-right">
            @include('pages.common.plan-section-switch', array("switch_name"=> 'show_server_location_status', "switch_id" => "show_server_location_status", "status" => 0))
        </div>
        <div class="server_location_list_wrap">
        <table class="table table-hover collapsible">
            <thead>
                <th></th>
                <th>Base Country</th>
                <th>Base Amount</th>
                <th>Allocate Country Amount</th>
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
                            <td><input
                                class="server-location-checkbox"
                                type="checkbox"
                                value="0"
                                id="serverlocations-{{$locationItem->id}}"
                                name="serverlocations[]"
                            /> </td>
                            <td>{{$locationItem->base_country}}</td>                            
                            <td>{{$locationItem->amount}}</td>
                            <td>@if($locationItem->upgrade_downgrade != '' && $locationItem->percentage != '')
                                    @if($locationItem->upgrade_downgrade == 'upgrade' )
                                        {{($locationItem->amount + ($locationItem->amount * $locationItem->percentage / 100))}}
                                        @elseif ($locationItem->upgrade_downgrade == 'downgrade')
                                        {{($locationItem->amount - ($locationItem->amount * $locationItem->percentage / 100))}}
                                    @endif
                                @endif
                            </td>
                            <td>{{$locationItem->currency}}</td>
                            <td>{{$locationItem->server_location_country}}</td>
                            <td>{{$locationItem->percentage}}</td>
                            <td>{{$locationItem->upgrade_downgrade}}</td>
                            <td>
                                <button type='button'
                                class='btn btn-outline-primary btn-sm edit-item-serverlocation mr-1'
                                data-id='{{$locationItem->id}}'
                                data-basecountry='{{$locationItem->base_country}}'
                                data-amount='{{$locationItem->amount}}'
                                data-currency='{{$locationItem->currency}}'
                                data-server-location-country='{{$locationItem->server_location_country}}'
                                data-percentage='{{$locationItem->percentage}}'
                                data-upgrade-downgrade='{{$locationItem->upgrade_downgrade}}'
                                data-toggle='modal' title='Edit'>
                                <i class='nav-icon i-pen-4'></i>
                            </button>
                                <button type='button'
                                class='btn btn-outline-primary btn-sm delete-item-serverlocation'
                                data-id='{{$locationItem->id}}'
                                data-name='{{$locationItem->base_country}}'
                                data-toggle='modal' title='Delete'>
                                <i class='nav-icon i-remove'></i>
                            </button>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
        </div>
        <button class="expand_collapse_table">Expand List</button>
        <div class="text-right">
            <button type="button" class="btn btn-primary" id="serverlocation-add">
                <i class="nav-icon i-add"></i> Add
            </button>
        </div>
    </div>
</div>