@extends('layouts.index')

@section('title','E-tiket')
@section('content')
<h1 class="h3 mb-4 text-gray-800">{{ $data['title'] }}</h1>

    <div class="row">
        <div class="col-12">
            @if(session('status'))
                <div class="alert alert-success">
                {{session('status')}}
                </div>
        @endif
        </div>
        @if ($event == null)
            <div class="col-4 offset-4">
                <h2 class="text-center">Opps</h2>
                <p class="text-muted">Anda belum pernah mengikuti event</p>
            <img src="{{ Storage::url('assets/gallery/error.png') }}" alt="">
            </div>
        @endif
        @php
            foreach($event as $e) :
        @endphp
            <div class="col-3">
                <div class="card" style="width: 18rem;">
                <img src="{{ Storage::url($e['image']) }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{ $e['nama_event'] }}</h5>
                        <p class="card-text">{{ $e['tgl_mulai'] }}</p>
                        <a href="{{ url('detailMyEvent/'.$e['id_event']) }}" class="btn btn-primary">Detail</a>
                    </div>
                </div>
            </div>
        @php
            endforeach;
        @endphp
    </div>

@endsection