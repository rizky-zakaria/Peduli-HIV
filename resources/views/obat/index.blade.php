@extends('layouts.template')

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            {{-- <h1>{{ $modul }}</h1> --}}
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Obat - Obatan</a></div>
                {{-- <div class="breadcrumb-item"><a href="{{ url('home') }}">{{ $modul }}</a></div> --}}
            </div>
        </div>
        <div class="section-body">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h4>Obat - Obatan</h4>
                    @if (Auth::user()->role === 'dikes')
                    <a href="{{ route('obat.create') }}" class="btn btn-primary float-right">Tambah</a>
                    @endif
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped" id="table-1">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Obat</th>
                                    <th>Jumlah</th>
                                    <th>Satuan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $obat)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$obat->nama}}</td>
                                    <td>{{$obat->jumlah}}</td>
                                    <td>{{$obat->satuan}}</td>
                                    <td>
                                        <form action="{{ route('obat.destroy', $obat->id) }}" method="POST">
                                            <a class="btn btn-warning" href="{{route('obat.edit', $obat->id)}}"><i
                                                    class="fa fa-edit"></i> Edit</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger"><i
                                                    class="fa fa-trash"></i> Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Obat</th>
                                    <th>Jumlah</th>
                                    <th>Satuan</th>
                                    <th>Aksi</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <div style="width: 100%;height: 100%">
                        <canvas id="myChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection