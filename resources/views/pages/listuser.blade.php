@extends('components.direktur')

@section('content')

@if(session('error'))
<div class="row d-flex justify-content-center">
    <div class="alert alert-danger w-60">
        <b>Opps!</b> {{session('error')}}
    </div>
</div>
@endif

<div class="card card-success" style="width: 70%; margin: auto; margin-top: 40px">
   <div class="card-header">
       <h3 class="card-title">Daftar Users</h3>
   </div>
   <!-- /.card-header -->
   <!-- form start -->
   <div class="h-80">
      
            <table class="table mx-2">
               <thead>
                 <tr>
                   <th scope="col">NIP</th>
                   <th scope="col">Nama</th>
                   <th scope="col">Jabatan</th>
                   <th scope="col">Tanggal Gabung</th>
                   <th scope="col">Action</th>
                 </tr>
               </thead>
               <tbody>

               @foreach($data as $el)
                 <tr>
                   <th scope="row">#{{$el->nip}}</th>
                   <td>{{ $el->nama }}</td>
                   <td>{{ $el->jabatan }}</td>
                   <td>{{ date("d/m/Y", strtotime($el->created_at))}}</td>
                   <td>
                      <div class="d-flex flex-row">
                        
                        <a type="button" href="/dasboard-direktur/users/update/{{$el->nip}}" class="btn btn-primary btn-sm active" style="margin-right: 5px; height: 2.3em;">Update</i></a>
                        

                        <form method="post" action="{{route('dasboard-direktur-users-delete.destroy',$el->id)}}">
                           @method('delete')
                           @csrf
                           
                           <button type="submit" class="btn btn-danger btn-sm">Delete</button></td>
                        </form>
                     </div>
                  </tr>
               @endforeach
               </tbody>
            </table>
</div>
</div>


@endsection
