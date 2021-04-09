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
                <h3 class="card-title">Crear Plato a la Carta</h3>
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
                <form action="" method="POST" id="product_form" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                <label>Restaurante</label>
                                @if (Auth::user()->hasRole('Admin'))
                                    <select name="tienda_id" id="" class="form-control" required>
                                        <option value="">- seleccione propietario- </option>
                                        @foreach ($tiendas as $item)
                                            <option value="{{$item->id}}">{{$item->tienda}}</option>
                                        @endforeach
                                    </select>
                                @else
                                <input type="text" name="" id="" value="{{$tienda->tienda}}" readonly class="form-control">
                                
                                @endif
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                <label>Portada</label>
                                <input type="file" name="portada" class="form-control">
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                <label>Portada Url </label>
                                <input type="text" name="portada_url" class="form-control">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                <label>Título del Producto</label>
                                <input type="text" class="form-control" name="producto" required maxlength="190">
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                <label>Precio</label>
                                <input type="text" class="form-control" name="precio">
                                </div>
                            </div>
                            <div class="col-sm-3" hidden>
                                <div class="form-group">
                                <label>Oferta</label>
                                <input type="text" class="form-control" name="oferta" readonly>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                <label>Categorías</label>
                                <select class="form-control select2" name="categoria_id" required>
                                    <option value="">-Seleccione una categoría-</option>
                                    @foreach ($categorias as $item)
                                        <option value="{{$item->id}}">{{$item->categoria}}</option>
                                    @endforeach
                                </select>
                                </div>
                            </div>
                            
                            <div class="col-sm-6">
                                <div class="form-group">
                                <label>Ingredientes</label>
                                <textarea name="ingredientes" id="" cols="30" rows="2" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                <label>Otros detalles</label>
                                <textarea name="contenido" id="" cols="30" rows="10" class="form-control editorhtml"></textarea>
                                </div>
                            </div>
                            
                            <div class="col-sm-6" hidden>
                                <div class="form-group">
                                <label>Destacado</label>
                                <select name="destacado" id="" class="form-control">
                                    <option value="0">No</option>
                                    <option value="1">Si</option>
                                </select>
                                </div>
                            </div>
                            
                            
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Oferta/Promoción</label>
                                    <div class="form-group">
                                        <div class="custom-control custom-radio">
                                            <input class="custom-control-input" type="radio" id="customRadio5" name="oferta" value="1" required>
                                            <label for="customRadio5" class="custom-control-label">Activo</label>
                                        </div>
                                        <div class="custom-control custom-radio">
                                            <input class="custom-control-input" type="radio" id="customRadio6" name="oferta" value="0" checked required>
                                            <label for="customRadio6" class="custom-control-label">Inactivo</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
                            <br>
                            {{-- <div class="col-sm-12">
                                <h2>Galería de Imagenes</h2>
                            </div>
                            <br><br>
                            <div class="col-sm-6">
                                <div class="form-group">
                                <label>Galería 1</label>
                                <input type="file" name="gal1" class="form-control">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                <label>Galería 1 URL </label>
                                <input type="text" name="gal1_url" class="form-control">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                <label>Galería 2</label>
                                <input type="file" name="gal2" class="form-control">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                <label>Galería 2 URL </label>
                                <input type="text" name="gal2_url" class="form-control">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                <label>Galería 3</label>
                                <input type="file" name="gal3" class="form-control">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                <label>Galería 3 URL </label>
                                <input type="text" name="gal3_url" class="form-control">
                                </div>
                            </div> --}}
                        </div>
                    </div>

                    <div class="card-footer">
                    <div class="row">
                        <div class="col-12">
                        <a href="{{route('products.index')}}" class="btn btn-secondary">Cancel</a>
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
    <script src="{{asset('assets/plugins/select2/js/select2.full.min.js')}}"></script>
    <script src="{{asset('assets/plugins/summernote/summernote-bs4.min.js')}}"></script>
    {{-- <script src="https://momentjs.com/downloads/moment.js"></script>
    <script src="{{ asset('js/moment_es_us.js') }}"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.0-alpha14/js/tempusdominus-bootstrap-4.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.0-alpha14/css/tempusdominus-bootstrap-4.min.css" /> --}}

    <script>
        $(function () {
            // $('#datetimepicker5').datetimepicker();
            $("#tabla").DataTable();
        });
        $(document).ready(function() {
            $('.selectpicker').selectpicker();
        });
        $(function () {
            // Summernote
            $('.editorhtml').summernote()
        })
        $(function () {
            //Initialize Select2 Elements
            $('.select2').select2()
        })

        $(document).ready(function(){
            $('#product_form').on('submit', function(event){
                event.preventDefault();
                $('body').loadingModal({
                    text: 'Espere, estamos procesando...',
                    animation: 'threeBounce',
                    opacity:'0.7',
                });
                // $('#load-on').css('display','block');
                $.ajax({
                    url: "{{route('products.store')}}",
                    method: "POST",
                    data: new FormData(this),
                    dataType: 'JSON',
                    contentType: false,
                    cache:false,
                    processData: false,
                    success: function(data){
                        console.log(data);
                        if (data.ok) {
                            alert(data.ok);    
                            location.reload(true);
                            $('body').loadingModal('hide');
                        }else{
                            alert(data.error);
                            location.reload(true);
                        }  
                    },
                    error: function(XMLHttpRequest, textStatus, errorThrown) {
                        // console.log(XMLHttpRequest, textStatus, errorThrown)
                        alert("error servidor: "+ XMLHttpRequest.statusText + textStatus);
                        location.reload(true);
                    }
                })
            })

        })
    </script>
    
@endsection