<table
    class="table table-borderless table-centered align-middle table-wrap mb-0">
    <thead class="text-muted table-light">
        <tr>
            <th scope="col"><b>Attribute</b></th>
            <th scope="col"><b>No. of Infractions (<?= $w_year == 1 ? date("Y") : 'All' ?>)</b></th>
        </tr>
    </thead>
    <tbody>
        @forelse($summary_infra as $lt)
        <tr>
            <td><span class="text-danger" style="word-wrap: break-all;">{{$lt->attrib_name}}</span></td>
            <td><span class="text-info" style="font-weight:bold;font-size:13px;text-align:right;">{{$lt->infractions}}</span></td>
        </tr><!-- end tr -->
        @empty
            <tr><td colspan="3" class="text-muted">No data to be displayed</td></tr>
        @endforelse
    </tbody><!-- end tbody -->
</table><!-- end table -->