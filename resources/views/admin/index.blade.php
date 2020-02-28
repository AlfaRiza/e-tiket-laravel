@extends('layouts.index')
@section('title','E-tiket')
@section('content')
<h1 class="h3 mb-4 text-gray-800">{{ $data['title'] }}</h1>
<div class="row">
    <div class="col-xl-4 col-md-6 mb-4">
    <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
        <div class="row no-gutters align-items-center">
            <div class="col mr-2">
            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Jumlah Penyelenggara</div>
            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $jml_p }}</div>
            </div>
            <div class="col-auto">
            <i class="fas fa-fw fa-user-cog"></i>
            </div>
        </div>
        </div>
    </div>
    </div>
    <div class="col-xl-4 col-md-6 mb-4">
    <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
        <div class="row no-gutters align-items-center">
            <div class="col mr-2">
            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Jumlah Members</div>
            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $jml_m }}</div>
            </div>
            <div class="col-auto">
            <i class="fas fa-fw fa-user-check"></i>
            </div>
        </div>
        </div>
    </div>
    </div>
    
    <div class="col-xl-4 col-md-6 mb-4">
    <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
        <div class="row no-gutters align-items-center">
            <div class="col mr-2">
            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Jumlah Event</div>
            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $jml_e }}</div>
            </div>
            <div class="col-auto">
            <i class="far fa-fw fa-calendar"></i>
            </div>
        </div>
        </div>
    </div>
    </div>
    </div>
    <!-- Chart js -->
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Bar Chart</h6>
      </div>
      <div class="card-body">
        <div class="chart-bar">
          <canvas id="myBarChart" width="1000" height="280">
            
          </canvas>
        </div>
        <hr>
        Styling for the bar chart can be found in the <code>/js/demo/chart-bar-demo.js</code> file.
      </div>
      
@endsection