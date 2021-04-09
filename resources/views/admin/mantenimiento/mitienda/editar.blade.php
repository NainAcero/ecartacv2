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
                <h3 class="card-title">Configuración Restaurante</h3>
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
                <form action="{{url('mitienda', $user->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-sm-12 col-lg-12">
                                <div class="card card-primary card-outline card-outline-tabs">
                                    <div class="card-header p-0 border-bottom-0">
                                    <ul class="nav nav-tabs" id="custom-tabs-three-tab" role="tablist">
                                        <li class="nav-item">
                                        <a class="nav-link active" id="custom-tabs-three-home-tab" data-toggle="pill" href="#custom-tabs-three-home" role="tab" aria-controls="custom-tabs-three-home" aria-selected="true">Datos Personales</a>
                                        </li>
                                        <li class="nav-item">
                                        <a class="nav-link" id="custom-tabs-three-messages-tab" data-toggle="pill" href="#custom-tabs-three-messages" role="tab" aria-controls="custom-tabs-three-messages" aria-selected="false">Datos Comerciales</a>
                                        </li>
                                    </ul>
                                    </div>
                                    <div class="card-body">
                                    <div class="tab-content" id="custom-tabs-three-tabContent">
                                        <div class="tab-pane fade show active" id="custom-tabs-three-home" role="tabpanel" aria-labelledby="custom-tabs-three-home-tab">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                    <label>Nombres *</label>
                                                    <input type="text" class="form-control" name="nombres" value="{{$user->persona->nombres}}" required>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                    <label>Apellidos *</label>
                                                    <input type="text" class="form-control" name="apellidos" value="{{$user->persona->apellidos}}" required>
                                                    </div>
                                                </div>
                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                    <label>Dni</label>
                                                    <input type="text" class="form-control" name="dni" value="{{$user->persona->dni}}">
                                                    </div>
                                                </div>
                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                    <label>Celular *</label>
                                                    <input type="text" class="form-control" name="celular" value="{{$user->persona->celular}}" required>
                                                    </div>
                                                </div>
                                                {{-- <div class="col-sm-3">
                                                    <div class="form-group">
                                                    <label>Tipo Persona *</label>
                                                    <select name="tipo" id="" class="form-control">
                                                        <option value="N">Natural</option>
                                                        <option value="J">Juridica</option>
                                                    </select>
                                                    </div>
                                                </div> --}}
                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                    <label>Ciudad *</label>
                                                    <input type="text" class="form-control" name="ciudad" value="Tacna" value="{{$user->persona->ciudad}}" required>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-sm-6 col-lg-6">
                                                    <div class="form-group row">
                                                        <label for="username" class="col-md-4 col-form-label text-md-right">{{ __('Username') }}</label>
                                                        <div class="col-md-6">
                                                            <input id="username" type="username" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ $user->username }}" required autocomplete="username"> 
                                                            @error('username')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>                    
                                                    <div class="form-group row">
                                                        <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
                                                        <div class="col-md-6">
                                                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password">
                                                            @error('password')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>                    
                                                        <div class="col-md-6">
                                                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" autocomplete="new-password">
                                                        </div>
                                                    </div>
                                                </div>
                                                @if (Auth::user()->hasRole('Admin'))
                                                    <div class="col-12 col-sm-6 col-lg-6">
                                                        <label for="">Asignar Roles</label>
                                                        <ul>
                                                            @foreach($roles as $role)
                                                            <li>
                                                                <label>
                                                                    <input type="checkbox" name="roles[]" 
                                                                    @foreach ( $userRole as $rolexist )
                                                                            {{ $rolexist->id == $role->id ? 'checked' : '' }}
                                                                    @endforeach
                                                                        value="{{ $role->id }}"> {{ $role->name }}
                                                                    <em>({{ $role->guard_name }})</em>	        
                                                                </label>
                                                            </li>
                                                            @endforeach
                                                            
                                                        </ul>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="custom-tabs-three-messages" role="tabpanel" aria-labelledby="custom-tabs-three-messages-tab">
                                            <div class="form-group row">
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                    <label>Tipo Restaurante</label>
                                                    <select name="tipo_id" id="" class="form-control" required>
                                                        @foreach ($tipos as $item)
                                                            <option value="{{$item->id}}" {{$item->id == $user->persona->tienda->tipo_id ? 'selected':''}}>{{$item->tipo}}</option>
                                                        @endforeach
                                                    </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                    <label>Nombre Restaurante</label>
                                                    <input type="text" class="form-control" name="tienda" value="{{$user->persona->tienda->tienda}}" required>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                    <label>Celular</label>
                                                    <input type="text" class="form-control" name="celulart" value="{{$user->persona->tienda->celular}}">
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                    <label>Facebook</label>
                                                    <input type="text" class="form-control" name="facebook" value="{{$user->persona->tienda->facebook}}">
                                                    </div>
                                                </div>
                                                {{-- <div class="col-sm-4">
                                                    <div class="form-group">
                                                    <label>Instagram</label>
                                                    <input type="text" class="form-control" name="instagram" value="{{$user->persona->tienda->instagram}}">
                                                    </div>
                                                </div> --}}
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                    <label>Web</label>
                                                    <input type="text" class="form-control" name="web" value="{{$user->persona->tienda->web}}">
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                    <label>Direccion</label>
                                                    <input type="text" class="form-control" name="direccion" value="{{$user->persona->tienda->direccion}}">
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                    <label>Logo</label>
                                                    <input type="file" name="portada" class="form-control">
                                                    <img src="{{asset($user->persona->tienda->portada)}}" alt="" width="150px">
                                                    </div>
                                                </div>
                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                    <label>Descripción</label>
                                                    <textarea name="descripcion" id="" cols="30" rows="5" class="form-control">{{$user->persona->tienda->descripcion}}</textarea>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                    <label>Ubicación (copiar iframe de google maps)</label>
                                                    <textarea name="mapa" id="" cols="30" rows="5" class="form-control">{{$user->persona->tienda->mapa}}</textarea>
                                                    </div>
                                                </div>
                                                @if (Auth::user()->hasRole('Admin'))
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label>Estado</label>
                                                            <div class="form-group">
                                                                <div class="custom-control custom-radio">
                                                                    <input class="custom-control-input" type="radio" id="customRadio3" name="estado" value="1" required {{ 1 == old('estado', $user->persona->tienda->estado) ? 'checked' : '' }}>
                                                                    <label for="customRadio3" class="custom-control-label">Activo</label>
                                                                </div>
                                                                <div class="custom-control custom-radio">
                                                                    <input class="custom-control-input" type="radio" id="customRadio4" name="estado" value="0" required {{ 0 == old('estado', $user->persona->tienda->estado) ? 'checked' : '' }}>
                                                                    <label for="customRadio4" class="custom-control-label">Inactivo</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label>Verificado</label>
                                                            <div class="form-group">
                                                                <div class="custom-control custom-radio">
                                                                    <input class="custom-control-input" type="radio" id="customRadio5" name="verificado" value="1" required {{ 1 == old('verificado', $user->persona->tienda->verificado) ? 'checked' : '' }}>
                                                                    <label for="customRadio5" class="custom-control-label">Activo</label>
                                                                </div>
                                                                <div class="custom-control custom-radio">
                                                                    <input class="custom-control-input" type="radio" id="customRadio6" name="verificado" value="0" required {{ 0 == old('verificado', $user->persona->tienda->verificado) ? 'checked' : '' }}>
                                                                    <label for="customRadio6" class="custom-control-label">Inactivo</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endif
                                                <br>
                                                <div class="col-sm-12">
                                                    <h2>Portada</h2>
                                                </div>
                                                <br><br>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                    <label>Subir</label>
                                                    <input type="file" name="gal1" class="form-control">
                                                    @if ($galeriimagen)
                                                    <img src="{{asset($galeriimagen->imagen_pri)}}" alt="" width="150px">
                                                        
                                                    @endif
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                    <label>Pega un URL de imagen</label>
                                                    <input type="text" name="gal1_url" class="form-control">
                                                    </div>
                                                </div>
                                                {{-- <div class="col-sm-6">
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
                                                    <label>Galería 2 URL</label>
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
                                                    <label>Galería 3 URL</label>
                                                    <input type="text" name="gal3_url" class="form-control">
                                                    </div>
                                                </div> --}}
                                                
                                            </div>
                                            <div>
                                                <input type="submit" value="Actualizar" class="btn btn-success float-right">
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                    <!-- /.card -->
                                </div>
                            </div>
                        </div>
                        
                        
                    </div>

                    <div class="card-footer">
                    <div class="row">
                        <div class="col-12">
                        {{-- <a href="{{route('personal.index')}}" class="btn btn-secondary">Cancel</a> --}}
                        
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