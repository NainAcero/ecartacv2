@extends('frontend.base')

@section('cabecera')
    @include('frontend.cabecera')
    {{-- <article class="my-4">
        <img src="{{asset('ecom/images/banners/ad.png')}}" class="w-100">
    </article> --}}
@endsection

@section('content')

<div class="row">

    <div class="col-md-12">
        {{-- <div class="card-banner">
            <div class="card-body" style="height:250px; background-image: url('{{asset($galeriimagen->imagen_seg)}}');"> </div>
            <div class="text-bottom">
                <div class="icontext mb-3">
                    <img class="icon icon-md rounded-circle" src="{{asset($tienda->portada)}}">
                    <h3 class="card-title">{{$tienda->tienda}} </h3>
                </div>
                <br>
                <a href="https://wa.me/51{{$tienda->celular}}?text=Hola {{$tienda->tienda}} deseo más información..."
                    target=".../"
                    class="btn btn-success btn-sm">
                        </i> Info <i class="fab fa-whatsapp"></i>
                </a>
                <a href="tel:+51{{$tienda->celular}}" class="btn btn-info btn-sm">{{$tienda->celular}} <i class="fas fa-phone"></i></a>
                @if ($tienda->facebook)
                <a href="{{$tienda->facebook}}" target="../" class="btn btn-secondary btn-sm">FB <i class="fab fa-facebook"></i></a>
                @endif
            </div>
        </div> --}}

        {{-- META --}}
        @section('ogTitle')
            {{$tienda->tienda}}
        @stop
        @section('ogDesc')
            {{$tienda->descripcion}}
        @stop
        @section('ogImage')
            {{asset($tienda->portada)}}
        @stop
<!-- ============================ COMPONENT BANNER 5  ================================= -->
      {{-- <div class="card-banner img-fluid rounded" style="height:400px; background-image: url('{{asset($galeriimagen->imagen_pri)}}');"> --}}
        <div class="card-banner img-fluid rounded" style="height:400px; background-image: url('{{asset("ecom/images/banners/slide-lg-2.jpg")}}');">
        <article class="text-bottom">
            <div class="icontext mb-3">
                {{-- <img class="icon icon-md rounded-circle" src="{{asset($tienda->portada)}}"> --}}
                <img src="{{asset('img/elpadrino-logo.png')}}" class="icon icon-md rounded-circle">
                <h3 class="card-title">{{$tienda->tienda}} </h3>
            </div>

            <p>
                {{$tienda->descripcion}}
            </p>

            <a href='https://wa.me/51{{$tienda->celular}}?text=Hola "{{$tienda->tienda}}", ...'
                target=".../"
                class="btn btn-success ">
                    </i> Info <i class="fab fa-whatsapp"></i>
            </a>
            <a href="tel:+51{{$tienda->celular}}" class="btn btn-info ">Llamar <i class="fas fa-phone"></i></a>
            @if ($tienda->facebook)
            <a href="{{$tienda->facebook}}" target="../" class="btn btn-secondary" style="background-color: #0d3be0;"> <i class="fab fa-facebook-f"></i></a>
            @endif
            @if ($tienda->web)
            <a href="{{$tienda->web}}" target="../" class="btn btn-gray "> <i class="fab fa-internet-explorer"></i></a>
            @endif
            <p>
                {{$tienda->direccion}}
            </p>
         </article>
      </div>
<!-- ============================ COMPONENT BANNER 5  END .// =========================== -->
    </div> <!-- col.// -->

</div>

<style>
</style>
{{-- <section  class="padding-bottom-sm">
    <h3 class="doc-subtitle">Promociones / Ofertas </h3>

    <div id="owl-example" class="slider-items-owl owl-carousel owl-theme ">
        <div class="item-slide">
            <figure class="card card-product-grid">
                <div class="img-wrap">
                    <span class="badge badge-danger"> New </span>
                    <img src="http://localhost:8000/productos/1611720484-al-pastor-1611720483.jpg">
                </div>
                <figcaption class="info-wrap text-center">
                    <h6 class="title text-truncate"><a href="#">First item name</a></h6>
                </figcaption>
            </figure>
        </div>
        <div class="item">
            <figure class="card card-product-grid">
                <div class="img-wrap"> <img src="http://localhost:8000/tienda/1611843799-machu-picchu-pizzeria-trattoria.jpg"> </div>
                <figcaption class="info-wrap text-center">
                    <h6 class="title"><a href="#">Second item name</a></h6>
                </figcaption>
            </figure>
        </div>

    </div>

</section> --}}

<section class="section-content padding-y">

    <div class="" id="app">
        <filtrar-categoria idrest='{{$tienda->id}}' celular={{$tienda->celular}} portada={{$tienda->portada}} delivery="{{$tienda->delivery}}"></filtrar-categoria>
    </div> <!-- container .//  -->
</section>


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
