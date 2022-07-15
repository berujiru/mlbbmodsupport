@extends('layouts.master')
@section('title') @lang('Team Deputy Historical Change')  @endsection
@section('content')
@component('components.breadcrumb')
@slot('li_1') Team Deputy Historical Change @endslot
@slot('title') View  @endslot
@endcomponent
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-right">
            <a class="btn btn-sm btn-primary" href="{{ route('team-deputy-history.index') }}"> <i class="bx bx-arrow-back"></i></a>
        </div>
    </div>
</div>
<br>

<div class="col-xl-4">
        <div class="sticky-side-div">
            <div class="card">
                <div class="card-header border-bottom-dashed">
                    <h5 class="card-title mb-0">View Team Deputy History</h5>
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
                                    <td>Previous Assigned Deputy : </td>
                                    <td class="text-end">{{ !empty($deputy->profile) ? $deputy->profile->firstname." ".$deputy->profile->lastname : 'No deputy profile' }}</td>
                                </tr>
                                <tr>
                                    <td>Date Changed : </td>
                                    <td class="text-end">{{ !empty($deputy->date_changed) ? date("m/d/Y h:i:s A",strtotime($deputy->date_changed)) : null }}</td>
                                </tr>
                                <tr>
                                    <td>Changed by :</td>
                                    <td class="text-end">{{ !empty($deputy->createdby) ? $deputy->createdby->firstname." ".$deputy->createdby->lastname : null }}</td>
                                </tr>
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
