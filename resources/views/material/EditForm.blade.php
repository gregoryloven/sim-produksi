<form role="form" method='POST' action="{{ route('material.update', ['material' => $data->id]) }}" enctype="multipart/form-data">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
        <h4 class="modal-title">Ubah Material</h4>
    </div>
    <div class="modal-body">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="form-group col-md-8">
                <label>Nama</label>
                <input type="hidden" class="form-control" value="{{$data->id}}" id='id' name='id'>
                <input type="text" class="form-control" value="{{$data->nama}}" id='nama' name='nama' required>
            </div>

            <div class="form-group col-md-3">
                <label>Jumlah (pcs)</label>
                <input type="number" class="form-control" value="{{$data->qty}}" id='qty' name='qty' min=1 required>
            </div>

            <!-- <div class="form-group col-md-2 mr-2">
                <label for="radioOption1">Satuan</label>
                <div>
                    <label class="radio-inline">
                        <input type="radio" id="radioOption1" name="satuan" value="cm" {{$data->satuan == 'cm' ? 'checked' : ''}}> cm
                    </label>

                    <label class="radio-inline">
                        <input type="radio" id="radioOption2" name="satuan" value="kg" {{$data->satuan == 'kg' ? 'checked' : ''}}> kg
                    </label>

                    <label class="radio-inline">
                        <input type="radio" id="radioOption3" name="satuan" value="pcs" {{$data->satuan == 'pcs' ? 'checked' : ''}}> pcs
                    </label>
                </div>
            </div> -->

            <div class="form-group">
                <label>Foto</label>
                <input type="file" value="{{$data->foto}}" name="foto" class="form-control" id="foto" placeholder="Foto" onchange="document.getElementById('output').src = window.URL.createObjectURL(this.files[0])">
                <img id="output" src="{{asset('foto/'.$data->foto)}}" width="200px" height="200px">
            </div>

        </div>
    </div>
  <div class="modal-footer">
    <button type="submit" class="btn btn-primary">Save</button>
    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
  </div>
</form>