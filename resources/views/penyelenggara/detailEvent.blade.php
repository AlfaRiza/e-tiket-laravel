@extends('layouts.index')

@section('title','E-tiket')
@section('content')
<h1 class="h3 mb-4 text-gray-800">{{ $data['title'] }}</h1>

    <div class="row">
        <div class="col-4">
            <div class="card" style="width: 16rem;">
                <img src="{{ Storage::url($event['image']) }}" class="card-img-top" alt="...">
                </div>
        </div>
        <div class="col-4">
            <div class="card" style="width: 25rem;">
                <div class="card-body">
                    <h5 class="card-title">{{ $event['nama_event'] }}</h5>
                    <h6 class="card-subtitle mb-2 text-muted">{{ $event['tempat'] }}</h6>
                <p class="card-text">{{ $event['tgl_mulai'] }} <br> {{ $event['waktu_mulai'] }}</p>
                    
                </div>
            </div>
        </div>
    </div>

@endsection