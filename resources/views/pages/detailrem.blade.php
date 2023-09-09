@extends('components.direktur')

@section('content')

@if(session('error'))
<div class="row d-flex justify-content-center">
    <div class="alert alert-danger w-60">
        <b>Opps!</b> {{session('error')}}
    </div>
</div>
@endif
<div class="d-flex justify-content-center">

   <div class="card mt-4" style="width: 40%;">
      <img src="{{$data->file_pendukung}}" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title" style="font-weight: bold">{{$data->nama}}</h5>
        <p class="card-text">{{$data->deskripsi}}</p>
      </div>
      <ul class="list-group list-group-flush">
        <li class="list-group-item">{{$data->tanggal}}</li>
      </ul>

      @if($data->status === 'pending')
      <div class="card-body">
        <a href="{{url('dasboard-direktur/list')}}/{{$data->id}}/approve" class="card-link">Approve</a>
        <a href="{{url('dasboard-direktur/list')}}/{{$data->id}}/reject"  class="card-link">Reject</a>
      </div>
      @endif
   </div>
</div>
   
@endsection
