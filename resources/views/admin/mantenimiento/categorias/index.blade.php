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
        <div class="col-9">
            <div class="card">
            <div class="card-header">
                <h3 class="card-title">Categorias</h3>
                <div class="card-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                    {{-- <input type="text" name="table_search" class="form-control float-right" placeholder="Search"> --}}
                    {{-- @if (!$persona->distrito)
                        <span class="badge bg-warning">No puede adjuntar Plan</span>
                    @else --}}
                    <a href="{{route('categorias.create')}} " class="btn btn-success float-right">Nuevo</a>
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
                            <th>Categorias</th>
                            <th>Slug</th>
                            <th>descripcion</th>
                            <th>Estado</th>
                            <th>Opc</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categorias as $index => $item)
                            <tr>
                                <td>{{$index+1}}</td>
                                <td>{{$item->categoria}}</td>
                                <td>{{$item->slug}}</td>
                                <td>{{$item->descripcion}}</td>
                                <td>
                                    @if ($item->estado == 1)
                                        <span class="badge bg-success">Activo</span>
                                    @else
                                        <span class="badge bg-danger">Inactivo</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('categorias.edit', [$item->id]) }}" class="btn btn-block btn-outline-info btn-sm">Editar</a>
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
        <div class="col-3">
            <ul class="sort_menu list-group">
                @foreach ($cateorder as $item)
                <li class="list-group-item" data-id="{{$item->id}}">
                    <span class="handle"></span>{{$item->categoria}}</li>
                @endforeach
            </ul>
        </div>
    </div>
    {{-- <div class="row">
    </div> --}}
    <style>
        .list-group-item {
            display: flex;
            align-items: center;
        }
    
        .highlight {
            background: #f7e7d3;
            min-height: 30px;
            list-style-type: none;
        }
    
        .handle {
            min-width: 18px;
            background: #607D8B;
            height: 15px;
            display: inline-block;
            cursor: move;
            margin-right: 10px;
        }
    </style>
        <!-- /.row -->
</section>

@endsection

@section('scripts')
    {{--     --}}
    <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
    <link href="https://code.jquery.com/ui/1.11.3/themes/smoothness/jquery-ui.css"/>
    <script>
        $(function () {
            $("#tabla").DataTable({
                "order": [[ 0, "asc" ]],
            });
        });

        $(document).ready(function(){

        function updateToDatabase(idString){
            $.ajaxSetup({ headers: {'X-CSRF-TOKEN': '{{csrf_token()}}'}});
                
            $.ajax({
                url:'{{url('/categoria/update-order')}}',
                method:'POST',
                data:{ids:idString},
                success:function(){
                    // alert('OK')
                        //do whatever after success
                }
            })
        }

        var target = $('.sort_menu');
        target.sortable({
            handle: '.handle',
            placeholder: 'highlight',
            axis: "y",
            update: function (e, ui){
            var sortData = target.sortable('toArray',{ attribute: 'data-id'})
            updateToDatabase(sortData.join(','))
            }
        })

        })
    </script>
    
@endsection