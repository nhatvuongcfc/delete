

@extends('templates.admin')
@section('content')
<div class="row">
<div class="row col-sm-12">
   <div class="col-sm-12">
      <h1 style="display: inline-block;">Bảng điểm</h1>
      <ol class="breadcrumb float-xs-right float-sm-right">
         <li class="breadcrumb-item"><a href="resources/index3.html">Home</a></li>
         <li class="breadcrumb-item active">Bảng điểm</li>
      </ol>
   </div>
</div>
<div class="col-sm-12 row">
   <div class="col-sm">
      <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
         <input  type="text" class="w-100 search_tran h-38 form-control bg-light border-0 small" placeholder="Search for..."  onkeyup="if ( event.keyCode == 27 ) this.value=''" >
         <div class="list-search">
            <ul class="dropdown-menu ul_list-search  pos-relative" >
            </ul>
         </div>
      </form>
   </div>
   <div class="  col-sm">
      {{-- <form action="{{ route('import.transcripts') }}" method="POST" id="form_import" enctype="multipart/form-data">
         @csrf
         <div class="custom-file">
            <input  name="import_file" type="file" class="custom-file-input" id="customFile" accept=".xlsx, .xls, .csv, .ods">
            <label  class="custom-file-label"  for="customFile" >Choose file</label>
            <button type="submit">Submit</button>
         </div>
     </form> --}}
      <button type="button" class="btn btn-success" data-toggle="modal" data-target="#add_modal"><i  class="fas fa-plus-circle"></i> <span>Add </span></button>
      <button class="btn btn-danger" data-toggle="modal" onclick="delete_mul()"><i  class="fas fa-minus-circle"></i> <span>Delete </span></button>
      <button href="#addEmployeeModal" class="btn btn-warning" onclick="click_import_file()" data-toggle="modal"><i  class="fas fa-cloud-upload-alt"></i> <span>Import </span></button>
      <a href="{{ route('export.transcripts') }}" class="btn btn-primary" ><i class="fas fa-cloud-download-alt"></i> <span>Export </span></a>
   </div>
   <div class="col-sm-12">
      <div class="table-responsive col-sm-12 table tableCustomer">
         <table class="table">
            <thead>
               <tr>
                  <th>
                     <div class="custom-control  custom-checkbox custom-control-inline">
                        <input type="checkbox" class=" checkbox custom-control-input" id="selectAll">
                        <label class="custom-control-label" for="selectAll"></label>
                      </div>
                  </th>
                  <th>STT</th>
                  <th>Mã bảng điểm</th>
                  <th>Tên môn học</th>
                  <th>Lớp</th>
                  <th>Actions</th>
               </tr>
            </thead>
            <tbody class="table_transcript">
               @foreach ($transcripts as $key =>$value)
               <tr>
                  <td>
                     <div class="custom-control  custom-checkbox custom-control-inline">
                        <input type="checkbox" name="options[]" class=" checkbox_some custom-control-input" id="{{$value->id_transcript}}">
                        <label class="custom-control-label" for="{{$value->id_transcript}}"></label>
                      </div>
                  </td>
                  <td >{{$key +1}}</td>
                  <td >{{$value->id_transcript}}</td>
                  <td >{{$value->ten_mon_hoc}}</td>
                  <td >{{$value->name_class}}</td>
                  <td>
                     <a href="#"  onclick="show_modal_update({{$value->id_transcript}})"><i class="fas fa-edit " style="color: #ffc720" data-toggle="tooltip" title="Edit"></i></a>
                     <a href="#" ><i  class="fas fa-trash blue" style="color: #f5564b" onclick="delete_one({{$value->id_transcript}})" data-toggle="tooltip" title="Delete"></i></a>
                  </td>
                  </tr 
                  @endforeach
            </tbody>
         </table>
         {{ $transcripts->links() }}
      </div>
   </div>
</div>
{{-- MODAL ADD --}}
<div class="modal fade" id="add_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="modal-body">
            <div class="messenger_add"></div>
            <form id="form_add">
               <div class="form-group">
                  <label for="">Tên môn học</label>
                  <input type="text" id='ten_mon_hoc' name='ten_mon_hoc' class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Tên môn học" required >
               </div>
               <div class="form-group">
                  <label for="">Email</label>
                  <input type="email" id='email' name='ten_mon_hoc' class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email" required >
               </div>
               <div class="form-group">
                  <label for="">Lớp</label>
                  <select class="custom-select">
                     @foreach ($clases as $class)
                     <option class='id_class' value="{{ $class->id_class }}">{{ $class->name_class }}</option>
                     @endforeach  
                  </select>
               </div>
            </form>
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-success" onclick="add_modal()">Save </button>
         </div>
      </div>
   </div>
</div>
{{-- MODAL UPDATE --}}
<div class="modal fade" id="update_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Update Transcript</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="modal-body">
            <div class="messenger_update"></div>
            <form id="form_add">
               <input type="hidden" id="id_trans" value="">
               <div class="form-group">
                  <label for="">Tên môn học</label>
                  <input type="text" id='update_ten_mon_hoc' class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Tên môn học" required >
               </div>
               <div class="form-group">
                  <label for="">Lớp</label>
                  <select class="custom-select">
                  </select>
               </div>
            </form>
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-success" onclick="update_transcripts()">Save </button>
         </div>
      </div>
   </div>
</div>
{{-- MODAL IMPORT --}}
<div class="modal fade" id="import_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Import file</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="modal-body">
            <form id="form_import" enctype="multipart/form-data">
               <div class="custom-file">
                  <input  name="import_file" type="file" class="custom-file-input" id="customFile" accept=".xlsx, .xls, .csv, .ods">
                  <label  class="custom-file-label"  for="customFile" >Choose file</label>
               </div>
           </form>
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-success" onclick="import_file()">Save </button>
         </div>
      </div>
   </div>
</div>

<!-- Content Row -->
@endsection
@section('js')
<script src="{{ asset('js/transcripts.js') }}"></script>   
@endsection

