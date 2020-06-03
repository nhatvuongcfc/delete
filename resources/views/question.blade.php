@extends('templates.admin')
@section('main')
<!-- Begin Page Content -->

<!-- Page Heading -->
<!-- Content Row -->
<div class="row">    
    <div class="row col-sm-12">
        <div class="col-sm-12">
            <h1 style="display: inline-block;">Câu hỏi</h1>
            <ol class="breadcrumb float-xs-right float-sm-right">
                <li class="breadcrumb-item"><a href="resources/index3.html">Home</a></li>
                <li class="breadcrumb-item active">Câu hỏi</li>
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
                        <h4 class="modal-title">THÊM CÂU HỎI</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body row" id="formDiem">  
                        <div class="col-sm-6 row">
                            <form class="row">
                                <strong class="col-sm-5 mt-1">Mã Câu Hỏi* <span style="float: right">:</span></strong>
                                <input type="text" name="maCH" style="height: 25px; margin-top: 5px" id="maBĐ">
                                <strong class="col-sm-5 mt-1">Câu Hỏi* <span style="float: right">:</span></strong>
                                <input type="text" name="cauHoi" style="height: 25px; margin-top: 5px" id="mon"><br>
                                <strong class="col-sm-5 mt-1">Loại câu hỏi* <span style="float: right">:</span></strong>
                                <input type="radio" value="TN" name="loaiCH" id="TN" style="margin-top: 10px" checked="checked"><span style="margin-top: 5px;">Trắc Nghiệm</span>
                                <input type="radio" value="TL" name="loaiCH" id="TL" style="margin-left: 15px; margin-top: 10px"><span style="margin-top: 5px;">Tự Luận</span><br>
                                <strong class="col-sm-5 mt-1">Độ khó* <span style="float: right">:</span></strong>
                                <input type="radio" value="1" name="doKho" style="margin-top: 10px"><span style="margin-top: 5px;">Dễ</span>
                                <input type="radio" value="2" name="doKho" style="margin-left: 10px; margin-top: 10px" checked="checked"><span style="margin-top: 5px;">Trung Bình</span>
                                <input type="radio" value="3" name="doKho" style="margin-left: 10px; margin-top: 10px"><span style="margin-top: 5px;">Khó</span><br>
                            </form>
                        </div>
                        <div class="col-sm-6 row">
                            <form class="row" id="addCH">
                                <strong class="col-sm-4 mt-1">Đáp án 1: </strong>
                                <input type="text" name="a" style="height: 25px; margin-top: 5px" id="a"><br>
                                <strong class="col-sm-4 mt-1">Đáp án 2:</strong>
                                <input type="text" name="b" style="height: 25px; margin-top: 5px" id="b"><br>
                                <strong class="col-sm-4 mt-1">Đáp án 3  :</strong>
                                <input type="text" name="c" style="height: 25px;  margin-top: 5px" id="c"><br>
                                <strong class="col-sm-4 mt-1">Đáp án 4: </strong>
                                <input type="text" name="d" style="height: 25px; margin-top: 5px" id="d"><br>
                            </form>
                        </div>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" id="addQuestion" class="btn btn-dark"  data-dismiss="modal">Thêm</button>
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
                        <h4 class="modal-title">Cập Nhật Câu Hỏi</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <!-- Modal body -->
                    <div class="modal-body row">
                        <div class="col-sm-6 row">
                            <form class="row">
                                <strong class="col-sm-5 mt-1">Mã câu hỏi* <span style="float: right">:</span></strong>
                                <input type="text" name="maBĐ_update" style="height: 25px; margin-top: 5px" id="maBĐ_update" disabled="disabled">
                                <strong class="col-sm-5 mt-1">Câu hỏi* <span style="float: right">:</span></strong>
                                <input type="text" name="cauHoi_update" style="height: 25px; margin-top: 5px" id="mon_update"><br>
                                <strong class="col-sm-5 mt-1">Loại câu hỏi* <span style="float: right">:</span></strong>
                                <input type="radio" value="TN" name="loaiCH_update" style="margin-top: 10px" checked="checked"><span style="margin-top: 5px;">Trắc Nghiệm</span>
                                <input type="radio" value="TL" name="loaiCH_update" style="margin-left: 15px; margin-top: 10px"><span style="margin-top: 5px;">Tự Luận</span><br>
                                <strong class="col-sm-5 mt-1">Độ khó* <span style="float: right">:</span></strong>
                                <input type="radio" value="1" name="doKho_update" style="margin-top: 10px"><span style="margin-top: 5px;">Dễ</span>
                                <input type="radio" value="2" name="doKho_update" style="margin-left: 10px; margin-top: 10px" checked="checked"><span style="margin-top: 5px;">Trung Bình</span>
                                <input type="radio" value="3" name="doKho_update" style="margin-left: 10px; margin-top: 10px"><span style="margin-top: 5px;">Khó</span><br>
                            </form>
                        </div>
                        <div class="col-sm-6 row">
                            <form class="row">
                                <strong class="col-sm-4 mt-1">Đáp án 1: </strong>
                                <input type="text" name="a_update" style="height: 25px; margin-top: 5px" id="chiNhanh_update"><br>
                                <strong class="col-sm-4 mt-1">Đáp án 2:</strong>
                                <input type="text" name="b_update" style="height: 25px; margin-top: 5px" id="mst_update"><br>
                                <strong class="col-sm-4 mt-1">Đáp án 3  :</strong>
                                <input type="text" name="c_update" style="height: 25px;  margin-top: 5px" id="diaChi_update"><br>
                                <strong class="col-sm-4 mt-1">Đáp án 4: </strong>
                                <input type="text" name="d_update" style="height: 25px; margin-top: 5px" id="chiNhanh_update"><br>
                            </form>
                        </div>
                    </div>
                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" id="updateCus" class="btn btn-dark"  data-dismiss="modal">Update</button>
                        <button type="button" class="btn btn-dark" data-dismiss="modal">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="import">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Import</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <h5>
                            <b>Nhập bảng từ file dữ liệu</b>
                        </h5>
                        <br>
                        <span>
                            Xử lý dữ liệu (Tải về File mẫu: <a href="" title="download">Excel file</a>):
                        </span>
                        <hr>

                        <h6><b>Xử lý trùng mã câu hỏi, thông tin không chính xác ?</b></h6><br>
                        <p><input type="radio" name="baoloi">Báo lỗi và dừng import</p><p><input type="radio" name="baoloi">Thay thế thông tin cũ bằng thông tin mới</p>
                        <div class="warning-content">
                            <h5>
                                <i class="fas fa-exclamation-triangle"></i>
                                Lưu ý
                            </h5>
                            <i>Hệ thống cho phép nhập tối đa 100 học sinh mỗi lần từ file .</i><br>
                        </div>   
                    </div>
                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
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
                        <th class="customer">Mã câu hỏi</th>
                        <th class="customer">Câu hỏi</th>
                        <th class="customer">Loại câu hỏi</th>
                        <th class="customer">Độ khó</th>
                        <th class="customer">Đáp án 1</th>
                        <th class="customer">Đáp án 2</th>
                        <th class="customer">Đáp án 3</th>
                        <th class="customer">Đáp án 4</th>
                    </tr>

                    <tr>
                        <td class="customer"></td>
                        <td class="customer">123</td>
                        <td class="customer">123</td>
                        <td class="customer">123</td>
                        <td class="customer">123</td>
                        <td class="customer">123</td>
                        <td class="customer">123</td>
                        <td class="customer">123</td>
                        <td class="customer">123</td>
                    </tr>
                    <tr class="collapse row0">
                        <td></td>
                    </tr>
                </thead>
                <tbody id="loadCustomer">

                </tbody>          
            </table>
        </div>
        <!-- Main content -->
    </div>
</div>
<!-- <script language="javascript">
    
</script> -->
<!-- Content Row -->
@endsection