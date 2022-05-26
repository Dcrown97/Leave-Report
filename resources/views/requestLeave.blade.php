@extends('layout/master')
@section('content')
<div class="page-content-wrapper">
    <div class="page-content">
        <div class="page-bar">
            <div class="page-title-breadcrumb">
                <div class=" pull-left">
                    <div class="page-title">Leave Request</div>
                </div>
                <ol class="breadcrumb page-breadcrumb pull-right">
                    <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="/">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
                    </li>
                    <li><a class="parent-item" href="/staffs_on_leave">Staffs On Leave</a>&nbsp;<i class="fa fa-angle-right"></i>
                    </li>
                    <li class="active">Leave Request</li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="card card-box">
                    <div class="card-head">
                        <header>Basic Information</header>
                        <button id="panel-button" class="mdl-button mdl-js-button mdl-button--icon pull-right" data-upgraded=",MaterialButton">
                            <i class="material-icons">more_vert</i>
                        </button>
                        <ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect" data-mdl-for="panel-button">
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
                        <form action="{{ route('leave_request') }}" method="POST" id="form_sample_1" class="form-horizontal">
                            @csrf
                            <div class="form-body">
                                <div class="form-group row">
                                    <label class="control-label col-md-3">Staff Name
                                        <span class="required"> * </span>
                                    </label>
                                    <div class="col-md-5">
                                        <select class="form-select input-height" name="staff_id" id="staff_id">
                                            @if ($Staff)
                                            <option value="{{ $Staff->id }}">{{ $Staff->first_name.' '.$Staff->last_name }}
                                            </option>
                                            @else
                                            <option value="">Select...</option>
                                            @if (isset($Staffs) && count($Staffs) > 0)
                                            @foreach ($Staffs as $staff)
                                            <option value="{{ $staff->id }}">{{ $staff->first_name }}
                                                {{ $staff->last_name }}
                                            </option>
                                            @endforeach
                                            @endif
                                            @endif

                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-md-3">Leave Type
                                        <span class="required"> * </span>
                                    </label>
                                    <div class="col-md-5">
                                        <select class="form-select input-height" name="leave_type_id" id="leave_type_id">
                                            <option value="">Select...</option>
                                            @if (isset($Leave_types) && count($Leave_types) > 0)
                                            @foreach ($Leave_types as $leave_types)
                                            <option value="{{ $leave_types->id }}" <?php echo $leave_types->leave_type === "Annual"? "selected": ""?> >
                                                {{ $leave_types->leave_type }}
                                            </option>
                                            @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-md-3">No of days
                                        <span class="required"> * </span>
                                    </label>
                                    <div class="col-md-5">
                                        <p id="error1" class="text-danger "></p>
                                        <input type="number" name="num_of_days" data-required="1" placeholder="Enter Number of days" class="form-control input-height" id="days" value="{{ $Staff !== null? 30 - $Staff->leave_days: '' }}" />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-md-3">Commencement Date
                                        <span class="required"> * </span>
                                    </label>
                                    <div class="col-md-5">
                                        <div class="input-append date">
                                            <div id="dateIcon" class="input-group datePicker">
                                                <input class="formDatePicker form-control" name="commencement_date" type="date" id="com_date" placeholder="Select Date.." data-input>
                                                <span class="dateBtn">
                                                    <a class="input-button" title="toggle" data-toggle>
                                                        <i class="icon-calendar"></i>
                                                    </a>
                                                    <a class="input-button" title="clear" data-clear>
                                                        <i class="icon-close"></i>
                                                    </a>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-md-3">Resumption Date
                                        <span class="required"> * </span>
                                    </label>
                                    <div class="col-md-5">
                                        <div class="input-append date">
                                            <div id="dateIcon" class="input-group datePicker">
                                                <input class="formDatePicker form-control" name="resumption_date" type="date" id="end_date" placeholder="Select Date.." data-input>
                                                <span class="dateBtn">
                                                    <a class="input-button" title="toggle" data-toggle>
                                                        <i class="icon-calendar"></i>
                                                    </a>
                                                    <a class="input-button" title="clear" data-clear>
                                                        <i class="icon-close"></i>
                                                    </a>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-md-3">Remarks
                                        <span class="required"> * </span>
                                    </label>
                                    <div class="col-md-5">
                                        <input type="text" name="remarks" data-required="1" placeholder="Enter remarks" class="form-control input-height" />
                                    </div>
                                </div>
                                <div class="form-actions">
                                    <div class="row">
                                        <div class="offset-md-3 col-md-9">
                                            <button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 m-r-20 btn-circle btn-primary">Submit</button>
                                            <button type="button" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 btn-circle btn-danger">Cancel</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection




<script src="http://code.jquery.com/jquery-3.4.1.js"></script>

<script>
    $(document).ready(function() {
        console.log('ready');
        $('#com_date').on('change', function() {
            let days = $('#days').val();
            let com_date = $(this).val();
            console.log('days', com_date);

            if (days === '') {
                $('#error1').text('Please enter number of days first');
                return false;
            }
            $.ajax({
                type: 'GET',
                url: '/get_date',
                data: {
                    days: days,
                    com_date: com_date
                },
                success: function(response) {
                    // alert('yes', response.room)
                    console.log('response', response);
                    var response = JSON.parse(response);
                    console.log('response', response);
                    // $('#sub_category').empty();
                    $('#error1').text('');
                    $('#end_date').val(response)

                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    console.log("Oops!", "An error occurred.");
                    console.log(XMLHttpRequest, textStatus, errorThrown);
                }
            });
        });





        $('#staff_id').on('change', function() {

            let staff_id = $(this).val();
            if (staff_id === null) {
                alert('Please select leave type');
                return false;
            }
            $.ajax({
                type: 'GET',
                url: '/staff_leave',
                data: {
                    staff_id: staff_id
                },
                success: function(response) {
                    // alert('yes', response.room)
                    console.log('response', response);
                    var response = JSON.parse(response);
                    console.log('response', response);
                    // $('#sub_category').empty();
                    $('#error1').text('');
                    $('#days').val(30 - response)
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    console.log("Oops!", "An error occurred.");
                    console.log(XMLHttpRequest, textStatus, errorThrown);
                }
            });
        });



        $('#leave_type_id').on('change', function() {
            $('#com_date').val('');
            $('#end_date').val('');
            let leave_type_id = $(this).val();
            if (leave_type_id === null) {
                alert('Please select leave type');
                return false;
            }
            $.ajax({
                type: 'GET',
                url: '/leave_days',
                data: {
                    leave_type_id: leave_type_id
                },
                success: function(response) {
                    // alert('yes', response.room)
                    console.log('response', response);
                    var response = JSON.parse(response);
                    console.log('response', response);
                    // $('#sub_category').empty();
                    $('#error1').text('');
                    $('#days').val(response)
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    console.log("Oops!", "An error occurred.");
                    console.log(XMLHttpRequest, textStatus, errorThrown);
                }
            });
        });
    });
</script>