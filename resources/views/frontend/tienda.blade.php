@if ($tiendas != '')

{{-- <section class="padding-bottom">
    <header class="section-heading heading-line">
        <h4 class="title-section text-uppercase">Restaurantes</h4>
    </header>
    <div class="card card-home-category">
    <div class="row no-gutters">
        <div class="col-md-3">
        <div class="home-category-banner bg-light-orange" style="background-color: #f9d8ae3d; !important">
            <h5 class="title">Encuentra todo los Restaurantes aquí</h5>
            <a href="{{url('restaurantes')}}" class="btn btn-outline-primary rounded-pill">Ver todos</a>
            <img src="ecom/images/rest.png" class="img-bg" style="right: -70px; bottom: -15px; height: 170px;">
        </div>
        </div>
        <div class="col-md-9">
        <ul class="row no-gutters bordered-cols">
            @foreach ($tiendas as $item)
            <li class="col-6 col-lg-3 col-md-4">
                <a href="{{url('r/'.$item->slug)}}" class="item">
                    <div class="card-body">
                        <h6 class="title">{{$item->tienda}}</h6>
                        @if ($item->portada)
                            <img class="img-sm float-right" src="{{asset($item->portada)}}">
                        @else
                            <img class="img-sm float-right" src="{{asset('ecom/images/shop.png')}}">
                        @endif
                        <a href="{{$item->mapa}}" target="../" class="text-muted"><i class="fa fa-map-marker-alt"></i>{{$item->direccion}}</a>
                    </div>
                </a>
            </li>
            @endforeach
        </ul>
        </div>
    </div>
    </div>
</section> --}}

<section  class="padding-bottom-sm">

    <header class="section-heading heading-line">
        <h4 class="title-section text-uppercase">Restaurantes</h4>
    </header>

    <div class="row">
        @foreach ($tiendas as $item)
        <div class="col-xl-2 col-lg-3 col-md-4 col-6">
            <a href="{{url('r/'.$item->slug)}}" class="item">
            <article class="card card-product-grid card-lg">
              {{-- <img src="{{asset($item->portada)}}" class="card-img-top"> --}}
              <img src="{{asset('img/elpadrino-logo.png')}}" class="card-img-top">

              <div class="card-body">
                <h6 class="title text-uppercase">{{$item->tienda}}</h6>
                <p class="small text-muted">{{$item->direccion}}</p>
              </div>
            </article> <!-- card.// -->
            </a>
        </div> <!-- col.// -->
        @endforeach
    </div> <!-- row.// -->
    {{-- {{$tiendas->appends(['restaurantes' => $tiendas->currentPage()])->links()}}     --}}

</section>
@endif
