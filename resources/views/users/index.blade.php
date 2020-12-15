@extends('layouts.sbadmin')
@section('header')
<link href="{{asset('public/sbadmin/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
@endsection

@section('footer')
<script src="{{asset('public/sbadmin/vendor/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('public/sbadmin/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('public/sbadmin/js/demo/datatables-demo.js')}}"></script>
@endsection
@section('content')

<div class="row">
    <div class="col-md-12 text-right">
    <a href="{{route('users.create')}}" class="d-none d-sm-inline-block btn btn-primary btn-sm shadow-sm"><i class="fa fa-plus-circle fa-sm text-white-50"></i> Tambah User</a>
    </div> 
</div><br>

<div class="card shadow mb-4">
    <!-- Card Header - Accordion -->
    <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
      <h6 class="m-0 font-weight-bold text-primary">Data User</h6>
    </a>

    <!-- Card Content - Collapse -->
    <div class="collapse show" id="collapseCardExample">
      <div class="card-body">

    @if(session('status'))
      <div class="alert alert-success">
        {{session('status')}}
      </div>
    @endif 
  
    @if(session('Status'))
      <div class="alert alert-danger">
      {{session('Status')}}
    </div>
    @endif
<div class="table-responsive">    
<table class="table table-striped" id="dataTable">
    <thead>
      <tr>
        <th scope="col">Username</th>
        <th scope="col">Nama</th>
        <th scope="col">Email</th>
        <th scope="col">Role</th>
        <th scope="col">Status</th>
        <th scope="col">Aksi</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($user as $user)
      <tr>
            <td>{{$user->username}}</td>
            <td><a href="{{route('users.show',[$user->id])}}">{{$user->name}}</a></td>
            <td>{{$user->email}}</td>
            <td>
            <span class="badge badge-primary">{{($user->roles)}}</span>
            </td>
            <td>
                @if ($user->status == 'ACTIVE')
                <span class="badge badge-info">{{$user->status}}</span>
                @else 
                <span class="badge badge-warning">{{$user->status}}</span>
                @endif
            </td>
          <td><a href="{{route('users.edit',[$user->id])}}" class="btn btn-primary btn-sm">Edit</a> 
          <form onsubmit="return confirm('Apakah Anda Yakin Ingin Menghapus?')" class="d-inline" action="{{route('users.destroy',[$user->id])}}" method="POST">
          @csrf
          <input type="hidden" name="_method" value="DELETE">
          <input type="submit" value="Delete" class="btn btn-danger btn-sm">
          </form>
            </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
</div>
</div>
</div>
@endsection