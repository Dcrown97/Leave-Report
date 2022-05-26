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
                                    aria-controls="example4">

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
                                        <th> Action </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($staffs_on_leave as $staff_on_leave)
                                        <tr class="odd gradeX">
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
                                            <td>
                                                <a href="#" class="tblEditBtn">
                                                    <i class="fa fa-pencil"></i>
                                                </a>
                                                <a href="#" class="tblDelBtn">
                                                    <i class="fa fa-trash-o"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr class="odd gradeX">
                                            <td colspan="8">No Staff on leave</td>
                                        </tr>
                                    @endforelse

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
