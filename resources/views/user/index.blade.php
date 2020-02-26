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
</div>
@endsection