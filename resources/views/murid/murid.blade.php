@extends('main.index')

@section('content')
    <div class="container-fluid">

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Table Data Murid</h6>
            </div>
            <div class="card-body">
              <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm float-right mb-3"><i class="fas fa-plus"></i> Tambah</a>
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Nama</th>
                      <th>NIS</th>
                      <th style="width: 250px">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                     <tr>
                      <td class="p-0" style="vertical-align: middle">Rafida Aziz</td>
                      <td class="p-0" style="vertical-align: middle">123456 654321</td>
                      <td class="p-0 text-center" style="vertical-align: middle">
                        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm m-1"><i class="fas fa-eye"></i> Detail</a>
                        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-warning shadow-sm m-1"><i class="fas fa-edit"></i> Edit</a>
                        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm m-1"><i class="fas fa-eraser"></i> Hapus</a>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
@endsection