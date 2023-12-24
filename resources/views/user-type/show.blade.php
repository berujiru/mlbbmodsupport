@extends('layouts.master')
@section('title') @lang('Teams')  @endsection
@section('content')
@component('components.breadcrumb')
@slot('li_1') Teams @endslot
@slot('title') View  @endslot
@endcomponent
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-right">
            <a class="btn btn-sm btn-primary" href="{{ route('team.index') }}"> <i class="bx bx-arrow-back"></i></a>
        </div>
    </div>
</div>
<br>

<div class="col-xl-4">
        <div class="sticky-side-div">
            <div class="card">
                <div class="card-header border-bottom-dashed">
                    <h5 class="card-title mb-0">View Team <b><em>{{$team->team_code}}</em></b></h5>
                </div>
                <div class="card-body pt-2">
                    <div class="table-responsive">
                        <table class="table table-borderless mb-0">
                            <tbody>
                                <tr>
                                    <td>Code :</td>
                                    <td class="text-end">{{ $team->team_code }}</td>
                                </tr>
                                <tr>
                                    <td>Name : </td>
                                    <td class="text-end">{{ $team->team_name }}</td>
                                </tr>
                                <tr>
                                    <td>Created By :</td>
                                    <td class="text-end">{{ !empty($team->createdby) ? $team->createdby->firstname." ".$team->createdby->lastname : null }}</td>
                                </tr>
                                <tr>
                                    <td>Date Created : </td>
                                    <td class="text-end">{{ !empty($team->created_at) ? date("F j, Y h:i:s A", strtotime($team->created_at)) : null  }}</td>
                                </tr>
                                @if(!empty($team->updated_by))
                                <tr>
                                    <td>Updated By :</td>
                                    <td class="text-end">{{ !empty($team->updatedby) ? $team->updatedby->firstname." ".$team->updatedby->lastname : null }}</td>
                                </tr>
                                <tr>
                                    <td>Date Updated : </td>
                                    <td class="text-end">{{ !empty($team->updated_at) ? date("F j, Y h:i:s A", strtotime($team->updated_at)) : null  }}</td>
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
