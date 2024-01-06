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
          <h1>Tambah Produksi</h1>
        </div>

        <div class="section-body">
            <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="card-header">
                                    <h4>Formulir Produksi</h4>
                                </div>
                            </div>
                        </div>
                        <form action="{{ route('production.store') }}" method="POST">
                            @csrf
                            @if(isset($data))
                            <input type="hidden" class="form-control" value="{{$data->kode_produksi}}" name='kode_produksi'>
                            @endif
                            <div class="row">
                                <div class="col-12 col-md-4 col-lg-4 offset-md-8 offset-lg-8">
                                    <div class="form-group">
                                        <label>Karyawan</label>
                                        <select class="form-control" id='employee_id' name='employee_id' required>
                                            <option value="" disabled selected>Pilih</option>
                                                @foreach($kar as $p)
                                                <option value="{{ $p->id }}">{{ $p->nama }}</option>
                                                @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label>Produk</label>
                                        <select class="form-control" id='product_id' name='product_id' required>
                                            <option value="" disabled selected>Pilih</option>
                                            @foreach($prod as $p)
                                                <option value="{{ $p->id }}">{{ $p->nama }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 col-md-3 col-lg-3">
                                    <div class="form-group">
                                        <label>Jumlah</label>
                                        <div class="d-flex">
                                            <input type="number" class="form-control" id='qty_product' name='qty_product' min=1 required>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12 col-md-6 col-lg-6" id='row_material'>
                                    <div class="form-group">
                                        <label>Bahan Baku</label>
                                        <select class="form-control" id='material_id' name='material_id[]' required>
                                            <option value="" disabled selected>Pilih</option>
                                                @foreach($mat as $p)
                                                <option value="{{ $p->id }}">{{ $p->nama }}</option>
                                                @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 col-md-3 col-lg-3">
                                    <div class="form-group">
                                        <label>Jumlah</label>
                                        <div class="d-flex">
                                            <input type="number" class="form-control" id='qty_material' name='qty_material[]' min=1 required>
                                            <button type="button" class="btn btn-primary btn-sm ml-3 tambahButton2">Tambah</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-success" id="button" style="float: right">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>

    </section>
</div>

@endsection

@section('javascript')
<script>
$(document).ready(function () {

    // Tangani klik tombol Tambah
    // $(".tambahButton").on("click", function () {
    //     // Salin elemen dropdown yang sudah ada
    //     var clonedSelect = $("#product_id").clone();
    //     var clonedSelect2 = $("#qty_product").clone();

    //     // Atur nilai default untuk elemen dropdown baru
    //     clonedSelect.val('');
    //     clonedSelect2.val('');

    //     clonedSelect2.addClass('col-md-4 ml-1');

    //     // Buat div baru untuk menampung elemen dropdown dan tombol delete
    //     var newContainer = $("<div>").addClass("d-flex mb-3"); // Tambahkan mb-3 untuk memberikan margin bottom

    //     // Tambahkan elemen dropdown baru ke dalam div
    //     newContainer.append(clonedSelect);
    //     newContainer.append(clonedSelect2);

    //     // Tambahkan tombol delete di elemen dropdown yang baru
    //     newContainer.append('<button type="button" class="hapusButton btn btn-danger btn-sm ml-1">Hapus</button>'); // Tambahkan ms-2 untuk memberikan margin left

    //     // Tambahkan div baru ke dalam container
    //     $("#row_product").append(newContainer);
    // });

        // Tangani klik tombol Hapus
        // $("#row_product").on("click", ".hapusButton", function () {
        //     // Hapus div yang berisi elemen dropdown dan tombol delete
        //     $(this).parent().remove();
        // });

        $(".tambahButton2").on("click", function () {
        // Salin elemen dropdown yang sudah ada
        var clonedSelect = $("#material_id").clone();
        var clonedSelect2 = $("#qty_material").clone();

        // Atur nilai default untuk elemen dropdown baru
        clonedSelect.val('');
        clonedSelect2.val('');

        clonedSelect2.addClass('col-md-4 ml-1');

        // Buat div baru untuk menampung elemen dropdown dan tombol delete
        var newContainer = $("<div>").addClass("d-flex mb-3"); // Tambahkan mb-3 untuk memberikan margin bottom

        // Tambahkan elemen dropdown baru ke dalam div
        newContainer.append(clonedSelect);
        newContainer.append(clonedSelect2);

        // Tambahkan tombol delete di elemen dropdown yang baru
        newContainer.append('<button type="button" class="hapusButton btn btn-danger btn-sm ml-1">Hapus</button>'); // Tambahkan ms-2 untuk memberikan margin left

        // Tambahkan div baru ke dalam container
        $("#row_material").append(newContainer);
    });

        // Tangani klik tombol Hapus
        $("#row_material").on("click", ".hapusButton", function () {
            // Hapus div yang berisi elemen dropdown dan tombol delete
            $(this).parent().remove();
        });

})

</script>
@endsection