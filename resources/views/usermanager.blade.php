@extends('templates.admin')
@section('main')
<!-- Begin Page Content -->

<!-- Page Heading -->
<!-- Content Row -->
<div class="row">    
    <div class="row col-sm-12">
        <div class="col-sm-12">
            <h1 style="display: inline-block;">Quản Lý User</h1>
            <ol class="breadcrumb float-xs-right float-sm-right">
                <li class="breadcrumb-item"><a href="resources/index3.html">Home</a></li>
                <li class="breadcrumb-item active">Quản Lý User</li>
            </ol>
        </div>
    </div>
    <div class="col-sm-12">
        <div class=" d-block float-right">
            <nav class="navbar">
                <ul class="nav">
                    <li class="nav-item function" data-toggle="modal" data-target="#add" style="margin-right: 15px;"><strong>Add</strong></li>
                    <li class="nav-item function" data-toggle="modal" data-target="#formUpdate" style="margin-right: 15px;"><strong>Update</strong></li>
                    <li class="nav-item function" data-toggle="modal" data-target="#formDelete" style="margin-right: 15px;"><strong>Delete</strong></li>
                </ul>
            </nav> 
        </div>
        <div class="modal fade " id="add">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Thêm User</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body row" id="formUser">
                        <div class="col-sm-6 row">
                            <form class="add row">
                                <strong class="col-sm-5 mt-1">Name* <span style="float: right">:</span></strong>
                                <input type="text" name="name" style="height: 25px; margin-top: 5px" id="name">
                                <strong class="col-sm-5 mt-1">Email* <span style="float: right">:</span></strong>
                                <input type="text" name="email" style="height: 25px; margin-top: 5px" id="email"><br>
                                <strong class="col-sm-5 mt-1">Password* <span style="float: right">:</span></strong>
                                <input type="text" name="password" style="height: 25px;  margin-top: 5px" id="password"><br>
                                <strong class="col-sm-5 mt-1">RE-Password* <span style="float: right">:</span></strong>
                                <input type="text" name="re_password" style="height: 25px;  margin-top: 5px" id="re_password"><br>
                            </form>
                        </div>
                        <div class="col-sm-6 row">
                            <form class="add row">
                                <strong class="col-sm-5 mt-1">Gender* <span style="float: right">:</span></strong>
                                <input type="text" name="gender" style="height: 25px; margin-top: 5px" id="gender">
                                <strong class="col-sm-5 mt-1">Phone* <span style="float: right">:</span></strong>
                                <input type="text" name="phone" style="height: 25px; margin-top: 5px" id="phone"><br>
                                <strong class="col-sm-5 mt-1">Address* <span style="float: right">:</span></strong>
                                <input type="text" name="address" style="height: 25px;  margin-top: 5px" id="address"><br>
                                <strong class="col-sm-5 mt-1">Image* <span style="float: right">:</span></strong>
                                <input type="file" name="image" style="width: 50%; height: 25px;  margin-top: 5px" id="image"><br>
                            </form>
                        </div>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" id="addUser" class="btn btn-dark"  data-dismiss="modal">Thêm</button>
                        <button type="button" class="btn btn-dark" data-dismiss="modal">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade " id="formUpdate">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Cập Nhật User</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <!-- Modal body -->
                    <div class="modal-body row">
                        <div class="col-sm-6 row">
                            <form class="row">
                                <strong class="col-sm-5 mt-1">Name* <span style="float: right">:</span></strong>
                                <input type="text" name="name_update" style="height: 25px; margin-top: 5px" id="name">
                                <strong class="col-sm-5 mt-1">Username* <span style="float: right">:</span></strong>
                                <input type="text" name="username" style="height: 25px; margin-top: 5px" id="username" disabled="disabled">
                                <strong class="col-sm-5 mt-1">Role* <span style="float: right">:</span></strong>
                                <input type="text" name="Role" style="height: 25px; margin-top: 5px" id="role">
                                <strong class="col-sm-5 mt-1">Email* <span style="float: right">:</span></strong>
                                <input type="text" name="email_update" style="height: 25px; margin-top: 5px" id="email"><br>
                            </form>
                        </div>
                        <div class="col-sm-6 row">
                            <form class="row">
                                <strong class="col-sm-5 mt-1">Gender* <span style="float: right">:</span></strong>
                                <input type="text" name="gender_update" style="height: 25px; margin-top: 5px" id="gender">
                                <strong class="col-sm-5 mt-1">Phone* <span style="float: right">:</span></strong>
                                <input type="text" name="phone_update" style="height: 25px; margin-top: 5px" id="phone"><br>
                                <strong class="col-sm-5 mt-1">Address* <span style="float: right">:</span></strong>
                                <input type="text" name="address_update" style="height: 25px;  margin-top: 5px" id="address"><br>
                                <strong class="col-sm-5 mt-1">Image* <span style="float: right">:</span></strong>
                                <input type="file" name="image_update" style="width: 50%; height: 25px;  margin-top: 5px" id="image"><br>
                            </form>
                        </div>
                    </div>
                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" id="updateTrans" class="btn btn-dark"  data-dismiss="modal">Update</button>
                        <button type="button" class="btn btn-dark" data-dismiss="modal">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-sm-12">
        <div class="table-responsive col-sm-12 table tableCustomer">
            <table class="col-sm-12">
                <thead>
                    <tr>
                        <th class="customer"><input type="checkbox" id="checkAll" onclick="checkAllID()"></th>
                        <th class="customer">ID</th>
                        <th class="customer">Mã SV (nếu có)</th>
                        <th class="customer">Image</th>
                        <th class="customer">Fullname</th>
                        <th class="customer">Role</th>
                        <th class="customer">Email</th>
                        <th class="customer">Gender</th>
                        <th class="customer">Phone</th>
                        <th class="customer">Address</th>
                    </tr>

                    <tr>
                        <td class="customer"></td>
                        <td class="customer">1</td>
                        <td class="customer">No</td>
                        <td class="customer">No</td>
                        <td class="customer">abc</td>
                        <td class="customer">1</td>
                        <td class="customer">abc@gmail.com</td>
                        <td class="customer">nam</td>
                        <td class="customer">0164226596</td>
                        <td class="customer">Đà Nẵng</td>
                    </tr>

                    <tr>
                        <td class="customer"></td>
                        <td class="customer">2</td>
                        <td class="customer">No</td>
                        <td class="customer">No</td>
                        <td class="customer">def</td>
                        <td class="customer">2</td>
                        <td class="customer">def@gmail.com</td>
                        <td class="customer">nữ</td>
                        <td class="customer">0164226596</td>
                        <td class="customer">Đà Nẵng</td>
                    </tr>

                    <tr class="collapse row0">
                        <td></td>
                    </tr>
                </thead>
                <tbody id="load">

                </tbody>          
            </table>
        </div>
        <!-- Main content -->
    </div>
</div>
<!-- Content Row -->
@endsection