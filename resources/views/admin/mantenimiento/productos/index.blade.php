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
                <h3 class="card-title">Menú Carta</h3>
                <div class="card-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                    {{-- <input type="text" name="table_search" class="form-control float-right" placeholder="Search"> --}}
                    {{-- @if (!$persona->distrito)
                        <span class="badge bg-warning">No puede adjuntar Plan</span>
                    @else --}}
                    <a href="{{route('products.create')}} " class="btn btn-success float-right">Nuevo</a>
                    {{-- @endif --}}
                </div>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive">
                <table id="tabla" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Opc</th>
                            <th>Manú/Carta</th>
                            <th>Precio</th>
                            <th>Portada</th>
                            <th>Categoría</th>
                            <th>Restaurante</th>
                            <th>En Oferta</th>
                            <th>ID</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($productos as $index => $item)
                            <tr>
                                <td>
                                    <a href="{{ route('products.edit', [$item->slug]) }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                                    <form method="POST" action="{{ route('products.destroy', [$item->id]) }}">
                                        @csrf
                                        @method('DELETE')
                                  
                                        <button type="submit" class="btn btn-danger btn-sm"  onclick="return confirm('Quieres Eliminar por completo?')"><i class="fas fa-trash"></i></button>
                                      </form>
                                </td>
                                <td>
                                    <b>{{$item->producto}}</b>
                                    ({{$item->ingredientes}}) <br>
                                    @if ($item->estado == 1)
                                        <span class="badge bg-success">Activo</span>
                                    @else
                                        <span class="badge bg-danger">Inactivo</span>
                                    @endif
                                </td>
                                <td>{{$item->precio}}</td>
                                <td><img src="{{asset($item->portada)}}" alt="" width="50px"></td>
                                <td>{{$item->categoria->categoria}}</td>
                                <td>{{$item->tienda->tienda}}</td>
                                <td>
                                    @if ($item->oferta == 1)
                                        <span class="badge bg-success">Activo</span>
                                    @else
                                        <span class="badge bg-danger">Inactivo</span>
                                    @endif
                                </td>
                                <td>{{$index+1}}</td>
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