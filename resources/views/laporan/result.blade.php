@extends('layouts.admin')

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
          <h1>Hasil Pencarian Laporan Produksi</h1>
        </div>

        <div class="section-body">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    Hasil Pencarian Laporan Produksi {{$formattedDate}}
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                    @if($results->count() > 0)
                        <table class="table table-bordered" style="text-align: center;" id="myTable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Produksi</th>
                            <th>Produk</th>
                            <th>Jumlah Produksi</th>
                            <th>Tanggal Produksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $i = 0; @endphp
                        @foreach($results as $result)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $result->kode_produksi }}</td>
                            <td>{{ $result->product->nama }}</td>
                            <td>{{ $result->qty_product }}</td>
                            <td>{{ tanggal_indonesia($result->created_at) }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @else
                <p>Tidak ada data yang ditemukan untuk tanggal tersebut.</p>
                @endif
            </div>
        </div>
    </section>
</div>
@endsection
