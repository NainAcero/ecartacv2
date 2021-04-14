<section class="">

  <div class="d-block w-100">
    {{-- <div class="card-banner">
            <div class="card-body" style="height:250px; background-image: url('{{asset($galeriimagen->imagen_seg)}}');">
  </div>
  <div class="text-bottom">
    <div class="icontext mb-3">
      <img class="icon icon-md rounded-circle" src="{{asset($tienda->portada)}}">
      <h3 class="card-title">{{$tienda->tienda}} </h3>
    </div>
    <br>
    <a href="https://wa.me/51{{$tienda->celular}}?text=Hola {{$tienda->tienda}} deseo más información..." target=".../"
      class="btn btn-success btn-sm">
      </i> Info <i class="fab fa-whatsapp"></i>
    </a>
    <a href="tel:+51{{$tienda->celular}}" class="btn btn-info btn-sm">{{$tienda->celular}} <i
        class="fas fa-phone"></i></a>
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
  {{-- <div class="card-banner img-fluid rounded" style="height:400px; background-image: url('{{asset($galeriimagen->imagen_pri)}}');">
  --}}
  <div class="card-banner card-bodyv2 img-fluid d-flex restaurant-header"
    style="background-image: url('{{asset($galeriimagen->imagen_pri)}}');">
    <article class="restaurant-content container">
      <div class="icontext mb-3 align-items-end">
        <div class="d-flex align-items-center">
          <div class="restaurant-img mr-4">
            {{-- <img class="icon icon-md rounded-circle" src="{{asset($tienda->portada)}}"> --}}
            <img src="{{asset('img/elpadrino-logo.png')}}" class="icon rounded-circle">
          </div>
          <div class="restaurant-info">
            <h3 class="card-title">{{$tienda->tienda}} </h3>
            <p class="restaurant-description mb-3">{{$tienda->descripcion}}</p>
            <p class="restaurant-direccion"><i class="fa fa-map-marker-alt"></i> {{$tienda->direccion}}</p>
          </div>
        </div>
      </div>
      <div class="restaurant-socials mb-3">
        <a href='https://wa.me/51{{$tienda->celular}}?text=Hola "{{$tienda->tienda}}", ...'  target=".../"
          class="btn btn-lg btn-success ">
          </i><i class="fab fa-whatsapp"></i>
        </a>
        <a href="tel:+51{{$tienda->celular}}" class="btn btn-lg btn-info "><i class="fas fa-phone"></i></a>
        @if ($tienda->facebook)
        <a href="{{$tienda->facebook}}" target="../" class="btn btn-lg btn-secondary"
          style="background-color: #0d3be0;">
          <i class="fab fa-facebook-f"></i></a>
        @endif
        @if ($tienda->web)
        <a href="{{$tienda->web}}" target="../" class="btn btn-gray "> <i class="fab fa-internet-explorer"></i></a>
        @endif
      </div>
    </article>
  </div>
  <!-- ============================ COMPONENT BANNER 5  END .// =========================== -->
  </div> <!-- col.// -->

  </div>