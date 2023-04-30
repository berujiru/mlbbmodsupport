<table
    class="table table-borderless table-centered align-middle table-wrap mb-0" 
    style="height: 300px;display: inline-block;overflow: auto;">
    <thead class="text-muted table-light">
        <tr>
            <th scope="col"><b>Team</b></th>
            <th scope="col"><b>Overall Score</b></th>
            <th scope="col"><b>Timeliness</b></th>
            <th scope="col"><b>Communication</b></th>
            <th scope="col"><b>Accuracy</b></th>
        </tr>
    </thead>
    <tbody>
        @forelse($overall_team_summary as $lts)
        <tr>
            <td>
                <div class="d-flex align-items-center">
                    <div class="flex-grow-1">{{$lts->Team}}</div>
                </div>
            </td>
            <td><span class="text-default">{{$lts->overall_score}}</span></td>
            <td><span class="text-default">{{$lts->timeliness_score}}</span></td>
            <td><span class="text-default">{{$lts->communication_score}}</span></td>
            <td><span class="text-default">{{$lts->accuracy_score}}</span></td>
        </tr><!-- end tr -->
        @empty
            <tr><td colspan="3" class="text-muted">No data to be displayed</td></tr>
        @endforelse
    </tbody><!-- end tbody -->
</table><!-- end table -->