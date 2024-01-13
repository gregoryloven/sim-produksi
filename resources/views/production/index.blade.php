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
          <h1>Daftar Produksi</h1>
        </div>

        <div class="section-body">
            <a href="{{ url('production/create/') }}" class="btn btn-success btn-xs btn-flat"><i class="fa fa-plus-circle"></i> Tambah Produksi</a><br><br>

            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    Daftar Produksi 
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" style="text-align: center;" id="myTable">
                            <thead>
                                <tr>
                                    <th width="10%">No</th>
                                    <th>Kode Produksi</th>
                                    <th>Jumlah Produksi</th>
                                    <th>Nama Produk</th>
                                    <th>Tanggal Produksi</th>
                                    <th width="20%"><i class="fa fa-cog"></i></th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $i = 0; @endphp
                                @foreach($data as $d)
                                @php $i += 1; @endphp
                                <tr>
                                    <td>@php echo $i; @endphp</td>
                                    <td>{{$d->kode_produksi}}</td>
                                    <td>{{$d->qty_product}}</td>
                                    <td>{{$d->product->nama}}</td>
                                    <td>{{ \Carbon\Carbon::parse($d->created_at)->format('d-m-Y') }}</td>
                                    <td>
                                        <form id="delete-form-{{ $d->id }}" action="{{ route('production.destroy', $d->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')

                                            <a href="{{ route('production.detail', $d->id) }}" class="btn btn-icon btn-info" ><i class="fa fa-search"></i></a>
                                            
                                            <input type="hidden" class="form-control" id='kode_produksi' name='kode_produksi' placeholder="Type your name" value="{{$d->kode_produksi}}">
                                            <button type="button" class="btn btn-icon btn-danger" data-id="{{ $d->id }}"><i class="fa fa-trash"></i></button>                                   
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

    </section>
</div>

<!-- EDIT WITH MODAL-->
<div class="modal fade" id="modalEdit" tabindex="-1" role="basic" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" id="modalContent">
            <div style="text-align: center;">
                <!-- <img src="{{ asset('res/loading.gif') }}"> -->
            </div>
        </div>
    </div>
</div>

@endsection

@section('javascript')
<script>

function EditForm(id)
{
  $.ajax({
    type:'POST',
    url:'{{route("production.EditForm")}}',
    data:{'_token':'<?php echo csrf_token() ?>',
          'id':id
         },
    success: function(data){
      $('#modalContent').html(data.msg)
    }
  });
}

$(document).on('click', '.btn-danger', function(e) {
    e.preventDefault();
    
    var id = $(this).data('id');
    
    Swal.fire({
        title: 'Apakah Anda Yakin?',
        text: "Data akan dihapus!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        confirmButtonText: 'Hapus!'
    }).then((result) => {
        if (result.isConfirmed) {
            $('#delete-form-' + id).submit();
        }
    });
});

</script>
@endsection