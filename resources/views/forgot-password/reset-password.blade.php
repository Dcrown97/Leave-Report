@extends('layouts/main')
@section('content')



<div class="main_content_iner ">
    <div class="container-fluid p-0">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="dashboard_header mb_50">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="dashboard_header_title">
                                <h3> Admin Dashboard</h3>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="dashboard_breadcam text-right">
                                <p><a href="/admin">Dashboard</a> <i class="fas fa-caret-right"></i> Password</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-lg-12 ">
                <div class="white_box mb_30">
                    <div class="row justify-content-center">
                        <div class="col-lg-6">

                            <div class="modal-content cs_modal">
                                @include('flash.flash')
                                <div style="background-color: #323246;" class="modal-header justify-content-center">
                                    <h5 class="modal-title text_white">Reset Password</h5>
                                </div>
                                <div class="modal-body">
                                    <form method="POST" action="{{ route('password.update') }}">
                                        @csrf
                                        <div class="">
                                            <input type="email" class="form-control" name="email" placeholder="Enter your email">
                                        </div>
                                        <div class="">
                                            <input type="password" class="form-control" name="password" placeholder="Enter you new password">
                                        </div>
                                        <div class="">
                                            <input type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password">
                                        </div>
                                        <input hidden name="token" value="{{ $token }}" type="text">
                                        <div>
                                            <button type="submit" class="btn btn-primary">Reset</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection