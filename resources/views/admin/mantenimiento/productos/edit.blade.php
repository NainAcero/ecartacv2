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
                <h3 class="card-title">Editar Plato</h3>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                
                </div>
                <form action="" id="product_form" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                <label>Restaurante</label>
                                <input type="text" name="" id="" value="{{$producto->tienda->tienda}}" class="form-control" readonly>
                                {{-- <select name="tienda_id" id="" class="form-control">
                                    <option value="">- seleccione propietario- </option>
                                    @foreach ($tiendas as $item)
                                        <option value="{{$item->id}}" {{$item->id == $producto->tienda_id ? 'selected':''}}>{{$item->tienda}}</option>
                                    @endforeach
                                </select> --}}
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                <label>Portada</label>
                                <input type="file" name="portada" class="form-control">
                                <img src="{{asset($producto->portada)}}" alt="" width="150px">
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
                                <input type="text" class="form-control" name="producto" value="{{$producto->producto}}" required maxlength="190">
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                <label>Precio</label>
                                <input type="text" class="form-control" name="precio" value="{{$producto->precio}}">
                                </div>
                            </div>
                            <div class="col-sm-3" hidden>
                                <div class="form-group">
                                <label>Oferta</label>
                                <input type="text" class="form-control" name="oferta" value="{{$producto->oferta}}" readonly>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                <label>Categorías</label>
                                <select class="form-control select2" name="categoria_id" required>
                                    <option value="">-Seleccione una categoría-</option>
                                    @foreach ($categorias as $item)
                                        <option value="{{$item->id}}" {{$item->id == $producto->categoria_id ? 'selected':''}}>{{$item->categoria}}</option>
                                    @endforeach
                                </select>
                                </div>
                            </div>
                            
                            <div class="col-sm-6">
                                <div class="form-group">
                                <label>Ingredientes</label>
                                <textarea name="ingredientes" id="" cols="30" rows="2" class="form-control">{{$producto->ingredientes}}</textarea>
                                {{-- <input type="text" name="ingredientes" id="" class="form-control" value="{{$producto->ingredientes}}"> --}}
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                <label>Otros detalles</label>
                                <textarea name="contenido" id="" cols="30" rows="10" class="form-control editorhtml">{{$producto->contenido}}</textarea>
                                </div>
                            </div>
                            
                            {{-- <div class="col-sm-6">
                                <div class="form-group">
                                <label>Destacado</label>
                                <select name="destacado" id="" class="form-control">
                                    <option value="0" @if(old('0',$producto->destacado) == '0') selected @endif>No</option>
                                    <option value="1" @if(old('1',$producto->destacado) == '1') selected @endif>Si</option>
                                </select>
                                </div>
                            </div> --}}
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Oferta/Promoción</label>
                                    <div class="form-group">
                                        <div class="custom-control custom-radio">
                                            <input class="custom-control-input" type="radio" id="customRadio5" name="oferta" value="1" required {{ 1 == old('oferta', $producto->oferta) ? 'checked' : '' }}>
                                            <label for="customRadio5" class="custom-control-label">Activo</label>
                                        </div>
                                        <div class="custom-control custom-radio">
                                            <input class="custom-control-input" type="radio" id="customRadio6" name="oferta" value="0" required {{ 0 == old('oferta', $producto->oferta) ? 'checked' : '' }}>
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
                                            <input class="custom-control-input" type="radio" id="customRadio3" name="estado" value="1" required {{ 1 == old('estado', $producto->estado) ? 'checked' : '' }}>
                                            <label for="customRadio3" class="custom-control-label">Activo</label>
                                        </div>
                                        <div class="custom-control custom-radio">
                                            <input class="custom-control-input" type="radio" id="customRadio4" name="estado" value="0" required {{ 0 == old('estado', $producto->estado) ? 'checked' : '' }}>
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
                                @if ($galeriimagen)
                                <img src="{{asset($galeriimagen->imagen_pri)}}" alt="" width="150px">
                                    
                                @endif
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
                                @if ($galeriimagen)
                                    
                                <img src="{{asset($galeriimagen->imagen_seg)}}" alt="" width="150px">
                                @endif
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
                                @if ($galeriimagen)
                                    
                                <img src="{{asset($galeriimagen->imagen_ter)}}" alt="" width="150px">
                                @endif
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
                    url: "{{route('products.update', $producto->slug)}}",
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
                            window.location.href = "{{route('products.index')}}";
                            $('body').loadingModal('hide');
                        }else{
                            alert(data.error);
                            location.reload(true);
                        }  
                    },
                    error: function(XMLHttpRequest, textStatus, errorThrown) {
                        alert("error servidor: "+ XMLHttpRequest.statusText);
                        location.reload(true);
                    }
                })
            })

        })
    </script>
    
@endsection