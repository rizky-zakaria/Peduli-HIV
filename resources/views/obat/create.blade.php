@extends('layouts.template')

@section('content')

<div class="main-content">
    <section class="section">

        <div class="section-header">
            {{-- <h1>{{ $modul }}</h1> --}}
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Tambah Data Obat</a></div>
                {{-- <div class="breadcrumb-item"><a href="{{ url('home') }}">{{ $modul }}</a></div> --}}
            </div>
        </div>

        <div class="section-body">
            <div class="card">
                <div class="card-body">
                    <form action="{{route('obat.store')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="nama">Nama Obat</label>
                            <input type="text" class="form-control" id="nama" placeholder="Nama Obat" name="nama" required>
                        </div>
                        <div class="form-group">
                            <label for="jumlah">Jumlah</label>
                            <input type="number" class="form-control number" id="jumlah" placeholder="Jumlah Obat" name="jumlah" required>
                        </div>
                        <div class="form-group">
                            <label for="satuan">Satuan</label>
                            <input type="text" class="form-control" id="satuan" placeholder="Buah / Strip" name="satuan" required>
                        </div>

                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>

    </section>
</div>


@endsection