<div class="card">
    <div class="card-body table_wrap">
        <h4 class="mb-3 d-inline-block">Server Location</h4>
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
            </thead>
            <tbody class="server_location_list_tbl_view">
                @if($server_locations != '') 
                    @foreach ($server_locations as $locationItem)
                        <tr id="serverlocation-{{$locationItem->id}}">
                            <td><input
                                class="server-location-checkbox"
                                type="checkbox"
                                value="{{$locationItem->id}}"
                                id="serverlocations-{{$locationItem->id}}"
                                name="serverlocations[]"
                                @if($serverlocationSelected != ''){{in_array($locationItem->id,$serverlocationSelected) ? 'checked="checked"' : ''}}@endif
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
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
        </div>
        <button class="expand_collapse_table btn btn-primary">Expand List</button>
    </div>
</div>