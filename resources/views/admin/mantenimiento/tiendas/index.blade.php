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
                <h3 class="card-title">Tiendas</h3>
                <div class="card-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                    {{-- <input type="text" name="table_search" class="form-control float-right" placeholder="Search"> --}}
                    {{-- @if (!$persona->distrito)
                        <span class="badge bg-warning">No puede adjuntar Plan</span>
                    @else --}}
                    <a href="{{route('tiendas.create')}} " class="btn btn-success float-right">Nuevo</a>
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
                            <th>Tienda</th>
                            <th>Propietario</th>
                            <th>Slug</th>
                            <th>Dirección</th>
                            <th>Portada</th>
                            <th>Estado</th>
                            <th>Opc</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tiendas as $index => $item)
                            <tr>
                                <td>{{$index+1}}</td>
                                <td>{{$item->tienda}}</td>
                                <td>{{$item->persona->nombres}} {{$item->persona->apellidos}}</td>
                                <td>{{$item->slug}}</td>
                                <td>{{$item->direccion}}</td>
                                <td><img src="{{asset($item->portada)}}" alt="" width="50px"></td>
                                <td>
                                    @if ($item->estado == 1)
                                        <span class="badge bg-success">Activo</span>
                                    @else
                                        <span class="badge bg-danger">Inactivo</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('tiendas.edit', [$item->id]) }}" class="btn btn-block btn-outline-info btn-sm">Editar</a>
                                </td>
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
    <script>
        $(function () {
            $("#tabla").DataTable({
                "order": [[ 0, "asc" ]],
            });
        });
    </script>
    
@endsection