@extends('layouts.sbadmin')
@section('header')
<link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
@endsection

@section('footer')
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
<script type="text/javascript">
$('#opd').select2({
      placeholder : 'Select Dinas',
      allowClear :true
});
</script>

@endsection
@section('content')
<div class="row">
    <div class="col-md-6">
        <form action="{{route('stugas.lpaket')}}">
        <div class="input-group mb-3">
        <input value="{{Request::get('keyword')}}" type="text" class="form-control col-md-10" name="keyword" placeholder="Cari Nama Pekerjaan">
          <div class="input-group-append">
            <button type="submit"  class="btn btn-primary"><i class="fas fa-search fa-sm"></i></button>
          </div>
        </div>
        </form>
    </div>
</div>

    

  <div class="card shadow mb-4">
    <!-- Card Header - Accordion -->
    <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
      <h6 class="m-0 font-weight-bold text-primary">Daftar Paket</h6>
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
    
<table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">No</th>
        <th scope="col">SKPD</th>
        <th scope="col">Nama Pekerjaan</th>
        <th scope="col">Pagu</th>
        <th scope="col">Tahun Anggaran</th>
    </thead>
    <tbody>
        @foreach ($usulan as $usul)
      <tr>
            <td>{{$loop->iteration}}</td>
            <td>
              @foreach ($opd as $opds)
              @if ($usul->id_opd == $opds->id)
              {{$opds->opd}}
              @endif 
              @endforeach
            </td>
            <td><a href="{{route('stugas.view',[$usul->id])}}">{{$usul->namapaket}}</a></td>
            <td>Rp.{{number_format($usul->pagu,2)}}</td>
            <td>{{$usul->ta}}</td>
      </tr>
      @endforeach
    </tbody>
    <tfoot>
        <tr>
        <td colspan=10>{{$usulan->appends(request::all())->links()}}</td>
        </tr>
      </tfoot>
  </table>
<a href="{{route('stugas.index')}}" class="btn btn-primary btn-sm"><i class="fa fa-arrow-circle-left fa-fw fa-sm"></i>Kembali</a>
</div>
</div>
</div>
@endsection