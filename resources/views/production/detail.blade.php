@extends('layouts.admin')

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
          <h1>Detail Produksi</h1>
        </div>

        <div class="section-body">

            <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-body">
                    @php
                        $uniqueData = collect([]);
                    @endphp

                    @foreach($data as $d)
                        @php
                            $key = $d['kode_produksi'] . '-' . $d['product_id'] . '-' . $d['qty_product'] . '-' . $d['employee_id'];
                        @endphp

                        @if (!$uniqueData->has($key))
                            {{-- Tampilkan data yang pertama kali muncul --}}
                            <h4 style="margin-bottom: 10px; color: #6777ef;">Kode Produksi - {{ $d['kode_produksi'] }}</h4>
                            <hr>
                            <p style="margin-bottom: 5px;"><b>Nama Produk : </b>{{ $d->product->nama }}</p>
                            <p style="margin-bottom: 5px;"><b>Jumlah Produksi : </b>{{ $d['qty_product'] }} pcs</p>
                            <p style="margin-bottom: 5px;"><b>Bahan Baku : </b></p>
                            <ul>
                                @foreach($data as $material)
                                    @if ($material['kode_produksi'] == $d['kode_produksi'])
                                        <li>{{ $material->material->nama }}  ({{ $material['qty_material'] }} pcs)</li>
                                    @endif
                                @endforeach
                            </ul>
                            <p style="margin-bottom: 5px;"><b>Karyawan Produksi : </b>{{ $d->employee->nama }}</p>
                            <p style="margin-bottom: 5px;"><b>Tanggal Produksi : </b>{{ tanggal_indonesia($d->created_at) }}</p>

                            {{-- Tambahkan ke koleksi data unik --}}
                            @php
                                $uniqueData->put($key, true);
                            @endphp
                        @endif
                    @endforeach



                    </div>
                </div>
            </div>

    </section>
</div>
@endsection
