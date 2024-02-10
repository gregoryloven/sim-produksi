@extends('layouts.admin')

@push('css')
<style>
    #myTable td {text-align: center; vertical-align: middle;}
</style>
@endpush

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
          <h1>Laporan Produksi</h1>
        </div>

        <div class="section-body">

            <div class="card">
                <div class="card-header">
                    <h4>Laporan Produksi</h4>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('laporan.searchByDate') }}">
                        @csrf
                        <div class="form-group">
                            <label for="datepicker">Pilih Tanggal:</label>
                            <input type="text" id="datepicker" name="selected_date" class="form-control" placeholder="Pilih tanggal" required>
                            @error('selected_date')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Tombol Cari -->
                        <button type="submit" class="btn btn-primary">Cari</button>
                    </form>
            </div>

        <div>
    </section>
<div>

@endsection

@section('javascript')
<script>

    flatpickr("#datepicker", {
        dateFormat: "Y-m-d",
        // Tambahan konfigurasi lain sesuai kebutuhan
    });
</script>

@endsection
