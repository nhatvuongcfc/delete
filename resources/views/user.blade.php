@extends('templates.admin')
@section('main')
      <div class="content-wrapper" style="margin-left: auto;">

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="col-md-4" style="margin-bottom: -2%; ">
              <ol class="breadcrumb" style="background-color: transparent;font-size: 145%;display: inline-flex;">
                <li><i class="fa fa-user"></i> Danh sách lớp</li>
              </ol>
              <div class="btn-group pull-right" style="left: 253%;">
                <button type="button" class="btn bg-olive btn-flat margin btn_add_class" data-toggle="modal" data-target="#add_class"><i class="fa fa-plus" aria-hidden="true"></i> Thêm</button>
                 
            </div>
            <!-- data-toggle-->
            <div class="modal fade " id="add_class">
            <div class="modal-dialog modal-lg">
                <div class="modal-content add" style="margin-top: 15%;">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Thêm User</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <!-- Modal body -->
                    <div class="modal-body row">
                        <div class="col-sm-6 row">
                            <form class="add row">
                                <strong class="col-sm-5 mt-1">Họ và tên <span style="float: right">:</span></strong>
                                <input type="text" name="cauHoi_update" style="height: 25px; margin-top: 5px" id="mon_update"><br>
                                <strong class="col-sm-5 mt-1">Tên tài khoản  <span style="float: right">:</span></strong>
                                <input type="text" name="cauHoi_update" style="height: 25px; margin-top: 5px" id="mon_update"><br>
                                <strong class="col-sm-5 mt-1">Password <span style="float: right">:</span></strong>
                                <input type="text" name="cauHoi_update" style="height: 25px; margin-top: 5px" id="mon_update"><br>
                                <!-- <strong class="col-sm-5 mt-1">Loại câu hỏi* <span style="float: right">:</span></strong>
                                <input type="radio" value="TN" name="loaiCH_update" style="margin-top: 10px" checked="checked"><span style="margin-top: 5px;">Trắc Nghiệm</span>
                                <input type="radio" value="TL" name="loaiCH_update" style="margin-left: 15px; margin-top: 10px"><span style="margin-top: 5px;">Tự Luận</span><br>
                                <strong class="col-sm-5 mt-1">Độ khó* <span style="float: right">:</span></strong>
                                <input type="radio" value="1" name="doKho_update" style="margin-top: 10px"><span style="margin-top: 5px;">Dễ</span>
                                <input type="radio" value="2" name="doKho_update" style="margin-left: 10px; margin-top: 10px" checked="checked"><span style="margin-top: 5px;">Trung Bình</span>
                                <input type="radio" value="3" name="doKho_update" style="margin-left: 10px; margin-top: 10px"><span style="margin-top: 5px;">Khó</span><br> -->
                            </form>
                        </div>
                        <div class="col-sm-6 row">
                            <form class="add row">
                               <strong class="col-sm-5 mt-1">Email <span style="float: right">:</span></strong>
                                <input type="text" name="cauHoi_update" style="height: 25px; margin-top: 5px" id="mon_update"><br>
                                <strong class="col-sm-5 mt-1">Phone  <span style="float: right">:</span></strong>
                                <input type="text" name="cauHoi_update" style="height: 25px; margin-top: 5px" id="mon_update"><br>
                                <strong class="col-sm-5 mt-1">Status <span style="float: right">:</span></strong>
                                <input type="text" name="cauHoi_update" style="height: 25px; margin-top: 5px" id="mon_update"><br>
                            </form>
                        </div>
                    </div>
                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" id="updateCus" class="btn btn-dark"  data-dismiss="modal">Add</button>
                        <button type="button" class="btn btn-dark" data-dismiss="modal">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
            <!-- data-toggle-->
            
            </div>
            <div style="padding: 18px;width: 100%;display: inline-flex;">
                 <div class="" style="padding-right: 15px;">                                    
                   <input type="text" name="search-name" class="form-control" placeholder="Tên Đầy Đủ" id="search-name" >
                 </div>  
                 <div class="" style="padding-right: 15px;">
                   <input type="text" name="search-email" class="form-control" placeholder="Email" id="search-email">
                 </div>
                 <div class="" style="padding-right: 15px;">
                  <input type="text" name="search-email" class="form-control" placeholder="Email" id="search-email">
                 </div>
                 <div style="flex: none;">
                   
                    <button type="button" class="btn btn-info btn-flat">Tìm kiếm</button>
                 </div>
            </div>
            
            
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Id</th>
                  <th>Học và tên</th>
                  <th>Tên tài khoản</th>
                  <th>Password</th>
                  <th>email</th>
                  <th>phone</th>
                  <th>status</th>
                  <th>Thao tác</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                  <td>Trident</td>
                  <td>Internet
                    Explorer 4.0
                  </td>
                  <td>Win 95+</td>
                  <td> 4</td>
                  <td>Internet
                    Explorer 4.0
                  </td>
                  <td>0935040573</td>
                  <td>Win 95+</td>
                  <td> 
                    <button type="button" class="btn btn-primary">Primary</button>
                    <button type="button" class="btn btn-secondary">Secondary</button>
                  </td>
                  
                </tr>
                <tr>
                  <td>Trident</td>
                  <td>Internet
                    Explorer 5.0
                  </td>
                  <td>Win 95+</td>
                  <td>5</td>
                 <td>Internet
                    Explorer 4.0
                  </td>
                  <td>0935040573</td>
                  <td>Win 95+</td>
                  <td> 
                    <button type="button" class="btn btn-primary">Primary</button>
                    <button type="button" class="btn btn-secondary">Secondary</button>
                  </td>
                </tr>
                <tr>
                  <td>Trident</td>
                  <td>Internet
                    Explorer 5.5
                  </td>
                  <td>Win 95+</td>
                  <td>5.5</td>
                  <td>Internet
                    Explorer 4.0
                  </td>
                  <td>0935040573</td>
                  <td>Win 95+</td>
                  <td> 
                    <button type="button" class="btn btn-primary">Primary</button>
                    <button type="button" class="btn btn-secondary">Secondary</button>
                  </td>
                </tr>
                
                </tbody>
                
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
  </section>   
    </div>
@endsection