@extends('layouts.master')
@section('title') @lang('Birthday Card')  @endsection
@section('content')
@component('components.breadcrumb')
@slot('li_1') Birthday Card @endslot
@slot('title') View  @endslot
@endcomponent
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-right">
            <a class="btn btn-sm btn-primary" href="{{ route('birthday-card.index') }}"> <i class="bx bx-arrow-back"></i></a>
        </div>
    </div>
</div>
<br>

<div class="col-xl-6">
        <div class="sticky-side-div">
            <div class="card">
                <div class="card-header border-bottom-dashed">
                    <h5 class="card-title mb-0">View Birthday Card</h5>
                </div>
                <div class="card-body pt-2">
                    <div class="table-responsive">
                        <table class="table table-borderless mb-0">
                            <tbody>
                                <tr>
                                    <td class="text-end" width="25%">Moderator ID :</td>
                                    <td class="text-first">{{ $bdpic->mod_id }}</td>
                                </tr>
                                <tr>
                                    <td class="text-end" width="25%">Name : </td>
                                    <td class="text-first">{{ !empty($bdpic->profile) ? $bdpic->profile->firstname." ".$bdpic->profile->lastname : 'No profile found' }}</td>
                                </tr>
                                <tr>
                                    <td class="text-end" width="25%">Birth Date : </td>
                                    <td class="text-first">{{ !empty($bdpic->profile->birthday) ? date("F j, Y", strtotime($bdpic->profile->birthday)) : null  }}</td>
                                </tr>
                                <tr>
                                    <td class="text-end" width="25%">Birthday Card :</td>
                                    <td class="text-first"><img src="{{URL::asset('img_birthday/'.$bdpic->pic_filename)}}" class="d-block w-100 img-fluid mx-auto" alt="..."></td>
                                </tr>
                                @if(!empty($bdpic->re_attached_by))
                                <tr>
                                    <td class="text-end" width="25%">Re-uploaded By :</td>
                                    <td class="text-first">{{ !empty($bdpic->reattachedby) ? $bdpic->reattachedby->firstname." ".$bdpic->reattachedby->lastname : null }}</td>
                                </tr>
                                <tr>
                                    <td class="text-end" width="25%">Date Attached : </td>
                                    <td class="text-first">{{ !empty($bdpic->date_reattached) ? date("F j, Y h:i:s A", strtotime($bdpic->date_reattached)) : null  }}</td>
                                </tr>
                                @else
                                <tr>
                                    <td class="text-end" width="25%">Uploaded By :</td>
                                    <td class="text-first">{{ !empty($bdpic->attachedby) ? $bdpic->attachedby->firstname." ".$bdpic->attachedby->lastname : null }}</td>
                                </tr>
                                <tr>
                                    <td class="text-end" width="25%">Date Uploaded : </td>
                                    <td class="text-first">{{ !empty($bdpic->date_attached) ? date("F j, Y h:i:s A", strtotime($bdpic->date_attached)) : null  }}</td>
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
