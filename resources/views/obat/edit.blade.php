@extends('layouts.template')

@section('content')

<div class="main-content">
    <section class="section">

        <div class="section-header">
            {{-- <h1>{{ $modul }}</h1> --}}
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Edit Data Obat</a></div>
                {{-- <div class="breadcrumb-item"><a href="{{ url('home') }}">{{ $modul }}</a></div> --}}
            </div>
        </div>

        <div class="section-body">
            <div class="card">
                <div class="card-body">
                    <form action="{{route('obat.update', $obat->id)}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="nama">Nama Obat</label>
                            <input type="text" class="form-control" id="nama" placeholder="Nama Obat" value="{{old('nama', $obat->nama)}}" name="nama" required>
                        </div>
                        <div class="form-group">
                            <label for="jumlah">Jumlah</label>
                            <input type="number" class="form-control number" id="jumlah" placeholder="Jumlah Obat" value="{{old('jumlah', $obat->jumlah)}}" name="jumlah" required>
                        </div>
                        <div class="form-group">
                            <label for="satuan">Satuan</label>
                            <input type="text" class="form-control" id="satuan" placeholder="Buah / Strip" value="{{old('satuan', $obat->satuan)}}" name="satuan" required>
                        </div>

                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>

    </section>
</div>


@endsection