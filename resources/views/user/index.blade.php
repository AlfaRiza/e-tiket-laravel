@extends('layouts.index')

@section('title','E-tiket')
@section('content')
<h1 class="h3 mb-4 text-gray-800">{{ $data['title'] }}</h1>
<div class="row">
    <div class="col-6">
        <div class="card" style="width: 18rem;">
            <img src="{{ Storage::url($data['image']) }}" class="card-img-top" alt="...">
            </div>
    </div>
    <div class="col-6">
        <div class="card" style="width: 18rem;">
            <div class="card-body">
              <h5 class="card-title">{{ Auth::user()->username }}</h5>
              <h6 class="card-subtitle mb-2 text-muted">{{ Auth::user()->name }}</h6>
              <p class="card-text">{{ Auth::user()->email }}</p>
              <p class="card-text">{{ Auth::user()->phone }}</p>
              <p class="card-text">{{ $menu[0]['menu'] }}</p>
            </div>
          </div>
    </div>
</div>
@endsection