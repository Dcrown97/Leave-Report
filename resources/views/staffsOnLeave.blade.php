@extends('layout/master')
@section('content')
    <div class="page-content-wrapper">
        <div class="page-content">
            <div class="page-bar">
                <div class="page-title-breadcrumb">
                    <div class=" pull-left">
                        <div class="page-title">Staffs On Leave</div>
                    </div>
                    <ol class="breadcrumb page-breadcrumb pull-right">
                        <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="/">Home</a>&nbsp;<i
                                class="fa fa-angle-right"></i>
                        </li>
                        <li><a class="parent-item" href="/leave_request">Leave Request</a>&nbsp;<i
                                class="fa fa-angle-right"></i>
                        </li>
                        <li class="active">Staffs On Leave</li>
                    </ol>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="card-box">
                        <div class="card-head">
                            <header>Staffs On Leave</header>
                            <button id="sdntmenu" class="mdl-button mdl-js-button mdl-button--icon pull-right"
                                data-upgraded=",MaterialButton">
                                <i class="material-icons">more_vert</i>
                            </button>
                            <ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect"
                                data-mdl-for="sdntmenu">
                                <li class="mdl-menu__item"><i class="material-icons">assistant_photo</i>Action
                                </li>
                                <li class="mdl-menu__item"><i class="material-icons">print</i>Another action
                                </li>
                                <li class="mdl-menu__item"><i class="material-icons">favorite</i>Something else
                                    here</li>
                            </ul>
                        </div>
                        <div class="card-body ">
                            <div id="example4_filter" class="dataTables_filter" style="margin-bottom: 10px">

                                <input type="search" class="form-control form-control-sm" placeholder="Search"
                                    aria-controls="example4" id="search">

                            </div>
                            <table
                                class="table table-striped table-bordered table-hover table-checkable order-column valign-middle"
                                id="example4">
                                <thead>
                                    <tr>
                                        <th>S/N</th>
                                        <th>Title </th>
                                        <th> Type </th>
                                        <th> Start Date </th>
                                        <th> End Date </th>
                                        <th> Days taken </th>
                                        <th> Days Left </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr id="result"></tr>
                                    @forelse($staffs_on_leave as $staff_on_leave)
                                        <tr class="odd gradeX" id="old">
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $staff_on_leave->staff->first_name . ' ' . $staff_on_leave->staff->last_name }}
                                            </td>
                                            <td class="left">{{ $staff_on_leave->leave_type->leave_type }}</td>
                                            <td class="left">{{ $staff_on_leave->commencement_date }}</td>
                                            <td class="left">{{ $staff_on_leave->reumption_date }}</td>
                                            <td class="left">{{ $staff_on_leave->num_of_days }}</td>
                                            <td class="left">
                                                {{ 30 - $staff_on_leave->num_of_days }}
                                            </td>
                                        </tr>
                                    @empty
                                        <tr class="odd gradeX">
                                            <td colspan="8">No Staff on leave</td>
                                        </tr>
                                    @endforelse

                                </tbody>
                            </table>
                            {{ $staffs_on_leave->links('vendor.pagination.bootstrap-4') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


<script src="http://code.jquery.com/jquery-3.4.1.js"></script>

<script>
    var searchRquest = [];
    var minLength = 3;
    $(function() {
        console.log('first')
        $("#search").keyup(function() {
            console.log('search');
            let value = $(this).val();
            console.log('value', value);
            if (value.length >= minLength) {
                if (searchRquest != null) {
                    // searchRquest.abort();

                    searchRquest = $.ajax({
                        url: "/search_staffs_on_leave",
                        type: "GET",
                        data: {
                            search: value
                        },
                        success: function(data) {
                            console.log('data success', data);
                            var response = JSON.parse(data);
                            console.log('response', response);
                            
                            var html = '';
                            if (response.length > 0) {
                                $.each(response, function(key, value) {
                                    console.log('value', value);
                                    html += `
                                <tr class="odd gradeX">
                                    <td class="patient-img">
                                        ${key + 1}  </td>
                                        <td>${value.first_name} ${value.last_name}
                                        </td>
                                        <td class="center">${value.leave_type}</td>
                                        <td>${value.commencement_date}</td>
                                        <td>${value.reumption_date}</td>
                                        <td>${value.num_of_days}</td>
                                        <td>${30 - $value.num_of_days}</td>
                                        </td>
                                        <td>
                                            <div class="profile-userbuttons">
                                                <a href="/leave_request/${btoa(value.id)}" class="btn btn-circle deepPink-bgcolor btn-sm">Request
                                                    Leave</a>
                                            </div>
                                            </td>
                                            </tr>
                                            `;
                                    $('#old').hide();
                                    $('#result').empty().append(html);
                                });
                            } else {
                                $('#result').empty();
                                $('#old').hide();
                                $('#result').append(`
                                <div>
                                   
                                        <h3>No Result Found</h3>
                                   
                                 </div>
                                    `);
                            }

                        },
                        error: function(data) {
                            console.log('data error', data);
                        }
                    });
                }
            } else {
                $('#result').empty();
                $('#old').show();
            }
        });
    });
</script>
