@extends('layouts.init')

@section('content-header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark"></h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{route('home')}} ">Home</a></li>
                <li class="breadcrumb-item active">form</li>
                </ol>
            </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
@endsection

@section('content')

<section class="content">
    <div id="app"></div>
    <!-- /.row -->
    <div class="row">
        <div class="col-12">
            <div class="card">
            <div class="card-header">
                <h3 class="card-title">Usuarios</h3>
                <div class="card-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                    {{-- <input type="text" name="table_search" class="form-control float-right" placeholder="Search"> --}}
                    {{-- @if (!$persona->distrito)
                        <span class="badge bg-warning">No puede adjuntar Plan</span>
                    @else --}}
                    <a href="{{route('personal.create')}} " class="btn btn-success float-right">Nuevo Usuario</a>
                    {{-- @endif --}}
                </div>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive">
                <table id="tabla" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombres y Apellidos</th>
                            <th>Username</th>
                            <th>Rol</th>
                            <th>Celular</th>
                            <th>Tienda</th>
                            <th>Estado</th>
                            <th>Opc</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $index => $user)
                            <tr>
                                <td>{{$index+1}}</td>
                                <td>{{$user->persona->nombres}} {{$user->persona->apellidos}}</td>
                                <td>{{$user->username}}</td>
                                <td>
                                    @foreach ($user->getRoleNames() as $item)
                                    {{$item}}, 
                                    @endforeach
                                </td>
                                <td>{{$user->persona->celular}}</td>
                                @if ($user->persona->tienda)
                                    <td>{{$user->persona->tienda->tienda}} - ({{$user->persona->tienda->codigoqr}})</td>
                                @else    
                                    <td></td>
                                @endif
                                
                                @if ($user->persona->estado == 1)
                                    <td><small class="badge badge-success">Activo</small></td>
                                @else
                                    <td><small class="badge badge-danger">Inactivo</small></td>
                                @endif
                                
                                <td>
                                    <a href="{{ route('personal.edit', [$user->id]) }}" class="btn btn-block btn-outline-info btn-sm">Editar</a>
                                </td>
                                {{-- {{url('editar_informe_mes?id='.$mip->id.'')}} --}}
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
        <!-- /.row -->
</section>

@endsection

@section('scripts')
{{-- <script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script> --}}


    <script>
        $(function () {
            $("#tabla").DataTable({
                // "order": [[ 2, "asc" ]],
                "aProcessing": true, //Activamos el procesamiento del datatables
                "aServerSide": true, //Paginación y filtrado realizados por el servidor
                // dom: 'Bfrtip', //Definimos los elementos del control de tabla
                // buttons: [
                //     'copyHtml5',
                //     'excelHtml5',
                    
                // ],
            });
        });
    </script>
    
@endsection