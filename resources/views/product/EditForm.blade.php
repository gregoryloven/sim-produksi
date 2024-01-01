<form role="form" method='POST' action="{{ route('product.update', ['product' => $data->id]) }}" enctype="multipart/form-data">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
        <h4 class="modal-title">Ubah Produk</h4>
    </div>
    <div class="modal-body">
        @csrf
        @method('PUT')
        <div class="form-body">
            <div class="form-group">
                <label>Kode</label>
                <input type="hidden" class="form-control" value="{{$data->id}}" id='id' name='id'>
                <input type="text" class="form-control" value="{{$data->kode}}" id='kode' name='kode' required>
            </div>
            <div class="form-group">
                <label>Nama</label>
                <input type="text" class="form-control" value="{{$data->nama}}" id='nama' name='nama' required>
            </div>
            <div class="form-group">
                <label>Kategory</label>
                <select class="form-control" id='category_id' name='category_id' required>
                    <option value="{{ $data->category_id }}">{{ $data->category->nama }}</option>
                        @foreach($cat as $c)
                        <option value="{{ $c->id }}">{{ $c->nama }}</option>
                        @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Harga (Rp.)</label>
                <input type="text" class="form-control" value="{{ number_format($data->harga, 0, ',', '.') }}" id='harga' name='harga' required>
            </div>
        </div>
    </div>
  <div class="modal-footer">
    <button type="submit" class="btn btn-primary">Save</button>
    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
  </div>
</form>