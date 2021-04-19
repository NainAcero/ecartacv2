@extends('frontend.base')

@section('styles')
{{-- <link href="{{asset('css/feria/css.css?family=Roboto:400,700')}}" type="text/css" rel="stylesheet"> --}}
<link href="{{asset('css/feria/stilos.css')}}" type="text/css" rel="stylesheet">

@endsection

@section('cabecera')
@include('frontend.cabecera')
{{-- <div>
  <iframe src="https://www.facebook.com/plugins/video.php?href=https%3A%2F%2Fwww.facebook.com%2Fwilliam.magwi%2Fvideos%2F10218846790906839%2F&width=320" width="500" height="320" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="false" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share" allowFullScreen="true"></iframe>
</div> --}}
<div class="clients" style="background: #fff;margin-top: 0px;">
  <div class="single-slider">
      <div class="container" style="">
          <div class="row">
              <div class="wrapp">
                  <div class="centroFeria">
                      <div class="recorridoMascara ">
                          <div class="recorridoFeria">
                              <div style="background-image:
                                  url({{ URL::asset('img/portada_feria.png') }});background-size: cover;background-position: center; "
                                  class="stand">

                                  <div class="nominadosMejorStand"></div>
                                  {{-- <h2 style="color:black;"><b>Restaurante 01</b></h2> --}}

                                  <div class="video">
                                      <iframe width="560" height="315" src="https://www.youtube.com/embed/sjY0XPg_xwA"
                                          frameborder="0"
                                          allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                          allowfullscreen></iframe>

                                      <div class="text-center mt-5" hidden>
                                          <a class="btn black "
                                              href="https://meet.google.com/pup-veda-bqy">
                                              <img src="{{ asset('img/logos/meet.png') }}" class="img-fluid rounded " style="width:25px;">
                                              &nbsp&nbspEntrar a la reunión
                                          </a>
                                      </div>
                                  </div>

                                  <div class="marcoBotonesDesplegables" data-id="1532">
                                      <div class="botonContactanos botonesLargos">
                                          <a href="https://www.facebook.com/Culturaltacna" target="_blank">
                                              <img src="{{ asset('img/feria/bc_facebook.png' ) }} ">
                                          </a>
                                      </div>

                                      <div class="botonContactanos botonesLargos">
                                          <a href="https://www.instagram.com/Cultural.tacna/" target="_blank">
                                              <img src="{{ asset('img/feria/bc_instagram.png' ) }}">
                                          </a>
                                      </div>

                                      <div class="botonContactanos botonesLargos">
                                          <a href="https://cultural.edu.pe/tacna/" target="_blank">
                                              <img src="{{ asset('img/feria/bc_web.png' ) }}">
                                          </a>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
</div>
<div class="clients" class="fondoEntradaFeriaDefault" style="background: rgba(255, 255, 255, 0);">
  <div class="container-feria">
    <div class="">
      <div class="">
        <div class="centroFeria">
          <div class="recorridoMascaraIsometrica">
            <div class="feriaIsometrica " style="background-image:
                                url({{ URL::asset('img/feria/fondo-isometrico-puertas-izq.png') }}),
                                url({{ URL::asset('img/feria/fondo-isometrico-puertas-der.png') }}),
                                url({{ URL::asset('img/feria/fondo-isometrico.jpg') }}); ">

              @foreach ($tiendas as $tienda)
              <a href="{{ url('feria/stand') }}" target="_self" class="standIsometrico">
                <img src="{{ asset('img/feria/rest_1.png') }}" alt="">
                <div class="nombre logo">
                  <img src="{{asset($tienda->portada)}}" class="w-100" alt="Ok Computer">
                  <div class="nombre-tienda text-dark text-center">{{$tienda->tienda}}</div>
                </div>
                <div class="content">
                  <div class="text-dark text-center">{{$tienda->tienda}}</div>
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
<div>
  <img src="{{ asset('img/a_muni.png' ) }}"  width="15%" alt="">
  <img src="{{ asset('img/a_gadeli.jpeg' ) }}"  width="15%" alt="">
  <img src="{{ asset('img/a_ecartac.jpg' ) }}"  width="15%" alt="">
</div>
<br>
{{-- <div class="clients" class="fondoEntradaFeriaDefault" style="background: rgba(255, 255, 255, 0);margin-top: -80px">
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
</div> --}}
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