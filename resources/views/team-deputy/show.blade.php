@extends('layouts.master')
@section('title') @lang('Team Deputy')  @endsection
@section('content')
@component('components.breadcrumb')
@slot('li_1') Team Deputy @endslot
@slot('title') View  @endslot
@endcomponent
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-right">
            <a class="btn btn-sm btn-primary" href="{{ route('team-deputy.index') }}"> <i class="bx bx-arrow-back"></i></a>
        </div>
    </div>
</div>
<br>

<div class="col-xl-4">
        <div class="sticky-side-div">
            <div class="card">
                <div class="card-header border-bottom-dashed">
                    <h5 class="card-title mb-0">View Team Deputy</h5>
                </div>
                <div class="card-body pt-2">
                    <div class="table-responsive">
                        <table class="table table-borderless mb-0">
                            <tbody>
                                <tr>
                                    <td>Team :</td>
                                    <td class="text-end">{{ !empty($deputy->team) ? $deputy->team->team_name : 'Team not found' }}</td>
                                </tr>
                                <tr>
                                    <td>Deputy : </td>
                                    <td class="text-end">{{ !empty($deputy->profile) ? $deputy->profile->firstname." ".$deputy->profile->lastname : 'No deputy profile' }}</td>
                                </tr>
                                <tr>
                                    <td>Assigned By :</td>
                                    <td class="text-end">{{ !empty($deputy->createdby) ? $deputy->createdby->firstname." ".$deputy->createdby->lastname : null }}</td>
                                </tr>
                                <tr>
                                    <td>Date Created : </td>
                                    <td class="text-end">{{ !empty($deputy->created_at) ? date("F j, Y h:i:s A", strtotime($deputy->created_at)) : null  }}</td>
                                </tr>
                                @if(!empty($deputy->updated_by))
                                <tr>
                                    <td>Updated By :</td>
                                    <td class="text-end">{{ !empty($deputy->updatedby) ? $deputy->updatedby->firstname." ".$deputy->updatedby->lastname : null }}</td>
                                </tr>
                                <tr>
                                    <td>Date Updated : </td>
                                    <td class="text-end">{{ !empty($deputy->updated_at) ? date("F j, Y h:i:s A", strtotime($deputy->updated_at)) : null  }}</td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                    <!-- end table-responsive -->
                </div>
            </div>
        </div>
        <!-- end stickey -->

    </div>
@endsection
@section('script')
<script src="{{ URL::asset('/assets/js/app.min.js') }}"></script>
@endsection
