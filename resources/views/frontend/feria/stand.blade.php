@extends('frontend.base')

@section('styles')
    <link href="{{asset('css/feria/css.css?family=Roboto+Condensed:400,700')}}" type="text/css" rel="stylesheet">
    <link href="{{asset('css/feria/stilos.css')}}" type="text/css" rel="stylesheet">
@endsection

@section('cabecera')
    @include('frontend.cabecera')

    <div class="clients" style="background: #fff;margin-top: 20px;">
        <div class="owl-nav1">
            <a href="#">
                <div class="owl-prev" style=""><i class="fa fa-angle-left" aria-hidden="true"></i></div>
            </a>

            <a href="#">
                <div class="owl-next" style=""><i class="fa fa-angle-right" aria-hidden="true"></i></div>
            </a>
        </div>
        <div class="single-slider">
            <div class="container" style="">
                <div class="row">
                    <div class="wrapp">
                        <div class="centroFeria">
                            <div class="recorridoMascara ">
                                <div class="recorridoFeria">
                                    <div style="background-image:
                                        url({{ URL::asset('img/standferia10.png') }});background-size: cover;background-position: center; "
                                        class="stand">

                                        <div class="nominadosMejorStand"></div>
                                        <h2 style="color:black;"><b>Restaurante 01</b></h2>

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
    <hr>
    <br>
    <div class="clients" class="fondoEntradaFeriaDefault" style="background: #fff;margin-top: -80px">
        <div class=" container">
            <div class="text-center  mb-3 ">
                <a href="{{ url('feria/isometrica') }}">
                    <img src="{{ asset('img/feria/volver.png' ) }}" class=" " style="width:40px;">
                    <h6>Volver</h6>
                </a>
            </div>

            <div class="row">
                <div class="listadoExpositores">
                    <div class="botonDesplegableExpositores">
                        <img src="{{ asset('img/feria/flecha-desplegar.png' ) }}" alt="" width="20">
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
