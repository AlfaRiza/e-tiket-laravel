@extends('layouts.index')
@section('title','E-tiket')
@section('content')
<h1 class="h3 mb-4 text-gray-800">{{ $data['title'] }}</h1>

    <div class="row">
        <div class="col">
            <table class="table">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Username</th>
                    <th scope="col">Image</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Email</th>
                    <th scope="col">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($data['user'] as $u)
                  <tr>
                  <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $u->username }}</td>
                  <td> <img width="50px" src="{{ Storage::url($u->image) }}" alt="foto"> </td>
                    <td>{{ $u->name }}</td>
                    <td>{{ $u->phone }}</td>
                  <td>{{ $u->email }}</td>
                  <td>
                    <form action="{{ url('manageUser/'.$u->id) }}" method="post">
                        @method('delete')
                        @csrf
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </form>
                  </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
        </div>
    </div>
@endsection