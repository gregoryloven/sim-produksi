<form role="form" method='POST' action="{{ route('employee.update', ['employee' => $data->id]) }}" enctype="multipart/form-data">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
        <h4 class="modal-title">Ubah Karyawan</h4>
    </div>
    <div class="modal-body">
        @csrf
        @method('PUT')
        <div class="form-body">
            <div class="form-group">
                <label >Nama</label>
                <input type="hidden" class="form-control" value="{{$data->id}}" id='id' name='id'>
                <input type="text" class="form-control" value="{{$data->nama}}" id='nama' name='nama' required>
            </div>
            <div class="form-group">
                <label >Alamat</label>
                <textarea class="form-control" style="height: 150px;" id="alamat" name="alamat" required>{{$data->alamat}}</textarea>
            </div>
        </div>
    </div>
  <div class="modal-footer">
    <button type="submit" class="btn btn-primary">Save</button>
    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
  </div>
</form>