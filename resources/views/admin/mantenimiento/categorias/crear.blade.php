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
                <h3 class="card-title">Crear Categoria</h3>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fas fa-minus"></i></button>
                </div>
                </div>
                <form action="{{route('categorias.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                <label>Categoria</label>
                                <input type="text" class="form-control" name="categoria" required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                <label>Descripcion</label>
                                <input type="text" class="form-control" name="descripcion">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Estado</label>
                                    <div class="form-group">
                                        <div class="custom-control custom-radio">
                                            <input class="custom-control-input" type="radio" id="customRadio3" name="estado" value="1" checked required>
                                            <label for="customRadio3" class="custom-control-label">Activo</label>
                                        </div>
                                        <div class="custom-control custom-radio">
                                            <input class="custom-control-input" type="radio" id="customRadio4" name="estado" value="0" required>
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
                        <a href="{{route('categorias.index')}}" class="btn btn-secondary">Cancel</a>
                        <input type="submit" value="Registrar" class="btn btn-success float-right">
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