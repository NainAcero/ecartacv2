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
          <a href="{{$item->mapa}}" target="../" class="text-muted"><i
              class="fa fa-map-marker-alt"></i>{{$item->direccion}}</a>
        </div>
      </a>
    </li>
    @endforeach
  </ul>
</div>
</div>
</div>
</section> --}}

<section class="padding-bottom-sm">

  
  


  @foreach ($tiendas as $index => $item)
  @if ($item->tiendas->count() > 0)

  {{-- <div class="card"> --}}
    <header class="card-header">
      <a href="#" data-toggle="collapse" data-target="#collapse{{$index+1}}" aria-expanded="false" class="collapsed">
        <i class="icon-control fa fa-chevron-down"></i>
        <h6 class="title">{{$item->tipo}} </h6>
      </a>
    </header>
    <div class="collapse" id="collapse{{$index+1}}" style="">
      <article class="card-body">
        <div class="row">
          <div class="owl-carousel owl-theme">
            @foreach ($item->tiendas->sortBy('orden') as $item)
            <div class="h-100">
              <a href="{{url('r/'.$item->slug)}}" class="item">
                <article class="card card-product-grid card-lg h-100">
                  <div class="img-container position-relative">
                    @if($item->feria)
                    <div class="en-feria">
                      <span>Feria Digital</span>
                    </div>
                    @endif
                    <img src="{{asset($item->portada)}}" class="card-img-top">
                  </div>
                  <div class="card-body card-bodyv2  text-center">
                    <h6 class="title">{{$item->tienda}}</h6>
                    {{-- <p class="small text-muted">{{$item->direccion}}</p> --}}
                  </div>
                </article>
                <!-- card.// -->
              </a>
            </div> <!-- col.// -->
            @endforeach
          </div>
        </div> <!-- row.// -->    
      </article>
    </div>
  {{-- </div> --}}
  
  @endif
  @endforeach
  <div>
    {{-- ADSENSE --}}
    <!-- anuncio ecartac -->
    <ins class="adsbygoogle"
      style="display:block"
      data-ad-client="ca-pub-7054594845763014"
      data-ad-slot="5716911987"
      data-ad-format="auto"
      data-full-width-responsive="true"></ins>
    <script>
      (adsbygoogle = window.adsbygoogle || []).push({});
    </script>
    {{-- ADSENSE --}}
  </div>
  {{-- {{$tiendas->appends(['restaurantes' => $tiendas->currentPage()])->links()}} --}}

</section>
@endif
@section('quienessomos')
@include('frontend.quienessomos')
@endsection

@section('scripts')

<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"
  integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw=="
  crossorigin="anonymous"></script>
<script>
  $(document).ready(function() {

    $(".owl-carousel").each(function(){
      $(this).owlCarousel({
          margin:15,
          dots:false,
          navText: ['<i class="fa fa-chevron-left"></i>','<i class="fa fa-chevron-right"></i>'],
          responsive:{
              0:{
                  items:2,
                  nav:true
              },
              768:{
                  items:3,
                  nav:true
              },
              992:{
                  items:4,
                  nav:true
              }
          }
      });
    });
  });
</script>

@endsection