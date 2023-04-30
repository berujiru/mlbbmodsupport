
<table
    class="table table-borderless table-centered align-middle table-nowrap mb-0">
    <thead class="text-muted table-light">
        <tr>
            <th scope="col" style="width: 20%;"><b>Attribute</b></th>
            <th scope="col" style="width: 60%;"><b>No. of Infractions</b></th>
            <th scope="col" style="width: 30%;"><b>Key Attribute</b></th>
        </tr>
    </thead>
    <tbody>
        @forelse($attrib_summary as $as)
        <tr>
            <td>
                <div class="d-flex align-items-center">
                    <div class="flex-grow-1">{{$as->attrib_name}}</div>
                </div>
            </td>
            <td><span class="text-info text-right" style="font-weight:bold;font-size:13px;text-align:right;">{{$as->infractions}}</span></td>
            <td><span class="text-danger" style="width:10%;word-wrap: break-all;">{{$as->Form_Attribute}}</span></td>
        </tr><!-- end tr -->
        @empty
            <tr><td colspan="3" class="text-muted">No data to be displayed</td></tr>
        @endforelse
    </tbody><!-- end tbody -->
</table><!-- end table -->