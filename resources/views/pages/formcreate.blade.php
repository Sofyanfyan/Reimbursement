@extends('components.direktur')

@section('content')
@if(session('error'))
<div class="row d-flex justify-content-center">
    <div class="alert alert-danger w-60">
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

        <form class="form-horizontal" action="{{ route('dasboard-direktur-create') }}" method="post">
            @csrf
            <div class="card-body">

                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="nama" id="inputEmail3" placeholder="Nama">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-10">
                        <input name="password" type="password" class="form-control" id="inputPassword3"
                            placeholder="Password">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Jabatan</label>
                    <div class="col-sm-10">
                        <div class="form-group">
                            <select name="jabatan" class="form-control select2" style="width: 100%;">
                                <option selected="selected">STAFF</option>
                                <option>FINANCE</option>
                                <option>DIREKTUR</option>
                            </select>
                        </div>
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