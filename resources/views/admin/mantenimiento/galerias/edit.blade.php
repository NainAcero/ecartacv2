@extends('layouts.init')
@section('styles')
@endsection

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
    <div class="row">
        <div class="col-md-12">
            <div class="card card-default ">
                <div class="card-header">
                <h3 class="card-title">Actualizar {{$colegio->nombre}}</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fas fa-minus"></i></button>
                </div>
                </div>
                <form action="{{route('colegios.update', $colegio->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Distrito</label>
                                        <select name="distrito_id" id="" class="form-control">
                                            @foreach ($distritos as $item)
                                            <option value="{{$item->id}}" {{$item->id == $colegio->distrito_id ? 'selected':''}}>{{$item->distrito}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Nombre del colegio</label>
                                        <input type="text" class="form-control" name="nombre" value="{{$colegio->nombre}}" required>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Resolucion</label>
                                        <input type="text" class="form-control" name="resolucion" value="{{$colegio->resolucion}}" required>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Direccion</label>
                                        <input type="text" class="form-control" name="direccion" value="{{$colegio->direccion}}" required>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Telefonos</label>
                                        <input type="text" class="form-control" name="telefonos" value="{{$colegio->telefonos}}" required>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>E-mail</label>
                                        <input type="email" class="form-control" name="email" value="{{$colegio->email}}" required>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Web</label>
                                        <input type="text" class="form-control" name="web" value="{{$colegio->web}}" required>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Facebook</label>
                                        <input type="text" class="form-control" name="facebook" value="{{$colegio->facebook}}" required>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Ubicación (copiar iframe de google maps)</label>
                                        <textarea name="ubicacion" id="" cols="30" rows="10" class="form-control">{{$colegio->ubicacion}}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label for="">Nivel - Grados</label>
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Nivel</th>
                                            <th>Grado</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($grados_nivels as $index => $item)
                                        <tr>
                                            <td>{{$index+1}}</td>
                                            <td>{{$item->grado->nivel->nombre}}</td>
                                            <td>{{$item->grado->grado}}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <label for="">Usuario Administrador</label>
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Usuario</th>
                                            <th>Email</th>
                                            <th>Nombre</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($usuarios as $index => $item)
                                        <tr>
                                            <td>{{$index+1}}</td>
                                            <td>{{$item->usuario->name}}</td>
                                            <td>{{$item->usuario->email}}</td>
                                            <td>{{$item->usuario->persona}}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Estado</label>
                                    <div class="form-group">
                                        <div class="custom-control custom-radio">
                                            <input class="custom-control-input" type="radio" id="customRadio3" name="estado" value="1" required {{ 1 == old('estado', $colegio->estado) ? 'checked' : '' }}>
                                            <label for="customRadio3" class="custom-control-label">Activo</label>
                                        </div>
                                        <div class="custom-control custom-radio">
                                            <input class="custom-control-input" type="radio" id="customRadio4" name="estado" value="0" required {{ 0 == old('estado', $colegio->estado) ? 'checked' : '' }}>
                                            <label for="customRadio4" class="custom-control-label">Inactivo</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer">
                        <div class="row">
                            <div class="col-12">
                            <a href="{{route('colegios.index')}}" class="btn btn-secondary">Cancel</a>
                            <input type="submit" value="Actualizar" class="btn btn-success float-right">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>  
    </div>
</section>

@endsection
@section('scripts')
    {{-- <script src="https://momentjs.com/downloads/moment.js"></script>
    <script src="{{ asset('js/moment_es_us.js') }}"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.0-alpha14/js/tempusdominus-bootstrap-4.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.0-alpha14/css/tempusdominus-bootstrap-4.min.css" /> --}}

    <script>
        $(function () {
            // $('#datetimepicker5').datetimepicker();
            $("#tabla").DataTable();
        });
    </script>
    
@endsection