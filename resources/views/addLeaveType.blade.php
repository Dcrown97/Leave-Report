@extends('layout/master')
@section('content')
    <div class="page-content-wrapper">
        <div class="page-content">
            <div class="page-bar">
                <div class="page-title-breadcrumb">
                    <div class=" pull-left">
                        <div class="page-title">Leave Type</div>
                    </div>
                    <ol class="breadcrumb page-breadcrumb pull-right">
                        <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="/">Home</a>&nbsp;<i
                                class="fa fa-angle-right"></i>
                        </li>
                        <li><a class="parent-item" href="/staffs_on_leave">Staff On Leave</a>&nbsp;<i class="fa fa-angle-right"></i>
                        </li>
                        <li class="active">Leave Type</li>
                    </ol>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="card card-box">
                        <div class="card-head">
                            <header>Basic Information</header>
                            <button id="panel-button" class="mdl-button mdl-js-button mdl-button--icon pull-right"
                                data-upgraded=",MaterialButton">
                                <i class="material-icons">more_vert</i>
                            </button>
                            <ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect"
                                data-mdl-for="panel-button">
                                <li class="mdl-menu__item"><i class="material-icons">assistant_photo</i>Action
                                </li>
                                <li class="mdl-menu__item"><i class="material-icons">print</i>Another action
                                </li>
                                <li class="mdl-menu__item"><i class="material-icons">favorite</i>Something else
                                    here</li>
                            </ul>
                        </div>
                        <div class="card-body" id="bar-parent">
                            @include('flash.flash')
                            <form action="{{ route('add_leave_type') }}" method="POST" id="form_sample_1"
                                class="form-horizontal">
                                @csrf
                                <div class="form-body">
                                    <div class="form-group row">
                                        <label class="control-label col-md-3">Leave Type
                                            <span class="required"> * </span>
                                        </label>
                                        <div class="col-md-5">
                                            <input type="text" name="leave_type" data-required="1"
                                                placeholder="Enter Leave Type" class="form-control input-height" />
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="control-label col-md-3">No of days
                                            <span class="required"> * </span>
                                        </label>
                                        <div class="col-md-5">
                                            <input type="number" name="num_of_days" data-required="1"
                                                placeholder="Enter Number Of Days" class="form-control input-height" />
                                        </div>
                                    </div>
                                    <div class="form-actions">
                                        <div class="row">
                                            <div class="offset-md-3 col-md-9">
                                                <button type="submit"
                                                    class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 m-r-20 btn-circle btn-primary">Submit</button>
                                                <button type="button"
                                                    class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 btn-circle btn-danger">Cancel</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                     <table  class="table table-striped table-bordered table-hover table-checkable order-column valign-middle"
                                                    id="example4">
                                                    <thead>
                                                        <tr>
                                                            <th>S/N</th>
                                                            <th> Name </th>
                                                            <th> Days </th>
                                                            <th> Created </th>
                                                            
                                                            <th class="center"> Action </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="result"></tbody>
                                                    <tbody id="old">
                                                        @if (isset($leave_types) && count($leave_types) > 0)
                                                            @foreach ($leave_types as $record)
                                                                <tr class="odd gradeX">
                                                                    <td class="patient-img">
                                                                         {{ $leave_types->firstItem() + $loop->index }}
                                                                    </td>
                                                                    <td>{{ $record->leave_type?? '' }}
                                                                    </td>
                                                                    <td class="center">{{ $record->num_of_days }}</td>
                                                                    <td>{{ $record->created_at->format('Y-m-d') }}</td>
                                                                   
                                                                    <td class="center">
                                                                        <div class="profile-userbuttons">
                                                                           
                                                                          <a href="/edit/{{ base64_encode($record->id) }}"
                                                                                id="exampleModal{{ $record->id }}"
                                                                                data-bs-toggle="modal"
                                                                                data-bs-target="#exampleModal{{ $record->id }}"
                                                                                class="btn btn-primary btn-lg"> <i class="fa-solid fa-edit"></i> 
                                                                                Edit</a>
                                                                            <a onclick="return confirm('Are you sure ?')"
                                                                                href="/delete_leave_type/{{ base64_encode($record->id) }}"
                                                                                class="btn btn-circle deepPink-bgcolor btn-sm">Delete
                                                                                </a>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <!--Edit Modal -->
                                                                <div class="modal fade"
                                                                    id="exampleModal{{ $record->id }}" tabindex="-1"
                                                                    aria-labelledby="exampleModalLabel"
                                                                    aria-hidden="true">
                                                                    <div class="modal-dialog">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h5 class="modal-title"
                                                                                    id="exampleModalLabel">Edit
                                                                                 {{ $record->leave_type }}</h5>
                                                                                <button type="button" class="btn-close"
                                                                                    data-bs-dismiss="modal"
                                                                                    aria-label="Close"></button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <!-- Sign up form -->
                                                                                <section class="signup">
                                                                                    <div class="container">
                                                                                        <div class="signup-content">

                                                                                            <div class="signup-form">
                                                                                                <h3 class="form-title">
                                                                                                    Edit</h3>
                                                                                                @include('flash.flash')
                                                                                                <form
                                                                                                    action="/edit_leave_type/{{ base64_encode($record->id) }}"
                                                                                                    method="POST"
                                                                                                    class="register-form"
                                                                                                    id="register-form">
                                                                                                    @csrf
                                                                                                    <div
                                                                                                        class="form-group">
                                                                                                        <div
                                                                                                            class="">
                                                                                                            <input
                                                                                                                name="name"
                                                                                                               
                                                                                                                type="text"
                                                                                                                {{ $record->leave_type == 'Casual' || $record->leave_type == 'Annual'|| $record->leave_type == 'Maternity' ? 'readonly' : '' }}
                                                                                                                value="{{ $record->leave_type }}"
                                                                                                                placeholder="name"
                                                                                                                class="form-control input-height" />
                                                                                                        </div>
                                                                                                    </div>

                                                                                                    <div
                                                                                                        class="form-group">
                                                                                                        <div
                                                                                                            class="">
                                                                                                            <input
                                                                                                                name="days"
                                                                                                                type="text"
                                                                                                                placeholder=""
                                                                                                                value="{{$record->num_of_days}}"
                                                                                                                class="form-control input-height" />
                                                                                                        </div>
                                                                                                    </div>                       

                                                                                                    <div
                                                                                                        class="form-group form-button">
                                                                                                        <button
                                                                                                            class="btn btn-round btn-primary btn-lg"
                                                                                                            type="submit"
                                                                                                            id="register">Edit</button>
                                                                                                    </div>
                                                                                                </form>
                                                                                            </div>

                                                                                        </div>
                                                                                    </div>
                                                                                </section>

                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button type="button"
                                                                                    class="btn btn-secondary"
                                                                                    data-bs-dismiss="modal">Close</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                {{-- End of Edit modal --}}
                                                            @endforeach
                                                        @endif
                                                    </tbody>
                                                </table>
                                     {{ $leave_types->links('vendor.pagination.bootstrap-4') }}

                </div>
            </div>
        </div>
    </div>
@endsection
