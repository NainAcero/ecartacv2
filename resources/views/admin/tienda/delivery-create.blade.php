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
                <h3 class="card-title">Crear Delivery</h3>
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
                <form action="{{route('delivery.restaurante_store')}}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                <label>Seleecione...</label>
                                <select id="generos" name="deliveries[]" class="form-control select2" multiple>
                                    @foreach($deliveries as $delivery)
                                    <option value="{{$delivery->id}}">{{$delivery->nombres}}</option>
                                    @endforeach
                                </select>

                                </div>
                            </div>

                            <div>
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
    <script>
        $(function () {
            $("#tabla").DataTable();
        });
        $(document).ready(function() {
            $('.select2').select2();
        });
    </script>

@endsection
