@extends('frontend.base')

@section('cabecera')
@include('frontend.cabeceramini')

<div class="" id="app">
  <filtrar-categoria idrest='{{$tienda->id}}' celular={{$tienda->celular}} portada={{$tienda->portada}}
    delivery="{{$tienda->delivery}}" tienda="{{ $tienda->tienda }}" imagen_pri="{{ $galeriimagen->imagen_pri}}"
    portada="{{ $tienda->portada }}" facebook="{{ $tienda->facebook }}" direccion="{{ $tienda->direccion }}"
    descripcion="{{ $tienda->descripcion }}" web="{{ $tienda->web }}" cartaext="{{ $tienda->cartaexterna}}">
  </filtrar-categoria>
</div>
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

@endsection
@section('scripts')
<script src="{{ mix('js/app.js') }}" defer></script>
<script src="https://bootstrap-ecommerce.com/bootstrap-ecommerce-html/plugins/owlcarousel/owl.carousel.min.js"></script>
<script>
  // $("#owl-example").owlCarousel({
  //           items : 2,
  //       });
</script>

@endsection
