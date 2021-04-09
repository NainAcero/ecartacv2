@extends('frontend.base')

@section('styles')
    <link href="{{asset('css/feria/css.css?family=Roboto+Condensed:400,700')}}" type="text/css" rel="stylesheet">
    <link href="{{asset('css/feria/stilosEntrada.css')}}" type="text/css" rel="stylesheet">
@endsection

@section('cabecera')
    @include('frontend.cabecera')

    <div class="clients" class="fondoEntradaFeriaDefault" style="background-image: url({{ URL::asset('img/fondoFeriaDemo.jpg') }});margin-top: 40px">
        <div class=" container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="ticketZone">
                        <div class="bloqueTitular">
                            <div class="titulo" style="color:#011F55">
                                <h1>
                                    <a href="/" title="Volver a la página principal">
                                        <img src="{{ asset('img/feria/volver.png') }}" width="35" height="auto">
                                    </a> ECARTAC - 2021
                                </h1>
                            </div>
                            <p>EDICIÓN VIRTUAL</p>
                            <p class="nota" style="color:#1281E8;font-size:15px;">Haz clic en el <b>ticket ↓</b> para ingresar al pabellón.</p>
                        </div>
                    </div>
                    <div class="choose-right">
                        <div class="Tiquete">
                            <a href="{{ url('feria/isometrica') }}">
                                <img class="img-src" src="{{ asset('img/feria/ticket-pago-bg.png') }}" alt="#">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="escarapelaZone">
                        <div class="logoFeria">
                            <img class="img-src" src="{{ asset('img/logos/feria/logoFeriaDemo.png') }}" ?>">
                        </div>

                        <div class="zonaVideoPabellon">

                        </div>

                        <div class="franjaPatrocinadores">
                            <div class="tituloPatrocinadores">
                                <h3>Restaurantes</h3>
                            </div>
                            <div class="logosPatrocinadoresSecundarios">
                                <div class="p-2"  >
                                    <img width="150" height="60" src="{{ asset('img/prueba.jpg') }}" alt="">
                                </div>
                                <div class="p-2"  >
                                    <img width="150" height="60" src="{{ asset('img/prueba.jpg') }}" alt="">
                                </div>
                                <div class="p-2"  >
                                    <img width="150" height="60" src="{{ asset('img/prueba.jpg') }}" alt="">
                                </div>
                                <div class="p-2"  >
                                    <img width="150" height="60" src="{{ asset('img/prueba.jpg') }}" alt="">
                                </div>
                                <div class="p-2"  >
                                    <img width="150" height="60" src="{{ asset('img/prueba.jpg') }}" alt="">
                                </div>
                                <div class="p-2"  >
                                    <img width="150" height="60" src="{{ asset('img/prueba.jpg') }}" alt="">
                                </div>
                                <div class="p-2"  >
                                    <img width="150" height="60" src="{{ asset('img/prueba.jpg') }}" alt="">
                                </div>
                                <div class="p-2"  >
                                    <img width="150" height="60" src="{{ asset('img/prueba.jpg') }}" alt="">
                                </div>
                                <div class="p-2"  >
                                    <img width="150" height="60" src="{{ asset('img/prueba.jpg') }}" alt="">
                                </div>
                                <div class="p-2"  >
                                    <img width="150" height="60" src="{{ asset('img/prueba.jpg') }}" alt="">
                                </div>
                                <div class="p-2"  >
                                    <img width="150" height="60" src="{{ asset('img/prueba.jpg') }}" alt="">
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

