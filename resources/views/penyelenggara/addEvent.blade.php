@extends('layouts.index')

@section('title',$data['title'])
@section('content')
<h1 class="h3 mb-4 text-gray-800">{{ $data['title'] }}</h1>

    <div class="row">
        <div class="col-6">
        
            <form name="le_form" method="post" action= "{{ url('addEvent') }}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id_user" class="form-control" id="nama" value="{{ $data['id_user'] }}">
                    <div class="form-group">
                        <label for="nama_event">nama Event</label>
                        <input type="text" name="nama_event" class="form-control @error('nama_event') is-invalid @enderror" id="nama_event" placeholder="nama Event">
                        @error('nama_event')
                            <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group custom-file">
                        <input type="file" name="image" class="form-control custom-file-input @error('image') is-invalid @enderror" id="image" placeholder="nama Event">
                        <label for="image" class="custom-file-label">Image</label>
                        @error('image')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="tanggal_mulai">Tanggal Mulai</label>
                        <input type="date" name="tgl_mulai" class="form-control @error('tgl_mulai') is-invalid @enderror" id="tanggal_mulai" placeholder="Tanggal Mulai">
                        @error('tgl_mulai')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="tanggal_selesai">Tanggal Selesai</label>
                        <input type="date" name="tgl_selesai" class="form-control @error('tgl_selesai') is-invalid @enderror" id="tanggal_selesai" placeholder="Tanggal Selesai">
                        @error('tgl_selesai')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="waktu_mulai">Waktu Mulai</label>
                        <input type="time" name="waktu_mulai" class="form-control @error('waktu_mulai') is-invalid @enderror" id="waktu_mulai" placeholder="Tanggal Mulai">
                        @error('waktu_mulai')
                            <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="waktu_selesai">Waktu Selesai</label>
                        <input type="time" name="waktu_selesai" class="form-control @error('waktu_selesai') is-invalid @enderror" id="waktu_selesai" placeholder="Tanggal Selesai">
                        @error('waktu_selesai')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="tempat">Tempat</label>
                        <input type="text" name="tempat" class="form-control @error('tempat') is-invalid @enderror" id="tempat" placeholder="Tempat">
                        @error('tempat')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="kuota">Kuota</label>
                        <input type="text" name="kuota" class="form-control @error('tempat') is-invalid @enderror" id="kuota" placeholder="Kuota">
                        @error('kuota')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="biaya">Biaya</label>
                        <input type="text" name="biaya" class="form-control @error('biaya') is-invalid @enderror" id="biaya" placeholder="Biaya">
                        @error('biaya')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
    </div>

@endsection