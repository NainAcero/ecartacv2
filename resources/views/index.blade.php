@extends('frontend.base')

@section('cabecera')
    @include('frontend.cabecera')
    @if ($tiendas != '')
        @include('frontend.categoriasslider')
    @else
        {{-- <article class="my-4">
            <img src="{{asset('ecom/images/banners/ad.png')}}" class="w-100">
        </article> --}}
    @endif
@endsection

@section('content')

    <!-- CATEGORIAS SLIDERS   -->

    <!-- OFERTAS -->
    {{-- @include('frontend.ofertas') --}}

    <!-- TIENDAS -->
    @include('frontend.tienda')
    <!-- PRODUCTOS DESTACADOS -->
    {{-- @include('frontend.destacado') --}}

    <!-- CENTROS COMERCIALES -->
    {{-- @include('frontend.ccomercial') --}}

    <!-- SOLICITUD FORMULARIO -->
    {{-- @include('frontend.solicitud') --}}

    <!-- SERVICIOS -->
    {{-- @include('frontend.servicios') --}}

@endsection
