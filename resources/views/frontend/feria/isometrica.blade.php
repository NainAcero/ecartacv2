@extends('frontend.base')

@section('styles')
{{-- <link href="{{asset('css/feria/css.css?family=Roboto:400,700')}}" type="text/css" rel="stylesheet"> --}}
<link href="{{asset('css/feria/stilos.css')}}" type="text/css" rel="stylesheet">

@endsection

@section('cabecera')
@include('frontend.cabecera')

<div class="clients" class="fondoEntradaFeriaDefault" style="background: #fff;">
  <div class="container-feria">
    <div class="">
      <div class="">
        <div class="centroFeria">
          <div class="recorridoMascaraIsometrica">
            <div class="feriaIsometrica " style="background-image:
                                url({{ URL::asset('img/feria/fondo-isometrico-puertas-izq.png') }}),
                                url({{ URL::asset('img/feria/fondo-isometrico-puertas-der.png') }}),
                                url({{ URL::asset('img/feria/fondo-isometrico.jpg') }}); ">

              @foreach ([1,1,1,1,1,1,1,1,1,1,1,1,1,1,1] as $item)
              <a href="{{ url('feria/stand') }}" target="_self" class="standIsometrico">
                <img src="{{ asset('img/feria/rest_1.png') }}" alt="" width="290">
                <div class="nombre ocultar_name logo">
                  <img src="{{ asset('img/prueba.jpg') }}" class="w-100" alt="Ok Computer">
                </div>
                {{-- <div class="nombre ocultar_name text-center">Ok Computer </div> --}}
              </a>
              @endforeach
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<hr>
<br>
<div class="clients" class="fondoEntradaFeriaDefault" style="background: #fff;margin-top: -80px">
  <div class=" container">
    <div class="row">
      <div class="listadoExpositores">
        <div class="botonDesplegableExpositores">
          <img src="{{ asset('img/feria/flecha-desplegar.png') }}" alt="" width="20">
          <b>Listado de expositores </b>
        </div>

        <div class="listadoExpositoresOculto">
          <div class="listadoExpositoresMarco">
            @foreach ([1,1,1,1,1,1,1,1,1,1,1,1,1,1,1] as $item)
            <a class="nombreExpositor" href="{{ url('feria/stand') }}">Ok Computer</a>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@section('scripts')

<script>
  $(document).ready(function(e) {
        function escogerimagenb() {

        }
        escogerimagenb();
        $(".botonDesplegableExpositores").click(function() {
            $(".listadoExpositoresOculto").slideToggle(100);
            $(".botonDesplegableExpositores img").toggleClass("cerrar");
        })
    });
</script>

@endsection