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
                        <li><a class="parent-item" href="/leave_request">Leave Request</a>&nbsp;<i class="fa fa-angle-right"></i>
                        </li>
                        <li class="active">Staffs On Leave</li>
                    </ol>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="card-box">
                        <div class="card-head">
                            <header>Holiday List</header>
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
                                        <th>#</th>
                                        <th>Title </th>
                                        <th> Type </th>
                                        <th> Start Date </th>
                                        <th> End Date </th>
                                        <th> Details </th>
                                        <th> Action </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="odd gradeX">
                                        <td>1</td>
                                        <td>New Year's Day</td>
                                        <td class="left">Public Holiday</td>
                                        <td class="left">01 January 2017</td>
                                        <td class="left">03 January 2017</td>
                                        <td> Lorem Ipsum is simply dummy text of the printing</td>
                                        <td>
                                            <a href="edit_holiday.html" class="tblEditBtn">
                                                <i class="fa fa-pencil"></i>
                                            </a>
                                            <a class="tblDelBtn">
                                                <i class="fa fa-trash-o"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr class="odd gradeX">
                                        <td>2</td>
                                        <td>Memorial Day</td>
                                        <td class="left">Public Holiday</td>
                                        <td class="left">29 May 2017</td>
                                        <td class="left">29 May 2017</td>
                                        <td> Lorem Ipsum is simply dummy text of the printing</td>
                                        <td>
                                            <a href="edit_holiday.html" class="tblEditBtn">
                                                <i class="fa fa-pencil"></i>
                                            </a>
                                            <a class="tblDelBtn">
                                                <i class="fa fa-trash-o"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr class="odd gradeX">
                                        <td>3</td>
                                        <td>Christmas Day</td>
                                        <td class="left">Public Holiday</td>
                                        <td class="left">25 December 2017</td>
                                        <td class="left">03 January 2017</td>
                                        <td> Lorem Ipsum is simply dummy text of the printing</td>
                                        <td>
                                            <a href="edit_holiday.html" class="tblEditBtn">
                                                <i class="fa fa-pencil"></i>
                                            </a>
                                            <a class="tblDelBtn">
                                                <i class="fa fa-trash-o"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr class="odd gradeX">
                                        <td>4</td>
                                        <td>Annual Function</td>
                                        <td class="left">Holiday By Collage</td>
                                        <td class="left">01 March 2017</td>
                                        <td class="left">03 March 2017</td>
                                        <td> Lorem Ipsum is simply dummy text of the printing</td>
                                        <td>
                                            <a href="edit_holiday.html" class="tblEditBtn">
                                                <i class="fa fa-pencil"></i>
                                            </a>
                                            <a class="tblDelBtn">
                                                <i class="fa fa-trash-o"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr class="odd gradeX">
                                        <td>5</td>
                                        <td>New Year's Day</td>
                                        <td class="left">Public Holiday</td>
                                        <td class="left">01 January 2017</td>
                                        <td class="left">03 January 2017</td>
                                        <td> Lorem Ipsum is simply dummy text of the printing</td>
                                        <td>
                                            <a href="edit_holiday.html" class="tblEditBtn">
                                                <i class="fa fa-pencil"></i>
                                            </a>
                                            <a class="tblDelBtn">
                                                <i class="fa fa-trash-o"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr class="odd gradeX">
                                        <td>6</td>
                                        <td>Memorial Day</td>
                                        <td class="left">Public Holiday</td>
                                        <td class="left">29 May 2017</td>
                                        <td class="left">29 May 2017</td>
                                        <td> Lorem Ipsum is simply dummy text of the printing</td>
                                        <td>
                                            <a href="edit_holiday.html" class="tblEditBtn">
                                                <i class="fa fa-pencil"></i>
                                            </a>
                                            <a class="tblDelBtn">
                                                <i class="fa fa-trash-o"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr class="odd gradeX">
                                        <td>7</td>
                                        <td>Christmas Day</td>
                                        <td class="left">Public Holiday</td>
                                        <td class="left">25 December 2017</td>
                                        <td class="left">03 January 2017</td>
                                        <td> Lorem Ipsum is simply dummy text of the printing</td>
                                        <td>
                                            <a href="edit_holiday.html" class="tblEditBtn">
                                                <i class="fa fa-pencil"></i>
                                            </a>
                                            <a class="tblDelBtn">
                                                <i class="fa fa-trash-o"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr class="odd gradeX">
                                        <td>8</td>
                                        <td>Annual Function</td>
                                        <td class="left">Holiday By Collage</td>
                                        <td class="left">01 March 2017</td>
                                        <td class="left">03 March 2017</td>
                                        <td> Lorem Ipsum is simply dummy text of the printing</td>
                                        <td>
                                            <a href="edit_holiday.html" class="tblEditBtn">
                                                <i class="fa fa-pencil"></i>
                                            </a>
                                            <a class="tblDelBtn">
                                                <i class="fa fa-trash-o"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr class="odd gradeX">
                                        <td>9</td>
                                        <td>New Year's Day</td>
                                        <td class="left">Public Holiday</td>
                                        <td class="left">01 January 2017</td>
                                        <td class="left">03 January 2017</td>
                                        <td> Lorem Ipsum is simply dummy text of the printing</td>
                                        <td>
                                            <a href="edit_holiday.html" class="tblEditBtn">
                                                <i class="fa fa-pencil"></i>
                                            </a>
                                            <a class="tblDelBtn">
                                                <i class="fa fa-trash-o"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr class="odd gradeX">
                                        <td>10</td>
                                        <td>Memorial Day</td>
                                        <td class="left">Public Holiday</td>
                                        <td class="left">29 May 2017</td>
                                        <td class="left">29 May 2017</td>
                                        <td> Lorem Ipsum is simply dummy text of the printing</td>
                                        <td>
                                            <a href="edit_holiday.html" class="tblEditBtn">
                                                <i class="fa fa-pencil"></i>
                                            </a>
                                            <a class="tblDelBtn">
                                                <i class="fa fa-trash-o"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr class="odd gradeX">
                                        <td>11</td>
                                        <td>Christmas Day</td>
                                        <td class="left">Public Holiday</td>
                                        <td class="left">25 December 2017</td>
                                        <td class="left">03 January 2017</td>
                                        <td> Lorem Ipsum is simply dummy text of the printing</td>
                                        <td>
                                            <a href="edit_holiday.html" class="tblEditBtn">
                                                <i class="fa fa-pencil"></i>
                                            </a>
                                            <a class="tblDelBtn">
                                                <i class="fa fa-trash-o"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr class="odd gradeX">
                                        <td>12</td>
                                        <td>Annual Function</td>
                                        <td class="left">Holiday By Collage</td>
                                        <td class="left">01 March 2017</td>
                                        <td class="left">03 March 2017</td>
                                        <td> Lorem Ipsum is simply dummy text of the printing</td>
                                        <td>
                                            <a href="edit_holiday.html" class="tblEditBtn">
                                                <i class="fa fa-pencil"></i>
                                            </a>
                                            <a class="tblDelBtn">
                                                <i class="fa fa-trash-o"></i>
                                            </a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
