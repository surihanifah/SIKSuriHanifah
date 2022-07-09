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
                            <h2 class="panel-title">Table Dokter</h2>
                            <div class="right">
                                <a href="#" type="button" class="btn btn-primary" data-toggle="modal" data-target="#InputModal">
                                    Input Dokter
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
                                        <h3 class="modal-title">Input Data Dokter</h3>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        </div>

                                        <div class="modal-body">
                                        <form action="{{route('create-dokter')}}" method="POST">

                                            {{ csrf_field()}}
                                            {{ method_field('POST') }}

                                                <div class="form-group">
                                                    <label>ID Dokter</label>
                                                    <input type="text" name="id_dokter" class="form-control" id="id_dokter" aria-describedby="emailHelp">
                                                </div>

                                                <div class="form-group">
                                                    <label>Nama Dokter</label>
                                                    <input type="text" name="nama" class="form-control" id="nama" aria-describedby="emailHelp">
                                                </div>
                                                <div class="form-group">
                                                    <label>NIK</label>
                                                    <input type="text" name="nik" class="form-control" id="nik" aria-describedby="emailHelp">
                                                </div>
                                                <div class="form-group">
                                                    <label> Kontak</label>
                                                    <input type="text" name="kontak" class="form-control" id="kontak" aria-describedby="emailHelp">
                                                </div>
                                                <div class="form-group">
                                                    <label>Status</label>
                                                    <input type="text" name="status" class="form-control" id="status" aria-describedby="emailHelp">
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
                                        <form action="{{route('update-dokter')}}" method="POST">
                                            @csrf
                                            @method('POST')

                                                    <input type="hidden" name="id_dokter" class="form-control" id="id_dokter" aria-describedby="emailHelp">

                                                    <div class="form-group">
                                                    <label>Nama Dokter</label>
                                                    <input type="text" name="nama" class="form-control" id="nama" aria-describedby="emailHelp">
                                                </div>
                                                <div class="form-group">
                                                    <label>NIK</label>
                                                    <input type="text" name="nik" class="form-control" id="nik" aria-describedby="emailHelp">
                                                </div>
                                                <div class="form-group">
                                                    <label> Kontak</label>
                                                    <input type="text" name="kontak" class="form-control" id="kontak" aria-describedby="emailHelp">
                                                </div>
                                                <div class="form-group">
                                                    <label>Status</label>
                                                    <input type="text" name="status" class="form-control" id="status" aria-describedby="emailHelp">
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
                                    <th>ID Dokter</th>
                                    <th>Nama Dokter</th>
                                    <th>NIK</th>
                                    <th>Kontak</th> 
                                    <th>Status</th>  
                                    <th>created_at</th>
                                    <th>updated_at</th>

                                    <th>Actions</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                    <th>ID Dokter</th>
                                    <th>Nama Dokter</th>
                                    <th>NIK</th>
                                    <th>Kontak</th> 
                                    <th>Status</th>
                                    <th>created_at</th>
                                    <th>updated_at</th>

                                    <th>Actions</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @foreach($data_dokter as $d)
                                    <tr>
                                    <td>{{$d->id_dokter}}</td>
                                    <td>{{$d->nama}}</td>
                                    <td>{{$d->nik}}</td>
                                    <td>{{$d->kontak}}</td>
                                    <td>{{$d->status}}</td>
                                    <td>{{$d->created_at}}</td>
                                    <td>{{$d->updated_at}}</td>

                                    <td>
                                        {{-- Edit Button Code --}}
                                        <a data-id_dokter="{{$d->id_dokter}}"  data-nama="{{$d->nama}}" data-nik="{{$d->nik}}"data-kontak="{{$d->kontak}}"data-status="{{$d->status}}"data-created_at="{{$d->created_at}}" data-updated_at="{{$d->updated_at}}"  data-toggle="modal" data-target="#EditModal" type="button" class="btn btn-warning btn-xs" title="Edit"><i class="fas fa-edit"></i>
                                        </a>
                                        {{-- End Edit Button Code --}}
                                        <a href="/dokter/hapus/{{ $d->id_dokter }}" class="btn btn-danger btn-xs" title="Delete"><i class="fas fa-trash-alt"></i></a>
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
        var id_dokter = button.data('id_dokter')
        var nama = button.data('nama')
        var nik = button.data('nik')
        var kontak = button.data('kontak')
        var status = button.data('status')
        var created_at = button.data('created_at')
        var updated_at = button.data('updated_at')



        var modal = $(this)

        modal.find('.modal-title').text('Edit Data Dokter');
        modal.find('.modal-body #id_dokter').val(id_dokter);
        modal.find('.modal-body #nama').val(nama);
        modal.find('.modal-body #nik').val(nik);
        modal.find('.modal-body #kontak').val(kontak);
        modal.find('.modal-body #status').val(status);
        modal.find('.modal-body #created_at').val(created_at);
        modal.find('.modal-body #updated_at').val(updated_at);


    })
    </script>
{{-- End Script EditModal --}}
@endsection


<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
