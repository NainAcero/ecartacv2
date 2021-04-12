@extends('frontend.base')

@section('cabecera')
    @include('frontend.cabecera')
@endsection

@section('content')

@section('ogTitle')
    {{$tienda->tienda}}
@stop
@section('ogDesc')
    {{$tienda->descripcion}}
@stop
@section('ogImage')
    {{asset($tienda->portada)}}
@stop

<div class="" id="app">
    <filtrar-categoria
        idrest='{{$tienda->id}}'
        celular={{$tienda->celular}}
        portada={{$tienda->portada}}
        delivery="{{$tienda->delivery}}"
        tienda="{{ $tienda->tienda }}"
        imagen_pri="{{ $galeriimagen->imagen_pri}}"
        portada="{{ $tienda->portada }}"
        facebook="{{ $tienda->facebook }}"
        >
    </filtrar-categoria>
</div>


@endsection
@section('scripts')
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://bootstrap-ecommerce.com/bootstrap-ecommerce-html/plugins/owlcarousel/owl.carousel.min.js"></script>
    <script>
        $("#owl-example").owlCarousel({
            items : 2,
        });
    </script>
@endsection
