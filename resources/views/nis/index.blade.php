@extends('main.index')

@section('content')
    <div class="container-fluid">
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Table Data NIS</h6>
            </div>
            <div class="card-body">
              <a href="{{ route('nis.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-info shadow-sm float-right mb-3"><i class="fas fa-plus"></i> Tambah</a>
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>NIS</th>
                      <th style="width: 250px">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($nis as $key => $value)
                     <tr>
                      <td class="p-0" style="vertical-align: middle">{{ $value['nomer'] }}</td>
                      <td class="p-0 text-center" style="vertical-align: middle">
                        <form action="{{ route('nis.destroy',$value->id) }}" method="POST">
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm m-1"><i class="fas fa-eraser"></i> Hapus</button>
                        </form>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
@endsection