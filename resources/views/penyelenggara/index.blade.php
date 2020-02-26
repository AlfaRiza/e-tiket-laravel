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
        @php
            foreach ($event as $e) :
        @endphp
            <div class="col-3">
                <div class="card" style="width: 16rem;">
                <img src="{{ Storage::url($e->image) }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{ $e->nama_event }}</h5>
                        <p class="card-text">{{ $e->tgl_mulai }}</p>
                    <a href="{{ url('detailEvent/'.$e->id) }}" class="btn btn-primary">Detail</a>
                    <a href="{{ url('editEvent/'.$e->id) }}" class="btn btn-success">Edit</a>
                    <form action="{{ url('hapusEvent/'.$e->id) }}" method="post">
                        @method('delete')
                        @csrf
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </form>
                    </div>
                </div>
            </div>
        @php
            endforeach;
        @endphp
    </div>

@endsection