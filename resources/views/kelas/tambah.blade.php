@extends('main.index')

@section('content')
    <div class="container-fluid">
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-2">
              <h6 class="m-0 font-weight-bold text-primary">Form Data kelas</h6>
              <a href="{{ route('kelas.index') }}" class="d-none d-sm-inline-block btn btn-sm btn-default shadow-sm float-right mb-3"><i class="fas fa-arrow-back"></i> Kembali</a>
            </div>
            <form action="{{ route('kelas.store') }}" method="POST">
              @csrf
              @method('POST')
              <div class="card-body">
                <div class="row form-group">
                  <div class="col-md-2">
                    <label for="kelas" class="form-label">Kelas</label>
                  </div>
                  <div class="col-md-6">
                    <input type="text" name="kelas" id="kelas" class="form-control">
                  </div>
                </div>
                <div class="row form-group">
                  <div class="col-md-2">
                    <label for="jurusan_id" class="form-label">Jurusan</label>
                  </div>
                  <div class="col-md-6">
                    <select class="form-control selectpicker" title="-- Pilih --" name="jurusan_id">
                            <option>-- Pilih --</option>
                        @foreach ( $jurusan as $value )
                            <option value="{{ $value->id }}">{{ $value['jurusan_kode'] }} - {{ $value->jurusan_nama }}</option>
                        @endforeach
                    </select>
                  </div>
                </div>
              </div>
              <div class="card-footer py-2 text-right">
                <button type="submit" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm"><i class="fas fa-save"></i> Simpan</button>
              </div>
            </form>
          </div>

        </div>
@endsection