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
                            <h2 class="panel-title">Table Obat</h2>
                            <div class="right">
                                <a href="#" type="button" class="btn btn-primary" data-toggle="modal" data-target="#InputModal">
                                    Input Obat
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
                                        <h3 class="modal-title">Input Data Obat</h3>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        </div>

                                        <div class="modal-body">
                                        <form action="{{route('create-obat')}}" method="POST">

                                            {{ csrf_field()}}
                                            {{ method_field('POST') }}

                                                <div class="form-group">
                                                    <label>ID Obat</label>
                                                    <input type="text" name="id_obat" class="form-control" id="id_obat" aria-describedby="emailHelp">
                                                </div>
                                                <div class="form-group">
                                                    <label>Nama Obat</label>
                                                    <input type="text" name="nama_obat" class="form-control" id="nama_obat" aria-describedby="emailHelp">
                                                </div>
                                                <div class="form-group">
                                                    <label>Stock</label>
                                                    <input type="text" name="stok" class="form-control" id="stok" aria-describedby="emailHelp">
                                                </div>
                                                <div class="form-group">
                                                    <label>Kadarluarsa</label>
                                                    <input type="date" name="kadarluarsa" class="form-control" id="kadarluarsa" aria-describedby="emailHelp">
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
                                        <form action="{{route('update-obat')}}" method="POST">
                                            @csrf
                                            @method('POST')

                                                    <input type="hidden" name="id_obat" class="form-control" id="id_obat" aria-describedby="emailHelp">

                                                <div class="form-group">
                                                    <label>Nama Obat</label>
                                                    <input type="text" name="nama_obat" class="form-control" id="nama_obat" aria-describedby="emailHelp">
                                                </div>
                                                <div class="form-group">
                                                    <label>Stock</label>
                                                    <input type="text" name="stok" class="form-control" id="stok" aria-describedby="emailHelp">
                                                </div>
                                                <div class="form-group">
                                                    <label>Kadarluarsa</label>
                                                    <input type="date" name="kadarluarsa" class="form-control" id="kadarluarsa" aria-describedby="emailHelp">
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
                                    <th>ID Obat</th>
                                    <th>Nama Obat</th>
                                    <th>Stock</th>
                                    <th>Kadarluarsa</th>
                                    <th>created_at</th>
                                    <th>updated_at</th>

                                    <th>Actions</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                    <th>ID Obat</th>
                                    <th>Nama Obat</th>
                                    <th>Stock</th>
                                    <th>Kadarluarsa</th>
                                    <th>created_at</th>
                                    <th>updated_at</th>

                                    <th>Actions</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @foreach($data_obat as $o)
                                    <tr>
                                    <td>{{$o->id_obat}}</td>
                                    <td>{{$o->nama_obat}}</td>
                                    <td>{{$o->stok}}</td>
                                    <td>{{$o->kadarluarsa}}</td>
                                    <td>{{$o->created_at}}</td>
                                    <td>{{$o->updated_at}}</td>

                                    <td>
                                        {{-- Edit Button Code --}}
                                        <a data-id_obat="{{$o->id_obat}}" data-nama_obat="{{$o->nama_obat}}" data-stok="{{$o->stok}}" data-kadarluarsa="{{$o->kadarluarsa}}" data-created_at="{{$o->created_at}}" data-updated_at="{{$o->updated_at}}"  data-toggle="modal" data-target="#EditModal" type="button" class="btn btn-warning btn-xs" title="Edit"><i class="fas fa-edit"></i>
                                        </a>
                                        {{-- End Edit Button Code --}}
                                        <a href="/obat/hapus/{{ $o->id_obat }}" class="btn btn-danger btn-xs" title="Delete"><i class="fas fa-trash-alt"></i></a>
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
        var id_obat = button.data('id_obat')
        var nama_obat = button.data('nama_obat')
        var stok = button.data('stok')
        var kadarluarsa = button.data('kadarluarsa')
        var created_at = button.data('created_at')
        var updated_at = button.data('updated_at')



        var modal = $(this)

        modal.find('.modal-title').text('Edit Data Obat');
        modal.find('.modal-body #id_obat').val(id_obat);
        modal.find('.modal-body #nama_obat').val(nama_obat);
        modal.find('.modal-body #stok').val(stok);
        modal.find('.modal-body #kadarluarsa').val(kadarluarsa);
        modal.find('.modal-body #created_at').val(created_at);
        modal.find('.modal-body #updated_at').val(updated_at);


    })
    </script>
{{-- End Script EditModal --}}
@endsection


<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
