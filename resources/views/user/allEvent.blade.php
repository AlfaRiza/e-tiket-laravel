@extends('layouts.index')

@section('title','E-tiket')
@section('content')
<h1 class="h3 mb-4 text-gray-800">{{ $data['title'] }}</h1>

    <div class="row">
        <div class="col-12">
            @if(session('status'))
                <div class="alert alert-danger">
                {{session('status')}}
                </div>
        @endif
        </div>
        @php
            foreach($event as $e) :
        @endphp
            <div class="col-3">
                <div class="card" style="width: 18rem;">
                    <img src="{{ Storage::url($e->image) }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{ $e->nama_event }}</h5>
                        <h6 class="card-subtitle mb-2 text-muted">{{ $e->tempat }}</h6>
                <p class="card-text">{{ $e->tgl_mulai }} <br> {{ $e->waktu_mulai }}</p>
                <a href="{{ url('detailAllEvent/'.$e->id) }}" class="btn btn-primary">Detail</a>
                <a href="{{ url('Ikuti/'.$e->id) }}" class="btn btn-outline-primary">Ikuti</a>
                    </div>
                </div>
            </div>
        @php
            endforeach;
        @endphp
    </div>

@endsection