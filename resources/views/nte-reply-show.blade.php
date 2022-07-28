@extends('layouts.master')
@section('title') @lang('NTE REPLY')  @endsection
@section('content')
@component('components.breadcrumb')
@slot('li_1') NTE REPLY @endslot
@slot('title') View  @endslot
@endcomponent
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-right">
            <a class="btn btn-sm btn-primary" href="{{ route('ntereply.index') }}"> <i class="bx bx-arrow-back"></i></a>
        </div>
    </div>
</div>
<br>

<div class="col-xl-6">
        <div class="sticky-side-div">
            <div class="card">
                <div class="card-header border-bottom-dashed">
                    <h5 class="card-title mb-0">View NTE CODE <b style="color: #990000;"><em>{{$netreply->ntecode}}</em></b></h5>
                </div>
                <div class="card-body pt-2">
                    <div class="table-responsive">
                        <table class="table table-borderless mb-0">
                            <tbody>
                                <tr>
                                    <td class="text-end" width="25%">MOD ID : </td>
                                    <td class="text-first">{{ !empty($netreply->nte) ? $netreply->nte->MODID : 'Mod ID not found' }}</td>
                                </tr>
                                <tr>
                                    <td class="text-end">Moderator Name : </td>
                                    <td class="text-first">{{ !empty($netreply->nte->profile) ? $netreply->nte->profile->firstname." ".$netreply->nte->profile->lastname : 'No profile found of '.$reply->nte->mod_id }}</td>
                                </tr>
                                <tr>
                                    <td class="text-end">Content : </td>
                                    <td class="text-first" style="text-align: justify;">{{ $netreply->content }}</td>
                                </tr>
                                <tr>
                                    <td class="text-end">Date Created : </td>
                                    <td class="text-first">{{ !empty($netreply->created_at) ? date("F j, Y", strtotime($netreply->created_at)) : null  }}</td>
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
