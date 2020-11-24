@extends('layouts.sbadmin')

@section('content')

<div class="col-md-8">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit Dinas</h6>
          </div>
    <div class="card-body">

    @if (session('status'))
        <div class="alert alert-success">
            {{session('status')}}
        </div>
    @endif
    
    <form action="{{route('opd.update',[$opd->id])}}" method="POST" enctype="multipart/form-data" class="bg-white shadow-sm p-3">
    @csrf
    <input type="hidden" value="PUT" name="_method">
    <label for="">Nama Dinas</label>
    <input type="text" value="{{$opd->opd}}" name="opd" class="form-control {{$errors->first('opd') ? "is-invalid" : ""}}" placeholder="Nama Dinas">
    <div class="invalid-feedbeck">
        {{$errors->first('dinas')}}
    </div>
    <br>
    <label for="">Status</label>
    <div class="form-radio form-radio-inline">
        <input type="radio" name="status" id="ACTIVE" value="ACTIVE" {{$opd->status == "ACTIVE" ? "checked" : ""}}>
        <label for="form-radio-label" for="ACTIVE">ACTIVE</label>
    </div>
    <div class="form-radio form-radio-inline">
        <input type="radio" name="status" id="INACTIVE" value="INACTIVE" {{$opd->status == "INACTIVE" ? "checked" : ""}}>
        <label for="form-radio-label" for="INACTIVE">INACTIVE</label>
    </div><br>
    <button class="btn btn-primary btn-sm" value="submit"><i class="fa fa-save fa-sm"></i> Simpan</button>
    <a href="{{route('opd.index')}}" class="btn btn-primary btn-sm"><i class="fa fa-arrow-circle-left fa-fw fa-sm"></i>Kembali</a>
    </form>
    
@endsection