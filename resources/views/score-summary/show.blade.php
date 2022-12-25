@extends('layouts.master')
@section('title') @lang('Moderator Score Summary')  @endsection
@section('content')
@component('components.breadcrumb')
@slot('li_1') Moderator Score Summary @endslot
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
<div class="row">
    <div class="col-xl-12">
        <div class="sticky-side-div">
            <div class="card">
                <div class="card-header border-bottom-dashed">
                    <h5 class="card-title mb-0">List of Scores</h5>
                </div>
                <div class="card">
                <table class="table table-hover table-nowrap mb-0 align-middle">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Mod ID</th>
                        <th scope="col">Moderator</th>
                        <th scope="col">Score</th>
                        <th scope="col">Date</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($data as $key => $score)
                    <tr>
                        <td style="width:5%;">{{++$i}}</td>
                        <td style="width:20%;">{{ !empty($score->MOD_ID) ? $score->MOD_ID : 'Mod ID not found' }}</td>
                        <td style="width:20%;">{{ !empty($score->MODERATOR) ? $score->MODERATOR : 'Name not found' }}</td>
                        <td style="width:20%;">{{ !empty($score->overall_score) ? $score->overall_score : 'Score not found' }}</td>
                        <td style="width:20%;">{{ date("m/d/Y",strtotime($score->score_date)) }}</td>
                    </tr>
                    @empty
                    <tr><td colspan="3" class="text-muted">No data to be displayed</td></tr>
                    @endforelse
                </tbody>
                </table>
            </div>
            <div class="d-flex justify-content-center">
                {{ $data->links() }}
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
