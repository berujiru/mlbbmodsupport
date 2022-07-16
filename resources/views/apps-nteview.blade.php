@extends('layouts.master')
@section('title') @lang('translation.mailbox') @endsection
@section('content')

<div class="row">
    <div class="col-lg-12">
        <div class="card mt-n4 mx-n4 mb-n5">
            <div class="bg-soft-warning">
                <div class="card-body pb-4 mb-5">
                    <div class="row">
                        <div class="col-md">
                            <div class="row align-items-center">
                                <div class="col-md-auto">
                                    <div class="avatar-md mb-md-0 mb-4">
                                        <div class="avatar-title bg-white rounded-circle">
                                            <img src="{{ URL::asset('assets/images/companies/img-4.png') }}" alt="" class="avatar-sm" />
                                        </div>
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-md">
                                    <h4 class="fw-semibold">#VLZ135 - Notice to Explain</h4>
                                    <div class="hstack gap-3 flex-wrap">
                                        <div class="text-muted"><i class="ri-building-line align-bottom me-1"></i>
                                            MLBB QA</div>
                                        <div class="vr"></div>
                                        <div class="text-muted">Create Date : <span class="fw-medium">20 Dec,
                                                2021</span></div>
                                        <div class="vr"></div>
                                        <div class="text-muted">Due Date : <span class="fw-medium">29 Dec,
                                                2021</span></div>
                                        <div class="vr"></div>
                                        <div class="badge rounded-pill bg-danger fs-12">Verbal Warning</div>
                                    </div>
                                </div>
                                <!--end col-->
                            </div>
                            <!--end row-->
                        </div>
                        <!--end col-->

                        <!--end col-->
                    </div>
                    <!--end row-->
                </div><!-- end card body -->
            </div>
        </div><!-- end card -->
    </div><!-- end col -->
</div><!-- end row -->

<div class="row">
    <div class="col-xxl-9">
        <div class="card">
            <div class="card-body p-4">
                <h6 class="fw-semibold text-uppercase mb-3">You have the right to hear and be heard</h6>
                <p class="text-muted">Upon receiving this report, you are given a maximum of <b class="text-warning">forty-eight (48) hours</b> to explain your side of the case.</p>
                <p class="text-muted">Failure to comply waives any and all right to appeal any decision that
                    shall be drafted and enacted upon by the assigned Deputy and assigned
                    Quality Assurance Specialist. Your digital footprint shall serve as your
                    signature.</p>

                <h6 class="fw-semibold text-uppercase mb-3">Case Details</h6>
                <ul class="text-muted vstack gap-2 mb-4">
                    <li>Severity:</li>
                    <li>Corrective Action:</li>
                    <li>Listed Infractions:</li>
                    <li>Case Summary :</li>
                </ul>
                <p class="text-muted">It has been observed on 22-Jan-2022, that you have committed
                    the following infraction/s:<br/><br/>
                    1. C17 Failure to Participate in Weekly Engagement - 2 Instances<br/><br/>
                    This act has a Case Severity of 2 and shall be subject to a
                    corrective action of Verbal Warning.<br/><br/>
                    As a result, you will not receive any salary deduction. However,
                    kindly be informed that subsequent offense shall be subject to a
                    corrective action of Written Warning and temporary 25.00%
                    Salary Deduction. Please be guided accordingly.</p>
            </div>
            <!--end card-body-->
            <div class="card-body p-4">
                <h5 class="card-title mb-4">Reply</h5>

                <div data-simplebar style="height: 100px;" class="px-3 mx-n3">
                    <div class="d-flex mb-4">
                        <div class="flex-shrink-0">
                            <img src="{{ URL::asset('assets/images/users/avatar-6.jpg') }}" alt="" class="avatar-xs rounded-circle" />
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <h5 class="fs-13">Donald Palmer <small class="text-muted">24 Dec 2021 -
                                    05:20PM</small></h5>
                            <p class="text-muted">Reply Details here</p>
                        </div>
                    </div>
                </div>
                <form action="javascript:void(0);" class="mt-3">
                    <div class="row g-3">
                        <div class="col-lg-12">
                            <label for="exampleFormControlTextarea1" class="form-label">Leave a Reply</label>
                            <textarea class="form-control bg-light border-light" id="exampleFormControlTextarea1" rows="3" placeholder="Enter comments"></textarea>
                        </div>
                        <div class="col-lg-12 text-end">
                            <a href="javascript:void(0);" class="btn btn-success">Post Reply</a>
                        </div>
                    </div>
                </form>
            </div>
            <!-- end card body -->
        </div>
        <!--end card-->
    </div>
    <!--end col-->
    <div class="col-xxl-3">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">Moderator Details</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive table-card">
                    <table class="table table-borderless align-middle mb-0">
                        <tbody>
                            <tr>
                                <td class="fw-medium">Department</td>
                                <td>Stats Collection</td>
                            </tr>
                            <tr>
                                <td class="fw-medium">MOD ID</td>
                                <td>481</td>
                            </tr>
                            <tr>
                                <td class="fw-medium">Full Name</td>
                                <td>Bergel Cutara</td>
                            </tr>
                            <tr>
                                <td class="fw-medium">Priority</td>
                                <td>
                                    <span class="badge bg-danger">High</span>
                                </td>
                            </tr>
                            <tr>
                                <td class="fw-medium">Escalation Date</td>
                                <td>20 Dec, 2021</td>
                            </tr>
                            <tr>
                                <td class="fw-medium">Infraction Date</td>
                                <td>29 Dec, 2021</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <!--end card-body-->
        </div>
        <!--end card-->
    </div>
    <!--end col-->
</div>
<!--end row-->

@endsection
@section('script')
<script src="{{ URL::asset('assets/libs/@ckeditor/@ckeditor.min.js') }}"></script>
<script src="{{ URL::asset('/assets/js/app.min.js') }}"></script>
@endsection