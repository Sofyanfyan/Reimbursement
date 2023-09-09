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
                   <th scope="col">No.</th>
                   <th scope="col">Tanggal</th>
                   <th scope="col">Reimbursement</th>
                   <th scope="col">Status</th>
                   <th scope="col">Action</th>
                 </tr>
               </thead>
               <tbody>

               @foreach($data as $key=>$el)
                 <tr>
                   <td>{{ $key+1 }}</td>
                   <td>{{ $el->tanggal }}</td>
                   <td>{{ $el->nama }}</td>
                     @if ($el->status === 'pending')
                   <td style="color:darkgoldenrod; font-weight:bold">{{ $el->status }}</td>
                     @endif
                     @if ($el->status === 'approve')
                   <td style="color:green; font-weight:bold">{{ $el->status }}</td>
                     @endif
                     @if ($el->status === 'reject')
                   <td style="color:red; font-weight:bold">{{ $el->status }}</td>
                     @endif
                   <td>

                        
                     <div class="d-flex flex-row">
                        
                        <a type="button" href="/dasboard-direktur/list/{{$el->id}}" class="btn btn-primary btn-sm active" style="margin-right: 5px; height: 2.3em;">Detail</i></a>
                        
                     </div>
                  </tr>
               @endforeach
               </tbody>
            </table>
</div>
</div>


@endsection
