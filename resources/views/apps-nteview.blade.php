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
                                    <h4 class="fw-semibold">{{$mail->uniqueID}} Notice to Explain</h4>
                                    <div class="hstack gap-3 flex-wrap">
                                        <div class="text-muted"><i class="ri-building-line align-bottom me-1"></i>
                                            MLBB QA</div>
                                        <div class="vr"></div>
                                        <div class="text-muted">Escalation Date : <span class="fw-medium">{{$mail->EscalationDate}}</span></div>
                                        <div class="vr"></div>
                                        <div class="text-muted">Infraction Date : <span class="fw-medium">{{$mail->InfractionDate}}</span></div>
                                        <div class="vr"></div>
                                        <div class="badge rounded-pill bg-warning fs-12">{{$mail->RecommendedAction}}</div>
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
                    <li>Severity: <b>{{$mail->Severity}}</b></li>
                    <li>Corrective Action: <b>{{$mail->RecommendedAction}}</b></li>
                    <li>Listed Infractions: <b>{{$mail->Attribute}}</b></li>
                </ul>
                <p class="text-muted">{{$mail->Summary}}</p>

            </div>
            <!--end card-body-->
            <div class="card-body p-4">
                <h5 class="card-title mb-4">SMART Commitment</h5>
                @foreach ($mailreply as $key => $data)
                    <div data-simplebar style="height: 100px;" class="px-3 mx-n3">
                        <div class="d-flex mb-4">
                            <div class="flex-shrink-0">
                                <img src="{{ URL::asset('images/' . Auth::user()->avatar) }}" alt="" class="avatar-xs rounded-circle" />
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h5 class="fs-13">{{$dbsc->firstname}} {{$dbsc->lastname}} <small class="text-muted">{{$data->created_at}}</small></h5>
                                <p class="text-muted">{{$data->content}}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
                {!! Form::open(array('route' => 'ntestore','method'=>'POST')) !!}
                <div class="row g-3">
                    <div class="col-xs-8 col-sm-8 col-md-8">
                        <div class="form-floating">
                            {!! Form::hidden('ntecode', $mail->UniqueID, array('placeholder' => 'Code','class' => 'form-control','autocomplete'=>'off','id'=>'teamNamefloatingInput')) !!}
                            {!! Form::hidden('nteid', $mail->id, array('placeholder' => 'Code','class' => 'form-control','autocomplete'=>'off','id'=>'teamNamefloatingInput')) !!}
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <label for="exampleFormControlTextarea1" class="form-label">Leave a SMART Commitment</label>
                        <textarea class="form-control bg-light border-light" name="content" id="exampleFormControlTextarea1" rows="5" placeholder="Enter Comments Here"></textarea>
                    </div>
                    <div class="col-lg-12 text-end">
                        <button type="submit" class="btn btn-success"><i class="bx bx-fw bx-save"></i>Leave a SMART Commitment</button>
                    </div>
                </div>
                {!! Form::close() !!}
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
                                <td>{{$mail->Team}}</td>
                            </tr>
                            <tr>
                                <td class="fw-medium">MOD ID</td>
                                <td>{{$dbsc->modid}}</td>
                            </tr>
                            <tr>
                                <td class="fw-medium">Full Name</td>
                                <td>{{$dbsc->firstname}} {{$dbsc->lastname}}</td>
                            </tr>
                            <tr>
                                <td class="fw-medium">Priority</td>
                                <td>
                                    <span class="badge bg-danger">High</span>
                                </td>
                            </tr>
                            <tr>
                                <td class="fw-medium">Escalation Date</td>
                                <td>{{$mail->EscalationDate}}</td>
                            </tr>
                            <tr>
                                <td class="fw-medium">Infraction Date</td>
                                <td>{{$mail->InfractionDate}}</td>
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