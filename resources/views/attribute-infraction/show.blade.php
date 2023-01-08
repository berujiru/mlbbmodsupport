@extends('layouts.master')
@section('title') @lang('Attributes')  @endsection
@section('content')
@component('components.breadcrumb')
@slot('li_1') Attributes @endslot
@slot('title') View  @endslot
@endcomponent
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-right">
            <a class="btn btn-sm btn-primary" href="{{ route('attrib-infra.index') }}"> <i class="bx bx-arrow-back"></i></a>
        </div>
    </div>
</div>
<br>

<div class="col-xl-4">
        <div class="sticky-side-div">
            <div class="card">
                <div class="card-header border-bottom-dashed">
                    <h5 class="card-title mb-0">View Attribute-Infraction</h5>
                </div>
                <div class="card-body pt-2">
                    <div class="table-responsive">
                        <table class="table table-borderless mb-0">
                            <tbody>
                                <tr>
                                    <td>Attribute :</td>
                                    <td class="text-end">{{ $attribinfra->attribute->attribute_name }}</td>
                                </tr>
                                <tr>
                                    <td>Code :</td>
                                    <td class="text-end">{{ $attribinfra->infraction->code }}</td>
                                </tr>
                                <tr>
                                    <td>Detail :</td>
                                    <td class="text-end">{{ $attribinfra->infraction->detail }}</td>
                                </tr>
                                <tr>
                                    <td>Created By :</td>
                                    <td class="text-end">{{ !empty($attribinfra->createdby) ? $attribinfra->createdby->firstname." ".$attribinfra->createdby->lastname : null }}</td>
                                </tr>
                                <tr>
                                    <td>Date Created : </td>
                                    <td class="text-end">{{ !empty($attribinfra->created_at) ? date("F j, Y h:i:s A", strtotime($attribinfra->created_at)) : null  }}</td>
                                </tr>
                                @if(!empty($attribinfra->updated_by))
                                <tr>
                                    <td>Updated By :</td>
                                    <td class="text-end">{{ !empty($attribinfra->updatedby) ? $attribinfra->updatedby->firstname." ".$attribinfra->updatedby->lastname : null }}</td>
                                </tr>
                                <tr>
                                    <td>Date Updated : </td>
                                    <td class="text-end">{{ !empty($attribinfra->updated_at) ? date("F j, Y h:i:s A", strtotime($attribinfra->updated_at)) : null  }}</td>
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
