@extends('layouts.index')

@section('title','E-tiket')
@section('content')
<h1 class="h3 mb-4 text-gray-800">{{ $data['title'] }}</h1>

    <div class="row">
        <div class="col-12">
        <form method="post" action= "{{ url('editProfile') }}" enctype="multipart/form-data">
            @method('patch')
            @csrf
            <div class="row">
            <div class="col-4">
                <div class="row">
                    <div class="col-12">
                        <div class="card" style="width: 18rem;">
                            <img src="{{ Storage::url($user[0]['image']) }}" class="card-img-top" alt="...">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="card-body" style="width: 18rem;">
                            <input type="file" name="image" class="form-control custom-file-input" id="image" placeholder="nama Event" value="{{ $user[0]['image'] }}">
                        <label for="image" name="image" class="custom-file-label"> {{ $user[0]['image'] }}</label>
                        </div>
                    </div>
                </div>
            </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="username">Username</label>
                    <input type="text" name="username" class="form-control" id="username" placeholder="Username" value="{{ $user[0]['username'] }}">
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" name="nama" class="form-control" id="nama" placeholder="Nama" value="{{ $user[0]['name'] }}">
                    </div>
                    <div class="form-group">
                        <label for="no_hp">No Hp</label>
                        <input type="text" name="no_hp" class="form-control" id="no_hp" placeholder="no_hp" value="{{ $user[0]['phone'] }}">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control" id="email" placeholder="email" value="{{ $user[0]['email'] }}" readonly>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
            </form>
        </div>
    </div>

@endsection