@extends('main.index')

@section('content')
    <div class="container-fluid">
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-2">
              <h6 class="m-0 font-weight-bold text-primary">Form Data murid</h6>
              <a href="{{ route('murid.index') }}" class="d-none d-sm-inline-block btn btn-sm btn-default shadow-sm float-right mb-3"><i class="fas fa-arrow-back"></i> Kembali</a>
            </div>
            <form action="{{ route('murid.store') }}" method="POST" enctype="multipart/form-data">
              @csrf
              @method('POST')
              <div class="card-body">
                <div class="row form-group">
                  <div class="col-md-2">
                    <label for="nama" class="form-label">Nama</label>
                  </div>
                  <div class="col-md-6">
                    <input type="text" name="nama" id="nama" class="form-control">
                  </div>
                </div>
                <div class="row form-group">
                  <div class="col-md-2">
                    <label for="murid_nama" class="form-label">NIS</label>
                  </div>
                  <div class="col-md-6">
                    <select class="form-control selectpicker" title="-- Pilih --" name="nis_id">
                            <option>-- Pilih --</option>
                        @foreach ( $nis as $key => $value )
                            <option value="{{ $value->id }}">{{ $value['nomer'] }}</option>
                        @endforeach
                    </select>
                  </div>
                </div>
                <div class="row form-group">
                  <div class="col-md-2">
                    <label for="murid_nama" class="form-label">Kelas</label>
                  </div>
                  <div class="col-md-6">
                    <select class="form-control selectpicker" title="-- Pilih --" name="kelas_id">
                            <option>-- Pilih --</option>
                        @foreach ( $kelas as $key => $value )
                            <option value="{{ $value->id }}">{{ $value['kelas'] }}</option>
                        @endforeach
                    </select>
                  </div>
                </div>
                <div class="row form-group">
                  <div class="col-md-2">
                    <label for="murid_kode" class="form-label">Password</label>
                  </div>
                  <div class="col-md-6">
                    <input type="password" name="password" id="password" class="form-control">
                  </div>
                </div>
                <div class="row form-group">
                  <div class="col-md-2">
                    <label for="foto" class="form-label">Foto</label>
                  </div>
                  <div class="col-md-6">
                    <input type="file" name="foto" id="foto" class="form-control">
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