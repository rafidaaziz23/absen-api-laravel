@extends('main.index')

@section('content')
    <div class="container-fluid">

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Table Data Murid</h6>
            </div>
            <div class="card-body">
              <a href="{{ route('murid.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm float-right mb-3"><i class="fas fa-plus"></i> Tambah</a>
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Nama</th>
                      <th>NIS</th>
                      <th>Kelas</th>
                      <th style="width: 250px">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ( $murid as $key => $value )
                     <tr>
                      <td class="p-0" style="vertical-align: middle">{{ $value['nama'] }}</td>
                      <td class="p-0" style="vertical-align: middle">{{ optional($value->nis)->nomer }}</td>
                      <td class="p-0" style="vertical-align: middle">{{ optional($value->kelas)->kelas }}</td>
                      <td class="p-0 text-center" style="vertical-align: middle">
                        <form action="{{ route('murid.destroy',$value->id) }}" method="POST">
                          <a href="{{ route('murid.show',$value['id']) }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm m-1"><i class="fas fa-eye"></i> Detail</a>
                          <a href="{{ route('murid.edit',$value['id']) }}" class="d-none d-sm-inline-block btn btn-sm btn-warning shadow-sm m-1"><i class="fas fa-edit"></i> Edit</a>
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