@extends('frontend.base')

@section('cabecera')
@include('frontend.cabecera')
{{-- <article class="my-4">
        <img src="{{asset('ecom/images/banners/ad.png')}}" class="w-100">
</article> --}}
@include('frontend.cabeceratienda')
@endsection

@section('content')

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
    <filtrar-categoria idrest='{{$tienda->id}}' celular={{$tienda->celular}} portada={{$tienda->portada}}
      delivery="{{$tienda->delivery}}"></filtrar-categoria>
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