@extends('layout/master')
@section('content')

    <!-- end sidebar menu -->
    <!-- start page content -->
    <div class="page-content-wrapper">
        <div class="page-content">
            <div class="page-bar">
                <div class="page-title-breadcrumb">
                    <div class=" pull-left">
                        <div class="page-title">Dashboard</div>
                    </div>
                    <ol class="breadcrumb page-breadcrumb pull-right">
                        <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="/">Home</a>&nbsp;<i
                                class="fa fa-angle-right"></i>
                        </li>
                        <li class="active">Dashboard</li>
                    </ol>
                </div>
            </div>
            <!-- start widget -->
            <div class="state-overview">
                <div class="row">
                    <div class="col-xl-3 col-md-6 col-12">
                        <div class="info-box bg-b-green">
                            <span class="info-box-icon push-bottom"><i data-feather="users"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Total Staffs</span>
                                <span class="info-box-number"> {{ $total_staffs > 0 ? $total_staffs: 0 }} </span>
                                <div class="progress">
                                    <div class="progress-bar" style="width: 45%"></div>
                                </div>
                                <span class="progress-description">
                                    45% Increase in 28 Days
                                </span>
                            </div>

                        </div>

                    </div>

                    <div class="col-xl-3 col-md-6 col-12">
                        <div class="info-box bg-b-yellow">
                            <span class="info-box-icon push-bottom"><i data-feather="user"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Staffs On leave</span>
                                <span class="info-box-number">{{ $staff_on_leave > 0 ? $staff_on_leave: 0 }}</span>
                                <div class="progress">
                                    <div class="progress-bar" style="width: 40%"></div>
                                </div>
                                <span class="progress-description">
                                    40% Increase in 28 Days
                                </span>
                            </div>

                        </div>

                    </div>

                </div>
            </div>

        </div>
    </div>

@endsection
