@extends('layouts.sbadmin')

@section('header')
<link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" /> 
@endsection

@section('footer')
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
<script type="text/javascript">
$('#tugas').select2({
      placeholder : 'Cari..',
      allowClear :true
});
$('#usulan').select2({
      placeholder : 'Cari..',
      allowClear :true
});
</script>
<script type="text/javascript">

    $(document).ready(function() {

      $(".btn-primary").click(function(){ 
          var html = $(".clone").html();
          $(".increment").after(html);
      });

      $("body").on("click",".btn-danger",function(){ 
          $(this).parents(".control-group").remove();
      });

    });

</script>  
@endsection

@section('content')

    <div class="col-md-8">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Edit Data Pembuktian</h6>
            </div>
            <div class="card-body">
                @if (session('status'))
                <div class="alert alert-success">
                    {{session('status')}}
                </div>
                @endif

            <form action="{{route('pembuktian.update',[$pembuktian->id])}}" enctype="multipart/form-data" method="POST" class="bg-white shadow-sm p-3">
            @csrf
            <input type="hidden" name="_method" value="PUT">
            <div class="row">
                <div class="col-6">
                    <label for="">No Pembuktian</label>
                <input type="text" class="form-control" name="nopembuktian" value="{{$pembuktian->nopembuktian}}" placeholder="No Pembuktian...">
                </div>
                <div class="col-4">
                    <label for="">Tanggal Pembuktian</label>
                <input type="date" class="form-control" name="tglpembuktian" value="{{$pembuktian->tglpembuktian}}">
                </div>
            </div><br>
            <div class="row">
                <div class="col-10">
                    <label for="">Surat Tugas</label>
                    <select name="id_tugas" id="tugas" class="form-control">
                        @foreach ($tugas as $t)
                    <option @if ($t->id == $pembuktian->id_tugas) selected @endif value="{{$t->id}}">{{$t->notugas}} | {{$t->usulan->namapaket}} | {{$t->usulan->ta}}</option>
                        @endforeach
                    </select>
                </div>
            </div><br>
            <div class="row">
                <div class="col-10">
                    <label for="">Upload Dokumen Pembuktian</label>
                    <input type="file" name="file_pembuktian" class="form-control" placeholder="File Pembuktian Pdf...">
                    <small>*kosongkan jika tidak merubah file</small>
                </div>
            </div><br>
            <div class="row">
                <div class="col-10">
                        <label for="">Upload Dokumentasi Pembuktian</label>
                        <div class="input-group control-group increment" >
                        <input type="file" class="form-control" name="dokumentasi[]">
                        <div class="input-group-btn">
                            <button class="btn btn-primary " type="button"><i class="fa fa-plus-circle fa-fw fa-sm"></i></button>
                        </div>
                        </div>
                        <small>*kosongkan jika tidak merubah file</small>
                        <div class="clone invisible">
                            <div class="control-group input-group" style="margin-top:10px">
                              <input type="file" name="dokumentasi[]" class="form-control">
                              <div class="input-group-btn"> 
                                <button class="btn btn-danger" type="button"><i class="far fa-minus-square fa-fw fa-sm"></i></button>
                              </div>
                            </div>
                          </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-save fa-fw fa-sm"></i>Simpan</button>
            <a href="{{route('pembuktian.index')}}" class="btn btn-primary btn-sm"><i class="fa fa-arrow-circle-left fa-fw fa-sm"></i>Kembali</a>    
        </form>
            </div>
        </div>
    </div>

@endsection
