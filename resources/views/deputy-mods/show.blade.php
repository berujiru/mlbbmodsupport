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
<?php
// echo "<pre>";
// print_r($markdown);
// echo "</pre>";
?>
<div class="row">
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
                                    <td class="text-end">{{ !empty($score->MOD_ID) ? $score->MOD_ID : 'Mod ID not found' }}</td>
                                </tr>
                                <tr>
                                    <td>Moderator : </td>
                                    <td class="text-end">{{ !empty($score->Moderator) ? $score->Moderator : 'Name not found' }}</td>
                                </tr>
                                <tr>
                                    <td>Score : </td>
                                    <td class="text-end">{{ !empty($score->OVERALLSCORE) ? $score->OVERALLSCORE : 'Score not found' }}</td>
                                </tr>
                                <tr>
                                    <td>Date : </td>
                                    <td class="text-end">{{ !empty($score->Date) ? date("m/d/Y",strtotime($score->Date)) : '' }}</td>
                                </tr>
                                <?php if(!empty($markdown[0]->Form_Attribute)): ?>
                                <tr>
                                    <td>Markdown Details : </td>
                                    <td class="text-first text-danger">{{ !empty($markdown[0]->Form_Attribute) ? $markdown[0]->Form_Attribute : '' }}</td>
                                </tr>
                               <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- end table-responsive -->
                </div>
            </div>
        </div>
        <!-- end stickey -->

    </div>
    <?php //if(!empty($score->score) && $score->score < 100): ?>
    <!-- <div class="col-xl-4">
        <div class="sticky-side-div">
            <div class="card">
                <div class="card-header border-bottom-dashed">
                    <h5 class="card-title mb-0">Reply</h5>
                </div>
                <div class="card-body pt-2">
                    <div class="table-responsive">
                        <table class="table table-borderless mb-0">
                            <tbody>
                                <tr>
                                    <td>Details :</td>
                                    <td class="text-end">None</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    -->
    </div>
    <?php //endif; ?>
</div>
@endsection
@section('script')
<script src="{{ URL::asset('/assets/js/app.min.js') }}"></script>
@endsection
