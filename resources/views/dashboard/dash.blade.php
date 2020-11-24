@extends('layouts.sbadmin')

@section('content')

  <div class="row">
    <div class="col-xl-4 col-md-6 mb-4">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-s font-weight-bold text-primary text-uppercase mb-1">Usulan Lelang</div>
              <div class="h6 mb-0 font-weight-bold text-gray-800">{{$usulan1}}</div>
            </div>
            <div class="col-auto">
              <i class="fa fa-bar-chart fa-2x text-gray-300"></i>
            </div>
          </div>
          <a href="{{route('usulan.index')}}" class="text-xs font-weight-bold text-primary mb-1">Selengkapnya..</a>
        </div>
      </div>
    </div>

    <div class="col-xl-4 col-md-6 mb-4">
      <div class="card border-left-info shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-s font-weight-bold text-info text-uppercase mb-1">Proses Lelang</div>
              <div class="h6 mb-0 font-weight-bold text-gray-800">{{$tugas}}</div>
            </div>
            <div class="col-auto">
              <i class="fa fa-bar-chart fa-2x text-gray-300"></i>
            </div>
          </div>
          <a href="{{route('stugas.index')}}" class="text-xs font-weight-bold text-info mb-1">Selengkapnya..</a>
        </div>
      </div>
    </div>
  

  <div class="col-xl-4 col-md-6 mb-4">
    <div class="card border-left-warning shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-s font-weight-bold text-warning text-uppercase mb-1">Lelang Selesai</div>
            <div class="h6 mb-0 font-weight-bold text-gray-800">{{$hasil}}</div>
          </div>
          <div class="col-auto">
            <i class="fa fa-bar-chart fa-2x text-gray-300"></i>
          </div>
        </div>
        <a href="{{route('hasillelang.index')}}" class="text-xs font-weight-bold text-warning mb-1">Selengkapnya..</a>
      </div>
    </div>
  </div>
</div>
  
<div class="row">
    <div class="col-xl-7 col-lg-7">
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Jumlah Pagu Berdasarkan Kategori Pengadaan</h6>
        </div>
          <div class="card-body">
          <div id="container3"></div>
          </div>
      </div>
    </div>
  
  <div class="col-xl-5 col-lg-7">
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Berdasarkan Sumber Dana</h6>
      </div>
      <div class="card-body ">
      <div id="container"></div>
      </div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-12">
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Jumlah Paket Berdasarkan Kategori Pengadaan</h6>
      </div>
      <div class="card-body">
      <div id="container1"></div>
      </div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-12">
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Berdasarkan SKPD</h6>
      </div>
      <div class="card-body">
      <div id="container2"></div>
      </div>
    </div>
  </div>
</div>

<br>
@endsection
@section('footer')
          <script src="https://code.highcharts.com/highcharts.js"></script>
          <script src="https://code.highcharts.com/modules/exporting.js"></script>
          <script src="https://code.highcharts.com/modules/export-data.js"></script>
<script type="text/javascript"> 
Highcharts.chart('container3', {
    chart: {
        type: 'bar'
        //height: 200+50
    },
    title: {
        text: ''
    },
    subtitle: {
        text: ''
    },
    xAxis: {
        categories: {!!json_encode($datakategori)!!},
        title: {
            text: null
        }
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Nilai Pagu',
            align: 'high'
        },
        labels: {
            overflow: 'justify'
        }
    },
    tooltip: {
        valueSuffix: ' '
    },
    
    plotOptions: {
        bar: {
            dataLabels: {
                enabled: true
            }
        }
    },
   
    credits: {
        enabled: false
    },
    series: [{
        name: 'Jumlah Nilai Pagu',
        data: {!!json_encode($pagu)!!},
        color: '#8085e9'
    }]   
});
        
Highcharts.chart('container1', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: ''
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.y} Paket</b>'
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                enabled: true,
                format: '<b>{point.name}</b>: {point.y} Paket'
            }
        }
    },
    credits: {
    enabled: false
  },
    series: [{
        name: 'Kategori',
        colorByPoint: true,
        data: {!!json_encode($data)!!}
    }]
});

Highcharts.chart('container2', {
    chart: {
        type: 'bar',
        height: 700+100
        
    },
    title: {
        text: ''
    },
    subtitle: {
        text: ''
    },
    xAxis: {
        categories: {!!json_encode($dataopd)!!},
        title: {
            text: null
        }
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Jumlah Paket Per Dinas',
            align: 'high'
        },
        labels: {
            overflow: 'justify'
        }
    },
    tooltip: {
        valueSuffix: ''
    },
    plotOptions: {
        bar: {
            dataLabels: {
                enabled: true
            }
        }
    },
    legend: {
        layout: 'vertical',
        align: 'right',
        verticalAlign: 'top',
        x: -40,
        y: 100,
        floating: true,
        borderWidth: 1,
        backgroundColor:
            Highcharts.defaultOptions.legend.backgroundColor || '#FFFFFF',
        shadow: true
    },
    credits: {
        enabled: false
    },
    series: [{
        name: 'Jumlah Paket',
        data: {!!json_encode($total)!!}
    },
    {
      name : 'Jumlah Pagu',
      data : {!!json_encode($totalpagu)!!},
      color: '#8085e9'
    },
    {
      name : 'Jumlah Hps',
      data : {!!json_encode($totalhps)!!},
      color: '#f15c80'
    
    }]
});



Highcharts.chart('container', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: 0,
        plotShadow: false
    },
    title: {
        text: 'Sumber Dana',
        align: 'center',
        verticalAlign: 'middle',
        y: 60
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    accessibility: {
        point: {
            valueSuffix: '%'
        }
    },
    plotOptions: {
        pie: {
            dataLabels: {
                enabled: true,
                distance: -50,
                style: {
                    fontWeight: 'bold',
                    color: 'white'
                }
            },
            startAngle: -90,
            endAngle: 90,
            center: ['50%', '75%'],
            size: '110%'
        }
    },
    credits: {
        enabled: false
    },
    series: [{
        type: 'pie',
        name: 'Persentase',
        innerSize: '50%',
        data: {!!json_encode($datadana)!!}
    }]
});
    </script>  
          @endsection