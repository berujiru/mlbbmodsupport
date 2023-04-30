<table
    class="table table-borderless table-centered align-middle table-wrap mb-0"
    style="height: 300px;display: inline-block;width: 100%;overflow-y: scroll;">
    <thead class="text-muted table-light">
        <tr>
            <th scope="col" style="width:40%;"><b>Team</b></th>
            <th scope="col" style="width:50%;"><b>Attribute</b></th>
            <th scope="col" style="width:10%;"><b>No. of Infractions</b></th>
        </tr>
    </thead>
    <tbody>
        @forelse($infra_teams as $lt)
        <tr>
            <td>
                <div class="d-flex align-items-center">
                    <div class="flex-grow-1">{{$lt->Team}}</div>
                </div>
            </td>
            <td><span class="text-danger" style="width:50%;word-wrap: break-all;">{{$lt->Form_Attribute}}</span></td>
            <td><span class="text-info" style="font-weight:bold;font-size:13px;text-align:right;">{{$lt->infractions}}</span></td>
        </tr><!-- end tr -->
        @empty
            <tr><td colspan="3" class="text-muted">No data to be displayed</td></tr>
        @endforelse
    </tbody><!-- end tbody -->
</table><!-- end table -->