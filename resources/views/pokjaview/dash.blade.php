@extends('layouts.sbadmin')

@section('content')

  <div class="row">
    <div class="col-xl-6 col-md-6 mb-4">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-s font-weight-bold text-primary text-uppercase mb-1">Jumlah Paket</div>
            <div class="h6 mb-0 font-weight-bold text-gray-800">{{$tugas}} PAKET</div>
            </div>
            <div class="col-auto">
              <i class="fa fa-bar-chart fa-2x text-gray-300"></i>
            </div>
          </div>
        <a href="{{route('pokjaview.daftarpaket')}}" class="text-xs font-weight-bold text-primary mb-1">Selengkapnya..</a>
        </div>
      </div>
    </div>

    <div class="col-xl-6 col-md-6 mb-4">
      <div class="card border-left-info shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-s font-weight-bold text-info text-uppercase mb-1">Jumlah Honor</div>
              <div class="h6 mb-0 font-weight-bold text-gray-800">Rp.20.000.000</div>
            </div>
            <div class="col-auto">
              <i class="fa fa-bar-chart fa-2x text-gray-300"></i>
            </div>
          </div>
          <a href="#" class="text-xs font-weight-bold text-info mb-1">Selengkapnya..</a>
        </div>
      </div>
    </div>
</div>
  
<div class="row">
    <div class="col-xl-7 col-lg-7">
        <div class="card shadow h-100 py-2">
          <div class="card-body">
          <div id="container3"></div>
          </div>
      </div>
    </div>
  
  <div class="col-xl-5 col-lg-7">
    <div class="card shadow h-100 py-2">
      <div class="card-body">
      <div id="container"></div>
      </div>
    </div>
  </div>
</div><br>

<div class="row">
  <div class="col-12">
    <div class="card shadow h-100 py-2">
      <div class="card-body">
      <div id="container1"></div>
      </div>
    </div>
  </div>
</div><br>

<div class="row">
  <div class="col-12">
    <div class="card shadow h-100 py-2">
      <div class="card-body">
      <div id="container2"></div>
      </div>
    </div>
  </div>
</div>

<br>
@endsection
