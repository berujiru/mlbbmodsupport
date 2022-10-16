@extends('layouts.master')
@section('title') @lang('Deputy Moderator NTE')  @endsection
@section('content')
@component('components.breadcrumb')
@slot('li_1') Deputy Moderator NTE @endslot
@slot('title') View  @endslot
@endcomponent
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-right">
            <a class="btn btn-sm btn-primary" href="{{ route('deputy-mods-nte.index') }}"> <i class="bx bx-arrow-back"></i></a>
        </div>
    </div>
</div>
<br>
<?php
// echo "<pre>";
// print_r($nte);
// echo "</pre>";
?>
<div class="row">
    <div class="col-xl-6">
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
                                    <td style="width: 25%;">Team :</td>
                                    <!-- <td class="text-end"><?php //!empty($nte->profile->deputyteam->team) ? $nte->profile->deputyteam->team->team_name : 'Team not found' ?></td> -->
                                    <td class="text-end">{{ !empty($nte->Team) ? $nte->Team : 'Team not found' }}</td>
                                </tr>
                                <tr>
                                    <td>Deputy : </td>
                                    <td class="text-end">{{ !empty($nte->profile->deputyteam) ? $nte->profile->deputyteam->profile->firstname." ".$nte->profile->deputyteam->profile->lastname : 'No deputy profile' }}</td>
                                </tr>
                                <tr>
                                    <td>Mod ID : </td>
                                    <td class="text-end">{{ !empty($nte->MODID) ? $nte->MODID : 'Mod ID not found' }}</td>
                                </tr>
                                <tr>
                                    <td>Moderator : </td>
                                    <td class="text-end">{{ !empty($nte->Moderator) ? $nte->Moderator : 'Name not found' }}</td>
                                </tr>
                                <tr>
                                    <td>Infraction Date : </td>
                                    <td class="text-end">{{ !empty($nte->InfractionDate) ? $nte->InfractionDate : 'Data not found' }}</td>
                                </tr>
                                <tr>
                                    <td>Escalation Date : </td>
                                    <td class="text-end">{{ !empty($nte->EscalationDate) ? $nte->EscalationDate : 'Data not found' }}</td>
                                </tr>
                                <tr>
                                    <td>Severity : </td>
                                    <td class="text-end">{{ !empty($nte->Severity) ? $nte->Severity : '' }}</td>
                                </tr>
                                <tr>
                                    <td>Attribute : </td>
                                    <td class="text-first text-danger" style="text-align: justify;">{{ !empty($nte->Attribute) ? $nte->Attribute : '' }}</td>
                                </tr>
                                <tr>
                                    <td style="width: 32%;">Recommended Action : </td>
                                    <td class="text-end">{{ !empty($nte->RecommendedAction) ? $nte->RecommendedAction : '' }}</td>
                                </tr>
                                <tr>
                                    <td>Summary Details : </td>
                                    <td class="text-first" style="text-align: justify;">{{ !empty($nte->Summary) ? $nte->Summary : '' }}</td>
                                </tr>
                                <tr>
                                    <td>Instance : </td>
                                    <td class="text-end" style="text-align: justify;">{{ !empty($nte->Instance) ? $nte->Instance : '' }}</td>
                                </tr>
                                <tr>
                                    <td>SD % : </td>
                                    <td class="text-end" style="text-align: justify;">{{ !empty($nte->SD) ? $nte->SD : '' }}</td>
                                </tr>
                                <tr>
                                    <td>Date &amp; Time Seen : </td>
                                    <td class="text-end" style="text-align: justify;">{{ !empty($nte->nteseen) ? date('m/d/Y h:i:s A',strtotime($nte->nteseen->date_seen)) : 'Not yet viewed' }}</td>
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
    <?php if(count($ntereply) > 0): ?>
    <div class="col-xl-4">
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
                                    <td style="width: 25%;">NTE Code :</td>
                                    <td class="text-first" style="text-align: justify; font-weight:bold;">{{ !empty($ntereply[0]->ntecode) ? $ntereply[0]->ntecode : 'Not yet viewed' }}</td>
                                </tr>
                                <tr>
                                    <td>Content :</td>
                                    <td class="text-first" style="text-align: justify;">{{ !empty($ntereply[0]->content) ? $ntereply[0]->content : 'Not yet viewed' }}</td>
                                </tr>
                                <tr>
                                    <td>Date :</td>
                                    <td class="text-first" style="text-align: justify;">{{ !empty($ntereply[0]->created_at) ? date("m/d/Y",strtotime($ntereply[0]->created_at)) : 'Not yet viewed' }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>
</div>
@endsection
@section('script')
<script src="{{ URL::asset('/assets/js/app.min.js') }}"></script>
@endsection
