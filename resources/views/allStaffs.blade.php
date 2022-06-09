@extends('layout/master')
@section('content')
    <div class="page-content-wrapper">
        <div class="page-content">
            <div class="page-bar">
                <div class="page-title-breadcrumb">
                    <div class=" pull-left">
                        <div class="page-title">All Staffs</div>
                    </div>
                    <ol class="breadcrumb page-breadcrumb pull-right">
                        <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="/">Home</a>&nbsp;<i
                                class="fa fa-angle-right"></i>
                        </li>
                        {{-- <li><a class="parent-item" href="#">Other Staff</a>&nbsp;<i class="fa fa-angle-right"></i> --}}
                        </li>
                        <li class="active">All Staff</li>
                    </ol>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="tabbable-line">
                        <ul class="nav customtab nav-tabs" role="tablist">
                            <li class="nav-item"><a href="#tab1" class="nav-link active" data-bs-toggle="tab">List
                                    View</a></li>
                            <li class="nav-item"><a href="#tab2" class="nav-link" data-bs-toggle="tab">Grid
                                    View</a></li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active fontawesome-demo" id="tab1">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card">
                                            <div class="card-head">
                                                <header></header>
                                                <div class="tools">
                                                    <a class="fa fa-repeat btn-color box-refresh" href="javascript:;"></a>
                                                    <a class="t-collapse btn-color fa fa-chevron-down"
                                                        href="javascript:;"></a>
                                                    <a class="t-close btn-color fa fa-times" href="javascript:;"></a>
                                                </div>
                                            </div>
                                            <div class="card-body ">
                                                <div class="row">
                                                    <div class="col-md-6 col-sm-6 col-6">
                                                        <div class="btn-group">
                                                            <a href="/add_staffs" id="addRow" class="btn btn-primary">
                                                                Add New Staff <i class="fa fa-plus"></i>
                                                            </a>
                                                        </div>

                                                    </div>
                                                    <div class="col-md-6 col-sm-6 col-6">
                                                        <div id="example4_filter" class="dataTables_filter">
                                                            <label>
                                                                <input type="text" style="margin-bottom: 10px"
                                                                    class="form-control form-control-sm"
                                                                    placeholder="Search" aria-controls="example4"
                                                                    id="search">
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <table
                                                    class="table table-striped table-bordered table-hover table-checkable order-column valign-middle"
                                                    id="example4">
                                                    <thead>
                                                        <tr>
                                                            <th>S/N</th>
                                                            <th> Name </th>
                                                            <th> Rank </th>
                                                            <th> Unit </th>
                                                            {{-- <th> Leave Days </th> --}}
                                                            <th> Action </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="result"></tbody>
                                                    <tbody id="old">
                                                        @if (isset($Staffs) && count($Staffs) > 0)
                                                            @foreach ($Staffs as $staff)
                                                                <tr class="odd gradeX">
                                                                    <td class="patient-img">
                                                                        {{ $loop->iteration }}
                                                                    </td>
                                                                    <td>{{ $staff->first_name }} {{ $staff->last_name }}
                                                                    </td>
                                                                    <td class="center">{{ $staff->rank }}</td>
                                                                    <td>{{ $staff->unit }}</td>
                                                                    {{-- <td>{{ $staff->leave_days == 30 ? 30 : 30 - intval($staff->leave_days) }} --}}
                                                                    </td>
                                                                    <td>
                                                                        <div class="profile-userbuttons">
                                                                            <a href="/leave_request/{{ base64_encode($staff->id) }}"
                                                                                class="btn btn-circle deepPink-bgcolor btn-sm">Request
                                                                                Leave</a>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            @endforeach

                                                            @endif
                                                        </tbody>
                                                    </table>
                                                    {{ $Staffs->links('vendor.pagination.bootstrap-4') }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane" id="tab2">

                                <div class="row">
                                    @if (isset($Staffs) && count($Staffs) > 0)
                                        @foreach ($Staffs as $staff)
                                            <div class="col-md-4">
                                                <div class="card">
                                                    <div class="card-body no-padding ">
                                                        <div class="doctor-profile">
                                                            <div class="profile-usertitle">
                                                                <div class="doctor-name">{{ $staff->first_name }}
                                                                    {{ $staff->last_name }}
                                                                </div>
                                                                <div class="name-center"><b>Rank:</b>
                                                                    {{ $staff->rank }}
                                                                </div>
                                                            </div>
                                                            <p><b>Unit:</b> {{ $staff->unit }}</p>
                                                            <p><b>Leave Days:</b>
                                                                {{ 30 - intval($staff->leave_days) == 0 ? 30 : 30 - intval($staff->leave_days) }}
                                                            </p>
                                                            <div class="profile-userbuttons">
                                                                <a href="/leave_request/{{ base64_encode($staff->id) }}"
                                                                    class="btn btn-circle deepPink-bgcolor btn-sm">Request
                                                                    Leave</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
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
        $("#search").keyup(function() {
            console.log('search');
            let value = $(this).val();
            console.log('value', value);
            if (value.length >= minLength) {
                if (searchRquest != null) {
                    // searchRquest.abort();

                    searchRquest = $.ajax({
                        url: "/search_staffs",
                        type: "GET",
                        data: {
                            search: value
                        },
                        success: function(data) {
                            console.log('data success', data);
                            var html = '';
                            var response = JSON.parse(data);
                            console.log('response', response);

                            if (response.length > 0) {
                                $.each(response, function(key, value) {
                                    console.log('value', value);
                                    html += `
                                <tr class="odd gradeX">
                                    <td class="patient-img">
                                        ${key + 1}  </td>
                                        <td>${value.first_name} ${value.last_name}
                                        </td>
                                        <td class="center">${value.rank}</td>
                                        <td>${value.unit}</td>
                                        <td>${30 - parseInt(value.leave_days) == 0 ? 30 : 30 - parseInt(value.leave_days)}
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
