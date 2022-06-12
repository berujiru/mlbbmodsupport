@extends('layouts.master')
@section('title') @lang('Infractions')  @endsection
@section('content')
@component('components.breadcrumb')
@slot('li_1') Infractions @endslot
@slot('title') View  @endslot
@endcomponent
<div class="row">
    <div class="col-lg-12 margin-tb">
        <!-- <div class="pull-left">
            <h4> View Infraction <em>{{$infraction->code}}</em></h4>
        </div> -->
        <div class="pull-right">
            <a class="btn btn-sm btn-primary" href="{{ route('infraction.index') }}"> <i class="bx bx-arrow-back"></i></a>
        </div>
    </div>
</div>
<br>

<div class="col-xl-4">
        <div class="sticky-side-div">
            <div class="card">
                <div class="card-header border-bottom-dashed">
                    <h5 class="card-title mb-0">View Infraction <b><em>{{$infraction->code}}</em></b></h5>
                </div>
                <div class="card-body pt-2">
                    <div class="table-responsive">
                        <table class="table table-borderless mb-0">
                            <tbody>
                                <tr>
                                    <td>Code :</td>
                                    <td class="text-end">102</td>
                                </tr>
                                <tr>
                                    <td>Detail : </td>
                                    <td class="text-end">{{ $infraction->detail }}</td>
                                </tr>
                                <tr>
                                    <td>Created By :</td>
                                    <td class="text-end">{{ !empty($infraction->createdby) ? $infraction->createdby->firstname." ".$infraction->createdby->lastname : null }}</td>
                                </tr>
                                <tr>
                                    <td>Date Created : </td>
                                    <td class="text-end">{{ !empty($infraction->created_at) ? date("F j, Y h:i:s A", strtotime($infraction->created_at)) : null  }}</td>
                                </tr>
                                @if(!empty($infraction->updated_by))
                                <tr>
                                    <td>Updated By :</td>
                                    <td class="text-end">{{ !empty($infraction->updatedby) ? $infraction->updatedby->firstname." ".$infraction->updatedby->lastname : null }}</td>
                                </tr>
                                <tr>
                                    <td>Date Updated : </td>
                                    <td class="text-end">{{ !empty($infraction->updated_at) ? date("F j, Y h:i:s A", strtotime($infraction->updated_at)) : null  }}</td>
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
