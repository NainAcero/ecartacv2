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
                <h3 class="card-title">Delivery</h3>
                <div class="card-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                    <a href="{{url('restaurante/delivery')}} " class="btn btn-success float-right">Nuevo Delivery</a>
                </div>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive">
                <table id="tabla" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Nombres y Apellidos</th>
                            <th>Celular</th>
                            <th>Estado</th>
                            <th>Opc</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($deliveries as $index => $delivery)
                            <tr>
                                <td>{{ $delivery->nombres }}</td>
                                <td>{{ $delivery->celular }}</td>
                                @if ($delivery->estado == 1)
                                    <td><small class="badge badge-success">Activo</small></td>
                                @else
                                    <td><small class="badge badge-danger">Inactivo</small></td>
                                @endif
                                <td>
                                    <form method="POST" action="{{ route("restDelivery.destroy", ["id" => $delivery->id]) }}">
                                        @method("DELETE")
                                        @csrf
                                        <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-user-times"></i></button>
                                    </form>
                                </td>
                                {{-- <td>{{$$delivery->nombres}} {{$$delivery->apellidos}}</td>
                                <td>{{$delivery->celular}}</td>
                                @if ($delivery->estado == 1)
                                    <td><small class="badge badge-success">Activo</small></td>
                                @else
                                    <td><small class="badge badge-danger">Inactivo</small></td>
                                @endif
                                <td>
                                    <a href="#" title="Editar" class="btn btn-info btn-sm"><i class="fas fa-user-edit"></i></a>
                                    <a href="#" title="Eliminar" class="btn btn-danger btn-sm"><i class="fas fa-user-times"></i></a>
                                </td> --}}
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
                "aProcessing": true, //Activamos el procesamiento del datatables
                "aServerSide": true, //Paginación y filtrado realizados por el servidor
            });
        });
    </script>

@endsection
