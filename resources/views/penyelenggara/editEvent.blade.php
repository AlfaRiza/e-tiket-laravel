@extends('layouts.index')

@section('title','E-tiket')
@section('content')
<h1 class="h3 mb-4 text-gray-800">{{ $data['title'] }}</h1>

    <div class="row">
        <div class="col-12">
            <form method="post" action= "{{ url('editEvent/'.$event->id) }}" enctype="multipart/form-data">
                @method('patch')
                @csrf
                <div class="row">
                    <div class="col-12">
                        <div class="card" style="width: 18rem;">
                            <img src="{{ Storage::url($event->image) }}" class="card-img-top" alt="...">
                        </div>
                    </div>
                    <div class="col-8">
                        <div class="card-body" style="width: 18rem;">
                            <input type="file" name="image" class="form-control custom-file-input" id="image" placeholder="nama Event" value="{{ $event->image }}">
                        <label for="image" name="image" class="custom-file-label"> {{ $event->image }}</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-8">
                    <div class="form-group">
                        <label for="nama_event">nama Event</label>
                    <input type="text" name="nama_event" class="form-control" id="nama_event" placeholder="nama Event" value="{{ $event->nama_event }}">
                    </div>
                    <div class="form-group">
                        <label for="tanggal_mulai">Tanggal Mulai</label>
                        <input type="date" name="tgl_mulai" class="form-control" id="tanggal_mulai" placeholder="Tanggal Mulai" value="{{ $event->tgl_mulai }}">
                    </div>
                    <div class="form-group">
                        <label for="tanggal_selesai">Tanggal Selesai</label>
                        <input type="date" name="tgl_selesai" class="form-control" id="tanggal_selesai" placeholder="Tanggal Selesai" value="{{ $event->tgl_selesai }}">
                    </div>
                    <div class="form-group">
                        <label for="waktu_mulai">Waktu Mulai</label>
                        <input type="time" name="waktu_mulai" class="form-control" id="waktu_mulai" placeholder="Waktu Mulai" value="{{ $event->waktu_mulai }}">
                    </div>
                    <div class="form-group">
                        <label for="waktu_selesai">Waktu Selesai</label>
                        <input type="time" name="waktu_selesai" class="form-control" id="waktu_selesai" placeholder="Waktu Selesai" value="{{ $event->waktu_selesai }}">
                    </div>
                    <div class="form-group">
                        <label for="tempat">Tempat</label>
                        <input type="text" name="tempat" class="form-control" id="tempat" placeholder="Tempat" value="{{ $event->tempat }}">
                    </div>
                    <div class="form-group">
                        <label for="kuota">Kuota</label>
                        <input type="text" name="kuota" class="form-control" id="kuota" placeholder="Kuota" value="{{ $event->kuota }}">
                    </div>
                    <div class="form-group">
                        <label for="biaya">Biaya</label>
                        <input type="text" name="biaya" class="form-control" id="biaya" placeholder="Biaya" value="{{ $event->biaya }}">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                </form>
            
        </div>
    </div>

@endsection