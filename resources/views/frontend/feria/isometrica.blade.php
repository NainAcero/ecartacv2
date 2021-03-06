@extends('frontend.base')

@section('styles')
{{-- <link href="{{asset('css/feria/css.css?family=Roboto:400,700')}}" type="text/css" rel="stylesheet"> --}}
<link href="{{asset('css/feria/stiloss.css')}}" type="text/css" rel="stylesheet">

<style>
  .feriaIsometrica {
    /* background-image: url('{{ URL::asset('img/feria/fondo-isometrico-puertas-izq.png') }}'),
    url('{{ URL::asset('img/feria/fondo-isometrico-puertas-der.png') }}'); */
  }
  /* url('{{ URL::asset('img/feria/fondo-isometrico.jpg') }}'); */

  @media (max-width: 576px) {
    .feriaIsometrica {
      /* background-image: url('{{ URL::asset('img/feria/fondo-isometrico.jpg') }}'); */
      background-image: url('{{ URL::asset('img/feria/fondo-isometrico-tapete2.png') }}');
    }
  }
</style>

@endsection

@section('cabecera')
@include('frontend.cabecera')
{{-- <div>
  <iframe src="https://www.facebook.com/plugins/video.php?href=https%3A%2F%2Fwww.facebook.com%2Fwilliam.magwi%2Fvideos%2F10218846790906839%2F&width=320" width="500" height="320" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="false" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share" allowFullScreen="true"></iframe>
</div> --}}
<div class="clients" style="background: #fff;margin-top: 0px;">
  <div class="single-slider">
    <div class="">
      <div class="wrapp w-100 m-0">
        <div class="centroFeria">
          <div class="recorridoMascara ">
            <div class="recorridoFeria">
              <div
                style="background-image:
                              url({{ URL::asset('img/portada_expoferia3.png') }});background-size: cover;background-position: center; background-repeat:no-repeat"
                class="stand">

                <div class="nominadosMejorStand"></div>
                {{-- <h2 style="color:black;"><b>Restaurante 01</b></h2> --}}
                <style>
                  .arte-middle-front {
                      display: flex;
                      align-items: center;
                      justify-content: center;
                      width: 100%;
                      height: 20%;
                      flex-direction: row;
                  }
                  .arte-middle-front .center-middle {
                      width: 100%;
                      display: flex;
                      height: auto;
                      align-items: center;
                      justify-content: center;
                      flex-direction: row;
                  }
                  .arte-middle-front .center-middle img {
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    width: 100%;
                    height: auto;
                    border: 3px solid #CCC;
                    -webkit-box-shadow: 1px 1px 1px 2px rgb(0 0 0 / 40%);
                    -moz-box-shadow: 1px 1px 1px 2px rgba(0, 0, 0, 0.4);
                    box-shadow: 1px 1px 1px 2px rgb(0 0 0 / 40%);
                    flex-direction: row;
                }
                </style>

                
              <div class="video">
                
                <div class="arte-middle-front">
                  <div class="center-middle">
                    <img src="{{ URL::asset('img/feria/feriatacna.jpeg') }}">
                  </div>
                </div>
                <br>
                {{-- <a href="https://itacna.pe/" target="../" class="btn btn-warning" style="background-color: #880E4F">CLICK AQU?? PARA VER M??S SECTORES: Bodegas - Pasteler??as - Artesan??a - Salones de belleza - Sector comercial - Prendas - Otros</a> --}}
                  
                  {{-- <iframe width="600" height="500" src="https://www.youtube.com/embed/avaK1fE6oso" frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen></iframe> --}}
                    {{-- <img src="{{ URL::asset('img/feria/bannerferia.jpg') }}" width="600" height="500" alt=""> --}}

                    {{-- <iframe src="https://www.facebook.com/plugins/video.php?height=314&href=https%3A%2F%2Fwww.facebook.com%2FMunicipalidadProvincialDeTacna%2Fvideos%2F498352388145017%2F&show_text=false&width=560" width="560" height="314" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share" allowFullScreen="true"></iframe> --}}

                  <div class="text-center mt-5" hidden>
                    <a class="btn black " href="https://meet.google.com/pup-veda-bqy">
                      <img src="{{ asset('img/logos/meet.png') }}" class="img-fluid rounded " style="width:25px;">
                      &nbsp&nbspEntrar a la reuni??n
                    </a>
                  </div>
                </div>

                <div class="marcoBotonesDesplegables" data-id="1532">
                  <div class="botonContactanos botonesLargos">
                    <a href="https://www.facebook.com/ecartac" target="_blank">
                      <img src="{{ asset('img/feria/bc_facebook.png' ) }} ">
                    </a>
                  </div>

                  <div class="botonContactanos botonesLargos">
                <a href="https://wa.me/51952633245?text=M%C3%A1s%20informaci%C3%B3n%20sobre%20el EXPOFERIA DIGITAL 2021" target="_blank">
                  <img src="{{ asset('img/feria/bc_whatsapp.png' ) }}">
                  </a>
                </div>

                {{-- <div class="botonContactanos botonesLargos">
                <a href="https://cultural.edu.pe/tacna/" target="_blank">
                  <img src="{{ asset('img/feria/bc_web.png' ) }}">
                </a> --}}
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
            <div class="feriaIsometrica">

              @foreach ($tiendas as $tienda)
              <a href="{{url('r/'.$tienda->slug)}}" target="_self" class="standIsometrico">
                <img src="{{ asset($tienda->standimg) }}" alt="">
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
<div class="container-fluid">
  <div class="overflow-hidden owl-carousel">
    <img src="{{ asset('img/a_muni.png' ) }}" class="px-0 w-100" alt="">
    {{-- <img src="{{ asset('img/a_cautiva.jpeg' ) }}" class="px-0 w-100" alt=""> --}}
    <img src="{{ asset('img/a_ecartac.jpg' ) }}" class="px-0 w-100" alt="">
    <img src="{{ asset('img/a_muni.png' ) }}" class="px-0 w-100" alt="">
    {{-- <img src="{{ asset('img/a_cautiva.jpeg' ) }}" class="px-0 w-100" alt=""> --}}
    <img src="{{ asset('img/a_ecartac.jpg' ) }}" class="px-0 w-100" alt="">
  </div>
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"
  integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw=="
  crossorigin="anonymous"></script>
<script>
  $(document).ready(function(e) {
        $(".botonDesplegableExpositores").click(function() {
            $(".listadoExpositoresOculto").slideToggle(100);
            $(".botonDesplegableExpositores img").toggleClass("cerrar");
        })

        $('.owl-carousel').owlCarousel({
            loop:true,
            margin:0,
            autoplay:true,
            autoplayTimeout:1000,
            autoplayHoverPause:true,
            responsive: {
              0:{
                items: 3
              },
              768: {
                items:6
              }
            }
        })
    });
</script>

@endsection
