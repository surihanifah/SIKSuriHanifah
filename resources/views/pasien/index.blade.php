@extends('layouts.mainlayout')

@section('content')

<!-- Page Heading -->
<!-- MAIN -->
<div class="main">
    <!-- MAIN CONTENT -->
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                <!-- DataTales Example -->
                    <div class="panel">
                        <div class="panel-heading">
                            <h2 class="panel-title">Table Pasien</h2>
                            <div class="right">
                                <a href="#" type="button" class="btn btn-primary" data-toggle="modal" data-target="#InputModal">
                                    Input Pasien
                                    <i class="fas fa-fw fa-plus"></i>
                                </a>
                            </div>
                        </div>

                        <div class="panel-body">
                        @if(session('sukses'))
                                    <div class="alert alert-success" role="alert">
                                    {{ session('sukses') }}
                                    </div>
                                @elseif(session('gagal'))
                                <div class="alert alert-danger" role="alert">
                                    {{ session('gagal') }}
                                    </div>
                                    @endif
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                                {{-- Modal Input --}}
                                <div class="modal fade" id="InputModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <h3 class="modal-title">Input Data Pasien</h3>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        </div>

                                        <div class="modal-body">
                                        <form action="{{route('create-pasien')}}" method="POST">

                                            {{ csrf_field()}}
                                            {{ method_field('POST') }}

                                                <div class="form-group">
                                                    <label>ID Pasien</label>
                                                    <input type="text" name="id_pasien" class="form-control" id="id_pasien" aria-describedby="emailHelp">
                                                </div>
                                                <div class="form-group">
                                                    <label>Rekam Medis Pasien</label>
                                                    <input type="text" name="rm_pasien" class="form-control" id="rm_pasien" aria-describedby="emailHelp">
                                                </div>
                                                <div class="form-group">
                                                    <label>Nama Pasien</label>
                                                    <input type="text" name="nama" class="form-control" id="nama" aria-describedby="emailHelp">
                                                </div>
                                                <div class="form-group">
                                                    <label>Jenis Kelamin</label>
                                                    <input type="text" name="gender" class="form-control" id="gender" aria-describedby="emailHelp">
                                                </div>
                                                <div class="form-group">
                                                    <label>Tanggal Lahir</label>
                                                    <input type="date" name="tgl_lahir" class="form-control" id="tgl_lahir" aria-describedby="emailHelp">
                                                </div>
                                                <div class="form-group">
                                                    <label>Alamat</label>
                                                    <input type="text" name="alamat" class="form-control" id="alamat" aria-describedby="emailHelp">
                                                </div>
                                                <div class="form-group">
                                                    <label>Pekerjaan</label>
                                                    <input type="text" name="pekerjaan" class="form-control" id="pekerjaan" aria-describedby="emailHelp">
                                                </div>
                                                <!-- <div class="form-group">
                                                    <label>created_at</label>
                                                    <input type="text" name="created_at" class="form-control" id="created_at" aria-describedby="emailHelp">
                                                </div>
                                                <div class="form-group">
                                                    <label>updated_at</label>
                                                    <input type="text" name="updated_at" class="form-control" id="updated_at" aria-describedby="emailHelp">
                                                </div> -->

                                                </div>


                                            <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Input Data</button>
                                            </div>
                                        </form>
                                        </div>
                                        </div>
                                    </div>
                                    </div>
                                {{-- End Modal Input --}}

                                {{-- Modal Edit --}}
                                <div class="modal fade" id="EditModal">
                                    <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <h3 class="modal-title"></h3>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        </div>
                                        <div class="modal-body">
                                        <form action="{{route('update-pasien')}}" method="POST">
                                            @csrf
                                            @method('POST')

                                                    <input type="hidden" name="id_pasien" class="form-control" id="id_pasien" aria-describedby="emailHelp">

                                                    <div class="form-group">
                                                    <label>Rekam Medis Pasien</label>
                                                    <input type="text" name="rm_pasien" class="form-control" id="rm_pasien" aria-describedby="emailHelp">
                                                </div>
                                                <div class="form-group">
                                                    <label>Nama Pasien</label>
                                                    <input type="text" name="nama" class="form-control" id="nama" aria-describedby="emailHelp">
                                                </div>
                                                <div class="form-group">
                                                    <label>Jenis Kelamin</label>
                                                    <input type="text" name="gender" class="form-control" id="gender" aria-describedby="emailHelp">
                                                </div>
                                                <div class="form-group">
                                                    <label>Tanggal Lahir</label>
                                                    <input type="date" name="tgl_lahir" class="form-control" id="tgl_lahir" aria-describedby="emailHelp">
                                                </div>
                                                <div class="form-group">
                                                    <label>Alamat</label>
                                                    <input type="text" name="alamat" class="form-control" id="alamat" aria-describedby="emailHelp">
                                                </div>
                                                <div class="form-group">
                                                    <label>Pekerjaan</label>
                                                    <input type="text" name="pekerjaan" class="form-control" id="pekerjaan" aria-describedby="emailHelp">
                                                </div>
                                                <div class="form-group">
                                                    <label>created_at</label>
                                                    <input type="text" name="created_at" class="form-control" id="created_at" aria-describedby="emailHelp">
                                                </div>
                                                <div class="form-group">
                                                    <label>updated_at</label>
                                                    <input type="text" name="updated_at" class="form-control" id="updated_at" aria-describedby="emailHelp">
                                                </div>


                                            <div class="modal-footer">
                                            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Update Data</button>
                                            </div>
                                        </form>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                                {{-- End Modal Edit --}}

                                <thead>
                                    <tr>
                                    <th>ID Pasien</th>
                                    <th>Rekam Medis</th>
                                    <th>Nama</th>
                                    <th>Jenis Kelamin</th> 
                                    <th>Tanggal Lahir</th> 
                                    <th>Alamat</th> 
                                    <th>Pekerjaan</th> 
                                    <th>created_at</th>
                                    <th>updated_at</th>

                                    <th>Actions</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                    <th>ID Pasien</th>
                                    <th>Rekam Medis</th>
                                    <th>Nama</th>
                                    <th>Jenis Kelamin</th> 
                                    <th>Tanggal Lahir</th> 
                                    <th>Alamat</th> 
                                    <th>Pekerjaan</th>
                                    <th>created_at</th>
                                    <th>updated_at</th>

                                    <th>Actions</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @foreach($data_pasien as $p)
                                    <tr>
                                    <td>{{$p->id_pasien}}</td>
                                    <td>{{$p->rm_pasien}}</td>
                                    <td>{{$p->nama}}</td>
                                    <td>{{$p->gender}}</td>
                                    <td>{{$p->tgl_lahir}}</td>
                                    <td>{{$p->alamat}}</td>
                                    <td>{{$p->pekerjaan}}</td>
                                    <td>{{$p->created_at}}</td>
                                    <td>{{$p->updated_at}}</td>

                                    <td>
                                        {{-- Edit Button Code --}}
                                        <a data-id_pasien="{{$p->id_pasien}}" data-rm_pasien="{{$p->rm_pasien}}" data-nama="{{$p->nama}}" data-gender="{{$p->gender}}"data-tgl_lahhir="{{$p->tgl_lahir}}"data-alamat="{{$p->alamat}}"data-pekerjaan="{{$p->pekerjaan}}"data-created_at="{{$p->created_at}}" data-updated_at="{{$p->updated_at}}"  data-toggle="modal" data-target="#EditModal" type="button" class="btn btn-warning btn-xs" title="Edit"><i class="fas fa-edit"></i>
                                        </a>
                                        {{-- End Edit Button Code --}}
                                        <a href="/pasien/hapus/{{ $p->id_pasien }}" class="btn btn-danger btn-xs" title="Delete"><i class="fas fa-trash-alt"></i></a>
                                    </td>
                                    </tr>
                                    @endforeach
                                </tbody>

                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Script EditModal --}}
    <script>
    $('#EditModal').on('show.bs.modal', function(event){

        var button = $(event.relatedTarget)
        var id_pasien = button.data('id_pasien')
        var rm_pasien = button.data('rm_pasien')
        var nama = button.data('nama')
        var gender = button.data('gender')
        var tgl_lahir = button.data('tgl_lahir')
        var alamat = button.data('alamat')
        var pekerjaan = button.data('pekerjaan')
        var created_at = button.data('created_at')
        var updated_at = button.data('updated_at')



        var modal = $(this)

        modal.find('.modal-title').text('Edit Data Pasien');
        modal.find('.modal-body #id_pasien').val(id_pasien);
        modal.find('.modal-body #rm_pasien').val(rm_pasien);
        modal.find('.modal-body #nama').val(nama);
        modal.find('.modal-body #gender').val(gender);
        modal.find('.modal-body #tgl_lahir').val(tgl_lahir);
        modal.find('.modal-body #alamat').val(alamat);
        modal.find('.modal-body #pekerjaan').val(pekerjaan);
        modal.find('.modal-body #created_at').val(created_at);
        modal.find('.modal-body #updated_at').val(updated_at);


    })
    </script>
{{-- End Script EditModal --}}
@endsection


<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
