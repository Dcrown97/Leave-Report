@extends('layout/master')
@section('content')
    <div class="page-content-wrapper">
        <div class="page-content">
            <!--Notification Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">New User</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <!-- Sign up form -->
                            <section class="signup">
                                <div class="container">
                                    <div class="signup-content">
                                        <div class="signup-image">
                                            <figure><img src="./leave_report/assets/img/pages/signup.jpg" alt="ophinab"
                                                    style="height: 200px; width: 100%; object-fit:contain"></figure>

                                        </div>
                                        <div class="signup-form">
                                            <h2 class="form-title">User Account</h2>
                                            @include('flash.flash')
                                            <form action="{{ route('signup') }}" method="POST" class="register-form"
                                                id="register-form">
                                                @csrf
                                                <div class="form-group">
                                                    <div class="">
                                                        <input name="name" type="text" placeholder="Full Name"
                                                            class="form-control input-height" />
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="">
                                                        <input name="email" type="email" placeholder="Email"
                                                            class="form-control input-height" />
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="">
                                                        <input name="password" type="text" placeholder="Password"
                                                            class="form-control input-height" />
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="">
                                                        <input name="password_confirmation" type="text"
                                                            placeholder="Confirm Password"
                                                            class="form-control input-height" />
                                                    </div>
                                                </div>
                                                <input type="hidden" name="type" value="staff">

                                                <div class="form-group form-button">
                                                    <button class="btn btn-round btn-primary btn-lg" type="submit"
                                                        id="register">Add User</button>
                                                </div>
                                            </form>
                                        </div>

                                    </div>
                                </div>
                            </section>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="page-bar">
                <div class="page-title-breadcrumb">
                    <div class=" pull-left">
                        <div class="page-title">Users</div>
                    </div>
                    <ol class="breadcrumb page-breadcrumb pull-right">
                        <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="/">Home</a>&nbsp;<i
                                class="fa fa-angle-right"></i>
                        </li>
                        {{-- <li><a class="parent-item" href="#">Other Staff</a>&nbsp;<i class="fa fa-angle-right"></i> --}}
                        </li>
                        <li class="active">Users</li>
                    </ol>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="tabbable-line">
                        {{-- <ul class="nav customtab nav-tabs" role="tablist">
                            <li class="nav-item"><a href="#tab1" class="nav-link active" data-bs-toggle="tab">List
                                    View</a></li>
                            <li class="nav-item"><a href="#tab2" class="nav-link" data-bs-toggle="tab">Grid
                                    View</a></li>
                        </ul> --}}
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
                                                @include('flash.flash')
                                                <div class="row">
                                                    <div class="col-md-6 col-sm-6 col-6">
                                                        <div class="btn-group">
                                                            <a href="/signup" id="addRow" class="btn btn-primary"
                                                                data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                                Add Users <i class="fa fa-plus"></i>
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
                                                            <th> Email </th>
                                                            <th> Type </th>
                                                            {{-- <th> Leave Days </th> --}}
                                                            <th> Action </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="result"></tbody>
                                                    <tbody id="old">
                                                        @if (isset($users) && count($users) > 0)
                                                            @foreach ($users as $user)
                                                                <tr class="odd gradeX">
                                                                    <td class="patient-img">
                                                                        {{ $loop->iteration }}
                                                                    </td>
                                                                    <td>{{ $user->name }}
                                                                        {{-- @if ($user->type == 'staff')
                                                                            <span class="badge badge-success">Staff</span>
                                                                        @elseif($user->type == 'admin')
                                                                            <span class="badge badge-primary">Admin</span>
                                                                        @else
                                                                            <span class="badge badge-danger">Unknown</span>
                                                                        @endif
                                                                        @if (Auth::user()->id == $user->id)
                                                                            <span class="badge badge-success">You</span>
                                                                        @endif --}}
                                                                    </td>
                                                                    <td>{{ $user->email }}
                                                                    </td>
                                                                    <td class="center">{{ ucfirst($user->type ?? '-') }}
                                                                    </td>

                                                                    <td>
                                                                        <div class="justify-content-between">
                                                                            <a href="/user/password_reset/{{ base64_encode($user->id) }}"
                                                                                id="exampleModal{{ $user->id }}"
                                                                                data-bs-toggle="modal"
                                                                                data-bs-target="#exampleModal{{ $user->id }}"
                                                                                class="btn btn-primary btn-lg"> <i class="fa-solid fa-arrows-rotate"></i> Reset
                                                                                Password</a>

                                                                            <a href="/user/update?id={{ base64_encode($user->id) }}"
                                                                                class="btn btn-warning h2"> <i
                                                                                    class="fa fa-edit p-2"></i> Update</a>
                                                                            @if (Auth::user()->id == $user->id)
                                                                                <button class="btn btn-danger">Cant Delete
                                                                                    You</button>
                                                                            @else
                                                                                <a onclick="return confirm('Are you sure you want to delete this user?')"
                                                                                    href="/user/delete/{{ base64_encode($user->id) }}"
                                                                                    class="btn btn-danger btn-lg"> <i
                                                                                        class="fa fa-trash p-2"></i>Delete</a>
                                                                            @endif

                                                                        </div>
                                                                    </td>
                                                                </tr>

                                                                <!--Password reset Modal -->
                                                                <div class="modal fade"
                                                                    id="exampleModal{{ $user->id }}" tabindex="-1"
                                                                    aria-labelledby="exampleModalLabel"
                                                                    aria-hidden="true">
                                                                    <div class="modal-dialog">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h5 class="modal-title"
                                                                                    id="exampleModalLabel">Reset Pasword
                                                                                    for {{ $user->name }}</h5>
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
                                                                                                    Password Reset</h3>
                                                                                                @include('flash.flash')
                                                                                                <form
                                                                                                    action="/user/password_reset/{{ base64_encode($user->id) }}"
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
                                                                                                                value="{{ $user->name }}"
                                                                                                                type="text"
                                                                                                                readonly
                                                                                                                placeholder="Full Name"
                                                                                                                class="form-control input-height" />
                                                                                                        </div>
                                                                                                    </div>

                                                                                                    <div
                                                                                                        class="form-group">
                                                                                                        <div
                                                                                                            class="">
                                                                                                            <input
                                                                                                                name="password"
                                                                                                                type="text"
                                                                                                                placeholder="Tell user to enter Password"
                                                                                                                class="form-control input-height" />
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div
                                                                                                        class="form-group">
                                                                                                        <div
                                                                                                            class="">
                                                                                                            <input
                                                                                                                name="password_confirmation"
                                                                                                                type="text"
                                                                                                                placeholder="Confirm Your Password"
                                                                                                                class="form-control input-height" />
                                                                                                        </div>
                                                                                                    </div>

                                                                                                    <div
                                                                                                        class="form-group form-button">
                                                                                                        <button
                                                                                                            class="btn btn-round btn-primary btn-lg"
                                                                                                            type="submit"
                                                                                                            id="register">Reset</button>
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
                                                                {{-- End of Password reset modal --}}
                                                            @endforeach 
                                                        @else
                                                            <tr>
                                                                <td colspan="5">No Users Found</td>
                                                            </tr>
                                                        @endif

                                                    </tbody>
                                                </table>
                                                {{ $users->links('vendor.pagination.bootstrap-4') }}
                                            </div>
                                        </div>
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
