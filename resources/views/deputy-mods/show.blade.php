@extends('layouts.master')
@section('title') @lang('Deputy Moderator Score')  @endsection
@section('content')
@component('components.breadcrumb')
@slot('li_1') Deputy Moderator Score @endslot
@slot('title') View  @endslot
@endcomponent
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-right">
            <a class="btn btn-sm btn-primary" href="{{ route('deputy-mods.index') }}"> <i class="bx bx-arrow-back"></i></a>
        </div>
    </div>
</div>
<br>

<div class="col-xl-4">
        <div class="sticky-side-div">
            <div class="card">
                <div class="card-header border-bottom-dashed">
                    <h5 class="card-title mb-0">View Details</h5>
                </div>
                <div class="card-body pt-2">
                    <div class="table-responsive">
                        <table class="table table-borderless mb-0">
                            <tbody>
                                <tr>
                                    <td>Team :</td>
                                    <td class="text-end">{{ !empty($score->modprofile->deputyteam->team) ? $score->modprofile->deputyteam->team->team_name : 'Team not found' }}</td>
                                </tr>
                                <tr>
                                    <td>Deputy : </td>
                                    <td class="text-end">{{ !empty($score->modprofile->deputyteam) ? $score->modprofile->deputyteam->profile->firstname." ".$score->modprofile->deputyteam->profile->lastname : 'No deputy profile' }}</td>
                                </tr>
                                <tr>
                                    <td>Mod ID : </td>
                                    <td class="text-end">{{ !empty($score->modid) ? $score->modid : 'Mod ID not found' }}</td>
                                </tr>
                                <tr>
                                    <td>Moderator : </td>
                                    <td class="text-end">{{ !empty($score->moderator) ? $score->moderator : 'Name not found' }}</td>
                                </tr>
                                <tr>
                                    <td>Score : </td>
                                    <td class="text-end">{{ !empty($score->score) ? number_format($score->score,2).' %' : 'Score not found' }}</td>
                                </tr>
                                <tr>
                                    <td>Details : </td>
                                    <td class="text-end">{{ !empty($score->details) ? $score->details : '' }}</td>
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
