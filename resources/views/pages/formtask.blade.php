@extends('components.staff')

@section('content')
@if(session('error'))
<div class="row d-flex justify-content-center mt-3">
    <div class="alert alert-danger" style="margin:auto;">
        <b>Opps!</b> {{session('error')}}
    </div>
</div>
@endif
<!-- Horizontal Form -->
<div class="card card-success" style="width: 70%; margin: auto; margin-top: 40px">
    <div class="card-header">
        <h3 class="card-title">Horizontal Form</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <div class="h-80">

        <form class="form-horizontal" action="{{ route('create-task') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="card-body">

                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Reimbursement</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="nama" id="inputEmail3" placeholder="Nama reimbursement">
                        
                    </div>
                </div>

                     <!-- textarea -->
                     <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Deskripsi</label>
                        <div class="col-sm-10">
                           <textarea name="deskripsi" class="form-control" rows="3" placeholder="Enter ..."></textarea>
                           
                        </div>
                     </div>
                <div class="form-group row">
                  <label for="inputPassword3" class="col-sm-2 col-form-label">Tanggal</label>
                    <div class="input-group date col-sm-10" id="reservationdate" data-target-input="nearest">
                        <input name="tanggal" type="text" class="form-control datetimepicker-input" data-target="#reservationdate" placeholder="{{
                        
                        date('m/d/Y h:i:s a', time());
                        }}"/>
                        
                        <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>
                 </div>

                <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Gambar Pendukung</label>
                    <div class="col-sm-10">

                       <input type="file" name="file_pendukung" id="fileToUpload">
                     </div>
                </div>

            </div>
    <!-- /.card-body -->
    <div class="card-footer">
        <button type="submit" class="btn btn-success float-right">Create</button>
    </div>
    <!-- /.card-footer -->
    </form>
</div>
</div>


@endsection